<?php 
    require_once __DIR__ . '/../controller/Connection.php';
    session_start();

    $idEdit = $_SESSION['idEditBarang'];
    $kategori = null;
    $nama = null;
    $stok = null;
    $hargaBeli = null;
    $hargaJual = null;

    try {
        
        $conn = Connection::getConnection();

        $sql = "SELECT id_barang, id_kategori, nama, stok, harga_beli, harga_jual FROM barang WHERE id_barang = '$idEdit' ";

        $result = $conn->query($sql);

        foreach($result as $value) {
            $kategori = $value['id_kategori'];
            $nama = $value['nama'];
            $stok = $value['stok'];
            $hargaBeli = $value['harga_beli'];
            $hargaJual = $value['harga_jual'];
        }

        $conn = null;


    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }

    if(isset($_GET['edit'])) {
        try {
            $nama = $_GET['editNamaBarang'];
            $stok =  intval($_GET['editStokBarang']);
            $hargaBeli = intval($_GET['editHargaBeliBarang']);
            $hargaJual = intval($_GET['editHargaJualBarang']);
        
            $conn = Connection::getConnection();
    
            $sql = "UPDATE barang 
                    SET nama = '$nama', stok = $stok, harga_beli = $hargaBeli, harga_jual = $hargaJual
                    WHERE id_barang = '$idEdit'";
    
            $result = $conn->query($sql);
    
            $conn = null;
    
    
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    
    }

    if(isset($_GET['cancel'])) {
        header('Location: inventory.php');
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../components/scriptStyle.php') ?>
    <title>Edit</title>
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <h3>Edit <?php echo $idEdit; ?></h3>
                <form action="editInventory.php" method="get">
                    <div class="mb-3">
                        <label for="" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" name="editIdBarang" disabled value="<?php echo $idEdit; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ID Kategori</label>
                        <input type="text" class="form-control" name="editKategoriBarang" disabled value="<?php echo $kategori; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="editNamaBarang" value="<?php echo $nama; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="text" class="form-control" name="editStokBarang" value="<?php echo $stok; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga beli</label>
                        <input type="text" class="form-control" name="editHargaBeliBarang"  value="<?php echo $hargaBeli; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga jual</label>
                        <input type="text" class="form-control" name="editHargaJualBarang"  value="<?php echo $hargaJual; ?>">
                    </div>
                    <div class="mb-3 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                        <button type="submit" class="btn btn-outline-danger" name="cancel">Cancel</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    
</body>
</html>