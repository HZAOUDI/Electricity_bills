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
        <li class="breadcrumb-item ">Dashboard</li>
        <li class="breadcrumb-item ">Clients</li>
        <li class="breadcrumb-item active">Ajouter Clients</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter client <a href="view-register.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post">                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label >Nom:</label>
                                <input type="text" placeholder="Ecrire le nom" name="nom_cl" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Prenom:</label>
                                <input type="text" name="prenom_cl" placeholder="Ecrire le prenom" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >CIN:</label>
                                <input type="text" name="cin_cl" placeholder="Ecrire le CIN" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Adresse:</label>
                                <input type="text" name="adresse_cl" placeholder="Ecrire l'adresse" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tel:</label>
                                <input type="text" name="tel_cl" placeholder="Ecrire le numero telephone" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email:</label>
                                <input type="email" name="email_cl" placeholder="Ecrire l'email" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Password:</label>
                                <input type="password" name="passwd_cl" placeholder="Ecrire le mot de passe" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label> Choisir la zone geographiqie</label> 
                                <div class="col-sm-5" > 
                                    <select name="id_zone" class="form-select form-select mb-3 form-control">
                                        <option value="0">-- Select an option --</option>
                                        <option value="1">Al Azhar -Tetouan</option>
                                        <option value="2">Al Matar -Tetouan</option>
                                        <option value="3">Azla -Tetouan</option>
                                        <option value="4">Fnideq -Tetouan</option>
                                        <option value="5">Sidi Al Mendri -Tetouan</option>
                                        <option value="6">Lot Aviation -Tetouan</option>
                                        <option value="7">Oued Laou -Tetouan</option>
                                        <option value="8">Martil-Chbar -Tetouan</option>
                                        <option value="9">Boukhalef -Tanger</option>
                                        <option value="10">Imam Ghazali -Tanger</option>
                                        <option value="11">Dradeb -Tanger</option>
                                        <option value="12">Assilah -Tanger</option>

                                    </select>
                                </div>   
                            </div>

                            <div class=" mb-3">
                                <button type="submit" name="add_client" class="btn btn-primary">Ajouter</button>
                            </div>

                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>