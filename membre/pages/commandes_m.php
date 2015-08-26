<?php

    include './membre/lib/php/classes/facture.class.php';
    include './membre/lib/php/classes/facture_manager.class.php';
    $mg=new facture_manager($db);
    $liste=$mg->getFacture($_SESSION['id_utilisateur']);
    $nbr=count($liste);
    ?>
<div id="table_facture_m">
<table>
    <?php
    for($i=0;$i<$nbr;$i++){
        ?>
    <tr>
        <td>
            Numéro de commande: <?php print $liste[$i]->id_facture; ?>
        </td>
        <td>
            Date: <?php print $liste[$i]->date; ?>
        </td>
        <td>
            <a href="index.php?page=details_commande&fac=<?php print $liste[$i]->id_facture;?>">Détails de la commande</a>
        </td>
    </tr>
    
        <?php
    }
    ?>
</table>
</div>


    
