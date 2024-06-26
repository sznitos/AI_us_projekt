<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Validator;
use core\Utils;
use core\ParamUtils;

class ManageCtrl {

    public function action_manage() {
        $records = App::getDB()->select("book", [
            "book_id",
            "title",
            "author_name",
            "author_surname",
            "year"
        ]);
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->assign('page_title', 'Zarządzanie | LibApp');
        App::getSmarty()->display("ManageView.tpl");
    }

    public function action_bookNew() {
        App::getSmarty()->assign('form', [
            'book_id' => '',
            'title' => '',
            'author_name' => '',
            'author_surname' => '',
            'year' => ''
        ]);
        App::getSmarty()->assign('page_title', 'Dodaj Nową Książkę | LibApp');
        App::getSmarty()->display("BookFormView.tpl");
    }

    public function action_bookSave() {
        $book_id = ParamUtils::getFromRequest('book_id');
        $title = ParamUtils::getFromRequest('title');
        $author_name = ParamUtils::getFromRequest('author_name');
        $author_surname = ParamUtils::getFromRequest('author_surname');
        $year = ParamUtils::getFromRequest('year');

        $form = [
            'book_id' => $book_id,
            'title' => $title,
            'author_name' => $author_name,
            'author_surname' => $author_surname,
            'year' => $year
        ];

        // Walidacja pól
        $isValid = true;

        // Dodatkowa walidacja ID
        if ($book_id && (!is_numeric($book_id) || $book_id <= 0)) {
            Utils::addErrorMessage('Niepoprawne ID książki');
            $isValid = false;
        }

        // Walidacja tytułu
        if (empty($title)) {
            Utils::addErrorMessage('Brak tytułu książki');
            $isValid = false;
        }

        // Walidacja imienia autora
        if (empty($author_name)) {
            Utils::addErrorMessage('Brak imienia autora');
            $isValid = false;
        }

        // Walidacja nazwiska autora
        if (empty($author_surname)) {
            Utils::addErrorMessage('Brak nazwiska autora');
            $isValid = false;
        }

        // Dodatkowa walidacja roku
        if (!is_numeric($year) || $year < 1000 || $year > date('Y')) {
            Utils::addErrorMessage('Niepoprawny rok wydania');
            $isValid = false;
        }

        if ($isValid) {
            try {
                if ($book_id) {
                    // Edycja istniejącej książki
                    App::getDB()->update("book", [
                        "title" => $title,
                        "author_name" => $author_name,
                        "author_surname" => $author_surname,
                        "year" => $year
                    ], [
                        "book_id" => $book_id
                    ]);
                    Utils::addInfoMessage('Pomyślnie zaktualizowano książkę');
                } else {
                    // Dodanie nowej książki
                    App::getDB()->insert("book", [
                        "title" => $title,
                        "author_name" => $author_name,
                        "author_surname" => $author_surname,
                        "year" => $year
                    ]);
                    Utils::addInfoMessage('Pomyślnie dodano nową książkę');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu do bazy danych');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }
        }

        if (!App::getMessages()->isError()) {
            App::getRouter()->redirectTo('manage');
        } else {
            App::getSmarty()->assign('form', $form);
            $this->action_bookNew();
        }
    }

    public function action_bookDelete() {
        $book_id = ParamUtils::getFromRequest('id');

        if (!empty($book_id)) {
            try {
                // Sprawdzenie czy książka istnieje
                $record = App::getDB()->get("book", "*", ["book_id" => $book_id]);
                if (!$record) {
                    Utils::addErrorMessage('Nie znaleziono książki do usunięcia');
                } else {
                    // Usunięcie książki
                    App::getDB()->delete("book", ["book_id" => $book_id]);
                    Utils::addInfoMessage('Pomyślnie usunięto książkę');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania książki');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }
        }
        App::getRouter()->redirectTo('manage');
    }

    public function action_bookEdit() {
        $book_id = ParamUtils::getFromRequest('id');

        $form = [];
        if (!empty($book_id)) {
            try {
                $record = App::getDB()->get("book", "*", ["book_id" => $book_id]);
                if ($record) {
                    $form = [
                        'book_id' => $record['book_id'],
                        'title' => $record['title'],
                        'author_name' => $record['author_name'],
                        'author_surname' => $record['author_surname'],
                        'year' => $record['year']
                    ];
                    App::getSmarty()->assign('form', $form);
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania danych książki');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }
        }

        App::getSmarty()->assign('page_title', 'Edytuj Książkę | LibApp');
        App::getSmarty()->display("BookFormView.tpl");
    }
}
