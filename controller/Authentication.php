<?php 

  require_once __DIR__ . '/../controller/Connection.php';
  class Authhentication {

    private $id;
    private $name;
    private $email;
    private $alamat;
    private $username;
    private $password;
    private $role = 'employee';


    function __construct($id, $name, $email, $alamat,$username,$password) {
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->alamat = $alamat;
      $this->username = $username;
      $this->password = $password;
    }

    public function setRegis():void {
      
      $conn = Connection::getConnection();

      if($conn) {

        $sql = "INSERT INTO karyawan (id_karyawan, username,  pass, nama, roleas, alamat, email) 
            VALUES (:idUser, :usernameUser, :passwordUser, :namaUser, :roleas, :alamatUser, :emailUser)";

        $stmt = $conn->prepare($sql);

        // Bind nilai ke placeholder
        $stmt->bindParam(':idUser', $this->id, PDO::PARAM_STR);
        $stmt->bindParam(':usernameUser', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':passwordUser', $this->password, PDO::PARAM_STR);
        $stmt->bindParam(':namaUser', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':alamatUser', $this->alamat, PDO::PARAM_STR);
        $stmt->bindParam(':emailUser', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':roleas', $this->role, PDO::PARAM_STR);
        $stmt->execute();

      } else {
        throw new PDOException;
      }

    }
  }
?>
