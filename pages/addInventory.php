<?php 
require_once __DIR__ . '/../controller/InventoryController.php';

session_start();

// jika tombol tambah ditekan maka lanjutkan untuk menambahkan item
if (isset($_POST['tambah'])) {
    $request = [
      'id'          => $_POST['id'],
      'kategori'    => $_POST['kategori'],
      'nama'        => $_POST['nama'],  
      'stok'        => intval($_POST['stok']),  
      'hargaBeli'   => intval($_POST['hargaBeli']),  
      'hargaJual'   => intval($_POST['hargaJual'])  
    ];

    $add = new InventoryController();
    $add->add($request);

    header('Location: inventory.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../components/scriptStyle.php') ?>

    <title>Tambah barang</title>
</head>
<body class="bg-light">
<div class="container py-5">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <form action="addInventory.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" name="id">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <select class="form-select" name="kategori" id="">
                            <option value="M-1">Makanan</option>
                            <option value="M-2">Makanan</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="text" class="form-control" name="stok">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Harga beli</label>
                        <input type="text" class="form-control" name="hargaBeli">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Harga jual</label>
                        <input type="text" class="form-control" name="hargaJual">
                    </div>
                    
                    <div class="mb-3 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
                        <a href="inventory.php" class="btn btn-outline-danger" name="cancel">Cancel</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
    
</body>
</html>