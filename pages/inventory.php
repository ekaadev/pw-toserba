<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../components/scriptStyle.php'); ?>

  <title>Inventory</title>
</head>
<body class="bg-light">
  <div id="db-wrapper">
    <?php include('../components/side.php'); ?>

    <div id="page-content">
      <?php include('../components/nav.php'); ?>

      <div class="container-fluid">
        <div class="row min-vh-80 h-100 px-5 py-5">
          <p class="fs-2 pb-3">Inventory</p>
          
          <div class="col-12 rounded-2 bg-white shadow-sm border fs-5 px-5">

            <!-- ROW SEARCH AND ADD -->
            <form action="" method="get">
              <div class="py-5 fs-5 d-flex flex-row gap-2">
                <input type="text" name="search" id="" class="form-control form-control-transparent" placeholder="Search">
                <button type="submit" class="btn btn-primary" name="search">Search</button>
                <button type="submit" class="btn btn-secondary" name="add">Add</button>
              </div>
            </form>

            <!-- ROW TABLE -->
            <div class="col-12">
              <table class="table table-hover">
                <thead>
                  <th>tes</th>
                  <th>test</th>
                  <th>tdest</th>
                </thead>
                <tbody>
                  <tr>
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
</body>
</html>