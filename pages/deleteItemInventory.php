<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../components/scriptStyle.php') ?>

    <title>Delete</title>
</head>
<body>
    <div class="container py-5">
        <div class="card mx-auto" style="width: 30rem">
            <div class="card-body">
                <h3 class="mb-3">Delete Barang</h3>
                <p class="fs-4 mb-3">Are you sure ?</p>

                <div class="d-flex flex-row gap-2 justify-content-end">
                    <button type="submit" class="btn btn-primary" name="delete">Submit</button>
                    <button type="submit" class="btn btn-outline-danger" name="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <?php include(' ../components/scripts.php'); ?>

</body>
</html>