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
    <h4 class="mt-4">reponses</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Dashboard</li>
        <li class="breadcrumb-item ">Reclamations</li>
        <li class="breadcrumb-item active">Repondre</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('message.php')?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter une Reponse
                        <a href="view-nonrec.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id_rec'])){
                            $rec_id = $_GET['id_rec'];
                            $query = "SELECT * FROM reclamations WHERE id_rec = '$rec_id' ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run)>0){
                                foreach($query_run as $row) {
                                    ?>

                                <form action="code.php" method="post">
                                    <div class="row">
                                        <input type="hidden" name="rec_id" value="<?=$row['id_rec'];?>">
                                    
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-2 col-form-label">N_Rec:</label>
                                            <div class="col-sm-8">
                                                <p class="form-control"> <?= $row['id_rec'];?> </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-sm-2 col-form-label">Type:</label>
                                            <div class="col-sm-8">
                                                <p class="form-control"> <?= $row['type_rec'];?> </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-sm-2 col-form-label"> Objet:</label>
                                            <div class="col-sm-8">
                                                <p class="form-control"> <?= $row['objet'];?> </p>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-sm-2 col-form-label"> Description:</label>
                                            <div class="col-sm-8">
                                                <p > <?= $row['description'];?> </p>
                                             </div> 
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-2 col-form-label"> Cree le:</label>
                                            <div class="col-sm-8">
                                                <p class="form-control"> <?= $row['created_at'];?> </p>
                                             </div> 
                                        </div>                                    

                                        <div class="mb-3">
                                            <label class="col-sm-2 col-form-label"> Reponse:</label>
                                            <input type="text" name="reponse" <?= $row['reponse'];?> class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="repondre" class="btn btn-primary">Repondre</button>
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