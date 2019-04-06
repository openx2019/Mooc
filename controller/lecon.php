<?php
    class Lecon{
        private $_db;

        public function __construct($db){
            $this->_db = $db;
        }

        public function ecue_lecon($ecue_id){
            $lecons = $this->_db->query("SELECT * FROM Lecon WHERE ecue_id = '".$ecue_id."'");
            return $lecons;
        }

        public function new_lecon($titre, $contenu, $ecue_id, $tuteur_id){
            $lecon = $this->_db->prepare("INSERT INTO Lecon(titre, contenu, ecue_id, date_ajout, nmbre_vu, nmbre_j_aime, auteur) VALUES(?,?,?,NOW(),0,0, ?)");
            $lecon->execute(Array($titre, $contenu, $ecue_id, $tuteur_id));
            if($lecon->rowCount()>0){
                return $ecue_id;
            }
            else{
                return false;
            }
        }

        public function removeLesson($lecon_id){
            $lecon = $this->_db->query("DELETE FROM Lecon WHERE id = '".$lecon_id."'");
            if($lecon->rowCount()){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>