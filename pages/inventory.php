<?php 
  require_once __DIR__ . '/../controller/Connection.php';

  session_start();

  if (isset($_GET['refresh'])) {
    header('Location: inventory.php');
  }

  if (isset($_GET['edit'])) {
    $_SESSION['idEditBarang'] = $_GET['edit'];
    header('Location: editInventory.php');
  }

  if (isset($_GET['delete'])) {

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
          
          <div class="row rounded-2 bg-white shadow-sm border fs-5 px-5">
            
            
            <!-- ROW SEARCH AND ADD -->
            <form action="inventory.php" method="get">
              <div class="py-5 fs-5 d-flex flex-row gap-2">
                <input type="text" name="key" id="key" class="form-control form-control-transparent" placeholder="Search">
                <button type="submit" class="btn btn-secondary" name="add">Add</button>
                <button type="submit" class="btn btn-success" name="refresh">Refresh</button>
              </div>
            </form>

            <!-- ROW TABLE -->
            <div id="content" class="table-responsive">
              
              <table class="table table-hover">
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
                  <?php 
                    
                    try {
                      
                      // connect database
                      $conn = Connection::getConnection();
                      
                      // fetch data
                      $sql = "SELECT id_barang, id_kategori, nama, stok, harga_beli, harga_jual FROM barang";
                      
                      $result = $conn->query($sql);
                      
                      // inisiasi variabel
                      $id_barang = null;
                      $id_kategori = null;
                      $nama = null;
                      $stok = null;
                      $harga_beli = null;
                      $harga_jual = null;
                      
                      // fetch data
                      foreach($result as $value) {
                        $id_barang = $value['id_barang'];
                        $id_kategori = $value['id_kategori'];
                        $nama = $value['nama'];
                        $stok = $value['stok'];
                        $harga_beli = $value['harga_beli'];
                        $harga_jual = $value['harga_jual'];


                        echo "<tr>";
                        echo "<td>$id_barang</td>";
                        echo "<td>$id_kategori</td>";
                        echo "<td>$nama</td>";
                        echo "<td>$stok</td>";
                        echo "<td>$harga_beli</td>";
                        echo "<td>$harga_jual</td>";
                        echo "<td>
                                <form action=\"inventory.php\" method=\"get\">
                                <button class=\"btn btn-primary \" type=\"submit\" name=\"edit\" value=\"$id_barang\">Edit</button>
                                <button class=\"btn btn-danger \" type=\"submit\" name=\"delete\" value=\"$id_barang\">Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                      }
                      
              
                      $conn = null;

                    } catch(PDOException $e) {
                      echo "Error : " . $e->getMessage();
                    }
                  
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

    </div>

    
  </div>

  <?php include('../components/scripts.php') ?>
  <script src="../assets/js/script.js"></script>
</body>
</html>