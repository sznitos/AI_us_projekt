<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class LibraryCtrl {

    public function action_library() {
        App::getSmarty()->assign('page_title','Logged | LibApp');
        App::getSmarty()->display("Library.tpl");
    }

}