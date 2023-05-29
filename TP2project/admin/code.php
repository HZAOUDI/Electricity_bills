<?php
session_start();
include('config/dbcon.php');


if(isset($_POST['update_cons'])){
    $cons_id = $_POST['cons_id'];
    
   
    $index_compteur = $_POST['index_compteur'];

    $query = "UPDATE consommations SET index_compteur='$index_compteur'
        WHERE id_consommation ='$cons_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message']= "Consommation est Modifier successfully";
        header('Location: validate_fac.php');
        exit(0);
    }

}

if(isset($_POST['valider'])){
    $cons_id = $_POST['valider'];

    $id_cl = $_SESSION['id_cl']; 

    $query = "UPDATE consommations SET etat_cons ='Verifiee' WHERE id_consommation ='$cons_id' ";
    $query_run = mysqli_query($con, $query);

    $sql = "SELECT * FROM consommations WHERE id_consommation='$cons_id' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $id_consommation = $row['id_consommation'];
    $index_compteur = $row['index_compteur'];

    $mois = $row['mois'];
    $annee = $row['annee'];
    $image = $row['image'];
    $etat_cons = $row['etat_cons'];
    
    $id_cl = $row['id_cl'];

    $sql2= "SELECT index_compteur FROM consommations WHERE id_cl='$id_cl' AND mois=('$mois'-1) AND annee='$annee' ";
    $sql2_run = mysqli_query($con, $sql2);

    if(mysqli_num_rows($sql2_run)>0){
        $row = mysqli_fetch_assoc($sql2_run);
        $ancien_index = $row["index_compteur"];
        $nv_ind = $index_compteur;
        $quantite = $nv_ind - $ancien_index;

        $etat= 'Non payee';
        $id_fr = 1;
        
        if($quantite<=100){
            $montant_ht = $quantite * 0.91;
        }elseif($quantite>=101 && $quantite<=200){
            $montant_ht = $quantite * 0.91;
        }elseif($quantite>=201){
            $montant_ht = $quantite * 1.12;
        }
        $montant_taxes= $montant_ht * 0.14; 
        $montant_ttc = $montant_ht + $montant_taxes;
        

        $query2 = "INSERT INTO factures (montant_ht, montant_taxes, montant_ttc, quantite, etat, id_cl, id_fr, id_consommation)
                                VALUES('$montant_ht', '$montant_taxes', '$montant_ttc', '$quantite', '$etat', '$id_cl', '$id_fr','$id_consommation')";
        $query2_run = mysqli_query($con, $query2);

        if($query_run){
            if($query2_run){
                $_SESSION['message'] = "la consommation est valider avec Successfully";
                header('Location: validate_fac.php');
                exit(0);
            }else{
                $_SESSION['message'] = "Something went wrong1";
                header('Location: validate_fac.php');
                exit(0);
            }
        }else{
            $_SESSION['message'] = "Something went wrong2";
            header('Location: validate_fac.php');
            exit(0);
        } 
        
    }else{
        $_SESSION['message'] = "Ancien consommation Introuvable"; 
        header('Location: validate_fac.php');
        exit(0);
    } 
    
}

if(isset($_POST['repondre'])){
    $rec_id = $_POST['rec_id'];
    $reponse = $_POST['reponse'];

    $query2 = "UPDATE reclamations SET reponse='$reponse' 
    WHERE id_rec ='$rec_id' ";
    $query2_run = mysqli_query($con, $query2);

    if($query2_run){
        $_SESSION['message']= "Reponse ajoute avec success";
        header('Location: view-nonrec.php');
        exit(0);
    } else{
        $_SESSION['message'] = "Something went wrong";
        header('Location: view-nonrec.php');
        exit(0);
    }        

}


if(isset($_POST['user_delete'])){
    $cl_id = $_POST['user_delete'];
    $query = "DELETE FROM clients WHERE id_cl ='$cl_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Client deleted Successfully";
        header('Location: view-register.php');
        exit(0);
    }else{
        $_SESSION['message'] = "Something went wrong";
        header('Location: view-register.php');
        exit(0);

    }
}

if(isset($_POST['add_client'])){
    $nom_cl = $_POST['nom_cl'];
    $prenom_cl = $_POST['prenom_cl'];
    $cin_cl = $_POST['cin_cl'];
    $adresse_cl = $_POST['adresse_cl'];
    $tel_cl = $_POST['tel_cl'];
    $email_cl = $_POST['email_cl'];
    $passwd_cl = $_POST['passwd_cl'];
    $id_zone = $_POST['id_zone'];

    $query = "INSERT INTO clients (nom_cl, prenom_cl, cin_cl, adresse_cl, tel_cl, email_cl, passwd_cl, id_zone) 
        VALUES ('$nom_cl', '$prenom_cl', '$cin_cl', '$adresse_cl', '$tel_cl', '$email_cl', '$passwd_cl', '$id_zone') ";

    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message'] = "Client added Successfully";
        header('Location: view-register.php');
        exit(0);
    }else{
        $_SESSION['message'] = "Something went wrong";
        header('Location: view-register.php');
        exit(0);

    }
}

if(isset($_POST['update_client'])){
    $cl_id = $_POST['cl_id'];
    $nom_cl = $_POST['nom_cl'];
    $prenom_cl = $_POST['prenom_cl'];
    $cin_cl = $_POST['cin_cl'];
    $adresse_cl = $_POST['adresse_cl'];
    $tel_cl = $_POST['tel_cl'];
    $email_cl = $_POST['email_cl'];
    $passwd_cl = $_POST['passwd_cl'];

    $query = "UPDATE clients SET nom_cl='$nom_cl', prenom_cl=' $prenom_cl', cin_cl='$cin_cl', adresse_cl= '$adresse_cl',tel_cl='$tel_cl', email_cl='$email_cl', passwd_cl='$passwd_cl'
        WHERE id_cl ='$cl_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message']= "Updated successfully";
        header('Location: view-register.php');
        exit(0);
    }

}

if(isset($_POST['logoutfr_btn'])){
    //session_destroy();
    
    unset($_SESSION['auth']);
    unset($_SESSION['id_fr']);
    $_SESSION['message'] ="Logged Out Successfully";
    header("Location: login.php");
    exit(0);
}
if(isset($_POST['logoutag_btn'])){
    //session_destroy();
    
    unset($_SESSION['auth_ag']);
    unset($_SESSION['id_ag']);
    $_SESSION['message'] ="Logged Out Successfully";
    header("Location: login_ag.php");
    exit(0);
}


if(isset($_POST["upload"])) {
    // Vérifier si le fichier a été sélectionné
    if(empty($_FILES["fileToUpload"]["name"])) {
        $_SESSION['message']= "Veuillez sélectionner un fichier à télécharger.";
        header('Location: index_ag.php');
        exit(0);
    }

    // Définir l'emplacement de stockage du fichier ET Définir le nom du fichier
    $target_dir = "assets/uploads/";
    $target_file = $target_dir ."Consommation_annuelle.txt";

    // Récupérer le contenu du fichier précédent
    $previous_content = file_get_contents($target_file);

    // Effacer le fichier précédent s'il existe
    if (file_exists($target_file)) {
        unlink($target_file);
    }

     // Récupérer l'extension du fichier
     $extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));

    // Vérifier si le fichier est bien de type txt
    if($extension != "txt") {
        $_SESSION['message']= "Seuls les fichiers de type txt sont autorisés.";
        header('Location: index_ag.php');
        exit(0);
    }

    // Déplacer le fichier téléchargé vers l'emplacement de stockage
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        // Ouvrir le fichier ET Ignorer les lignes précédentes
        $file = fopen($target_file, "r");
        $new_content = '';

        // Lire chaque ligne du fichier
        while(!feof($file)) {
            $line = fgets($file);
            if(strpos($previous_content, $line) === false && !empty($line)) {
                $new_content .= $line;
                // Séparer les données de chaque ligne
                $data = explode(",", $line);
                // Insérer les données dans la base de données
                $sql = "INSERT INTO cons_annuelles (idClient, Consommation, Annee, ID_ZoneGeog, Date_Saisie) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
                $sql_run = mysqli_query($con, $sql);
            }
        }
        fclose($file);

        // Ajouter les nouvelles lignes au fichier précédent
        file_put_contents($target_file, $previous_content . $new_content);


        $_SESSION['message']= "Vos donnees sont bien inserer dans la base donnee ";
        header('Location: index_ag.php');
        exit(0);
        
    } else {
        $_SESSION['message']= "Une erreur s'est produite lors du téléchargement du fichier.";
        header('Location: index_ag.php');
        exit(0);
    }

}


?>