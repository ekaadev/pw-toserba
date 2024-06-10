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
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="E.g. johndoe@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </form>

                <!-- Lupa Password dan Link Registrasi,belum dilink kan.. -->
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none">Forgot Password?</a>
                    <p class="text-muted">Not registered yet? <a href="#" class="text-decoration-none">Create an account</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
