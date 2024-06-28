<?php

namespace app\controllers;

use core\App;
use core\Utils;

class ProfileCtrl {
    public function action_profile() {
        if (isset($_COOKIE['userData'])) {
            $userDataJson = $_COOKIE['userData'];
            $userData = json_decode($userDataJson, true);

            $user = $this->getUserData($userData['username']);
            if ($user) {
                $user['name'] = ucfirst(strtolower($user['name']));
                $user['surname'] = ucfirst(strtolower($user['surname']));
                $borrowed_books = $this->getUserBorrowedBooks($user['user_id']);
                $user['borrowed_books'] = $borrowed_books;
                App::getSmarty()->assign('user', $user);
            } else {
                echo "Nie znaleziono użytkownika o podanym loginie.";
            }
        } else {
            echo "Brak danych użytkownika w ciasteczku.";
        }
        $this->generateView();
    }

    public function action_profileReturn() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $borrow_id = $_POST['borrow_id'];
            $return_date = date('Y-m-d');
            try {
                $affectedRows = App::getDB()->update('borrow', [
                    'borrow_end' => $return_date
                ], [
                    'AND' => [
                        'borrow_id' => $borrow_id,
                        'borrow_end' => "0000-00-00"
                    ]
                ]);
                if ($affectedRows > 0) {
                    Utils::addInfoMessage("Książka została pomyślnie zwrócona.");
                } else {
                    Utils::addErrorMessage("Nie udało się zwrócić książki.");
                }
            } catch (\Exception $e) {
                Utils::addErrorMessage("Wystąpił błąd podczas zwracania książki.");
            }
        }
        App::getRouter()->redirectTo('profile');
    }

    private function getUserData($login) {
        try {
            return App::getDB()->get("user", "*", ["login" => $login]);
        } catch (\Exception $e) {
            echo "Wystąpił błąd podczas pobierania danych użytkownika.";
            return null;
        }
    }

    private function getUserBorrowedBooks($user_id) {
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

    private function generateView() {
        App::getSmarty()->assign('page_title', 'Profil | LibApp');
        App::getSmarty()->display('ProfileView.tpl');
    }
}
