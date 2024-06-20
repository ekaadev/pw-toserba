<?php 
  if(isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../pages/login.php');
  }
?>

<div class="header @@classList">
  <!-- navbar -->
  <nav class="navbar-classic navbar navbar-expand-lg">
    <a id="nav-toggle" href="#"><i
        data-feather="menu"

        class="nav-icon me-2 icon-xs"></i></a>
    
    <!--Navbar nav -->
    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
      
      <!-- List -->
      <li class="dropdown ms-2">
        <a class="rounded-circle" href="#" role="button" id="dropdownUser"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md avatar-indicators avatar-online">
            <img alt="avatar" src="../assets/img/user.png"/>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end"
          aria-labelledby="dropdownUser">
          <div class="px-4 pb-0 pt-2">


            <div class="lh-1 ">
              <h5 class="mb-1">
                <?php 
                  echo $_SESSION['username'];
                ?>
              </h5>
            </div>
            <div class=" dropdown-divider mt-3 mb-2"></div>
          </div>

          <ul class="list-unstyled">
            <li>
              <a class="dropdown-item" href="@@webRoot/index.html">
                <form action="index.php" method="get">
                  <button class="btn btn-primary w-100" type="submit" name="logout">Log Out</button>
                </form>
              </a>
            </li>
          </ul>

        </div>
      </li>
    </ul>
  </nav>
</div>