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
                <a class="nav-link has-arrow @@if (context.page === 'dashboard') { collapsed }" href="http://localhost:90/pw-toserba/pages/index.php">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Pages</div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'pages') { collapsed }" href="http://localhost:90/pw-toserba/pages/purchase.php" >
                    <i data-feather="layers" class="nav-icon icon-xs me-2"></i> Purchase
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'authentication') { collapsed }" href="http://localhost:90/pw-toserba/pages/inventory.php" >
                    <i data-feather="lock" class="nav-icon icon-xs me-2"></i> Inventory
                </a>
            </li>

        </ul>
    </div>
</nav>
