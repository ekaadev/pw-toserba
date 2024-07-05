<?php 

require_once __DIR__ . '/Connection.php';
require_once __DIR__ . '/../utils/Helper.php';

session_start();


class ReturPenjualanController {

    private $conn;

    function __construct()
    {
        $this->conn = Connection::getConnection();
    }


    public function add($request) 
    {

        try {

            // assignment
            $id_retur_penjualan = Helper::generateId();
            $id_penjualan = $request['id_penjualan'];
            $id_pelanggan = $request['id_pelanggan'];
            $deskripsi = $request['deskripsi'];
            
            // add table penjualan

            // sql
            $sql = "
                INSERT INTO retur_penjualan (id_retur_penjualan, id_penjualan, id_pelanggan, deskripsi)
                VALUES (:id_retur_penjualan, :id_penjualan, :id_pelanggan, :deskripsi)
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_retur_penjualan', $id_retur_penjualan);
            $stmt->bindParam(':id_penjualan', $id_penjualan);
            $stmt->bindParam(':id_pelanggan', $id_pelanggan);
            $stmt->bindParam(':deskripsi', $deskripsi);

            $stmt->execute();

            // add detail penjualan

            // format $request['detail'][0]->id
            for ($i=0; $i < count($request['detail']); $i++) { 
                # code...

                $id_barang = $request['detail'][$i]->id;
                $harga_jual = $request['detail'][$i]->harga;
                $jumlah = $request['detail'][$i]->jumlah;

                $sql2 = "
                    INSERT INTO detail_retur_penjualan (id_retur_penjualan, id_barang, jumlah, harga_jual)
                    VALUES (:id_retur_penjualan, :id_barang, :jumlah, :harga_jual)
                ";

                $stmt2 = $this->conn->prepare($sql2);


                $stmt2->bindParam(':id_retur_penjualan', $id_retur_penjualan);
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
                    id_retur_penjualan as id,
                    id_penjualan,
                    id_pelanggan,
                    deskripsi
                FROM 
                    retur_penjualan
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
                    id_retur_penjualan as id,
                    id_penjualan,
                    id_pelanggan,
                    deskripsi
                FROM
                    retur_penjualan
                WHERE
                    id_retur_penjualan = '$id'
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
                    b.id_barang as id,
                    b.nama as nama,
                    dpe.harga_jual as harga,
                    dpe.jumlah as jumlah
                FROM
                    detail_retur_penjualan dpe RIGHT JOIN barang b
                ON
                    dpe.id_barang = b.id_barang
                WHERE
                    dpe.id_retur_penjualan = '$id';
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

            $sql = "DELETE FROM retur_penjualan WHERE id_retur_penjualan = :id";

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
                id_retur_penjualan as id,
                id_penjualan,
                id_pelanggan,
                deskripsi
            FROM 
                retur_penjualan
            WHERE 
                id_retur_penjualan LIKE '%$key%'";
    
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