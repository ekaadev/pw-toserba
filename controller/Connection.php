<?php

class Connection
{

  private static $host = 'localhost';
  private static $database = 'db_toserba';
  private static $username = 'root';
  private static $password = '';

  public static function getConnection(): PDO
  {
    $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$database;

    try {
      $pdo = new PDO($dsn, self::$username, self::$password);

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 

      return $pdo;
    } catch (PDOException $e) {
      throw new PDOException("Connection failed: " . $e->getMessage());
    }
  }
}
