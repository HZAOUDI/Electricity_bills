<?php
session_start();
if(!isset($_SESSION['id_fr'])){
    header("location: login.php");
    exit(0);
}

include('config/dbcon.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Factures</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Factures</li>
        <li class="breadcrumb-item ">Validation factures</li>
        <li class="breadcrumb-item active">Modification consommation</li>

    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Consommation en attente de validation
                        <a href="validate_fac.php" class="btn btn-danger float-end">Retour</a>

                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id_consommation'])){
                            $cons_id = $_GET['id_consommation'];
                            $consom = "SELECT * FROM consommations WHERE id_consommation = '$cons_id' ";
                            $consom_run = mysqli_query($con, $consom);
                            if(mysqli_num_rows($consom_run)>0){
                                foreach($consom_run as $row) {
                                    ?>
                                      
                                <form action="code.php" method="post">
                                    <input type="hidden" name="cons_id" value="<?=$row['id_consommation'];?>">
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label >ID_Consommation</label>
                                            <p class="form-control"> <?= $row['id_consommation'];?>  </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label >Mois</label>
                                            <p class="form-control" > <?= $row['mois'];?>  </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label >Annee</label>
                                            <p class="form-control"> <?= $row['annee'];?>  </p>
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label>Nouveau Index</label>
                                            <input type="number" name="index_compteur" value="<?= $row['index_compteur'];?>"class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label >image</label> 
                                            <img src="../uploads/IMGcompteurs/<?= $row['image'];?>" width="300px" height="150px" alt="">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="update_cons" class="btn btn-primary">Modifier</button>
                                        </div>

                                    </div>
                                    
                                </form>

                            <?php
                                }

                            }else{
                                ?>
                                <h4>No Record Found</h4>
                                <?php
                            }

                        }
                        
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>