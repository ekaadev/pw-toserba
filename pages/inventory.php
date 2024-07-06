<?php
require_once __DIR__ . '/../controller/Connection.php';
require_once __DIR__ . '/../controller/InventoryController.php';

session_start();

$inventory = new InventoryController();
$inventories = $inventory->index();

if (isset($_GET['refresh'])) {
  header('Location: inventory.php');
}

if (isset($_POST['delete'])) {
  $success = $inventory->delete();

  if ($success) {
    $_SESSION['success'] = 'Data berhasil dihapus';
  } else {
    $_SESSION['success'] = 'Gagal menghapus data';
  }

  header('Location: inventory.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../components/scriptStyle.php'); ?>

  <title>Inventory</title>
</head>

<body class="bg-light">
  <div id="db-wrapper">
    <?php include('../components/side.php'); ?>

    <div id="page-content">
      <?php include('../components/nav.php'); ?>

      <div class="container-fluid">
        <div class="row min-vh-80 h-100 px-5 py-5">
          <p class="fs-2 pb-3">Inventory</p>

          <!-- ALERT -->
          <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
              <?= $_SESSION['success']; ?>

              <?php unset($_SESSION['success']); ?>
            </div>
          <?php endif; ?>

          <div class="row rounded-2 bg-white shadow-sm border fs-5 px-5">


            <!-- ROW SEARCH AND ADD -->
            <form action="inventory.php" method="get">
              <div class="py-5 fs-5 d-flex flex-row gap-2">
                <input type="text" name="key" id="key" class="form-control form-control-transparent" placeholder="Search" autocomplete="off">
                <a href="addInventory.php" class="btn btn-secondary" name="add">Add</a>
                <a href="../pdfInventory.php" target="_blank" class="btn btn-secondary" name="pdf">PDF</a>
                <button type="submit" class="btn btn-success" name="refresh">Refresh</button>
              </div>
            </form>

            <!-- ROW TABLE -->
            <div id="content" class="table-responsive">

              <table class="table table-hover align-middle">
                <thead>
                  <th>ID Barang</th>
                  <th>ID Kategori</th>
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <!-- mulai perulangan -->
                  <?php foreach ($inventories as $item) : ?>
                    <tr>
                      <td><?= $item['id'] ?></td>
                      <td><?= $item['id_kategori'] ?></td>
                      <td><?= $item['nama'] ?></td>
                      <td><?= $item['stok'] ?></td>
                      <td>Rp <?=number_format(intval($item['harga_beli']), 2, ',', '.');  ?></td>
                      <td><?= $item['harga_jual'] ?></td>
                      <td>
                        <a href="editInventory.php?id=<?= $item['id'] ?>" class="btn btn-primary">
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

  <?php include('../components/scripts.php') ?>
  <script src="../assets/js/inventoryScript.js"></script>
</body>

</html>