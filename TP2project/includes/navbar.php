<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>

  <div class="container">
    <a class="navbar-brand" href=""> <img src="assets/images/logo.png" width=120 px> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=$page == 'index.php' ? 'active':'' ?> " aria-current="page" href="index.php">Acceuil</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
 
        <?php if(isset($_SESSION['id_cl'])) : ?>  
          <?php
            $sql = mysqli_query($con,"SELECT * FROM clients WHERE id_cl = {$_SESSION['id_cl']} " );
            if(mysqli_num_rows($sql) >0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>

          <li class="nav-item">
            <a class="nav-link <?=$page == 'facture_view.php' ? 'active':'' ?> " href="facture_view.php">Mes_Factures</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?=$page == 'consom_add.php' || $page =='consom_view.php' ? 'active':'' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Consommations
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="consom_add.php">Ajouter</a></li>
              <li><a class="dropdown-item" href="consom_view.php">Consulter</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?=$page == 'reclamation_add.php' || $page =='reclamation_view.php' ? 'active':'' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Reclamations
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="reclamation_add.php">Ajouter</a></li>
              <li><a class="dropdown-item" href="reclamation_view.php">Consulter</a></li>

            </ul>
          </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?=$page == 'profil.php' ? 'active':'' ?> " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?= $row['nom_cl']. ' '.$row['prenom_cl'];  ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profil_view.php">Profil</a></li>
            <!--<li><a class="dropdown-item" href="#">Mes contrats</a></li> -->
            <li>
              <form action="allcode.php" method="post">
                <button name="logout_btn" type="submit" class="dropdown-item">Deconnexion</button>
              </form>
            </li>
          </ul>
        </li>
          <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <?php endif; ?>
        
      </ul>
      
    </div>
  </div>
</nav>