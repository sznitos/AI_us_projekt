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
    }

//        App::getDB()->insert("book",[
//            "title" => $kwota,
//            "author_name" => $lat,
//            "author_surname" => $procent,
//            "year" => $rata
//           ]);
//    }

}