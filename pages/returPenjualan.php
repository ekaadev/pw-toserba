<?php 

require_once __DIR__ . '/../controller/DetailReturPenjualan.php';
require_once __DIR__ . '/../controller/ReturPenjualanController.php';

session_start();

if (!isset($_SESSION['returpj'])) {
    $_SESSION['returpj'] = [];
}

$returpj = $_SESSION['returpj'];

// Jika tekan tombol tambah -> inisialisasi object -> tambahkan ke buy
if (isset($_POST['tambah'])) {
    $item = new DetailReturPenjualan($_POST['id_barang'], $_POST['nama'], intval($_POST['harga']), intval($_POST['jumlah']));
    
    // Tambahkan item ke array $buy dan simpan kembali ke session
    array_push($returpj, $item);
    $_SESSION['returpj'] = $returpj;
}

// Jika tekan hapus, hapus data dari array
if (isset($_POST['hapus'])) {
    array_splice($returpj, intval($_POST['index']), 1);
    $_SESSION['returpj'] = $returpj;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$total = 0;
foreach ($returpj as $value) {
  # code...
  $total += ($value->jumlah * $value->harga);
}


// jika checkout lanjutkan pembayaran
if (isset($_POST["retur"])) {
    // input id penjualan
    // input id pelanggan
    // input id deskripsi
  
    $request = [
      'id_penjualan' => $_POST['id_penjualan'],
      'id_pelanggan' => $_POST['id_pelanggan'],
      'deskripsi' => $_POST['deskripsi'],
      'detail' => $returpj
    ];
  
    // add pembelian
    $retur = new ReturPenjualanController();
    $retur->add($request);

    // header or refresh page
    unset($_SESSION['returpj']);
    header('Location: ' . $_SERVER['PHP_SELF']);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../components/scriptStyle.php');?>

  <title>Purchase</title>
</head>
<body class="bg-light">
  <div id="db-wrapper">
    <?php include('../components/side.php');?>

    <div id="page-content">
      <?php include('../components/nav.php');?>

      <!-- main-content -->
      <div class="container-fluid">
        <div class="row min-vh-80 h-100 px-5 py-5">
          <div class="col-12">
            
            <!-- input barang -->
            <form action="" method="post">

              <div class="row d-flex flex-column rounded-2 bg-white shadow-sm border fs-5 mb-3">
                <div class="border-bottom p-5">
                  Input barang
                </div>
                <div class="sel-input col p-5 border-bottom">
                  <div class="row">
                  
                    <!-- baris inputan  -->
                    <div class="col-md-3">
                      <label for="idBarnag">ID Barang</label>
                      <input type="text" name="id_barang" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-3">
                      <label for="idBarnag">Nama Barang</label>
                      <input type="text" name="nama" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-3">
                      <label for="kuantitasBarang">Harga</label>
                      <input type="text" name="harga" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-3">
                      <label for="jumlahBarang">Jumlah Barang</label>
                      <input type="text" name="jumlah" class="form-control" autocomplete="off"> 
                    </div>
                    
                  </div>

                </div>

                <!-- submit -->
                <div class="py-2 gap-2 px-5 d-flex justify-content-end">
                  <button class="btn btn-secondary" type="submit" name="tambah">Tambah</button>
                </div>
              </div>

            </form>


            <div class="row rounded-2 bg-white shadow-sm border fs-5 px-5 mb-3">

              <div id="content" class="table-responsive h-100 overflow-y-scroll py-3">
                <form action="" method="post">

                  <table class="table table-hover align-middle ">
                      <thead>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Sub Total</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                        <!-- kerjang:  iterasi dari array detail -->
                        <?php for($i = 0; $i < count($returpj); $i++): ?>
                          <tr>
                            <td><?= $returpj[$i]->id ?></td>
                            <td><?= $returpj[$i]->nama ?></td>
                            <td><?= $returpj[$i]->harga ?></td>
                            <td><?= $returpj[$i]->jumlah ?></td>
                            <td><?= $returpj[$i]->jumlah * $returpj[$i]->harga ?></td>
                            <td>
                              <input type="hidden" name="index" value="<?= $i ?>">
                              <button class="btn btn-danger" type="submit" name="hapus">Hapus</button>
                            </td>
                          </tr>
                        <?php endfor; ?>
                      </tbody>
                  </table>
                </form>

              </div>
            </div>

            <!-- Checkout -->
            <form action="" method="post">
              <div class="row rounded-2 bg-white shadow-sm border fs-5">
                <h4 class="border-bottom p-5">
                  Checkout 
                </h4>

                <div class="sel-input col p-5 border-bottom">

                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-3 mb-3">
                      <label for="">ID Penjualan</label>
                      <input type="text" name="id_penjualan" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="">ID Pelanggan</label>
                      <input type="text" name="id_pelanggan" class="form-control" autocomplete="off">
                    </div>


                    <div class="col-md-3 mb-3">
                      <label for="">Deskripsi</label>
                      <input type="text" name="deskripsi" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-3 mb-3">
                        <h3>
                            Total <?= $total ?> 
                        </h3>   
                    </div>
                  </div>
                  
                </div>
                
                <!-- submit all -->
                <div class="py-2 gap-2 px-5 d-flex justify-content-end">
                  <button class="btn btn-success" type="submit" name="retur">Retur</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>
  
<?php include('../components/scripts.php'); ?>
</body>
</html>