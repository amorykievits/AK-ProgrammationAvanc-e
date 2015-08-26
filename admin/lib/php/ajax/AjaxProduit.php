<?php

session_start();
header('Content-Type: application/json');
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/produits_m.class.php';
require '../classes/produits_m_manager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);
try {
    $mg = new produits_m_manager($db);
    if($_SESSION['lignedf']==0) {
        $_SESSION['test']=$mg->addFacture($_POST['id_utilisateur']);
        $_SESSION['lignedf']=1;
    }
    if($_SESSION['test']!=0){
        $retour=$mg->addDetail($_SESSION['test'],$_POST['id_prod'],$_POST['quantite']);
        if($retour!=0){
            $_SESSION['choix']="default";
            $_SESSION['valeur']="default";
        }
        else {
            $_SESSION['choix']="default";
        }
    }
    print json_encode(array("retour" => $retour));
} catch (PDOException $e) {
    print "Echec de la connexion".$e;
}
