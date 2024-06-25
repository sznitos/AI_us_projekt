<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('startPage'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('startPage', 'StartPageCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('library', 'LibraryCtrl');
Utils::addRoute('library', 'LibraryCtrl', ["user", "admin"]);
Utils::addRoute('books', 'LibraryCtrl', ["user", "admin"]);
Utils::addRoute('returnBook', 'LibraryCtrl', ["user", "admin"]);

Utils::addRoute('profile', 'ProfileCtrl', ["user", "admin"]);

Utils::addRoute('manage', 'ManageCtrl', ["user", "admin"]);
Utils::addRoute('bookNew', 'ManageCtrl', ["admin"]);
Utils::addRoute('bookSave', 'ManageCtrl', ["admin"]);
Utils::addRoute('bookDelete', 'ManageCtrl', ["admin"]);
Utils::addRoute('bookEdit', 'ManageCtrl', ["admin"]);
