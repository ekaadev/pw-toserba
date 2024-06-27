<?php
require_once __DIR__ . '/../Connection.php';
require_once __DIR__ . '/../InventoryController.php';
session_start();
$key = $_GET['key'];

$inventory = new InventoryController();
$data = $inventory->keyword();
?>

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
        <?php foreach ($data[0] as $item) : ?>
            <tr>
                <td><?= $item['id_barang'] ?></td>
                <td><?= $item['id_kategori'] ?></td>
                <td><?= $item['nama'] ?></td>
                <td><?= $item['stok'] ?></td>
                <td><?= $item['harga_beli'] ?></td>
                <td><?= $item['harga_jual'] ?></td>
                <td>
                    <a href="editInventory.php?id=<?= $item['id'] ?>" class="btn btn-primary">
                        Edit
                    </a>

                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $item['id'] ?>">
                        Hapus
                    </a>
                    <?php include('../../components/modal.php'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
