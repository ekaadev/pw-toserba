<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- script style -->
  <?php include('../components/scriptStyle.php'); ?>

  <title>Dashboard</title>
</head>
<body class="bg-light">
  <div id="db-wrapper">
    <!--  side bar -->
    <?php include('../components/side.php'); ?>

    <div id="page-content">
      <!-- navbar -->
      <?php include('../components/nav.php'); ?>


      <div class="container-fluid">
        <div class="row min-vh-80 h-100 px-5 py-5">
          <div class="col-12">
            <p>Dashboard</p>
          </div>
        </div>
      </div>


    </div>       
  </div>
  
  <!-- script -->
  <?php include('../components/scripts.php'); ?>
</body>
<html>