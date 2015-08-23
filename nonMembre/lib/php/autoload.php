<?php
function autoload($nom_classe) {
    if(file_exists('./nonMembre/lib/php/classes/'.$nom_classe.'.class.php')) {
        require './nonMembre/lib/php/classes/'.$nom_classe.'.class.php';
    }    
}

spl_autoload_register('autoload');

?>

