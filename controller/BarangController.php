<?php

require_once __DIR__ . '/../controller/Connection.php';

class AuthController
{
    private $conn;


    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function index()
    {
        
    }
}
