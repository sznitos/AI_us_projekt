<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class StartPageCtrl {
    
    public function action_startPage() { 
        App::getSmarty()->display("MainPage.tpl");        
    }    
}
