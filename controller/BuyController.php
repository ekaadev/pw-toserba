<?php 

require_once __DIR__ . '/Connection.php';
require_once __DIR__ . '/../utils/Helper.php';

session_start();

class BuyController 
{
    private $conn;

    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function add($request) 
    {

        try {

            // assignment
            $id_pembelian = Helper::generateId();
            $id_supplier = $request['id_supplier'];
            
            // add table penjualan

            // sql
            $sql = "
                INSERT INTO pembelian (id_pembelian, id_supplier)
                VALUES (:id_pembelian, :id_supplier)
            ";

            $stmt = $this->conn->prepare($sql);


            $stmt->bindParam(':id_pembelian', $id_pembelian);
            $stmt->bindParam(':id_supplier', $id_supplier);


            $stmt->execute();

            // add detail penjualan

            // format $request['detail'][0]->id
            for ($i=0; $i < count($request['detail']); $i++) { 
                # code...

                $id_barang = $request['detail'][$i]->id;
                $harga_beli = $request['detail'][$i]->harga;
                $jumlah = $request['detail'][$i]->jumlah;

                $sql2 = "
                    INSERT INTO detail_pembelian (id_pembelian, id_barang, jumlah, harga_beli)
                    VALUES (:id_pembelian, :id_barang, :jumlah, :harga_beli)
                ";

                $stmt2 = $this->conn->prepare($sql2);


                $stmt2->bindParam(':id_pembelian', $id_pembelian);
                $stmt2->bindParam(':id_barang', $id_barang);
                $stmt2->bindParam(':harga_beli', $harga_beli);
                $stmt2->bindParam(':jumlah', $jumlah);

                $stmt2->execute();

            }        

        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }

    }

    public function index()
    {
        try {

            $sql = "
                SELECT
                    id_pembelian as id, 
                    id_supplier
                FROM 
                    pembelian
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function detailHeader()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $sql = "
                SELECT
                    id_pembelian as id, 
                    id_supplier
                FROM
                    pembelian
                WHERE
                    id_pembelian = '$id'
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

    public function detail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $sql = "
                SELECT
                    dpe.id_pembelian,
                    b.id_barang as id,
                    b.nama as nama,
                    dpe.jumlah as jumlah,
                    dpe.harga_beli as harga
                FROM
                    detail_pembelian dpe JOIN barang b
                ON
                    dpe.id_barang = b.id_barang
                WHERE
                    dpe.id_pembelian = '$id'
                ";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();

                return $result;
            } catch (PDOException $e) {
                echo "Error : " . $e->getMessage();
            }
        }
    }


    public function delete()
    {
        try {
            $id = $_POST['id'];

            $sql = "DELETE FROM pembelian WHERE id_pembelian = :id";

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
                id_pembelian as id, 
                id_supplier
            FROM 
                pembelian
            WHERE 
                id_pembelian LIKE '%$key%'";
    
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