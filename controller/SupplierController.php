<?php 

require_once __DIR__ . '/../controller/Connection.php';

class SupplierController 
{

    private $conn;

    public function __construct() {

        $this->conn = Connection::getConnection();

    }

    public function index()
    {
        try {

            $sql = "
                SELECT
                    id_supplier as id, 
                    nama,
                    alamat,
                    email
                FROM 
                    suppliers
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }


    public function delete()
    {
        try {
            $id = $_POST['id'];

            $sql = "DELETE FROM suppliers WHERE id_supplier = :id";

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
                id_supplier as id, 
                nama,
                alamat,
                email
            FROM 
                suppliers
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