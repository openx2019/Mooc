<?php
    class Ecue{
        private $_db;

        public function __construct($db){
            $this->_db = $db;
        }

        public function getEcues(){
            $ecues = $this->_db->query("SELECT * FROM Ecue");
            return $ecues;
        }

        public function getEcue($ecue_id){
            $ecues = $this->_db->query("SELECT * FROM Ecue WHERE id = '".$ecue_id."'");
            return $ecues->fetch();
        }

        public function setEcue(){
            $insert = $this->_db->prepare("INSERT INTO Ecue() VALUES()");
        }

        public function ecue_filiere($filiere_id){
            $ecues = $this->_db->query("SELECT * FROM Ecue WHERE filiere_id = '".$filiere_id."'");
            return $ecues;
        }

        public function ecues_tuteur($tuteur_id){
            $ecues = $this->_db->query("SELECT * FROM Ecue WHERE tuteur_id = '".$tuteur_id."'");
            return $ecues;
        }

        public function ecue_tuteur($ecue_id, $tuteur_id){
            $verif = $this->_db->prepare("SELECT * FROM Ecue WHERE id = ? AND tuteur_id = ?");
            $verif->execute(Array($ecue_id, $tuteur_id));
            if($verif->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>