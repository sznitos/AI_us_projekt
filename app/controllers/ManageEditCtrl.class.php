<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ManageEditForm;

class ManageEditCtrl {

    private $form; // dane formularza

    public function __construct() {
        // stworzenie potrzebnych obiektów
        $this->form = new ManageEditForm();
    }

    public function validateSave() {
        $v = new Validator();

        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');
        $this->form->title = $v->validateFromPost('title', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Tytuł jest wymagany.',
            'min_length' => 5,
            'validator_message' => 'Tytuł musi zawierać więcej niż 5 znaków'
        ]);
        
        $this->form->name = $v->validateFromPost('name', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Imię autora jest wymagane.',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Imię powinno mieć od 2 do 20 znaków'
        ]);
        
        $this->form->surname = $v->validateFromPost('surname', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Nazwisko autora jest wymagane.',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Nazwisko powinno mieć od 2 do 20 znaków'
        ]);
        
        $this->form->year = $v->validateFromPost('year', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Rok wydania jest wymagany.',
            'numeric' => true,
            'min' => 1,
            'max' => 2024,
            'validator_message' => 'Podaj poprawny rok publikacji'
        ]);

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_bookNew() {
        $this->generateView();
    }

    public function action_bookEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("book", "*", [
                    "book_id" => $this->form->id
                ]);
                if ($record) {
                    $this->form->id = $record['book_id'];
                    $this->form->title = $record['title'];
                    $this->form->name = $record['author_name'];
                    $this->form->surname = $record['author_surname'];
                    $this->form->year = $record['year'];
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            }
        }

        $this->generateView();
    }

    public function action_bookDelete() {
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("book", [
                    "book_id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('library');
    }

    public function action_bookSave() {
        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {
                    $count = App::getDB()->count("book");
                    if ($count <= 20) {
                        App::getDB()->insert("book", [
                            "title" => $this->form->title,
                            "author_name" => $this->form->name,
                            "author_surname" => $this->form->surname,
                            "year" => $this->form->year
                        ]);
                    } else {
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView();
                        exit();
                    }
                } else {
                    App::getDB()->update("book", [
                        "title" => $this->form->title,
                        "author_name" => $this->form->name,
                        "author_surname" => $this->form->surname,
                        "year" => $this->form->year
                    ], [
                        "book_id" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zmodyfikowano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('library');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('EditBookView.tpl');
    }

}
