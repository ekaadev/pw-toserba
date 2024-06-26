<?php session_start(); 

if (isset($_GET['refresh'])) {
    header('Location: supplier.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('../components/scriptStyle.php'); ?>
    <title>Supplier</title>
</head>
<body class="bg-light">
    <div id="db-wrapper">
        <?php include('../components/side.php'); ?>

        <div id="page-content">
            <?php include('../components/nav.php'); ?>

            <div class="container-fluid">

                <div class="row min-vh-80 h-100 px-5 py-5">
                    <p class="fs-2 pb-3">Supplier</p>


                    <div class="row rounded-2 bg-white shadow-sm border fs-5 px-5">
                        <form action="supplier.php" method="get">
                            <div class="py-5 fs-5 d-flex flex-row gap-2">
                                <input type="text" name="key" id="key" class="form-control form-control-transparent" placeholder="Search">
                                <a href="" class="btn btn-secondary" name="add">Add</a>
                                <button type="submit" class="btn btn-success" name="refresh">Refresh</button>
                            </div>
                        </form>


                        <div id="content" class="table-responsive">

                            <table class="table table-hover align-middle">
                                <thead>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>      

            </div>

        </div>
    </div>

<?php include('../components/scripts.php') ?>
<script src="../assets/js/scriptSupplier.js"></script>
</body>
</html>