<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login) || !isset($this->form->pass)) {
            return false;
        }

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        try {
            $user = App::getDB()->get("user", "*", [
                "login" => $this->form->login
            ]);

            if (!$user) {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
                return false;
            }

            if ($user['password'] !== $this->form->pass) {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
                return false;
            }

            if ($user['active'] == 0) {
                Utils::addErrorMessage('Twoje konto jest nieaktywne');
                return false;
            }

            // Przypisanie roli na podstawie statusu active
            if ($user['active'] == 1) {
                $this->form->role = 'admin';
            } elseif ($user['active'] == 2) {
                $this->form->role = 'user';
            }

            return true;
        } catch (\Exception $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas logowania do bazy danych');
            return false;
        }
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if ($this->validate()) {
            $rola = $this->form->role;

            RoleUtils::addRole($rola);

            $userData = [
                'username' => $this->form->login
            ];
            $userDataJson = json_encode($userData);
            setcookie('userData', $userDataJson, time() + (86400 * 30), '/'); // Ciasteczko ważne przez 30 dni (86400 sekund * 30)

            App::getRouter()->redirectTo("profile");
        } else {
            App::getSmarty()->assign('page_title','Logowanie | LibApp');
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('personList');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
        App::getSmarty()->assign('page_title','Logowanie | LibApp');
    }
}
