<?php
    include './nonmembre/lib/php/classes/produits_nm.class.php';
    include './nonmembre/lib/php/classes/produits_nm_manager.class.php';
    include './membre/lib/php/classes/facture.class.php';
    include './membre/lib/php/classes/facture_manager.class.php';
    
        
    $mg = new produits_nm_manager($db);
    $mg3 = new facture_manager($db);
    if(!isset($_SESSION['valeur'])) {
        $_SESSION['valeur']="default";
        $_SESSION['lignedf']=0;
    }

    if(isset($_GET['valeur'])) {
        $_SESSION['valeur'] = $_GET['valeur'];
    }
    //print $_SESSION['valeur'];
    $_SESSION['choix'] = "default";  
?>
<h2>Nouvelle commande</h2>
<div id="table_newfacture_m">
    <?php
    if($_SESSION['valeur']=="default"){
    ?>
    <h1><?php if(isset($_SESSION['test'])){
                print "Commande n°".$_SESSION['test'];
    }
    ?></h1>
    <table>
        <thead>
            <th id="tablethlnf">
                Ligne        
            </th>
            <th id="tablethprnf">
                Titre
            </th>
            <th id="tablethqnf">
                Quantité
            </th>
            <th id="tablethpxnf">
                Prix
            </th>
        </thead>
        <tbody>
            <?php
                if($_SESSION['lignedf']!=0){
                    $liste = $mg3->getDetailFacture($_SESSION['test']);
                    $nbr = count($liste);
                    $total=0;
                    for($i=0;$i<$nbr;$i++){
                        $total=$total+(($liste[$i]->quantite)*($liste[$i]->prix));
                
            ?>
            <tr>
                <td>
                    <?php print $i+1;?>
                </td>
                <td>
                    <?php print $liste[$i]->titre;?>
                </td>
                <td>
                    <?php print $liste[$i]->quantite;?>
                </td>
                <td>
                    <?php print $liste[$i]->prix;
                    }
                }
                    ?>
                </td>
            </tr>
            <tr><td colspan ="4"><a href="index.php?page=achat_m&valeur=ajout">Ajouter</a></td></tr>
        </tbody>
    </table>
    <?php
        if($_SESSION['lignedf']!=0){
    ?>
    <table>
        <td width="10%"><a href="index.php?page=validation_commande&test=<?php print $_SESSION['test'];;?>">Valider</a>             
        <td width="75%"><a href="index.php?page=annuler_commande&<?php print $_SESSION['test'];?>">Annuler</a></td>
        <td width="15%">Total: <?php if($_SESSION['lignedf']!=0){print $total;}else{print 0;}?> €</td>
    </table>
    <?php
        }
    }
    ?>
    <?php
        if($_SESSION['valeur']=="ajout"){
            //$_SESSION['valeur']="default";
            if(!isset($_SESSION['choix'])){
            $_SESSION['choix'] = "default";            
            }
            //print $_SESSION['choix'];
            if(isset($_GET['choix'])) {
                $_SESSION['choix'] = $_GET['choix'];
                /*print $_SESSION['choix'];
                print "passe par ici";*/
            }
            if($_SESSION['choix']=="default"){
            ?>
    <div id="choix">
    <ul>
        <li><a href="index.php?page=achat_m&choix=tpb">Paperback</a></li>
        <li><a href="index.php?page=achat_m&choix=hc">Hardcover</a></li>
    </ul>
</div>
<div id="table_default">
    <table>
        <tr>
            <td>
                <img src="./admin/images/fruit_produit_nm.jpg" alt="tpb" />
            </td>
            <td>
                <img src="./admin/images/legume_produit_nm.jpg" alt="hc" />
            </td>
        </tr>
    </table>
</div>

        <?php
        }
        if($_SESSION['choix']=="tpb"){
            $liste = $mg->getListeProduit_nm(1);
            $nbr = count($liste);
            $_SESSION['choix']="default";
            
            ?>
<div id="table_produit_nm">
    <?php
        for($i=0;$i<$nbr;$i++){
    ?>
        <table>
        <tr>
            <td rowspan="3">
                    <a href="index.php?valeur=detail&prod=<?php print $liste[$i]->id_prod;?>"><img src="./admin/images/<?php print $liste[$i]->titre;?>.jpg" alt="<?php print $liste[$i]->titre;?>"/></a>
            </td>
            <td>Titre: 
                <?php
                    print $liste[$i]->titre;
                ?>
            </td>
        </tr>
        <tr>
            <td>Auteur:
                <?php
                    print $liste[$i]->auteur;
                ?>
            </td>
        </tr>
        <tr>
            <td>Editeur:
                <?php
                    print $liste[$i]->editeur;
                ?>
            </td>
        </tr>
        <tr>
            <td>Catégorie: Paperback
            </td>
        </tr>
        <tr>
            <td>Stock: 
                <?php
                    print $liste[$i]->stock;
                ?>
            </td>
        </tr>
        <tr>
            <td>Prix:
                <?php
                    print $liste[$i]->prix;
                ?>
                euros
            </td>
        </tr>
    </table>
    <?php
            }
    ?>
    
</div>
    <?php
    }
    if($_SESSION['choix']=="hc"){
            $liste = $mg->getListeProduit_nm(2);
            $nbr = count($liste);
            $_SESSION['choix']="default";
            ?>
<div id="table_produit_nm">
    <table>
    <?php
        for($i=0;$i<$nbr;$i++){
    ?>
    
        <tr>
            <td rowspan="3">
                    <a href="index.php?valeur=detail&prod=<?php print $liste[$i]->id_prod;?>"><img src="./admin/images/<?php print $liste[$i]->titre;?>.jpg" alt="<?php print $liste[$i]->titre;?>"/></a>
            </td>
            <td>Titre: 
                <?php
                    print $liste[$i]->titre;
                ?>
            </td>
        </tr>
        <tr>
            <td>Auteur:
                <?php
                    print $liste[$i]->auteur;
                ?>
            </td>
        </tr>
        <tr>
            <td>Editeur:
                <?php
                    print $liste[$i]->editeur;
                ?>
            </td>
        </tr>
        <tr>
            <td>Catégorie: Hardback
            </td>
        </tr>
        <tr>
            <td>Stock: 
                <?php
                    print $liste[$i]->stock;
                ?>
            </td>
        </tr>
        <tr>
            <td>Prix:
                <?php
                    print $liste[$i]->prix;
                ?>
                euros
            </td>
        </tr>   
    
    <?php
            }
        } 
        ?>
        </table>
        <?php
        }
        if($_SESSION['valeur']=="detail"){
            include('./membre/pages/detail_produit.php');
            $_SESSION['valeur']="default";
        }
    ?>
</div>
