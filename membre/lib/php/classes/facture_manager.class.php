<?php
    class facture_manager extends facture {
        private $_db;
        private $_produitsArray=array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        public function getDetailFacture($id_facture) {
            $query="select detail_facture.quantite,produits.prix,produits.titre,produits.id_prod, detail_facture.id_facture from detail_facture,produits where detail_facture.id_facture=:idfacture and detail_facture.id_prod=produits.id_prod";
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(1,$id_facture,PDO::PARAM_INT);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Facture($data);
            }
            return $_produitsArray;
            
        }
        
        
        public function DeleteDetailFacture($id_prod,$id_facture){
            try{
                $query="select delete_detail(:id_facture,:id_prod) as retour";
                $prod=$id_prod;
                $fact=$id_facture;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':id_prod',$prod);
                $sql->bindValue(':id_facture',$fact);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {
                print $ex->getMessage();
            }
            return $retour;
        }
        
        public function DeleteFacture($id_facture){
            try{
                $query="select delete_facture(:id_facture) as retour";
                $fact=$id_facture;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':id_facture',$fact);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {
                print $ex->getMessage();
            }
            return $retour;
        }
        public function getFacture($id_utilisateur){
            $query="select * from facture where id_utilisateur=:id_utilisateur";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':id_utilisateur',$id_utilisateur);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Facture($data);
            }
            return $_produitsArray;
        }
    }
