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
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="post">
                            <div class="form-group mb-3">
                                <label>Email:</label>
                                <input type="email" name="email_cl" placeholder="Enterer adresse email " class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Mot de passe :</label>
                                <input type="password" name="passwd_cl" placeholder="Enterer password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary float-end">Login Now</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>