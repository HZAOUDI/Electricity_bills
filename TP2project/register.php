<?php
session_start();

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <?php  include('message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Registration</h4>
                    </div>

                    <form action="registercode.php" method="post">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Nom</label>
                                <input type="text" name="nom_cl" placeholder="Enter nom" class="form-control" required >
                            </div>

                            <div class="form-group mb-3">
                                <label>Preom</label>
                                <input type="text" name="prenom_cl" placeholder="Enter Prenom" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>CIN</label>
                                <input type="text" name="cin_cl" placeholder="Enter CIN" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Adresse</label>
                                <input type="text" name="adresse_cl" placeholder="Enter adresse" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Tel</label>
                                <input type="text" name="tel_cl" placeholder="Enter email address" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email_cl" placeholder="Enter email address" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="passwd_cl" placeholder="Enter password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="cpasswd_cl" placeholder="retapez password" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary rounded-pill">Register Now</button>
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