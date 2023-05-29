<?php
session_start();
if(!isset($_SESSION['id_cl'])){
    header("location: login.php"); exit(0);
}
?>
<?php
include('admin/config/dbcon.php');
include('includes/header.php');
include('includes/navbar.php');  

?>

<div class="container px-4">
    <h4 class="mt-4">Mon espace </h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Mon_espace</li>
        <li class="breadcrumb-item ">Factures</li>
        <li class="breadcrumb-item ">Consulter mes_factures</li>
        <li class="breadcrumb-item active">Details facture</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header">
                    <h4>Consulter le datails de facture
                        <a href="facture_view.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body ">
                <?php
                    if(isset($_GET['id_fac'])){
                        $fac_id = mysqli_real_escape_string($con, $_GET['id_fac']);
                        $query = "SELECT * FROM factures, clients, zones, consommations 
                            WHERE id_fac='$fac_id' 
                            AND clients.id_cl = factures.id_cl 
                            AND clients.id_zone=zones.id_zone AND factures.id_consommation=consommations.id_consommation";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_array($query_run);
                            
                            ?>
                                <div class="form-group row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold">N_facture :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['id_fac'];?></p>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
            
                                    <label for="nom" class="col-sm-2 col-form-label fw-bold">MR :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control" class="fw-bold"> <?= $row['nom_cl'].' '.$row['prenom_cl'] ;?> </p>
                                    </div>

                                    <label  class="col-sm-2 col-form-label fw-bold">N_Client :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['id_cl'];?></p>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">


                                    <label class="col-sm-2 col-form-label fw-bold">Adresse :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?= $row['adresse_cl'];?> </p>
                                    </div>

                                    <label class="col-sm-2 col-form-label fw-bold">Zone :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?= $row['nom_zone'];?> </p>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  class="col-sm-2 col-form-label fw-bold">Consommationen kwh:</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['quantite'];?> </p>
                                    </div>
                                    
                                    <label  class="col-sm-2 col-form-label fw-bold">Date:</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['mois']. ' /'.$row['annee'] ; ?> </p>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  class="col-sm-2 col-form-label fw-bold ">Montant_HT :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['montant_ht']. ' MAD';?> </p>
                                    </div>

                                    <label  class="col-sm-2 col-form-label fw-bold">Taxes :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['montant_taxes']. ' MAD';?> </p>
                                    </div>

                                </div>

                                

                                <div class="form-group row mb-3">
                                    <label  class="col-sm-2 col-form-label fw-bold">Montant TTC :</label>
                                    <div class="col-sm-2">
                                        <p class="form-control"> <?=$row['montant_ttc']. ' MAD';?> </p>
                                    </div>

                                    <label  class="col-sm-2 col-form-label fw-bold">Status de facture:</label>
                                    <div class="col-sm-2">
                                        <p class="form-control">  <?=$row['etat'];?> </p>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-3">
                                    <label  class="col-sm-2 col-form-label fw-bold">Solde Anterieur:</label>
                                    <div class="col-sm-2">   
                                            <?php $color2 = ($row['solde_anterieur'] < 0 ) ? "text-danger fw-bold" :(($row['solde_anterieur'])>0? "text-success fw-bold" :"");?>
                                        <p class="form-control"> <span class="<?= $color2 ?> "><?= $row['solde_anterieur']." MAD"; ?> </span>  </p>
                                    </div>

                                    <label  class="col-sm-2 col-form-label fw-bold">Total a payer:</label>
                                    <div class="col-sm-2">
                                        <p class="form-control">  <?=$row['montant_ttc'] + $row['solde_anterieur'] ." MAD";?>  </p>
                                    </div>
                                
                                </div>

                                <div class="form-group row mb-3">
                                    <label  class="col-sm-2 col-form-label fw-bold">Image de votre compteur:</label>
                                    <div class="col-sm-2">
                                        <img src="uploads/IMGcompteurs/<?= $row['image']; ?>" width="350px" height="200px" alt="">
                                    </div> 
                                </div>                            


                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
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
?>