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
            <?php include('message.php')?>
            
            <div class="card">
                <div class="card-header">
                    <h4>Register client
                        <a href="register-add.php" class="btn btn-primary float-end">Add Client</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id='myDataTable' class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>N_Client</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>CIN</th>
                                <th>Adresse</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Cree en</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM clients ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                                    ?>
                                    <tr>
                                        <td> <?= $row['id_cl']; ?> </td>
                                        <td> <?= $row['nom_cl']; ?> </td>
                                        <td> <?= $row['prenom_cl']; ?></td>
                                        <td> <?= $row['cin_cl']; ?> </td>
                                        <td> <?= $row['adresse_cl']; ?> </td>
                                        <td> <?= $row['tel_cl']; ?> </td>
                                        <td> <?= $row['email_cl']; ?> </td>
                                        <td> <?= $row['created_at']; ?> </td>
                                        <td> <a href="register-edit.php?id_cl=<?=$row['id_cl'];?>" class="btn btn-success btn-sm" >Edit</a> </td>
                                        <td> 
                                            <form action="code.php" method="post">
                                               <button type ="submit" name="user_delete" value="<?=$row['id_cl'];?>" class="btn btn-danger btn-sm">Delete</button> </td>
                                            </form>
                                    </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan=10> No RECORD FOUND</td>
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


