<?php 

require_once __DIR__ . '/../ReturPenjualanController.php';


$retur = new ReturPenjualanController();
$data = $retur->keyword();


?>

<table class="table table-hover align-middle">
    <thead>
        <th>Id Retur Penjualan</th>
        <th>Id Penjualan</th>
        <th>Id Pelanggan</th>
        <th>Deskripsi</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($data[0] as $item) : ?>

            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['id_pelanggan'] ?></td>
                <td><?= $item['id_pelanggan'] ?></td>
                <td><?= $item['deskripsi'] ?></td>
                <td>
                    <a href="detailReturPenjualan.php?id=<?=$item['id'] ?>" class="btn btn-primary">
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