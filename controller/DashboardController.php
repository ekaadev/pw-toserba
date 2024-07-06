<?php 

require_once __DIR__ . '/Connection.php';

class DashboardController 
{

    private $conn;

    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function getPemasukkan() {
        try {
            $sql = "
                select
                    sum(jumlah * harga_jual) as pemasukkan
                from
                    detail_penjualan;
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;

        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function getPengeluaran() {
        try {
            $sql = "
                select
                    sum(jumlah * harga_beli) as pengeluaran
                from
                    detail_pembelian;
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }


    public function getCustomer() {
        try {
            $sql = "
                select
                    count(*) as jumlah_pelanggan
                from
                    pelanggan;
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function getSupplier() {
        try {
            $sql = "
                select
                    count(*) as jumlah_suppliers
                from
                    suppliers;
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function getBarang() {
        try {
            $sql = "
                select
                    count(*) as jumlah_barang
                from
                    barang;
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function getKeuntungan() {
        try {
            $sql = "
                select
                    sum(stok * harga_beli) as keuntungan
                from
                    barang;
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    
}



?>