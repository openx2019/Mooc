<?php
    class Filiere{
        private $_db;

        public function __construct($db){
            $this->_db = $db;
        }

        public function getFilieres(){
            $filieres = $this->_db->query("SELECT * FROM Filiere");
            return $filieres;
        }

        public function getFiliere($id){
            $filiere = $this->_db->query("SELECT * FROM Filiere WHERE id= '".$id."'");
            $donnees = $filiere->fetch();
            return $donnees;
        }
    }
?>