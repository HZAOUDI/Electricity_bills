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
    <h4 class="mt-4">Espace fournisseur</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row"
    ><?php  include('message.php'); ?>
        <!--<div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Contrats
                    <h4 class="mb-0">2</h4>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Afficher details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div> 
        </div>-->

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Clients
                    <?php
                        $dash_cl_query="SELECT * FROM clients";
                        $dash_cl_query_run = mysqli_query($con, $dash_cl_query );
                        if($cl_total = mysqli_num_rows( $dash_cl_query_run)){
                            echo '<h4 class="mb-0"> ' .$cl_total. ' </h4>';
                        }else{
                            echo '<h4 class="mb-0">Pas denregistrement</h4>';
                        }
                    ?>
                    
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">Afficher details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Factures paye
                    <h4 class="mb-0">
                        <?php
                            $dash_fac_query="SELECT * FROM factures WHERE etat='paye' ";
                            $dash_fac_query_run = mysqli_query($con, $dash_fac_query );
                            if($fac_total = mysqli_num_rows( $dash_fac_query_run)){
                                echo '<h4 class="mb-0"> ' .$fac_total. ' </h4>';
                            }else{
                                echo '<h4 class="mb-0">Pas denregistrement</h4>';
                            }
                        ?>
                    </h4>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view_fac.php">Afficher details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Facture non paye
                    <h4 class="mb-0">
                        <?php
                            $dash_fac_np_query="SELECT * FROM factures WHERE etat='Non payee' ";
                            $dash_fac_np_query_run = mysqli_query($con, $dash_fac_np_query );
                            if($fac_np_total = mysqli_num_rows( $dash_fac_np_query_run)){
                                echo '<h4 class="mb-0"> ' .$fac_np_total. ' </h4>';
                            }else{
                                echo '<h4 class="mb-0">Pas denregistrement </h4>';
                            }
                        ?>
                    </h4>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view_fac.php">Afficher details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body"> Total Reclamation Non Repondu
                    <h4 class="mb-0">
                        <?php
                            $dash_rec_query="SELECT * FROM reclamations WHERE reponse ='' ";
                            $dash_rec_query_run = mysqli_query($con, $dash_rec_query );
                            if($rec_total = mysqli_num_rows( $dash_rec_query_run )){
                                echo '<h4 class="mb-0"> ' .$rec_total. ' </h4>';
                            }else{
                                echo '<h4 class="mb-0">Pas denregistrement</h4>';
                            }
                        ?>
                    </h4>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-nonrec.php">Afficher details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php
            $sql= "SELECT nom_zone, COUNT(id_cl) AS total_clients
            FROM zones, clients
            Where zones.id_zone = clients.id_zone
            GROUP BY nom_zone;";
            $sql_run = mysqli_query($con, $sql);

            $row = mysqli_fetch_all($sql_run, MYSQLI_ASSOC);
            
            foreach($row as $data){
                $reg[] = $data['nom_zone'];
                $amount[] = $data['total_clients'];

            }


        ?>

        <div>
            <canvas id="myChart"></canvas>
        </div>

        <script>
            const labels = <?php  echo json_encode ($reg) ?>;
            const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: <?php  echo json_encode ($amount) ?> ,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
 

    </div>
</div>



<?php
include('includes/footer.php');
include('includes/scripts.php');
?>