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
        <li class="breadcrumb-item ">Consommations</li>
        <li class="breadcrumb-item active">Ajouter Consommation</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter Consommation
                        <a href="consom_view.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code_cl.php" method="post" enctype="multipart/form-data" >
                    <div class="row">
                            <!-- <div class="col-md-6 mb-3">
                                <label >Ancien Index:</label>
                                <input type="number" name="ancien_index" class="form-control">
                            </div> -->

                            <div class="col-md-6 mb-3">
                                <label >Nouveau Index:</label>
                                <input type="number" name="index_compteur" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Mois:</label>
                                <select name="mois" id="mois" class=" form-control">
                                    <option value="0">-- Selectionner le mois --</option>
                                    <option value="1">Janvier</option>
                                    <option value="2">Fevrier</option>
                                    <option value="3">Mars</option>
                                    <option value="4">Avril</option>
                                    <option value="5">Mai</option>
                                    <option value="6">Juin</option>
                                    <option value="7">Juillet</option>
                                    <option value="8">Aout</option>
                                    <option value="9">Septembre</option>
                                    <option value="10">Octobre</option>
                                    <option value="11">Novembre</option>
                                    <option value="12">Decembre</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Annee:</label>
                                <input type="number" name="annee" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Image compteur:</label>
                                <input class="form-control" name="image" type="file" >
                            </div>

                            <div class=" mb-3">
                                <button type="submit" name="add_cons" class="btn btn-primary float-end">Ajouter</button>
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
?>