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
        <li class="breadcrumb-item ">Reclamation</li>
        <li class="breadcrumb-item active">Ajouter Reclamation</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter Reclamation
                        <a href="reclamation_view.php" class="btn btn-danger float-end">Retour</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code_cl.php" method="post">
                    <div class="row">

                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label"> Type:</label>
                                <div class="col-sm-3">
                                    <select name="type_rec" class="form-select form-select mb-3 form-control">
                                        <option value="0">-- Select an option--</option>
                                        <option value="Fuite externe/interne">Fuite externe/ interne</option>
                                        <option value="Facture">Facture</option>
                                        <option value="Autre">Autre</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label"> Objet:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="objet" placeholder="entrer vote objet de reclamation" class="form-control">
                                </div>
                            </div>

                            <div class=" mb-3">
                                <label>Entrer votre reclamation:</label>
                                <textarea name="description" id="your_summernote" class="form-control" rows="4"></textarea>
                            </div>

                            
                            <div class="mb-3">
                                <button type="submit" name="add_rec" class="btn btn-primary float-end">Ajouter</button>
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