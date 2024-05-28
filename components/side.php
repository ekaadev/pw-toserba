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
            <!--
            Nav item
            <li class="nav-item">
                <div class="navbar-heading">UI Components</div>
            </li>
            
             Nav item 
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page === 'docs') { collapsed }" href="@@webRoot/docs/accordions.html">
                    <i data-feather="package" class="nav-icon icon-xs me-2"></i> Components
                </a>
            </li>

            Nav item 
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page_group !== 'menulevel') { collapsed }" href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevel" aria-expanded="false" aria-controls="navMenuLevel">
                    <i data-feather="corner-left-down" class="nav-icon icon-xs me-2"></i> Menu Level
                </a>
            </li>

            Nav item 
            <li class="nav-item">
                <div class="navbar-heading">Documentation</div>
            </li>

            Nav item 
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page === 'docs') { collapsed }" href="@@webRoot/docs/index.html">
                    <i data-feather="clipboard" class="nav-icon icon-xs me-2"></i> Docs
                </a>
            </li>

            Nav item 
            <li class="nav-item">
                <a class="nav-link has-arrow @@if (context.page === 'docs') { collapsed }" href="@@webRoot/docs/changelog.html">
                    <i data-feather="git-pull-request" class="nav-icon icon-xs me-2"></i> Changelog
                </a>
            </li>
                -->
        </ul>
    </div>
</nav>
