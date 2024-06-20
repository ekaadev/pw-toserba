<?php
require_once __DIR__ . '/../controller/Connection.php';
session_start();

$usernameUser = null;
$passwordUser = null;
$realUsernameUser = null;
$realPasswordUser = null;
$roleUser = null;


if(isset($_POST['login'])) {

    $usernameUser = $_POST['usernameUser'];
    $passwordUser = $_POST['passwordUser'];

    try {

        // konek database
        $conn = Connection::getConnection();
        
        // cari username
        $sql = "SELECT username, pass, roleas FROM karyawan WHERE username = '$usernameUser' ";

        $result = $conn->query($sql);

        // asign real username and password
        foreach($result as $value) {
            $realUsernameUser = $value['username'];
            $realPasswordUser = $value['pass'];
            $roleUser = $value['roleas'];

        }

    } catch (PDOException $e) {
        echo "Error:  " . $e->getMessage();
    }

    // validasi
    if($usernameUser === $realUsernameUser && $passwordUser === $realPasswordUser) {
        $_SESSION['username'] = $usernameUser;
        $_SESSION['role'] = $roleUser;
        header('Location: index.php');
    } else {
        session_destroy();
        header('Location: login.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body class="bg-dark">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 30rem;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login</h2>

                <!-- Form Email dan Password -->
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Username</label>
                        <input type="username" class="form-control" id="email" name="usernameUser" placeholder="E.g. johndoe " required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="passwordUser"  placeholder="Enter your password" required>
                    </div>
        
                    <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                </form>

                <!-- Lupa Password dan Link Registrasi,belum dilink kan.. -->
                <div class="text-center mt-3">
                    <p class="text-muted">Not registered yet? <a href="http://localhost/pw-toserba/pages/registration.php" class="text-decoration-none">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
