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
}

?>