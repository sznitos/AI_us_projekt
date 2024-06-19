<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class ManageCtrl {

    public function action_manage() {
        $records = App::getDB()->select("book", "*");
        App::getSmarty()->assign("lista",$records); 
        App::getSmarty()->assign('page_title','Zarządzanie | LibApp');
        App::getSmarty()->display("Library.tpl");
        
    }
    
    public function action_books() {
       
    }
}