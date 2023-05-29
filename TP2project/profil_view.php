<?php
session_start();
if(!isset($_SESSION['id_cl'])){
    header("location: login.php");
    exit(0);
}
?>

<?php
include('admin/config/dbcon.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container ">
    <h4 class="mt-4">Clients</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mon espace</li>
        <li class="breadcrumb-item ">Profil</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Mon profil</h4>
                </div>
                <div class="card-body">               
                                    
                    <div class="row">
                        <div class="col-md-6 mb-3">  
                            <label >Nom:</label>
                            <p class="form-control"><?= $row['nom_cl'];?></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label >Prenom:</label>
                            <p class="form-control"><?= $row['prenom_cl'];?></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>CIN:</label>
                            <p class="form-control"><?= $row['cin_cl'];?></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Adresse:</label>
                            <p class="form-control"><?= $row['adresse_cl'];?></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tel:</label>
                            <p class="form-control"><?= $row['tel_cl'];?></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email:</label>
                            <p class="form-control"><?= $row['email_cl'];?></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Le compte cree en :</label>
                            <p class="form-control"><?= $row['created_at'];?></p>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>