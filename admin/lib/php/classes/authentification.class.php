<?php

class Authentification {

    private $_db;
    private $_userArray=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    function isUser($mail,$password) {
        $retour=array();
		
        try {
			
            $query="select authentification(:mail,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':mail',$_POST['mail']); 
            $sql->bindValue(':password',$_POST['password']);
            $sql->execute();
              
            $retour = $sql->fetchColumn(0);   
        } catch(PDOException $e) {
            print "Echec de la requ&ecirc;te.".$e;
        }
        return $retour;
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
