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
    <h4 class="mt-4">Consommations</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Consommations Annuelles</li>
        <li class="breadcrumb-item ">Cons Annuelle</li>
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
                                <th>Année</th>
                                <th>Cons.Annuelle d'apres client C1</th>  
                                <th>Cons.Annuelle d'apres Agent C2</th>
                                <th>Difference C2-C1</th>
                                <th>Montant Debit/Credit</th>
                                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query="SELECT clients.id_cl, consommations.annee, factures.cons_par_annee, consommations.annee, cons_annuelles.Consommation, factures.id_fac
                            FROM factures, clients, consommations, cons_annuelles 
                            WHERE
                                 clients.id_cl = consommations.id_cl 
                            AND factures.id_consommation = consommations.id_consommation 
                            AND consommations.mois='12'

                            AND cons_annuelles.idClient = clients.id_cl AND consommations.annee=cons_annuelles.Annee
                            GROUP BY id_cl, consommations.annee, cons_annuelles.Annee
                            ";

                            $query_run = mysqli_query($con, $query);

                           // $id_cl = $_SESSION['id_cl']; 

                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    $diff =$row['Consommation']-$row['cons_par_annee'];
                                    $color = ($diff <-100) ? "text-danger" :(($diff)>100? "text-success" :"" );
                                    
                                    if($diff<=100){
                                        $mt_ht = $diff * 0.91;
                                    }elseif($diff>=101 && $diff<=200){
                                        $mt_ht = $diff * 1.01;
                                    }elseif($diff>=201){
                                        $mt_ht = $diff * 1.12;
                                    }
                                    $mt_taxes= $mt_ht * 0.14; 
                                    $mt_ttc = $mt_ht + $mt_taxes;

                                    if($diff < 100 && $diff > -100){
                                        $mt_ttc = 0;
                                    }

                                    $color2 = ($mt_ttc < 0 ) ? "text-danger" :(($mt_ttc)>0? "text-success" :"");

                                    $id_fc=$row['id_fac'];

                                    $myquery = "UPDATE factures SET solde_anterieur= $mt_ttc WHERE id_fac= $id_fc
                                             ";
                                    $myquery_run =  mysqli_query($con, $myquery);

                                    ?>
                                    <tr>
                                        <td> <?= $row['id_cl']; ?> </td>
                                        <td> <?= $row['annee']; ?></td>
                                        <td> <?= $row['cons_par_annee']; ?> </td>
                                        <td> <?= $row['Consommation']; ?> </td>
                                        <td> 
                                            <span class="<?= $color ?> fw-bold"><?= $diff ?> </span>
                                        </td>
                                        <td>
                                            <span class="<?= $color2 ?> fw-bold"> <?= $mt_ttc ?> </td> </span> 
                                        </td>
                                        
                                        
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=6> Pas d'enregistrement trouvee</td>
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