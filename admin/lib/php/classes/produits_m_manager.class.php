<?php
    class produits_m_manager extends produits_m {
        private $db;
        private $_produitArray = array();
        
        public function __construct($db) {
            $this->_db=$db;
        }
        
        function addFacture($id_utilisateur) {
            try{
                $query="select insert_facture(:id_utilisateur) as retour";
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':id_utilisateur',$id_utilisateur);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {

            }
            return $retour;
        }
         
         function addDetail($id_facture,$id_prod,$quantite) {
             try{
                 $query="select insert_detail(:id_facture,:id_prod,:quantite) as retour";
                 $sql=$this->_db->prepare($query);
                 $sql->bindValue(':id_facture',$id_facture);
                 $sql->bindValue(':id_prod',$id_prod);
                 $sql->bindValue(':quantite',$quantite);
                 $sql->execute();
                 $retour=$sql->fetchColumn(0);
             } catch (Exception $ex) {

             }
             return $retour;
         }
    }
?>

