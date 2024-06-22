<?php

require_once __DIR__ . '/../controller/Connection.php';

class InventoryController
{

    private $conn;


    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function index()
    {
        try {
            $sql = "SELECT id_barang, id_kategori, nama, stok, harga_beli, harga_jual FROM barang";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            return "Error : " . $e->getMessage();
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $sql = "
                SELECT 
                    b.id_barang as id, 
                    b.nama as nama_barang, 
                    b.stok, 
                    b.harga_beli, 
                    b.harga_jual,
                    k.nama as nama_kategori
                FROM 
                    barang b
                LEFT JOIN 
                    kategori k ON b.id_kategori = k.id_kategori
                WHERE 
                    b.id_barang = '$id'
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
            $nama = $request['namaBarang'];
            $stok =  intval($request['stokBarang']);
            $hargaBeli = intval($request['hargaBeliBarang']);
            $hargaJual = intval($request['hargaJualBarang']);

            $sql = "
                UPDATE 
                    barang 
                SET 
                    nama = '$nama', 
                    stok = $stok, 
                    harga_beli = $hargaBeli, 
                    harga_jual = $hargaJual
                WHERE 
                    id_barang = :id";

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

            $sql = "DELETE FROM barang WHERE id_barang = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $result = $stmt->execute();

            return $result;
        } catch(PDOException $e) {

            echo "Error : " . $e->getMessage();
        }
    }
}
