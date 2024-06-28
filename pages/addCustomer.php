<?php

require_once __DIR__ . '/../controller/CustomerController.php';

if (isset($_POST['tambah'])) {
    $request = [
        'nama'      => $_POST['nama'],
        'alamat'    => $_POST['alamat'],
        'email'     => $_POST['email']
    ];

    $customers = new CustomerController();
    $customers->add($request);

    echo "berhasil";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../components/scriptStyle.php') ?>

    <title>Tambah customer</title>
</head>
<body class="bg-light">
<div class="container py-5">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <form action="addCustomer.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    
                    <div class="mb-3 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
                        <a href="customer.php" class="btn btn-outline-danger" name="cancel">Cancel</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
    
</body>
</html>