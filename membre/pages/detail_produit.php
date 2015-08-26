<?php
    
    $mg = new produits_nm_manager($db);
    //print $_GET['prod'];
    if(isset($_GET['prod'])){
        $_SESSION['prod'] = $_GET['prod'];
        $liste = $mg->getProduit_m($_SESSION['prod']);
    }
?>
<h1>Description du comic</h1>
<div id="table_detail_produit">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_produit">
    <input type="hidden" id="id_utilisateur" name="id_utilisateur" value="<?php print $_SESSION['id_utilisateur']; ?>"/>
    <input type="hidden" id="prix" name="prix" value="<?php print $liste[0]->prix;?>"/>
    <input type="hidden" id="id_prod" name="id_prod" value="<?php print $liste[0]->id_prod;?>"/>
    <table>   
        <tr>
            <td rowspan="5">
                <img src="./admin/images/<?php print $liste[0]->titre;?>.jpg" alt="<?php print $liste[0]->titre;?>"/>
            </td>
            <td>Titre: 
                <?php
                    print $liste[0]->titre;
                ?>
            </td>
        </tr>
        <tr>
            <td>Auteur:
                <?php
                    print $liste[0]->auteur;
                ?>
            </td>
        </tr>
        <tr>
            <td>Editeur:
                <?php
                    print $liste[0]->editeur;
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
                    print $liste[0]->stock;
                ?>
            </td>
        </tr>
        <tr>
            <td>Prix:
                <?php
                    print $liste[0]->prix;
                ?>
                euros
            </td>
        </tr>
        <tr>
            <td>Quantité: <input type="number" id="quantite" name="quantite"/> </td>
        </tr>
        <tr>
            <td><input type="submit" id="submit_produit" name="<?php print $liste[0]->id_prod;?>" value="Ajouter à la commande"/> </td>
        </tr> 
        </table>
</form>
</div>

