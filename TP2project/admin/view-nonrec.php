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
    <h4 class="mt-4">Espace Admin</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item ">Reclamations</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <?php include('message.php')?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Reclamations Non repondu </h4>
                </div>
                <div class="card-body">
                    <table id='myDataTable' class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>N_rec</th>
                                <th>Type</th>
                                <th>Objet</th>
                                <th>Description</th>
                                
                                <th>Cree le</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM reclamations WHERE reponse ='' ";
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
                                        <td> <a href="rec-repondre.php?id_rec=<?=$row['id_rec'];?>" class="btn btn-warning btn-sm" >Repondre</a> </td>
                                    </tr>
                                    <?php
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

        <div class="col-md-12">
        <div class="card mb-3 ">
                <div class="card-header">
                    <h4>Reclamations Repondu </h4>
                </div>
                <div class="card-body">
                    <table id='myDataTable2' class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>N_rec</th>
                                <th>Type</th>
                                <th>Objet</th> 
                                <th>Description</th>
                                <th>Cree le</th>
                                <th>Reponse</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM reclamations WHERE reponse !='' ";
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
include('includes/scripts.php');
?>


