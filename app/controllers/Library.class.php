<?php

namespace app\controllers;

use Core\App;

class Library {

    public function action_library() {
        App::getSmarty()->display("Library.tpl");
    }

}