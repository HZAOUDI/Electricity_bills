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
    <h4 class="mt-4">Clients</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item ">Clients</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit client</h4>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id_cl'])){
                            $cl_id = $_GET['id_cl'];
                            $clients = "SELECT * FROM clients WHERE id_cl = '$cl_id' ";
                            $clients_run = mysqli_query($con, $clients);
                            if(mysqli_num_rows($clients_run)>0){
                                foreach($clients_run as $client) {
                                    ?>
                                      
                                <form action="code.php" method="post">
                                    <input type="hidden" name="cl_id" value="<?=$client['id_cl'];?>">
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label >Nom</label>
                                            <input type="text" name="nom_cl" value="<?= $client['nom_cl'];?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label >Preom</label>
                                            <input type="text" name="prenom_cl" value="<?= $client['prenom_cl'];?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label >CIN</label>
                                            <input type="text" name="cin_cl" value="<?= $client['cin_cl'];?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label >Adresse</label>
                                            <input type="text" name="adresse_cl"value="<?= $client['adresse_cl'];?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Tel</label>
                                            <input type="text" name="tel_cl" value="<?= $client['tel_cl'];?>"class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email_cl" value="<?= $client['email_cl'];?>" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Password</label>
                                            <input type="password" name="passwd_cl" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <button type="submit" name="update_client" class="btn btn-primary">Update Client</button>
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