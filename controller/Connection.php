<?php

  class Connection {

    private static $host = 'localhost';
    private static $database = 'db_toserba';
    private static $username = 'root';
    private static $password = '';

    public static function getConnection():PDO {
      $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$database;

      return (new PDO($dsn, self::$username, self::$password));
    }


  }

?>