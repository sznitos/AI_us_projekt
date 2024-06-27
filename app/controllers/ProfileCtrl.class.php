<?php

namespace app\controllers;

use core\App;

class ProfileCtrl {

    public function action_profile() {
        if(isset($_COOKIE['userData'])) {
            // Odczytanie danych użytkownika z ciasteczka
            $userDataJson = $_COOKIE['userData'];
            $userData = json_decode($userDataJson, true);
            
            // Pobranie wszystkich danych użytkownika na podstawie loginu z bazy danych
            $user = $this->getUserData($userData['username']);
            
            // Formatowanie imienia i nazwiska (pierwsza duża litera)
            $user['name'] = ucfirst(strtolower($user['name']));
            $user['surname'] = ucfirst(strtolower($user['surname']));

            // Pobranie aktualnych i historycznych wypożyczeń książek
            $borrowed_books = $this->getUserBorrowedBooks($user['user_id']);
            $user['borrowed_books'] = $borrowed_books;

            if ($user) {
                // Przypisanie danych do Smarty
                App::getSmarty()->assign('user', $user);
            } else {
                echo "Nie znaleziono użytkownika o podanym loginie.";
            }
        } else {
            echo "Brak danych użytkownika w ciasteczku.";
        }
        
        $this->generateView();
    }

    public function action_returnBook() {
        // Sprawdzenie czy dane zostały przesłane metodą POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobranie ID książki do zwrotu z formularza
            $book_id = $_POST['book_id'];
            
            // Aktualna data jako data zwrotu
            $return_date = date('Y-m-d');
            
            // Aktualizacja bazy danych: ustawienie daty zwrotu dla książki o danym ID
            try {
                $affectedRows = App::getDB()->update('borrow', [
                    'borrow_end' => $return_date
                ], [
                    'AND' => [
                        'book_id' => $book_id,
                        'borrow_end' => null // Zwrot tylko dla niezwróconych jeszcze książek
                    ]
                ]);
                
                if ($affectedRows > 0) {
                    // Powodzenie zwrotu książki
                    App::getMessages()->addInfo("Książka została pomyślnie zwrócona.");
                } else {
                    // Informacja gdy książka już została wcześniej zwrócona lub nie istnieje
                    App::getMessages()->addError("Nie udało się zwrócić książki.");
                }
            } catch (\Exception $e) {
                // Obsługa błędu zapytania do bazy danych
                App::getMessages()->addError("Wystąpił błąd podczas zwracania książki.");
            }
        }

        // Przekierowanie z powrotem do profilu użytkownika
        App::getRouter()->redirectTo('profile');
    }

    public function generateView() {
        // Przekazanie tytułu strony do Smarty
        App::getSmarty()->assign('page_title', 'Profil | LibApp');
        App::getSmarty()->display('ProfileView.tpl');
    }

    private function getUserData($login) {
        try {
            // Pobranie wszystkich danych użytkownika z bazy danych na podstawie loginu
            $user = App::getDB()->get("user", "*", [
                "login" => $login
            ]);
            return $user;
        } catch (\Exception $e) {
            // Obsługa błędu zapytania do bazy danych
            echo "Wystąpił błąd podczas pobierania danych użytkownika.";
            return null;
        }
    }

    private function getUserBorrowedBooks($user_id) {
        try {
            // Pobranie aktualnych i historycznych wypożyczeń książek użytkownika
            $borrowed_books = [
                'current' => [],
                'history' => []
            ];

            // Pobranie aktualnych wypożyczeń
            $current_borrowed_books = App::getDB()->select('borrow', [
                "[>]book" => ["book_id" => "book_id"]
            ], [
                'borrow.borrow_id',
                'borrow.borrow_start',
                'borrow.borrow_end',
                'book.title',
                'book.author_name',
                'book.author_surname'
            ], [
                'AND' => [
                    'borrow.user_id' => $user_id,
//                    "borrow.borrow_end[<>]" => NULL // Wypożyczenia, które nie zostały jeszcze zwrócone
                    "borrow.borrow_end[<>]" => ["0000-00-00", date("Y-m-d")]
                ]
            ]);

            // Pobranie historycznych wypożyczeń
            $history_borrowed_books = App::getDB()->select('borrow', [
                "[>]book" => ["book_id" => "book_id"]
            ], [
                'borrow.borrow_id',
                'borrow.borrow_start',
                'borrow.borrow_end',
                'book.title',
                'book.author_name',
                'book.author_surname'
            ], [
                'AND' => [
                    'borrow.user_id' => $user_id,
                    "borrow.borrow_end[>]" => '1970-01-01' // Wypożyczenia, które zostały już zwrócone
                ]
            ]);

            // Dodanie wyników do tablicy $borrowed_books
            $borrowed_books['current'] = $current_borrowed_books;
            $borrowed_books['history'] = $history_borrowed_books;

            return $borrowed_books;
        } catch (\Exception $e) {
            // Obsługa błędu zapytania do bazy danych
            echo "Wystąpił błąd podczas pobierania wypożyczonych książek.";
            return null;
        }
    }
}
