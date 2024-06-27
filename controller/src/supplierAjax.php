<?php 

require_once __DIR__ . '/../SupplierController.php';


$suppliers = new SupplierController();
$data = $suppliers->keyword();
?>


<table class="table table-hover align-middle">
    <thead>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach ($data[0] as $item) : ?>
            <tr>
                <td><?= $item['nama'] ?></td>
                <td><?= $item['alamat'] ?></td>
                <td><?= $item['email'] ?></td>
                <td>
                    <a href="" class="btn btn-primary">
                        Edit
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