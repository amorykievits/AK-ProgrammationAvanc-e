<?php
    if(isset($_GET['test'])){
        $_SESSION['test']=$_GET['test'];
    }
    include './membre/lib/php/classes/facture.class.php';
    include './membre/lib/php/classes/facture_manager.class.php';
    $mg=new facture_manager($db);
    $liste=$mg->getDetailFacture($_SESSION['test']);
    $nbr=count($liste);
    $flag=true;
    $i=0;
    while($i<$nbr && $flag==true){
        $id_prod=$liste[$i]->id_prod;
        $id_facture=$_SESSION['test'];
        $retour=$mg->DeleteDetailFacture($id_prod,$id_facture);
        $i++;
        print $retour;
        if($retour==1){
            $flag=true;
        }
        else{
            $flag=false;
        }
    }
    if($flag==true){
        $retour=$mg->DeleteFacture($id_facture);
        if($retour==1){
            $flag=true;
            print "<h1>Commande annulée</h1>";
            $_SESSION['lignedf']=0;
            $_SESSION['test']=null;
        }
        else{
            $flag=false;
        }
        
    }
?>
