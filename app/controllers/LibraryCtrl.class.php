<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class LibraryCtrl {

    public function action_library() {
        $records = App::getDB()->select("book", "*");
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->assign('page_title', 'Biblioteczka | LibApp');
        App::getSmarty()->display("Library.tpl");
    }

}
