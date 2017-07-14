<?php
class Manager {
    protected $_db;
    public function __construct()
    {
        $this->_db = new PDO ('mysql:host=localhost;dbname=openclassrooms;charset=utf8', 'root', "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}