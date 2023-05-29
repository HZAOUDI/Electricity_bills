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
        <li class="breadcrumb-item active">Consulter mes_factures</li>
    </ol>

    <div class="row">
        <div class="col-md-18">
            <?php include('message.php')?>
            <div class="card">
                <div class="card-header">
                    <h4>Consulter Factures
                        <a href="index.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped table-sm ">
                        <thead>
                            <tr>
                                <!--<th>N_Client</th>  -->
                                <th>N_Fct</th>
                                <th>Montant HT</th>
                                <th>Montant Taxes</th>
                                <th>Montant TTC</th>
                                <th>Quantite kwh</th>
                                <th> Nouveau Index</th>
                                <th>Date</th>
                                <th>Credit/Debit</th>
                                <th>Etat</th>        
                                <th>ACTION</th>                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query="SELECT clients.id_cl,id_fac, montant_ht, montant_taxes,montant_ttc,quantite, mois, annee, etat, index_compteur,  solde_anterieur 
                            FROM factures, consommations, clients
                             WHERE clients.id_cl={$_SESSION['id_cl']}
                                AND clients.id_cl = consommations.id_cl
                                 AND consommations.id_consommation=factures.id_consommation  ";

                            $query_run = mysqli_query($con, $query);


                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    $color2 = ($row['solde_anterieur'] < 0 ) ? "text-danger fw-bold" :(($row['solde_anterieur'])>0? "text-success fw-bold" :"");

                                    ?>
                                    <tr>
                                        
                                        <!--<td><?= $row['id_cl']; ?> </td> -->
                                        <td> <?= $row['id_fac']; ?> </td>
                                        <td> <?= $row['montant_ht']; ?></td>
                                        <td> <?= $row['montant_taxes']; ?> </td>
                                        <td> <?= $row['montant_ttc']; ?> </td>
                                        <td> <?= $row['quantite']; ?> </td>
                                        <td> <?= $row['index_compteur']; ?> </td>
                                        <td> <?= $row['mois'] .'/'. $row['annee']; ?> </td>

                                        <td> 
                                            <span class="<?= $color2 ?> "><?= $row['solde_anterieur']; ?> </span> 
                                        </td>

                                        <td> <?= $row['etat']; ?> </td>
                                        <td>
                                            <a href="facture-details.php?id_fac=<?=$row['id_fac'];?>" class="btn btn-primary btn-sm" >Voir</a>

                                            <!--
                                            <form action="code_cl.php" method="post" class="d-inline">
                                                <input type="submit" name="btn"  class="btn btn-warning btn-sm" value="Générer pdf">
                                            </form> -->
                                            
                                             <?php
                                                if( $row['etat'] != 'paye') {
                                                    ?>
                                                        <form action="code_cl.php" method="post" class="d-inline">
                                                            <button type ="submit" name="payer" value="<?=$row['id_fac'];?>" class="btn btn-success btn-sm">Payer</button> </td>
                                                        </form>
                                                    <?php
                                                } 
                                             ?>            

                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=7> Pas d'enregistrement trouvee</td>
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