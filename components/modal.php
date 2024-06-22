<!-- Modal -->
<div class="modal fade" id="modal<?= $item['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="mb-3">Delete Barang</h3>
                <p class="fs-4 mb-3">Are you sure want to delete <b><?= $item['nama'] ?></b>?</p>
            </div>
            <div class="modal-footer">
                <div class="d-flex flex-row gap-2 justify-content-end">
                    <form action="inventory.php" method="post">
                        <input type="hidden" name="id" value="<?= $item['id_barang']?>">
                        <button type="submit" class="btn btn-primary" name="delete">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>