<?php
require_once __DIR__ . '/../controller/Connection.php';
require_once __DIR__ . '/../controller/InventoryController.php';
session_start();

$kategori = null;
$nama = null;
$stok = null;
$hargaBeli = null;
$hargaJual = null;

$inventory = new InventoryController();
$item = $inventory->edit();

if (isset($_POST['edit'])) {
    $request = [
        'namaBarang'        => $_POST['editNamaBarang'],
        'stokBarang'        => $_POST['editStokBarang'],
        'hargaBeliBarang'   => $_POST['editHargaBeliBarang'],
        'hargaJualBarang'   => $_POST['editHargaJualBarang'],
    ];

    $inventory->update($request);
    
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
                <form action="editInventory.php?id=<?= $item['id'] ?>" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <input type="text" class="form-control" disabled value="<?= $item['nama_kategori']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="editNamaBarang" value="<?= $item['nama_barang']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="text" class="form-control" name="editStokBarang" value="<?= $item['stok']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga beli</label>
                        <input type="text" class="form-control" name="editHargaBeliBarang" value="<?= $item['harga_beli']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga jual</label>
                        <input type="text" class="form-control" name="editHargaJualBarang" value="<?= $item['harga_jual']; ?>">
                    </div>
                    <div class="mb-3 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                        <a href="inventory.php" class="btn btn-outline-danger" name="cancel">Cancel</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    
</body>

</html>