<?php
session_start();
include('admin/config/dbcon.php');
if(isset($_POST['add_cons'])){   
    
    $id_cl = $_SESSION['id_cl']; 

    $index_compteur = $_POST['index_compteur'];
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];
    $etat_cons = 'nonpaye';
    $image = $_FILES['image']['name'];//rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename= time().'.'.$image_extension;

    //Si la consommation 1er fois est anterieur a la date l'adhesion
    $req = mysqli_query($con, "SELECT date_abonnement FROM clients WHERE id_cl = '$id_cl'");
    $res = mysqli_fetch_assoc($req);
    $date_adhesion  = $res['date_abonnement'];

    $mois2 = date("m", strtotime($date_adhesion)); 
    $annee2 =  date("Y", strtotime($date_adhesion)); 

    echo $mois2; 
    echo "  ";
    echo $annee2;
    echo "  ";
    echo $mois;
    echo "  ";
    echo $annee;

    if ($annee == $annee2){
        if($mois== $mois2){
             echo "les mois sont egaux"; echo "  ";
        }
        elseif($mois < $mois2){
            echo "mois 2 supperieur"; echo "  ";

        }
        elseif($mois > $mois2){
            echo "mois 2 Inferieur"; echo "  ";

        }

        echo "annnee  egaux"; echo "  ";
        
       
    }

    if ($annee > $annee2){
      
        if($mois== $mois2){
            echo "les mois sont egaux"; echo "  ";
       }
       elseif($mois < $mois2){
           echo "mois 2 supperieur"; echo "  ";

       }
       elseif($mois > $mois2){
           echo "mois 2 Inferieur"; echo "  ";

       }

        echo "annee1 est superieur";
    }

    if ($annee < $annee2){
        if($mois== $mois2){
            echo "les mois sont egaux"; echo "  ";
       }
       elseif($mois < $mois2){
           echo "mois 2 supperieur"; echo "  ";

       }
       elseif($mois > $mois2){
           echo "mois 2 Inferieur"; echo "  ";

       }

        echo "annee2 est superieur";
    }

    /*
    if( ($annee < $annee2))
    {
        $_SESSION['message'] = "Impossible d'entree cette date, car elle est anterieur a votre date d'abonnement";
        header('Location: consom_view.php');
        exit(0);
    }
    elseif($annee = $annee2){
        //Si la consommation est saisie pour la premoere fois apres adhesion 
        if( $mois < $mois2  ) {
            $_SESSION['message'] = "Probleme anterieur Mois meme annee";
            header('Location: consom_view.php');
            exit(0);
        }
       
        else{
            if(($mois - $mois) == 1){
                $_SESSION['message'] = "C'est bon 1 er facture";
                header('Location: consom_view.php');
                exit(0);
            }
            else{

                $sql= "SELECT index_compteur FROM consommations WHERE id_cl='$id_cl' AND mois=('$mois'-1) AND annee='$annee' ";
                $sql_run = mysqli_query($con, $sql);

                if(mysqli_num_rows($sql_run)>0){
                    $row = mysqli_fetch_assoc($sql_run);
                    $ancien_index = $row["index_compteur"];
                    
                    $nv_ind = $index_compteur;
                    $quantite = $nv_ind - $ancien_index;
                
                    //Remplir table consommations
                    if(($quantite)>=50 && ($quantite)<=400){
                        $etat_cons='Verifiee';
                    }else{
                        $etat_cons='En attente';
                    }

                    $query = "INSERT INTO consommations (index_compteur, mois, annee, etat_cons, image,  id_cl) 
                        VALUES ('$index_compteur', '$mois', '$annee', '$etat_cons', '$filename', '$id_cl' ) ";

                    $query_run = mysqli_query($con, $query);

                    //remplir table factures 
                    $id_consommation = mysqli_insert_id($con);

                    $etat= 'Non payee';
                    $id_fr = 1;

                    if($quantite<=100){
                        $montant_ht = $quantite * 0.91;
                    }elseif($quantite>=101 && $quantite<=200){
                        $montant_ht = $quantite * 1.01;
                    }elseif($quantite>=201){
                        $montant_ht = $quantite * 1.12;
                    }
                    $montant_taxes= $montant_ht * 0.14; 
                    $montant_ttc = $montant_ht + $montant_taxes;

                    if(($quantite)>=50 && ($quantite)<=400){
                        if($mois == "12"){
                            $sql = "SELECT SUM(quantite) as total FROM clients, factures, consommations
                                    WHERE clients.id_cl='$id_cl' AND  annee='$annee' AND mois<>'12'
                                    AND clients.id_cl = consommations.id_cl AND factures.id_consommation= consommations.id_consommation 
                                    "; 

                            $resultat1 =  mysqli_query($con, $sql); 
                            $row = mysqli_fetch_assoc($resultat1);
                            $total = $row['total'] + $quantite ;

                            $query3 = "INSERT INTO factures (montant_ht, montant_taxes, montant_ttc, quantite, etat, id_cl, id_fr, id_consommation, cons_par_annee) 
                                        VALUES('$montant_ht', '$montant_taxes', '$montant_ttc', '$quantite', '$etat', '$id_cl', '$id_fr','$id_consommation', '{$total}' )"; 

                            $query3_run = mysqli_query($con, $query3); 
                        }

                        else{
                            $query2 = "INSERT INTO factures (montant_ht, montant_taxes, montant_ttc, quantite, etat, id_cl, id_fr, id_consommation)
                                        VALUES('$montant_ht', '$montant_taxes', '$montant_ttc', '$quantite', '$etat', '$id_cl', '$id_fr','$id_consommation')";
                            $query2_run = mysqli_query($con, $query2);
                        }
                
                        
                        
                    }
                
                
                    if($query_run){
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/IMGcompteurs/'.$filename);

                        if(($quantite)>=50 && ($quantite)<=400){
                            $_SESSION['message'] = "Consommation est ajouter avec succes. Veuillez consulter votre facture. ".$cons_annee ."kwh";    
                            header('Location: consom_view.php'); 
                            exit(0);
                        }else{
                            $_SESSION['message'] = "Consommation est a l'attente de l'approuvation ! ";
                            header('Location: consom_view.php');
                            exit(0);
                        }
                    }  
                    else{
                        $_SESSION['message'] = "Something went wrong"; 
                        header('Location: consom_view.php');
                        exit(0);
                    }   
                }
                else{
                    $_SESSION['message'] = "Ancien consommation Introuvable"; 
                    header('Location: consom_view.php');
                    exit(0);
                }

            }
            

        }

         
    } 


    else{
        $_SESSION['message'] = "c'est bien";
        header('Location: consom_view.php');
        exit(0);

    }
    */

}

?>