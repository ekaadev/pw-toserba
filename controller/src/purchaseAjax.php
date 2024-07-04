<?php 

require_once __DIR__ . '/../PurchaseController.php';


$purchases = new PurchaseController();
$data = $purchases->keyword();


?>

<table class="table table-hover align-middle">
    <thead>
        <th>Id Penjualan</th>
        <th>Id Pelanggan</th>
        <th>Id Karyawan</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($data[0] as $item) : ?>

            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['id_pelanggan'] ?></td>
                <td><?= $item['id_karyawan'] ?></td>
                <td>
                    <a href="detailViewPurchase.php?id=<?=$item['id'] ?>" class="btn btn-primary">
                        Detail
                    </a>
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $item['id'] ?>">
                        Hapus
                    </a>
                    <?php include('../../components/modal.php') ?>
                </td>
            </tr>

        <?php endforeach; ?>                            
    </tbody>
</table>