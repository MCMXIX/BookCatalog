<?php

/**
 * dbCon
 */
class dbCon 
{

    private $sHost = 'localhost';
    private $sUser = 'root';
    private $sPass = '';
    private $sDbName = 'book-catalog';

    /**
     * connectDb
     * Database Connection
     */
    protected function connectDb() 
    {
        $sDsn = 'mysql:host='. $this->sHost . ';dbname=' . $this->sDbName;
        $pdo = new PDO($sDsn, $this->sUser, $this->sPass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       
        return $pdo;
    }

}