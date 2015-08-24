<h2> Liste des produits </h2>
<?php
    $mg = new Produits_nm_manager($db);  
?>
<div id="choix">
    <ul>
        <li><a href="index.php?choix=tpb">Paperback</a></li>
        <li><a href="index.php?choix=hc">Hardcover</a></li>
    </ul>
</div>

    <?php
        if(!isset($_SESSION['choix'])){
            $_SESSION['choix'] = "default";            
        }
        
        if(isset($_GET['choix'])) {
            $_SESSION['choix'] = $_GET['choix'];
            
        }
        if($_SESSION['choix']=="default"){
            ?>
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
                    <img src="./admin/images/<?php print $liste[$i]->titre;?>.jpg" alt="<?php print $liste[$i]->titre;?>"/>
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
    <?php
        for($i=0;$i<$nbr;$i++){
    ?>
    <table>
        <tr>
            <td rowspan="3">
                    <img src="./admin/images/<?php print $liste[$i]->titre;?>.jpg" alt="<?php print $liste[$i]->titre;?>"/>
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
            <td>Catégorie: Hardcover
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
?>






