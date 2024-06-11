<?php

  class Connection {

    private $host = 'localhost';
    private $database = 'db_toserba';
    private $username = 'root';
    private $password = '';

    public function getConnection() {
      return new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
    }


  }

?>