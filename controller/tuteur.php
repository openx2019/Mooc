<?php

    include("../connexion.php");

    class Tuteur{
        public function __construct($db){
            $this->_db = $db;
        }

        public function setTuteur($user_id){
            $user = $this->_db->query("SELECT * FROM User WHERE id = '".$user_id."'");
            if($user->rowCount() > 0){
                // Verification sur le compte user n'est pas attribué à un tuteur, parent ou admin
                $tuteur = $this->_db->query("SELECT * FROM Tuteur WHERE user_id = '".$user_id."'");
                $admin = $this->_db->query("SELECT * FROM Admin WHERE user_id = '".$user_id."'");
                $etudiant = $this->_db->query("SELECT * FROM Etudiant WHERE user_id = '".$user_id."'");
                if( $tuteur->rowCount() > 0 || $admin->rowCount() > 0 || $etudiant->rowCount() > 0 ){
                    return 0; // Si le compte est deja attribué, on retour 0.
                }
                else{
                    $insert = $this->_db->prepare("INSERT INTO Tuteur(user_id) VALUES(?)");
                    $insert->execute(Array($user_id));
                    if($insert->rowCount() > 0){
                        return 1; // Le compte vient d'etre attribué
                    }
                    else{
                        return 2; // Le compte n'a pas pu etre attribué.
                    }
                }
                
                
                
            }
            else{
                return "Pas de compte"; // Le compte user n'existe pas !!!
            }
        }

        public function getTuteurs(){
            $tuteurs = $this->_db->query("SELECT * FROM User WHERE type_user = '2' ");
            return $tuteurs;
        }

        public function getTuteur($id){
            $tuteur = $this->_db->query("SELECT * FROM User WHERE id = '".$id."' AND type_user = '2'");
            return $tuteur;
        }


    }

    $tuteur = new Tuteur($db);
    echo $tuteur->setTuteur(9);
?>