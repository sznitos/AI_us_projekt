<?php
namespace app\controllers;

use core\App;

class ManageCtrl {

public function action_manage() {
    // Pobranie wszystkich książek
    $books = App::getDB()->select("book", [
        "book_id",
        "title",
        "author_name",
        "author_surname",
        "year"
    ]);

    // Inicjalizacja klucza 'borrowed' dla każdej książki
    foreach ($books as &$book) {
        $book['borrowed'] = false;
    }

    // Pobranie informacji o wypożyczeniach
    $borrows = App::getDB()->select("borrow", "*", [
        "borrow_end" => null
    ]);

    // Dodanie flagi 'borrowed' do książek
    foreach ($books as &$book) {
        foreach ($borrows as $borrow) {
            if ($borrow['book_id'] == $book['book_id']) {
                $book['borrowed'] = true;
                break;
            }
        }
    }

    App::getSmarty()->assign("lista", $books);
    App::getSmarty()->assign('page_title', 'Zarządzanie | LibApp');
    App::getSmarty()->display("ManageView.tpl");
}
}
