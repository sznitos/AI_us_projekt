<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('library'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions


Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('library', 'LibraryCtrl');
Utils::addRoute('books', 'LibraryCtrl');

Utils::addRoute('library', 'LibraryCtrl',["user","admin"]);
Utils::addRoute('cleardata', 'DataCtrl',["admin"]);