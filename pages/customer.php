<?php 

require_once __DIR__ . '/../controller/Connection.php';
require_once __DIR__ . '/../controller/CustomerController.php';

session_start();

$customers = new CustomerController();
$customer = $customers->index();


if (isset($_GET['refresh'])) {
    header('Location: customer.php');
}

if (isset($_POST['delete'])) {
    $success = $customers->delete();

    if ($success) {
        $_SESSION['success'] = 'Data berhasil dihapus';
    } else {
        $_SESSION['success'] = 'Gagal menghapus data';
    }

    header('Location: customer.php');
    exit();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('../components/scriptStyle.php'); ?>
    <title>Customer</title>
</head>
<body class="bg-light">
    <div id="db-wrapper">
        <?php include('../components/side.php'); ?>

        <div id="page-content">
            <?php include('../components/nav.php'); ?>

            <div class="container-fluid">

                <div class="row min-vh-80 h-100 px-5 py-5">
                    <p class="fs-2 pb-3">Customer</p>

                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success']; ?>

                        <?php unset($_SESSION['success']); ?>
                        </div>
                    <?php endif; ?>


                    <div class="row rounded-2 bg-white shadow-sm border fs-5 px-5">
                        <form action="customer.php" method="get">
                            <div class="py-5 fs-5 d-flex flex-row gap-2">
                                <input type="text" name="key" id="key" class="form-control form-control-transparent" placeholder="Search" autocomplete="off">
                                <a href="addCustomer.php" class="btn btn-secondary" name="add">Add</a>
                                <button type="submit" class="btn btn-success" name="refresh">Refresh</button>
                            </div>
                        </form>


                        <div id="content" class="table-responsive">

                    
                            <table class="table table-hover align-middle">
                                <thead>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($customer as $item) : ?>

                                        <tr>
                                            <td><?= $item['nama'] ?></td>
                                            <td><?= $item['alamat'] ?></td>
                                            <td><?= $item['email'] ?></td>
                                            <td>
                                                <a href="editCustomer.php?id=<?=$item['id'] ?>" class="btn btn-primary">
                                                    Edit
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

    <script src="../assets/js/customerScript.js"></script>
    <?php include('../components/scripts.php') ?>
</body>
</html>