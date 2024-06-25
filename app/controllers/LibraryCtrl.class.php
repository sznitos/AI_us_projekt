<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class LibraryCtrl {

    public function action_library() {
        $records = App::getDB()->select("book", "*");
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->assign('page_title', 'Biblioteczka | LibApp');
        App::getSmarty()->display("Library.tpl");
    }

    public function action_borrow() {
        $bookId = ParamUtils::getFromPost('book_id');

        if (empty($bookId)) {
            Utils::addErrorMessage('Nie wybrano książki do wypożyczenia');
            App::getRouter()->redirectTo('library');
        }

// Pobranie identyfikatora użytkownika z ciasteczka
$userDataJson = isset($_COOKIE['userData']) ? $_COOKIE['userData'] : null;
$userData = json_decode($userDataJson, true);
$userId = isset($userData['user_id']) ? $userData['user_id'] : null;


        try {
            // Sprawdź czy książka jest dostępna do wypożyczenia
            $book = App::getDB()->get("book", "*", [
                "book_id" => $bookId
            ]);

            if (!$book) {
                Utils::addErrorMessage('Książka nie istnieje');
                App::getRouter()->redirectTo('library');
            }

            // Sprawdź czy książka nie jest już wypożyczona przez tego użytkownika
            $borrowed = App::getDB()->has("borrow", [
                "AND" => [
                    "user_id" => $userId,
                    "book_id" => $bookId
                ]
            ]);

            if ($borrowed) {
                Utils::addErrorMessage('Ta książka jest już wypożyczona przez Ciebie');
                App::getRouter()->redirectTo('library');
            }

            // Wstaw nowy wpis do tabeli borrow
            $borrowId = App::getDB()->insert("borrow", [
                "borrow_start" => date('Y-m-d'),
                "borrow_end" => date('Y-m-d', strtotime('+14 days')), // zakładam wypożyczenie na 14 dni
                "user_id" => $userId,
                "book_id" => $bookId
            ]);

            if ($borrowId) {
                Utils::addInfoMessage('Pomyślnie wypożyczono książkę');
            } else {
                Utils::addErrorMessage('Wystąpił problem podczas wypożyczania książki');
            }
        } catch (\Exception $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas operacji na bazie danych');
        }

        App::getRouter()->redirectTo('library');
    }
}
