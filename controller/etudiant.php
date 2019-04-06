<?php
    class Etudiant{
        private $_db;

        public function __construct($db){
            $this->_db = $db;
        }

        public function ajouterEtudiant($user_id){
            if($this->attributionVerify($user_id)){
                return false;
            }
            $etudiant = $this->_db->prepare("INSERT INTO Etudiant(user_id) VALUES(?)");
            $etudiant->execute(Array($user_id));
            if($etudiant->rowCount()>0){
                return 1;
            }
            else{
                return 0;
            }
        }

        public function etudiant_filiere_ecue(){
            $ecues = $this->_db->prepare("SELECT * FROM Ecue WHERE filiere_id=? ORDER BY nom_ecue ASC");
            $ecues->execute(Array($_SESSION['filiere_id']));
            return $ecues;
        }

        public function attributionVerify($user_id){
            $verif = $this->_db->query("SELECT * FROM Etudiant WHERE user_id = '".$user_id."'");
            if($verif->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>