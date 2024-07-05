<?php 
require_once __DIR__ . '/../controller/BuyController.php';

session_start();

$buy = new BuyController();

$value = $buy->detailHeader();
$data = $buy->detail();

$total = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../components/scriptStyle.php') ?>
    <title>Detail</title>
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card mx-auto" style="width: 60rem">
            <div class="card-body">

                <div class="mb-3 fs-2">
                    Detail Pembelian
                </div>
                
                <div class="mb-3">
                    <p>ID Pembelian<?=' : ' . $value['id']; ?></p>
                </div>

                <div class="mb-3">
                    <p>ID Supplier<?=' : ' . $value['id_supplier']; ?></p>
                </div>

                <div id="content" class="table-responsive mb-3">

            
                    <table class="table table-hover align-middle">
                        <thead>
                            <th>Id Barang</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php foreach($data as $item) : ?>
                                <?php $total += ($item['harga'] * $item['jumlah']);?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['harga'] ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td><?= $item['harga'] * $item['jumlah']?></td>
                                </tr>

                            <?php endforeach; ?>                            
                        </tbody>
                    </table>
                </div>

                <div class="mb-3">
                    <p>Total <?=' : ' . $total; ?></p>
                </div>


                <div class="mb-3 d-flex justify-content-end gap-2">
                    <a href="../pdfDetailBuy.php?id=<?= $value['id']; ?>" target="_blank" class="btn btn-primary" name="pdf">Generate PDF</a>
                    <a href="viewBuy.php" class="btn btn-outline-danger" name="kembali">Kembali</a>
                </div>

            </div>
        </div>

    </div>

    
</body>

</html>