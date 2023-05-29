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
        <li class="breadcrumb-item active">Factures</li>
        <li class="breadcrumb-item ">Bilan Factures</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('message.php')?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Listes des factures </h4>
                </div>

                <div class="card-body">
                    <table id='myDataTable' class="table table-bordered table-striped table-sm ">
                        <thead>
                            <tr>
                                <!--<th>N_Client</th> -->
                                <th>N_Facture</th>
                                <th>Montant HT</th>
                                <th>Montant Taxes</th>
                                <th>Montant TTC</th>
                                <th>Quantite kwh</th>
                                <th>Etat</th>   
                                <th>Date</th>

                                <th>Cree le</th>  
                                <th>ID_Client</th>   
                                <th>Nom</th>
                                                       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query="SELECT * FROM factures, clients, consommations where clients.id_cl= factures.id_cl AND consommations.id_consommation= factures.id_consommation ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    ?>
                                    <tr>
                                        <td> <?= $row['id_fac']; ?> </td>
                                        <td> <?= $row['montant_ht']; ?></td>
                                        <td> <?= $row['montant_taxes']; ?> </td>
                                        <td> <?= $row['montant_ttc']; ?> </td>
                                        <td> <?= $row['quantite']; ?> </td>
                                        <td> <?= $row['etat']; ?> </td>
                                        <td> <?= $row['mois'];?> / <?= $row['annee'];?> </td>

                                        <td> <?= $row['created_fr']; ?> </td>
                                        <td> <?= $row['id_cl']; ?> </td>
                                        <td> <?= $row['nom_cl']; ?> </td>
                                        
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=9> Pas d'enregistrement trouvee</td>
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
include('includes/scripts.php');
?>