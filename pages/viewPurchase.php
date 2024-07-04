<?php 

require_once __DIR__ . '/../controller/Connection.php';
require_once __DIR__ . '/../controller/PurchaseController.php';

session_start();


$purchases = new PurchaseController();
$data = $purchases->index();

if (isset($_GET['refresh'])) {
    header('Location: ' . $_SERVER['PHP_SELF']);
}

if (isset($_POST['delete'])) {
    $success = $purchases->delete();

    if ($success) {
        $_SESSION['success'] = 'Data berhasil dihapus';
    } else {
        $_SESSION['success'] = 'Gagal menghapus data';
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('../components/scriptStyle.php'); ?>
    <title>Tabel Penjualan</title>
</head>
<body class="bg-light">
    <div id="db-wrapper">
        <?php include('../components/side.php'); ?>

        <div id="page-content">
            <?php include('../components/nav.php'); ?>

            <div class="container-fluid">

                <div class="row min-vh-80 h-100 px-5 py-5">
                    <p class="fs-2 pb-3">Tabel Penjualan</p>

                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success']; ?>

                        <?php unset($_SESSION['success']); ?>
                        </div>
                    <?php endif; ?>


                    <div class="row rounded-2 bg-white shadow-sm border fs-5 px-5">
                        <form action="viewPurchase.php" method="get">
                            <div class="py-5 fs-5 d-flex flex-row gap-2">
                                <input type="text" name="key" id="key" class="form-control form-control-transparent" placeholder="Search" autocomplete="off">
                                <button type="submit" class="btn btn-success" name="refresh">Refresh</button>
                            </div>
                        </form>


                        <div id="content" class="table-responsive">

                    
                            <table class="table table-hover align-middle">
                                <thead>
                                    <th>Id Penjualan</th>
                                    <th>Id Pelanggan</th>
                                    <th>Id Karyawan</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $item) : ?>

                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['id_pelanggan'] ?></td>
                                            <td><?= $item['id_karyawan'] ?></td>
                                            <td>
                                                <a href="detailViewPurchase.php?id=<?=$item['id'] ?>" class="btn btn-primary">
                                                    Detail
                                                </a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $item['id'] ?>">
                                                    Hapus
                                                </a>
                                                <?php include('../components/modal.php') ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>                            
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>      

            </div>

        </div>
    </div>

    <script src="../assets/js/purchase.js"></script>
    <?php include('../components/scripts.php') ?>
</body>
</html>