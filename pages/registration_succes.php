<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: 300px;
        }
        .header {
            background-color: #2196F3;
            padding: 20px;
            color: white;
        }
        .header .icon {
            font-size: 50px;
        }
        .header .message {
            font-size: 20px;
            margin-top: 10px;
        }
        .body {
            padding: 20px;
        }
        .body p {
            font-size: 16px;
            color: #666;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }
        .buttons .login {
            background-color: #2196F3;
        }
        .buttons .register {
            background-color: #1976D2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon">&#10004;</div>
            <div class="message">SUCCESS</div>
        </div>
        <div class="body">
            <p>Registrasi berhasil, silahkan pilih untuk lanjut login atau kembali.</p>
            <div class="buttons">
                <a href="login.php" class="login">Lanjut Login</a>
                <a href="register.php" class="register">Kembali ke Halaman Pendaftaran</a>
            </div>
        </div>
    </div>
</body>
</html>
