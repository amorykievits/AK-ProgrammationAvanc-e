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
        
        public function UpdateDetailFacture($idproduit,$quantite){
            try{
                $query="select updateDetail(:idproduit,:quantite) as retour";
                $prod=$idproduit;
                $quant=$quantite;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':idproduit',$prod);
                $sql->bindValue(':quantite',$quant);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
            return $retour;
        }
        
        public function DeleteDetailFacture($idproduit,$idfacture){
            try{
                $query="select deleteDetail(:idproduit,:idfacture) as retour";
                $prod=$idproduit;
                $fact=$idfacture;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':idproduit',$prod);
                $sql->bindValue(':idfacture',$fact);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {
                print $e->getMessage();
            }
            return $retour;
        }
        
        public function DeleteFacture($idfacture){
            try{
                $query="select deleteFacture(:idfacture) as retour";
                $fact=$idfacture;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':idfacture',$fact);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {
                print $e->getMessage();
            }
            return $retour;
        }
        public function getFacture($iduser){
            $query="select * from facture where id_user=:iduser";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':iduser',$iduser);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Facture($data);
            }
            return $_produitsArray;
        }
    }
