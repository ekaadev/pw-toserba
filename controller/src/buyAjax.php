<?php 
    require_once __DIR__ . '/../BuyController.php';

    $buy = new BuyController();
    $data = $buy->keyword();

?>


<table class="table table-hover align-middle">
    <thead>
        <th>Id Pembelian</th>
        <th>Id Supplier</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($data[0] as $item) : ?>

            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['id_supplier'] ?></td>
                <td>
                    <a href="detailViewBuy.php?id=<?=$item['id'] ?>" class="btn btn-primary">
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