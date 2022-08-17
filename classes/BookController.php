<?php

include_once './BookModel.php';

/**
 * BookController
 */
class BookController extends BookModel
{
    /**
     * @var string
     */
    public $action;

    /**
     * BookController Contructor.
     */
    public function __construct() 
    {
        $this->action = $_POST['action'];
    }

    /**
     * getBookList
     */
    public function getBookList() : array
    {
        return $this->retrieveBookList();
    }

    /**
     * addNewBook
     * @param array $aParameters
     * @return string
     */
    public function addNewBook() : string
    {
        return $this->insertNewBook($_POST['book']);
    }

    /**
     * deleteBook
     * @return string
     */
    public function deleteBook() : string
    {
        return $this->dropBook($_POST['id']);
    }
}

$oBookController = new BookController();

if (isset($oBookController->action) === true && $oBookController->action === 'getBooks') {
    echo json_encode($oBookController->getBookList());
} else if (isset($oBookController->action) === true && $oBookController->action === 'addNewBook') {
    echo $oBookController->addNewBook();
} else if (isset($oBookController->action) === true && $oBookController->action === 'deleteBook') {
    echo $oBookController->deleteBook();
}
