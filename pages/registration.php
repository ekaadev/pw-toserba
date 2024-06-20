<?php
require_once __DIR__ . '/../controller/Connection.php';
require_once __DIR__ . '/../controller/Authentication.php';
require_once __DIR__ . '/../utils/Helper.php';
session_start();

// id
$idUser = Helper::generateId();

// password
$passwordUser = null;
$confirmPasswordUser = null;

// set -> password tidak sama
$samePassword = false;

// set -> pasword kurang dari 8
$lengthPassword = false;

// set -> status password
$statusPassword = true;


if (isset($_POST['regis'])) {

    $passwordUser = $_POST['password'];
    $confirmPasswordUser = $_POST['confirmPassword'];

    // cek password dan konfirmasi password
    if($passwordUser !== $confirmPasswordUser) {
        $samePassword = true;
        $statusPassword = false;
    }

    if(!Helper::validationPassword($passwordUser)) {
        $lengthPassword = true;
        $statusPassword = false;
    }

    if ($statusPassword) {

        // jika -> true, set data pribadi user
        $regis = new Authhentication($idUser, $_POST['nama'],  $_POST['email'], $_POST['alamat'], $_POST['username'], $passwordUser);

        try {
            $regis->setRegis();

            header('Location: registration_succes.php');
        } catch (PDOException $e ){
            echo "Error : " . $e->getMessage(); 
        }
    }


    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../components/scriptStyle.php'); ?>
    <title>Registration Page</title>
</head>
<body class="bg-dark">
    <div class="container py-5">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-body">
                <h2 class="card-title text-center">Registration</h2>
                <form action="registration.php" method="post">

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama" placeholder="Nama Lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="alamat_email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="alamat_email" name="email" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">    
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username :</label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label for="konfirmasipassword" class="form-label">Konfirmasi Password :</label>
                        <input type="password" class="form-control" id="konfirmasipassword" name="confirmPassword" placeholder="Konfirmasi Password">
                    </div>

                    <?php

                        if($samePassword) {
                            echo "<p class=\"text-danger mb-2\">Password tidak cocok</p>";
                            $samePassword = false;
                        }

                        if($lengthPassword) {
                            echo "<p class=\"text-danger mb-2\">Password tidak valid</p>";
                            $lengthPassword = false;
                        }
                    
                    ?>

                    <button type="submit" name="regis" class="btn btn-primary w-100">Register</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>