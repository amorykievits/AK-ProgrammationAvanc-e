<?php
    class utilisateur_manager extends utilisateur {
        private $_db;
        private $_userArray=array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        
        public function getUser($mail,$password) {
        $query="select * from utilisateur where mail = :mail and password = :password";
        $resultset = $this->_db->prepare($query);
        $resultset->bindvalue(1,$mail,PDO::PARAM_STR);
        $resultset->bindvalue(2,$password,PDO::PARAM_STR);
        $resultset->execute();
        
        $nbr=$resultset->rowCount();
            while($data = $resultset->fetch()) {
                $_userArray[] = new utilisateur($data);
            }
            return $_userArray;
    }
    }
?>