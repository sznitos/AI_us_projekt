<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('startPage'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('startPage', 'StartPageCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

//Utils::addRoute('library', 'LibraryCtrl');
Utils::addRoute('library', 'LibraryCtrl', ["user", "admin"]);
//Utils::addRoute('returnBook', 'LibraryCtrl', ["user", "admin"]);

Utils::addRoute('profile', 'ProfileCtrl', ["user", "admin"]);

//Utils::addRoute('manage', 'ManageCtrl', ["admin"]);
Utils::addRoute('bookNew', 'ManageEditCtrl', ["admin"]);
Utils::addRoute('bookEdit', 'ManageEditCtrl', ["admin"]);
Utils::addRoute('bookDelete', 'ManageEditCtrl', ["admin"]);
Utils::addRoute('bookSave', 'ManageEditCtrl', ["admin"]);

Utils::addRoute('borrowBook', 'LibraryCtrl',["user", "admin"]);
Utils::addRoute('returnBook', 'LibraryCtrl',["user", "admin"]);


//Utils::addRoute('personNew',     'PersonEditCtrl',	['user','admin']);
//Utils::addRoute('personEdit',    'PersonEditCtrl',	['user','admin']);
//Utils::addRoute('personSave',    'PersonEditCtrl',	['user','admin']);
//Utils::addRoute('personDelete',  'PersonEditCtrl',	['admin']);