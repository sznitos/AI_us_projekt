<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('startPage'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('startPage', 'StartPageCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');

Utils::addRoute('library', 'LibraryCtrl');
Utils::addRoute('library', 'LibraryCtrl',["user","admin"]);
Utils::addRoute('books', 'LibraryCtrl');
Utils::addRoute('returnBook', 'LibraryCtrl');

Utils::addRoute('profile', 'ProfileCtrl');

Utils::addRoute('manage', 'ManageCtrl');


