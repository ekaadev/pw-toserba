<?php 
require_once __DIR__ . '/Connection.php';

class CustomerController 
{

    private $conn;

    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function index()
    {
        try {

            $sql = "
                SELECT
                    id_pelanggan as id, 
                    nama,
                    alamat,
                    email
                FROM 
                    pelanggan
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $sql = "
                SELECT
                    id_pelanggan as id, 
                    nama,
                    alamat,
                    email
                FROM 
                    pelanggan
                WHERE 
                    id_pelanggan = '$id'
                ";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch();

                return $result;
            } catch (PDOException $e) {
                echo "Error : " . $e->getMessage();
            }
        }
    }

    public function update($request)
    {
        $id = $_GET['id'];

        try {
            $nama = $request['nama'];
            $alamat =  $request['alamat'];
            $email = $request['email'];

            $sql = "
                UPDATE 
                    pelanggan 
                SET 
                    nama = '$nama', 
                    alamat = '$alamat', 
                    email = '$email'
                WHERE 
                    id_pelanggan = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['success'] = 'Data berhasil disimpan';
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $id = $_POST['id'];

            $sql = "DELETE FROM pelanggan WHERE id_pelanggan = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
    

            $result = $stmt->execute();

            return $result;
        } catch(PDOException $e) {

            echo "Error : " . $e->getMessage();
        }
    }

    public function keyword() 
    {

        try {
            $key = $_GET['key'];

            $sql = "
            SELECT
                id_pelanggan as id, 
                nama,
                alamat,
                email
            FROM 
                pelanggan
            WHERE 
                nama LIKE '%$key%'";
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->execute();
    
            $totalData = $stmt->rowCount();
    
            $result = $stmt->fetchAll();

            return [$result, $totalData];
    

        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

}
?>