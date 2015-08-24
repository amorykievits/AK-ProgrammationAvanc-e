<?php
    session_start();
    header('Content-Type: application/json');
    
    require './liste_include_ajax.php';
    require '../classes/connexion.class.php';
    require '../classes/inscription.class.php';
    require '../classes/inscription_manager.class.php';
    
    $db = Connexion::getInstance($dsn,$user,$pass);
    
    try{
        $mg = new inscription_manager($db);
        $retour=$mg->Insert_user($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['rue'],$_POST['num_rue'],$_POST['ville'],$_POST['cp'],$_POST['pays'],$_POST['password']);
        if($retour==1){
            $_SESSION['page']="accueil_nm";
        }
        print json_encode(array("retour" => $retour));
        
    } catch (PDOException $e) {
        print "Echec de la connexion ".$e;
    }
?>

