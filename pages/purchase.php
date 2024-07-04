<?php 

require_once __DIR__ . '/../controller/DetailPenjualan.php';
require_once __DIR__ . '/../controller/PurchaseController.php';

session_start();

// Inisialisasi $detail dari session jika sudah ada
if (!isset($_SESSION['detail'])) {
  $_SESSION['detail'] = [];
}

$detail = $_SESSION['detail'];

// Jika tekan tombol tambah -> inisialisasi object -> tambahkan ke detail
if (isset($_POST['tambah'])) {
  $item = new DetailPenjualan($_POST['id_barang'], $_POST['nama'], intval($_POST['harga']), intval($_POST['jumlah']));
  
  // Tambahkan item ke array $detail dan simpan kembali ke session
  array_push($detail, $item);
  $_SESSION['detail'] = $detail;

}

// Jika tekan hapus, hapus data dari array
if (isset($_POST['hapus'])) {
  array_splice($detail, intval($_POST['index']), 1);
  $_SESSION['detail'] = $detail;
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit();
}


$total = 0;
foreach ($detail as $value) {
  # code...
  $total += ($value->jumlah * $value->harga);
}

// jika checkout lanjutkan pembayaran
if (isset($_POST["checkout"])) {
  // input id penjualan
  // input id pelanggan
  // input id karyawan

  $request = [
    'id_pelanggan' => $_POST['id_pelanggan'],
    'id_karyawan' => $_SESSION['id'],
    'detail' => $detail
  ];

  // add penjualana
  $penjualan = new PurchaseController();
  $penjualan->add($request);
  
  // header or refresh page
  unset($_SESSION['detail']);
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
                        <?php for($i = 0; $i < count($detail); $i++): ?>
                          <tr>
                            <td><?= $detail[$i]->id ?></td>
                            <td><?= $detail[$i]->nama ?></td>
                            <td><?= $detail[$i]->harga ?></td>
                            <td><?= $detail[$i]->jumlah ?></td>
                            <td><?= $detail[$i]->jumlah * $detail[$i]->harga ?></td>
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
                      <label for="idBarnag">ID Pelanggan</label>
                      <input type="text" name="id_pelanggan" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-3 mb-3">
                      <h3>Total <?= $total ?></h3>
                    </div>
                  </div>
                  
                </div>
                
                <!-- submit all -->
                <div class="py-2 gap-2 px-5 d-flex justify-content-end">
                  <button class="btn btn-success" type="submit" name="checkout">Checkout</button>
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

  

