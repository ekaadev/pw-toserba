<?php 
    require_once __DIR__ . '/../controller/Connection.php';

    session_start();

    $idDelete =  $_SESSION['idBarang'];

    if(isset($_GET['delete'])) {
        // eksekusi fungsi deleteItem

        try {

            // connect database
            $conn = Connection::getConnection();

            $sql = "DELETE FROM barang WHERE id_barang = '$idDelete'";

            $conn->exec($sql);

            $conn = null;

            header('Location: inventory.php');

        } catch(PDOException $e) {

            echo "Error : " . $e->getMessage();
        }
    }


    if(isset($_GET['cancel'])) {
        header('Location: inventory.php');
    }

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
                    <form action="deleteItemInventory.php" method="get">    
                        <button type="submit" class="btn btn-primary" name="delete">Submit</button>
                        <button type="submit" class="btn btn-outline-danger" name="cancel">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include(' ../components/scripts.php'); ?>

</body>
</html>