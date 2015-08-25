<?php
session_start();
header('Content-Type: application/json');
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/authentification.class.php';
require '../classes/utilisateur.class.php';
require '../classes/utilisateur_manager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{    
    $mg = new Authentification($db);
    $retour=$mg->isUser($_POST['mail'],$_POST['password']);
    if($retour==2) {
        $_SESSION['admin']=1;
        $_SESSION['page']="accueil_m";
        $mg2 = new utilisateur_manager($db);
        $liste = $mg2->getUser($_POST['mail'],$_POST['password']);
        $_SESSION['nom'] = $liste[0]->nom;
        $_SESSION['prenom'] = $liste[0]->prenom; 
        $_SESSION['id_utilisateur'] = $liste[0]->id_utilisateur;
    }
    print json_encode(array("retour" => $retour)); 
}
catch(PDOException $e){
	print "Echec de la connexion".$e;
}

?>