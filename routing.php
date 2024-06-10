<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('library'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('library', 'Library');
Utils::addRoute('login', 'Auth');