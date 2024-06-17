<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class Auth {

    public function action_login() {
//        display all of the book table
        $records = App::getDB()->select("book", "*");
        App::getSmarty()->assign("lista",$records); 
        App::getSmarty()->assign('page_title','LibApp | Logowanie');
        App::getSmarty()->display("LoginPage.tpl");
         //1. pobranie parametrów formularza logowania (login i hasło)
     
        //2. walidacja (pobranie z BD informacji o użytkowniku)
        //załóżmy, że rola użytkownika zostanie tu zapisana w zmiennej $rola
 
        //3.1 jeśli walidacja poprawna to "zaloguj"
        \core\RoleUtils::addRole($rola); //zapisanie roli w sesji

        // i przekieruj do wybranej akcji (tej domyślnej po zalogowaniu)
        App::getRouter()->redirectTo("showdata");

        //3.2 jeśli walidacja niepoprawna to pozostań na stronie logowania i wyświetl komunikaty
    
    }
    
    public function action_accessdenied() {
//        display all of the book table
        App::getMessages()->addMessage(new Message("wypad", Message::INFO));
        Utils::addInfoMessage("Niestety nie masz uprawnień do przeglądania tej zawartości!");
        App::getSmarty()->assign('page_title','No Access | LibApp');
        App::getSmarty()->display("LoginPage.tpl");
    }

//        App::getDB()->insert("book",[
//            "title" => $kwota,
//            "author_name" => $lat,
//            "author_surname" => $procent,
//            "year" => $rata
//           ]);
//    }
    public function action_logout() {

    //unieważnij sesję
    session_destroy();

    // i przekieruj do wybranej akcji (tej domyślnej po wylogowaniu)
    App::getRouter()->redirectTo("hello");

}
}