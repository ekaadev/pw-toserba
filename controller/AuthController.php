<?php
session_start();
require_once __DIR__ . '/../controller/Connection.php';

class AuthController
{

  private $conn;


  function __construct()
  {
    $this->conn = Connection::getConnection();
  }

  public function register($request): void
  {

    $password = password_hash($request['password'], PASSWORD_DEFAULT);
    $role = 'employee';

    $sql = "INSERT INTO karyawan (id_karyawan, username,  pass, nama, roleas, alamat, email) 
            VALUES (:idUser, :usernameUser, :passwordUser, :namaUser, :roleas, :alamatUser, :emailUser)";

    $stmt = $this->conn->prepare($sql);

    // Bind nilai ke placeholder
    $stmt->bindParam(':idUser', $request['id'], PDO::PARAM_STR);
    $stmt->bindParam(':usernameUser', $request['username'], PDO::PARAM_STR);
    $stmt->bindParam(':passwordUser', $password, PDO::PARAM_STR);
    $stmt->bindParam(':namaUser', $request['nama'], PDO::PARAM_STR);
    $stmt->bindParam(':alamatUser', $request['alamat'], PDO::PARAM_STR);
    $stmt->bindParam(':emailUser', $request['email'], PDO::PARAM_STR);
    $stmt->bindParam(':roleas', $role, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function login()
  {
    $usernameUser = $_POST['usernameUser'];
    $passwordUser = $_POST['passwordUser'];

    // PREPARE QUERY
    $stmt = $this->conn->prepare("SELECT id_karyawan as id, username, pass, roleas FROM karyawan WHERE username = ?");

    // BIND PARAM
    $stmt->bindParam(1, $usernameUser);

    // EXECUTE QUERY
    $stmt->execute();

    // RESULT / HASIL DARI QUERY
    $result = $stmt->fetch();

    // jika true / user ditemukan maka lanjutkan proses login
    if ($result) {
      if (password_verify($passwordUser, $result['pass'])) {
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $usernameUser;
        $_SESSION['role'] = $result['roleas'];
        header('Location: index.php');
      } else {
        session_destroy();
        header('Location: login.php');
      }
    }
  }
}
