<?php
function autoload($nom_classe) {
    if(file_exists('./nonmembre/lib/php/classes/'.$nom_classe.'.class.php')) {
        require './nonmembre/lib/php/classes/'.$nom_classe.'.class.php';
    }    
}

spl_autoload_register('autoload');

?>

