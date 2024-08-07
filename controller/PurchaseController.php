<?php 

require_once __DIR__ . '/Connection.php';
require_once __DIR__ . '/../utils/Helper.php';

session_start();


class PurchaseController {

    private $conn;

    function __construct()
    {
        $this->conn = Connection::getConnection();
    }


    public function add($request) 
    {

        try {

            // assignment
            $id_penjualan = Helper::generateId();
            $id_pelanggan = $request['id_pelanggan'];
            $id_karyawan = $request['id_karyawan'];
            
            // add table penjualan

            // sql
            $sql = "
                INSERT INTO penjualan (id_penjualan, id_pelanggan, id_karyawan)
                VALUES (:id_penjualan, :id_pelanggan, :id_karyawan)
            ";

            $stmt = $this->conn->prepare($sql);


            $stmt->bindParam(':id_penjualan', $id_penjualan);
            $stmt->bindParam(':id_pelanggan', $id_pelanggan);
            $stmt->bindParam(':id_karyawan', $id_karyawan);

            $stmt->execute();

            // add detail penjualan

            // format $request['detail'][0]->id
            for ($i=0; $i < count($request['detail']); $i++) { 
                # code...

                $id_barang = $request['detail'][$i]->id;
                $harga_jual = $request['detail'][$i]->harga;
                $jumlah = $request['detail'][$i]->jumlah;

                $sql2 = "
                    INSERT INTO detail_penjualan (id_penjualan, id_barang, harga_jual, jumlah)
                    VALUES (:id_penjualan, :id_barang, :harga_jual, :jumlah)
                ";

                $stmt2 = $this->conn->prepare($sql2);


                $stmt2->bindParam(':id_penjualan', $id_penjualan);
                $stmt2->bindParam(':id_barang', $id_barang);
                $stmt2->bindParam(':harga_jual', $harga_jual);
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
                    id_penjualan as id, 
                    id_pelanggan,
                    id_karyawan
                FROM 
                    penjualan
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
                    id_penjualan as id, 
                    id_pelanggan,
                    id_karyawan
                FROM
                    penjualan
                WHERE
                    id_penjualan = '$id'
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
                    dpe.id_penjualan,
                    b.id_barang as id,
                    b.nama as nama,
                    dpe.harga_jual as harga,
                    dpe.jumlah as jumlah
                FROM
                    detail_penjualan dpe RIGHT JOIN barang b
                ON
                    dpe.id_barang = b.id_barang
                WHERE
                    dpe.id_penjualan = '$id'
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

            $sql = "DELETE FROM penjualan WHERE id_penjualan = :id";

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
                id_penjualan as id, 
                id_pelanggan,
                id_karyawan
            FROM 
                penjualan
            WHERE 
                id_penjualan LIKE '%$key%'";
    
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