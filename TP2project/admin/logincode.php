<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['loginfr_btn'])){
    $email_fr = mysqli_real_escape_string($con,$_POST['email_fr']);
    $mdp_fr = mysqli_real_escape_string($con,$_POST['mdp_fr']);

    $login_query = "SELECT * FROM fournisseurs WHERE email_fr = '$email_fr' AND mdp_fr ='$mdp_fr' LIMIT 1  ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0){
  
        $_SESSION['auth'] = true;

        $row = mysqli_fetch_assoc($login_query_run);

        $_SESSION['id_fr'] = $row['id_fr'];
        
        $_SESSION['message']= "Bienvenue, Vous etes connecté autant que fournisseur";
        header("Location: index.php");
        exit(0);

    }else{
        $_SESSION['message']= "Invalid Email ou Password";
        header("Location: login.php");
        exit(0);
    }   
}


if(isset($_POST['loginag_btn'])){
    $email_ag = mysqli_real_escape_string($con,$_POST['email_ag']);
    $mdp_ag = mysqli_real_escape_string($con,$_POST['mdp_ag']);

    $login_query = "SELECT * FROM agents WHERE email_ag = '$email_ag' AND mdp_ag ='$mdp_ag' LIMIT 1  ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0){
  
        $_SESSION['auth_ag'] = true;

        $row = mysqli_fetch_assoc($login_query_run);

        $_SESSION['id_ag'] = $row['id_ag'];
        
        $_SESSION['message']= "Bienvenue, Vous etes connecté autant qu'Agent ";
        header("Location: index_ag.php");
        exit(0);

    }else{
        $_SESSION['message']= "Invalid Email ou Password";
        header("Location: login_ag.php");
        exit(0);
    }    
}

?>

