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
// Przetworzenie danych (1 litera duża tylko)
        $user['name'] = ucfirst(strtolower($user['name'])); // Pierwsza litera duża, reszta małe
        $user['surname'] = ucfirst(strtolower($user['surname'])); // Pierwsza litera duża, reszta małe

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

    public function generateView() {
        // Przekazanie tytułu strony do Smarty
        App::getSmarty()->assign('page_title', 'Profil | LibApp');
        App::getSmarty()->display('Profile.tpl');
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

}
