<?php
    class inscription_manager extends inscription {
        private $db;
        private $_inscriptionArray = array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        function Insert_user($nom,$prenom,$mail,$rue,$num_rue,$ville,$cp,$pays,$password) {
            try{
                $query="select insert_user(:nom,:prenom,:mail,:rue,:num_rue,:ville,:cp,:pays,:password)as retour";
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':nom',$_POST['nom']);
                $sql->bindValue(':prenom',$_POST['prenom']);
                $sql->bindValue(':mail',$_POST['mail']);
                $sql->bindValue(':rue',$_POST['rue']);
                $sql->bindValue(':num_rue',$_POST['num_rue']);
                $sql->bindValue(':ville',$_POST['ville']);
                $sql->bindValue(':cp',$_POST['cp']);
                $sql->bindValue(':pays',$_POST['pays']);
                $sql->bindValue(':password',$_POST['password']);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
            return $retour;
        }
    }
?>