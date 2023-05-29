<?php
session_start();
if(isset($_SESSION['id_fr'])){
    $_SESSION['message']= " Vous etes deja Connecée !!";
    header("location: index.php");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap5.min.css">

    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" >

     <!-- Summernote CSS - CDN Link -->
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->  
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>
        <div class="container">
            <a class="navbar-brand" href=""> <img src="../assets/images/logo.png" width=120 px> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link <?=$page == '../index.php.php'  ? 'active':'' ?>" aria-current="page" href="../index.php">Acceuil</a>
                </li>
                <!--<li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link <?=$page == 'login.php' ? 'active':'' ?>" href="login.php">Espace Admin</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=$page == 'login_ag.php' ? 'active':'' ?>" href="login_ag.php">Espace Agent</a>
                </li>
                             
            </ul>     
            </div>
        </div>
    </nav>

    <div id="layoutSidenav_content">
        <main>
            <div class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <?php  include('message.php'); ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Fournisseur - Login</h4>
                                </div>
                                <div class="card-body">

                                    <form action="logincode.php" method="post">
                                        <div class="form-group mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email_fr" placeholder="Enter votre email address" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Password</label>
                                            <input type="password" name="mdp_fr" placeholder="Enter password" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <button type="submit" name="loginfr_btn" class="btn btn-primary float-end">Login Now</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap5.bundle.min.js"></script>

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    
    
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            //$("#your_summernote").summernote();
            
            $('#your_summernote').summernote({
                placeholder: 'Ecrire ici votre description',
                
                height: 200
            });
   
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->

</body>
</html>

