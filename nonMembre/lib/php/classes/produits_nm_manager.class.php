<?php
    class produits_nm_manager extends Produits_nm {
        private $_db;
        private $_produitsArray=array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        public function getListeProduit_nm($id_form) {
            $query="select * from produits where id_format = :id_form";
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(1,$id_form,PDO::PARAM_INT);
            $resultset->execute();

            $nbr=$resultset->rowCount();
            while($data = $resultset->fetch()) {
                $_produitsArray[] = new Produits_nm($data);
            }
            return $_produitsArray;
        }
        
        public function getProduit_m($id_prod) {
            $query="select * from produits where id_prod = :id_prod";
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(1,$id_prod,PDO::PARAM_INT);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Produits_nm($data);
            }
            return $_produitsArray;
        }
        
     
    }
