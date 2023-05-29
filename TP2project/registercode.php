<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['register_btn'])){
    $nom_cl = mysqli_real_escape_string($con,$_POST['nom_cl']);
    $prenom_cl = mysqli_real_escape_string($con,$_POST['prenom_cl']);
    $cin_cl = mysqli_real_escape_string($con,$_POST['cin_cl']);
    $adresse_cl = mysqli_real_escape_string($con,$_POST['adresse_cl']);
    $tel_cl = mysqli_real_escape_string($con,$_POST['tel_cl']);
    $email_cl = mysqli_real_escape_string($con,$_POST['email_cl']);
    $passwd_cl = mysqli_real_escape_string($con,$_POST['passwd_cl']);
    $confirm_pswd = mysqli_real_escape_string($con,$_POST['cpasswd_cl']);

    if($passwd_cl == $confirm_pswd){
        //Check email
        $checkmail = "SELECT email_cl FROM clients WHERE email_cl='$email_cl' ";
        $checkmail_run = mysqli_query($con, $checkmail);
        
        if(mysqli_num_rows($checkmail_run) > 0){
            //Already email exist
            $_SESSION['message'] = "Already email exist";
            header("Location: register.php");
            exit(0);

        }else{
            $client_query = "INSERT INTO clients (	nom_cl, prenom_cl, cin_cl, adresse_cl, tel_cl, email_cl, passwd_cl) 
                VALUES('$nom_cl', '$prenom_cl', '$cin_cl', ' $adresse_cl', '$tel_cl', '$email_cl', '$passwd_cl') ";
            $client_query_run = mysqli_query($con, $client_query);

            if($client_query_run){
                $_SESSION['message'] = "Register Successfully";
                header("Location: login.php");
                exit(0);

            }else{
                $_SESSION['message'] = "Something went wrong";
                header("Location: register.php");
                exit(0);
            }
        }

    }else{
        $_SESSION['message'] = "Password and Confirm Password don't match";
        header("Location: register.php");
        exit(0);
    }


}else{
    header("Location: register.php");
    exit(0);
}

?>