<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\LoginForm;

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

        if (isset($_COOKIE['userData'])) {
            // Odczytanie danych użytkownika z ciasteczka
            $userDataJson = $_COOKIE['userData'];
            $userData = json_decode($userDataJson, true);

            // Pobranie wszystkich danych użytkownika na podstawie loginu z bazy danych
            $user = $this->getUserData($userData['username']);

            // Formatowanie imienia i nazwiska (pierwsza duża litera)
            $user['name'] = ucfirst(strtolower($user['name']));
            $user['surname'] = ucfirst(strtolower($user['surname']));

            if ($user) {
                // Przypisanie danych do Smarty
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

    public function action_borrowBook() {
        // Pobranie ID książki z formularza
        $book_id = ParamUtils::getFromRequest('book_id');

        // Pobranie ID zalogowanego użytkownika
        $user_id = SessionUtils::load('user_id', true);

        if (!$user_id) {
            Utils::addErrorMessage('Musisz być zalogowany, aby wypożyczyć książkę.');
            App::getRouter()->redirectTo('login');
        }

        try {
            App::getDB()->insert("borrow", [
                "book_id" => $book_id,
                "user_id" => $user_id,
                "borrow_start" => date("Y-m-d"),
                "borrow_end" => "0000-00-00"
            ]);
            Utils::addInfoMessage('Książka została wypożyczona.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas wypożyczania książki.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->redirectTo('library');
    }

    public function action_returnBook() {
        // Pobranie ID książki z formularza
        $book_id = ParamUtils::getFromRequest('book_id');

        try {
            App::getDB()->update("borrow", [
                "borrow_end" => date("Y-m-d")
            ], [
                "book_id" => $book_id,
                "borrow_end" => "0000-00-00"
            ]);
            Utils::addInfoMessage('Książka została zwrócona.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas zwracania książki.');
            if (App::getConf()->debug) {
                Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->redirectTo('library');
    }
}
