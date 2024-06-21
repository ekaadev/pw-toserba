<?php 
require_once __DIR__ . '/../Connection.php';
$key = $_GET['key'];

?>

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
                
                // konek database
                $conn = Connection::getConnection();
                
                // fetch data
                $sql = "SELECT id_barang, id_kategori, nama, stok, harga_beli, harga_jual FROM barang WHERE nama LIKE '%$key%'";
                
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