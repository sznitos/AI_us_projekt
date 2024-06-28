<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;

class LibraryCtrl {

    public function action_library() {
        // Pobranie wszystkich książek
        $books = App::getDB()->select("book", [
            "book_id",
            "title",
            "author_name",
            "author_surname",
            "year"
        ]);

        // Inicjalizacja klucza 'borrowed' dla każdej książki
        foreach ($books as &$book) {
            $book['borrowed'] = false;
        }

        // Pobranie informacji o wypożyczeniach
        $borrows = App::getDB()->select("borrow", "*", [
            "borrow_end" => "0000-00-00"
        ]);

        // Dodanie flagi 'borrowed' do książek
        foreach ($books as &$book) {
            foreach ($borrows as $borrow) {
                if ($borrow['book_id'] == $book['book_id']) {
                    $book['borrowed'] = true;
                    break;
                }
            }
        }

        // Obsługa ciasteczek użytkownika
        if (isset($_COOKIE['userData'])) {
            $userDataJson = $_COOKIE['userData'];
            $userData = json_decode($userDataJson, true);
            $user = $this->getUserData($userData['username']);

            if ($user) {
                $user['name'] = ucfirst(strtolower($user['name']));
                $user['surname'] = ucfirst(strtolower($user['surname']));
                App::getSmarty()->assign('user', $user);
            } else {
                echo "Nie znaleziono użytkownika o podanym loginie.";
            }
        } else {
            echo "Brak danych użytkownika w ciasteczku.";
        }

        App::getSmarty()->assign("lista", $books);
        App::getSmarty()->assign('page_title', 'Biblioteka | LibApp');
        App::getSmarty()->display("Library.tpl");
    }

    private function getUserData($login) {
        try {
            $user = App::getDB()->get("user", "*", [
                "login" => $login
            ]);
            return $user;
        } catch (\Exception $e) {
            echo "Wystąpił błąd podczas pobierania danych użytkownika.";
            return null;
        }
    }

    public function action_borrowBook() {
        // Pobranie ID książki z URL
        $book_id = ParamUtils::getFromCleanURL(1);

        // Pobranie ID zalogowanego użytkownika z sesji
        $user_id = SessionUtils::load('user_id', true);

        // Sprawdzenie, czy użytkownik jest zalogowany
        if (!$user_id) {
            Utils::addErrorMessage('Musisz być zalogowany, aby wypożyczyć książkę.');
            App::getRouter()->redirectTo('login');
            return;
        }

        try {
            // Wstawienie nowego rekordu do tabeli 'borrow'
            App::getDB()->insert("borrow", [
                "borrow_start" => date("Y-m-d"),
                "borrow_end" => "0000-00-00",
                "user_id" => $user_id,
                "book_id" => $book_id
            ]);
            Utils::addInfoMessage('Książka została poprawnie wypożyczona.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas wypożyczania książki.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // Przekierowanie użytkownika do strony biblioteki
        App::getRouter()->redirectTo('library');
    }

    private function getUser($user_id) {
        try {
            $borrowed_books = ['current' => [], 'history' => []];
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
                    "borrow.borrow_end" => "0000-00-00"
                ]
            ]);
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
                    "borrow.borrow_end[!]" => "0000-00-00"
                ]
            ]);
            $borrowed_books['current'] = $current_borrowed_books;
            $borrowed_books['history'] = $history_borrowed_books;
            return $borrowed_books;
        } catch (\Exception $e) {
            echo "Wystąpił błąd podczas pobierania danych wypożyczeń użytkownika.";
            return null;
        }
    }
}
