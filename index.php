<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        include('./nonMembre/lib/php/nmliste_include.php');
    }
    else {
        include('./admin/lib/php/liste_include.php');
    }
    $db = Connexion::getInstance($dsn,$user,$pass);
    /*if($db){
        print"connexion ok";
    }*/
    
    
    $scripts = array();
    $i=0;
    foreach(glob('./admin/lib/js/jquery/*.js')as $js){
        $fichierJs[$i] = $js;
        $i++;
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Comics online</title>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/style.css"/>
        <?php
            foreach($fichierJs as $js){
        ?>
        <script type="text/javascript" src="<?php print $js; ?>"></script>
        <?php
            }
        ?>
        <script type="text/javascript" src="./admin/lib/js/fonctionsJqueryInscription.js"></script>
        <script type="text/javascript" src="./admin/lib/js/fonctionsJqueryAdmin.js"></script>
        <script type="text/javascript" src="./admin/lib/js/fonctionsJqueryProduit.js"></script> 
    </head>
    <body>
        <div id="page">
            <header>
                <h1>Bienvenue dans le magasin!!</h1>
                <p>
                <?php
                    if(isset($_SESSION['admin'])){
                        print "Bienvenue ".$_SESSION['nom']." ".$_SESSION['prenom'];
                    }
                    
                ?>
                </p>
            </header> 
            <section id="menu">
                <nav>
                    <?php
                        if(!isset($_SESSION['admin'])){
                            if(file_exists('./nonMembre/pages/menu_nm.php')){
                                include('./nonMembre/pages/menu_nm.php');
                            }
                        }
                        else{
                            if(file_exists('./membre/pages/menu_m.php')){
                                include('/membre/pages/menu_m.php');
                            }
                        }
                    ?>
                </nav>
            </section>
            <section id="contenu">
                <nav>
                    
                    <?php
                        
                        if(!isset($_SESSION['admin'])){
                            if(!isset($_SESSION['page'])){
                                $_SESSION['page'] = "accueil_nm";
                            }
                            if(isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                            }
                            $chemin = './nonMembre/pages/'.$_SESSION['page'].'.php';
                            if(file_exists($chemin)) {
                                include($chemin);
                            }
                        }
                        else {
                            if(!isset($_SESSION['page'])){
                                $_SESSION['page'] = "accueil_m";
                            }
                            if(isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                            }
                            $chemin = './membre/pages/'.$_SESSION['page'].'.php';
                            if(file_exists($chemin)) {
                                include($chemin);
                            }
                        }
                    ?>
                </nav>
            </section>
            <footer>
                webmaster : Kievits Amory Contact : amorykievits@hotmail.com
            </footer>
        </div>
    </body>
</html>
