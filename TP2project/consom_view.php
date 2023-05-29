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
        <li class="breadcrumb-item ">Consommations</li>
        <li class="breadcrumb-item active">Consulter ma_consommation</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('message.php')?>
            <div class="card">
                <div class="card-header">
                    <h4>Consulter Consommation
                        <a href="consom_add.php" class="btn btn-primary float-end">Ajouter Consommation</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>N_Client</th>
                                <th>ID_Consommation</th>
                                <th>Nouveau Index</th>
                                <th>Date</th>
                                <th>Quantité en Kwh</th>
                                <th>Image</th>
                                <th>Etat</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query="SELECT *  FROM consommations, factures, clients WHERE clients.id_cl={$_SESSION['id_cl']} 
                                AND  clients.id_cl = consommations.id_cl AND consommations.id_consommation=factures.id_consommation ";
                            $query_run = mysqli_query($con, $query);


                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    //$annee =$row["annee"];
                                    //$mois = $row["mois"];
                                    //$index_compteur = $row["index_compteur"];
                                    
                                    //$sql= "SELECT index_compteur FROM consommations WHERE id_cl={$_SESSION['id_cl']} AND mois=('$mois'-1) AND annee=$annee ";
                                    //$sql_run = mysqli_query($con, $sql);

                                    //if(mysqli_num_rows($sql_run) > 0){
                                        //$row2 = mysqli_fetch_assoc($sql_run);
                                        //$ancien_index = $row2["index_compteur"];
                                        //$nv_ind = $index_compteur;
                                        //$quantite = $nv_ind - $ancien_index;

                                        ?>

                                        <tr>
                                            <td> <?= $row['id_cl']; ?> </td>
                                            <td> <?= $row['id_consommation']; ?> </td>
                                            
                                            <td> <?= $row['index_compteur']; ?> </td>

                                            <td> <?= $row['mois']; ?>/<?= $row['annee']; ?> </td>

                                            <td> <?= $row['quantite'] ?> </td>

                                            <td> 
                                                <img src="uploads/IMGcompteurs/<?= $row['image']; ?>" width="60px" height="60px" alt="">
                                            </td>
                                            

                                            <td>
                                                <?php
                                                $etat_cons = $row['etat_cons'];
                                                $color_class = ($etat_cons == "Verifiee") ? "text-success" : (($etat_cons == "En attente") ? "text-danger" : "");
                                                ?>
                                                <span class="<?= $color_class; ?> fw-bold"><?= $etat_cons; ?></span>
                                            </td>

                                        </tr>
                                        <?php
                                    //}   
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=6> No RECORD FOUND</td>
                                    </tr>
                                <?php
                            } 
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>