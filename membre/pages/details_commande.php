<?php
    if(isset($_GET['fac'])) {
        $_SESSION['fac'] = $_GET['fac'];
    }
    include './membre/lib/php/classes/facture.class.php';
    include './membre/lib/php/classes/facture_manager.class.php';
    $mg=new facture_manager($db);
    $liste=$mg->getDetailFacture($_SESSION['fac']);
    $nbr=count($liste);
    ?>
<h1><?php print "Facture n°".$_SESSION['fac'];?></h1>
<div id="table_facture_detail">
    <table width="100%">
        <tr>
            <th>
                Ligne
            </th>
            <th>
                Titre
            </th>
            <th>
                Prix
            </th>
            <th>
                Quantite
            </th>
        </tr>
        <?php
            $total=0;
            for($i=0;$i<$nbr;$i++){
                $total=$total+(($liste[$i]->prix)*($liste[$i]->quantite));
        ?>
        <tr>
            <td width="15%">
                <?php print ($i+1);?>
            </td>
            <td width="55%">
                <?php print $liste[$i]->titre;?>
            </td>
            <td width="15%">
                <?php print $liste[$i]->prix;?>
            </td>
            <td width="15%">
                <?php print $liste[$i]->quantite;?>
            </td>
        </tr>
            <?php } ?>
    </table>
    <p><?php print "<h1>Total: ".$total."</h1>";?></p>
</div>

