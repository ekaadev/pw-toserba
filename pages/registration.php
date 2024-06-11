<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/theme.css">
    <title>Registration Page</title>
</head>
<body class="bg-dark">
    <div class="container py-5">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-body">
                <h2 class="card-title text-center">Registration</h2>
                <form>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="alamat_email" class="form-label">Alamat Email :</label>
                        <input type="email" class="form-control" id="alamat_email" placeholder="Alamat Email">
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon :</label>
                        <input type="text" class="form-control" id="no_telepon" placeholder="No Telepon">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <div class="row">
                            <div class="col-md-4">
                            <input type="text" class="form-control" id="provinsi" placeholder="Provinsi">
                            </div>
                            <div class="col-md-4">
                            <input type="text" class="form-control" id="kota" placeholder="Kota">
                            </div>
                            <div class="col-md-4">
                            <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                        <input type="date" class="form-control" id="tanggal_lahir">
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Pilih Jabatan :</label>
                        <select class="form-select" id="jabatan">
                            <option value="owner">Owner</option>
                            <option value="manager">Manager</option>
                            <option value="admin">Staff Admin</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label for="konfirmasipassword" class="form-label">Konfirmasi Password :</label>
                        <input type="password" class="form-control" id="konfirmasipassword" placeholder="Konfirmasi Password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>