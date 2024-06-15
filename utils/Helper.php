<?php 
  require __DIR__ . '/../vendor/autoload.php';
  use Ramsey\Uuid\Uuid;

  class Helper {


    public static function generateId() {
     $uuid = Uuid::uuid7();

     return $uuid->toString();
    }

    public static function validationPassword($password) {

      //  cek length dan  huruf besar kecil
      $validLength = strlen($password) < 8 ? false : true;
    
      return $validLength;
    }

  }
?>