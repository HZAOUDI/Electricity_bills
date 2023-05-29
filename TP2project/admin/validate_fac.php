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
        <li class="breadcrumb-item ">Validation Factures</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('message.php')?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Consommation en attente de validation </h4>
                </div>

                <div class="card-body">
                    <table id='DataTable' class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID_Consommation</th>
                                <th>Mois</th>
                                <th>Annee</th>
                                <th>ID_Client</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM consommations WHERE etat_cons='En attente' ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    ?>
                                    <tr>
                                        <td> <?= $row['id_consommation']; ?> </td>
                                        <td> <?= $row['mois']; ?> </td>
                                        <td> <?= $row['annee']; ?></td>
                                        <td> <?= $row['id_cl']; ?> </td>
                                        
                                        <td> 
                                            <a href="consom-edit.php?id_consommation=<?=$row['id_consommation'];?>" class="btn btn-primary btn-sm">Edit</a> 
                                            <form action="code.php" method="post" class="d-inline">
                                               <button type ="submit" name="valider" value="<?=$row['id_consommation'];?>" class="btn btn-success btn-sm">Valider</button> 
                                            </form>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=5> No RECORD FOUND</td>
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


