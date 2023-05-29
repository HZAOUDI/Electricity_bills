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
        <div class="col-md-12">
            <?php include('message.php')?>
            <div class="card">
                <div class="card-header">
                    <h4>Consulter Factures
                        <a href="index.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myDataTable" class="table table-bordered table-striped table-sm ">
                        <thead>
                            <tr>
                                <!--<th>N_Client</th> -->
                                <th>N_Rec</th>
                                <th>Type </th>
                                <th>Objet</th>
                                <th>Description</th>
                                <th>Cree le</th>
                                <th>Reponse</th>        
                                                       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query="SELECT * FROM reclamations WHERE id_cl={$_SESSION['id_cl']}  ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    ?>
                                    <tr>
                                        <td> <?= $row['id_rec']; ?> </td>
                                        <td> <?= $row['type_rec']; ?></td>
                                        <td> <?= $row['objet']; ?> </td>
                                        <td> <?= $row['description']; ?> </td>
                                        <td> <?= $row['created_at']; ?> </td>
                                        <td> <?= $row['reponse']; ?> </td>
                                        
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
?>