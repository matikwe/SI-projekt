<?php
class Database
{

    static private $_instance = null;
    private $_handle;
    public function __construct($dbname)
    {
        try {
            $this->_handle = new PDO('mysql:host=localhost;dbname=' . $dbname, "root", "");
        } catch (PDOException $e) {
            $_SESSION['errorDB'] = 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
    }


    /**
     * @return PDO
     */
    public function getHandle()
    {
        return $this->_handle;
    }

    public function count($tableName)
    {
        $res = $this->_handle->query("SELECT COUNT(*) FROM " . "$tableName");
        return $res->fetchColumn();
    }

    public function getHighestID()
    {
        $res = $this->_handle->query("SELECT MAX(id_book) FROM book");
        return $res->fetchColumn();
    }
}