<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['login_btn'])){
    $email_cl = mysqli_real_escape_string($con,$_POST['email_cl']);
    $passwd_cl = mysqli_real_escape_string($con,$_POST['passwd_cl']);

    $login_query = "SELECT * FROM clients WHERE email_cl = '$email_cl' AND passwd_cl ='$passwd_cl' LIMIT 1  ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0){
  
        $_SESSION['auth'] = true;

        $row = mysqli_fetch_assoc($login_query_run);

        $_SESSION['id_cl'] = $row['id_cl'];
        
        $_SESSION['message']= "You are Login In";
        header("Location: index.php");
        exit(0);

    }else{
        $_SESSION['message']= "Invalid Email or Password";
        header("Location: login.php");
        exit(0);
    }
    
}else{
    $_SESSION['message']= "You are not allowed to access this file";
    header("Location: login.php");
    exit(0);
}

?>