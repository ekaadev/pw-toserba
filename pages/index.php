<?php 

require_once __DIR__ . '/../controller/DashboardController.php';

session_start(); 


$dashboard = new DashboardController();

$data_pemasukkan = $dashboard->getPemasukkan();
$data_pengeluaran = $dashboard->getPengeluaran();

$data_customer = $dashboard->getCustomer();
$data_supplier = $dashboard->getSupplier();
$data_barang = $dashboard->getBarang();

$data_keuntungan = $dashboard->getKeuntungan();

$pemasukkan = 'Rp '. number_format(intval($data_pemasukkan['pemasukkan']), 2, ',', '.');
$pengeluaran = 'Rp '. number_format(intval($data_pengeluaran['pengeluaran']), 2, ',', '.');
$keuntungan = 'Rp '. number_format(intval($data_keuntungan['keuntungan']), 2, ',', '.');

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- script style -->
  <?php include('../components/scriptStyle.php'); ?>

  <title>Dashboard</title>

  <style>
    .hover-effect {
      transition: box-shadow 0.5s ease-in-out;
    }
    .hover-effect:hover {
      box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body class="bg-light">
  <div id="db-wrapper">
    <!--  side bar -->
    <?php include('../components/side.php'); ?>

    <div id="page-content">
      <!-- navbar -->
      <?php include('../components/nav.php'); ?>


      <div class="container-fluid">
        <div class="row min-vh-80 h-100 px-5 py-5">
          <div class="col-12">
            <h3>Dashboard </h3>
          </div>

          <div class="row mb-3">
            <div class="d-flex">
              <div class="hover-effect col-md-6 border rounded-2 bg-white d-flex align-items-center p-5" style="height: 12rem;">
                <h2>Pemasukkan : <?= $pemasukkan ?></h2>
              </div>
              <div class="hover-effect col-md-6 border rounded-2 bg-white d-flex align-items-center p-5" style="height: 12rem;">
                <h2>Pengeluaran : <?= $pengeluaran?></h2>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="d-flex">
              <div class="hover-effect col-md-4 border rounded-2 bg-white d-flex align-items-center p-5" style="height: 12rem;">
                <h2>Data customer : <?= $data_customer['jumlah_pelanggan'] ?></h2>
              </div>
              <div class="hover-effect col-md-4 border rounded-2 bg-white d-flex align-items-center p-5" style="height: 12rem;">
                <h2>Data suppliers : <?= $data_supplier['jumlah_suppliers'] ?></h2>
              </div>
              <div class="hover-effect col-md-4 border rounded-2 bg-white d-flex align-items-center p-5" style="height: 12rem;">
                <h2>Data barang : <?= $data_barang['jumlah_barang'] ?></h2>
              </div>
            </div>
          </div>


          <div class="row ">
            <div class="d-flex">
              <div class="hover-effect border rounded-2 bg-white d-flex align-items-center p-5 justify-content-center" style="height: 12rem; width: 100%" >
                <h2>Prediksi keuntungan : <?= $keuntungan ?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>       
  </div>
  
  <!-- script -->
  <?php include('../components/scripts.php'); ?>
</body>
<html>