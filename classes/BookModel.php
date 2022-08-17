<?php

include './dbcon.class.php';

/**
 * BookModel
 */
class BookModel extends dbCon
{
    /**
     * @const string
     */
    const TABLE_NAME = 'books';

    /**
     * retrieveBookList
     * @return array
     */
    protected function retrieveBookList() : array
    {
        $sSql = 'SELECT * FROM ' . self::TABLE_NAME;
        $stmt = $this->connectDb()->query($sSql);
        
        return $stmt->fetchAll();
    }

    /**
     * addNewBook
     * @param array $aParameters
     * @return string
     */
    protected function insertNewBook(array $aParameters) : string
    {
        $sSql = 'INSERT INTO ' . self::TABLE_NAME . '(title, isbn, author, publisher, year_published, category) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $this->connectDb()->prepare($sSql);
        $aParams = [
            $aParameters['title'], 
            $aParameters['isbn'], 
            $aParameters['author'], 
            $aParameters['publisher'], 
            $aParameters['year_published'], 
            $aParameters['category']
        ];
        if ($stmt->execute($aParams)) {
            return 'Success';
        }
        
        return 'Something wen\'t wrong creating book. Please try again Later.';
    }

    /**
     * updateBook
     * @param array $aParameters
     * @return string
     */
    protected function updateBook(array $aParameters) : string
    {
        $sSql = 'UPDATE ' . self::TABLE_NAME . ' SET Title = ?, ISBN = ?, Author = ?, Publisher = ?, Year_Published = ?, Category = ? WHERE id = ?';
        $stmt = $this->connectDb()->prepare($sSql);
        $aParams = [
            $aParameters['title'], 
            $aParameters['isbn'], 
            $aParameters['author'], 
            $aParameters['publisher'], 
            $aParameters['year_published'], 
            $aParameters['category'], 
            $aParameters['id']
        ];
        if($stmt->execute($aParams) === true) {
            return 'Success';
        }

        return 'Error on database Query'; 
    }

    /**
     * dropBook
     * @param int $iId
     * @return string
     */
    protected function dropBook(int $iId) : string
    {
        $sSql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = ?';
        $stmt = $this->connectDb()->prepare($sSql);
        $stmt->execute([$iId]);
        
        return 'Successfully deleted';
    }
}