<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="#">
            <p class="text-light fw-bold">TOSERBA</p>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page === \'dashboard\') { collapsed }" href="http://localhost/pw-toserba/pages/index.php">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                </a>
            </li>
            

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Transaksi</div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'pages') { collapsed }" href="http://localhost/pw-toserba/pages/purchase.php" >
                    <i data-feather="shopping-cart" class="nav-icon icon-xs me-2"></i> Penjualan
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Master</div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'authentication') { collapsed }" href="http://localhost/pw-toserba/pages/customer.php" >
                    <i data-feather="user" class="nav-icon icon-xs me-2"></i> Pelanggan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'authentication') { collapsed }" href="http://localhost/pw-toserba/pages/inventory.php" >
                    <i data-feather="database" class="nav-icon icon-xs me-2"></i> Barang
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'authentication') { collapsed }" href="http://localhost/pw-toserba/pages/supplier.php" >
                    <i data-feather="users" class="nav-icon icon-xs me-2"></i> Pemasok
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'authentication') { collapsed }" href="http://localhost/pw-toserba/pages/viewPurchase.php" >
                    <i data-feather="users" class="nav-icon icon-xs me-2"></i> Riwayat Penjualan
                </a>
            </li>


        </ul>
    </div>
</nav>
