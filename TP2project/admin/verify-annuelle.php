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
    <h4 class="mt-4">Consommations Annuelles</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Consommations Annuelles</li>
        <li class="breadcrumb-item active"> Verification Annuelle</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('message.php')?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Listes des cons annuelles </h4>
                </div>

                <div class="card-body">
                    <table id='myDataTable' class="table table-bordered table-striped table-sm ">
                        <thead>
                            <tr>
                                <!--<th>N_Client</th> -->
                                <th>N_Client</th>
                                <th> CIN</th>
                                <th>Année</th>
                                <th>Quantite en Kwh</th>               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query="SELECT clients.id_cl, nom_cl, cin_cl, annee, SUM(quantite) as cons_annee  
                                FROM factures, clients, consommations 
                                where 
                                 clients.id_cl = consommations.id_cl

                                AND factures.id_consommation = consommations.id_consommation
                                GROUP BY  id_cl, annee
                                
                                ORDER BY id_cl ";

                            $query_run = mysqli_query($con, $query);
                            

                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    ?>
                                    <tr>
                                        <td> <?= $row['id_cl']; ?> </td>
                                     
                                        <td> <?= $row['cin_cl']; ?></td>
                                        <td> <?= $row['annee']; ?></td>
                                        <td> <?= $row['cons_annee']; ?> </td>
                                        
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=4> Pas d'enregistrement trouvee</td>
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