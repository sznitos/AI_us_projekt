<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class LibraryCtrl {

    public function action_library() {
        $records = App::getDB()->select("book", "*");
        App::getSmarty()->assign("lista",$records); 
        App::getSmarty()->assign('page_title','Biblioteczka | LibApp');
        App::getSmarty()->display("Library.tpl");
        
    }
    
    public function action_books() {
       
    }
}