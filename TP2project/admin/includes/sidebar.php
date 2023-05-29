<div id="layoutSidenav_nav">      
    <?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>
    
    
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <a class="nav-link <?=$page == 'index.php' ? 'active':'' ?> " href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard 
                </a>

                <!-- <a class="nav-link" href="view-register.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Registered Clients
                </a> -->

                <a class="nav-link <?=$page == 'validate_fac.php' ? 'active':'' ?> " href="validate_fac.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-pen-to-square"></i></div>
                        Validation Factures
                </a>
                
                <a class="nav-link <?=$page == 'view_fac.php' ? 'active':'' ?> " href="view_fac.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-check-dollar"></i></div>
                        Bilan Factures
                </a>

                <a class="nav-link <?=$page == 'cons-annuelle.php' ? 'active':'' ?> " href="cons-annuelle.php">
                    <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-file-pen"></i></div>
                       Verification Annuelle
                </a>

                <a class="nav-link <?=$page == 'verify-annuelle.php' ? 'active':'' ?> " href="verify-annuelle.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-check"></i></div>
                       Cons. Annuelle
                </a>

                <a class="nav-link <?=$page == 'view-nonrec.php' ? 'active':'' ?> " href="view-nonrec.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                       Reclamations
                </a>

                <!-- <a class="nav-link <?=$page == 'view-contrat.php' ? 'active':'' ?> " href="view-contrat.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-contract"></i></div>
                      Gest. Contrats
                </a> -->

                
                <!--<div class="sb-sidenav-menu-heading">Interface</div> -->

                <a class="nav-link collapsed <?= $page == 'view-register.php' || $page == 'register-add.php'|| $page == 'register-edit.php' ? 'active':'' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Clients
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'view-register.php' || $page == 'register-add.php' || $page == 'register-edit.php' ? 'show':'' ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'view-register.php' || $page == 'register-edit.php' ? 'active':'' ?>" href="view-register.php">Afficher Clients</a>
                        <a class="nav-link <?=$page == 'register-add.php' ? 'active':'' ?>" href="register-add.php">Ajouter Clients</a>
                    </nav>
                </div>

                <!--
                <a class="nav-link collapsed <?= $page == 'view-nonrec.php' || $page == 'view-rec.php' ? 'active':'' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Reclamations
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'view-nonrec.php' || $page == 'view-rec.php' ? 'show':'' ?>" id="collapseLayouts2" aria-labelledby="rec" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'view-nonrec.php' ? 'active':'' ?>" href="view-nonrec.php">Rec Non repondu</a>
                        <a class="nav-link <?=$page == 'view-rec.php' ? 'active':'' ?>" href="view-rec.php">Afficher Rec</a>
                    </nav>
                </div> -->


                <!--
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>

                -->

                <!--
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
                <?= $row['email_fr']; ?>
        </div>
    </nav>
</div>