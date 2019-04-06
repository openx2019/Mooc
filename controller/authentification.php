<?php

    class Auth
    {
        // Database and table name
        private $_db;
        private $table_name = "User";

        // Object properties
        private $id;
        private $nom;
        private $prenoms;
        private $telephone;
        private $sexe;
        private $email;
        private $password;
        private $cle;

        // Construct of class
        public function __construct($db){
            $this->_db = $db;
        }

        public function signUp($nom, $prenoms, $sexe, $telephone, $username, $email, $password)
        {
            if($this->isAlreadyExist($email)){
                return false;
            }
            else{
                $user = $this->_db->prepare("INSERT INTO ".$this->table_name."(nom, prenoms, sexe, telephone, username, email, password, date_creation, date_modification, is_active, cle) VALUES(?, ?, ?, ?,?, ?, ?, NOW(), NOW(), 0, ?)");
                // Faille SSX
                $this->nom = htmlspecialchars($nom);
                $this->prenoms = htmlspecialchars($prenoms);
                $this->sexe = htmlspecialchars($sexe);
                $this->telephone = htmlspecialchars($telephone);
                $this->email = htmlspecialchars($email);
                $this->password = password_hash($password, PASSWORD_BCRYPT);
                $this->cle = md5(microtime(TRUE)*100000);
    
                // Insertion
                $user->execute(Array($this->nom, $this->prenoms, $this->sexe, $this->telephone ,$this->email, $this->email,  $this->password, $this->cle));
                if($user->rowCount() > 0){
                    $this->id = $this->_db->lastInsertId();
                    return $this->id;
                }
                else{
                    return false;
                }
            }
        }

        public function signIn($username, $password)
        {
            $user = $this->_db->query("SELECT * FROM User WHERE username = '".$username."'");
            if($user->rowCount()>0){
                $auth = $user->fetch();
                if(password_verify($password, $auth['password']))
                {
                    // Si le compte appartient à un etudiant
                    if($auth['type_user'] == "1")
                    {
                        $online = $this->_db->prepare("UPDATE User SET online = ? WHERE username = ?");
                        $online->execute(Array(1, $username));
                        $etudiant = $this->_db->query("SELECT * FROM Etudiant WHERE user_id = '".$auth['id']."'");
                        if($etudiant->rowCount()>0)
                        {
                            $donnees = $etudiant->fetch();
                            $_SESSION['user_id'] = $auth['id'];
                            $_SESSION['nom'] = $auth['nom'];
                            $_SESSION['prenoms'] = $auth['prenoms'];
                            $_SESSION['nom_prenoms'] = $_SESSION['nom'] ." ". $_SESSION['prenoms'];
                            $_SESSION['sexe'] = $auth['sexe'];
                            $_SESSION['date_naissance'] = $auth['date_naissance'];
                            $_SESSION['lieu_naissance'] = $auth['lieu_naissance'];
                            $_SESSION['username'] = $auth['username'];
                            $_SESSION['email'] = $auth['email'];
                            $_SESSION['telephone'] = $auth['telephone'];
                            $_SESSION['avatar'] = $auth['avatar'];
                            $_SESSION['password'] = $auth['password'];
                            $_SESSION['biographie'] = $auth['biographie'];
                            $_SESSION['lieu_habitation'] = $auth['lieu_habitation'];
                            $_SESSION['facebook'] = $auth['facebook'];
                            $_SESSION['linkdin'] = $auth['linkdin'];
                            $_SESSION['twitter'] = $auth['twitter'];
                            $_SESSION['google'] = $auth['google'];
                            $_SESSION['etudiant_id'] = $donnees['id'];
                            $_SESSION['filiere_id'] = $donnees['filiere_id'];
                            $_SESSION['is_active'] = $auth['is_active'];
                            if($auth['is_active'] == 1){
                                header("Location: etudiant/accueil");
                            }
                            else{
                                if(!$auth['first_login']){
                                    $date = new DateTime();
                                    $now = $date->format('Y-m-d H:i:s');
                                    $update = $this->_db->prepare("UPDATE User SET first_login = ? WHERE username = ?");
                                    $update->execute(Array($now, $username));
                                    header("Location: etudiant/profil");
                                }
                                else{
                                    header("Location: etudiant/contraint");
                                }
                            }
                        }
                        else
                        {
                            
                        }
                    }
                    // Si le compte appartient à un encadreur
                    else if($auth['type_user'] == "2")
                    {
                        $online = $this->_db->prepare("UPDATE User SET online = ? WHERE username = ?");
                        $online->execute(Array(1, $username));
                        $encadreur = $this->_db->query("SELECT * FROM Tuteur WHERE user_id = '".$auth['id']."'");
                        if($encadreur->rowCount()>0)
                        {
                            $donnees = $encadreur->fetch();
                            $_SESSION['user_id'] = $auth['id'];
                            $_SESSION['is_active'] = $auth['is_active'];
                            $_SESSION['nom'] = $auth['nom'];
                            $_SESSION['prenoms'] = $auth['prenoms'];
                            $_SESSION['nom_prenoms'] = $_SESSION['nom'] ." ". $_SESSION['prenoms'];
                            $_SESSION['sexe'] = $auth['sexe'];
                            $_SESSION['date_naissance'] = $auth['date_naissance'];
                            $_SESSION['lieu_naissance'] = $auth['lieu_naissance'];
                            $_SESSION['username'] = $auth['username'];
                            $_SESSION['email'] = $auth['email'];
                            $_SESSION['telephone'] = $auth['telephone'];
                            $_SESSION['avatar'] = $auth['avatar'];
                            $_SESSION['password'] = $auth['password'];
                            $_SESSION['biographie'] = $auth['biographie'];
                            $_SESSION['lieu_habitation'] = $auth['lieu_habitation'];
                            $_SESSION['facebook'] = $auth['facebook'];
                            $_SESSION['linkdin'] = $auth['linkdin'];
                            $_SESSION['twitter'] = $auth['twitter'];
                            $_SESSION['google'] = $auth['google'];
                            $_SESSION['encadreur_id'] = $donnees['id'];
                            if($auth['is_active'] == 1){
                                header("Location: encadreur/accueil");
                            }
                            else{
                                if(!$auth['first_login']){
                                    $date = new DateTime();
                                    $now = $date->format('Y-m-d H:i:s');
                                    $update = $this->_db->prepare("UPDATE User SET first_login = ? WHERE username = ?");
                                    $update->execute(Array($now, $username));
                                    header("Location: encadreur/profil");
                                }
                                else{
                                    header("Location: encadreur/contraint");
                                }
                            }
                        }
                        else
                        {
                            
                        }
                    }
                    else
                    {
                        if(!$auth['first_login']){
                            $date = new DateTime();
                            $now = $date->format('Y-m-d H:i:s');
                            $update = $this->_db->prepare("UPDATE User SET first_login = ? WHERE username = ?");
                            $update->execute(Array($now, $username));
                        }
                    }
                }
                else
                {
                    return "Password incorrect";
                }
            }
            else
            {
                return "Vous n'avez pas de compte";
            }

        }

        public function logOut(){
            if(sizeof($_SESSION)){
                $date = new DateTime();
                $now = $date->format("Y-m-d H:i:s");
                $update = $this->_db->prepare("UPDATE User SET last_login = ?, online=? WHERE id = ?");
                $update->execute(Array($now, 0, $_SESSION['user_id']));
                $_SESSION = [];
                session_destroy();
                return true;
            }
            else{
                
            }
        }

        public function updateUser($nom, $prenoms, $sexe, $date_naissance, $lieu_naissance, $username, $email, $telephone, $avatar, $password, $lieu_habitation, $biographie, $facebook, $twitter, $linkdin, $google){
            if(!$avatar){
                $update = $this->_db->prepare("UPDATE User SET nom = ?, prenoms = ?, sexe = ?, date_naissance = ?, lieu_naissance = ?, username = ?, email = ?, telephone = ?, password = ?, lieu_habitation = ?, biographie = ?, facebook = ?, twitter = ?, linkdin = ?, google = ? WHERE id= ?");
                $update->execute(Array($nom, $prenoms, $sexe, $date_naissance, $lieu_naissance, $username, $email, $telephone, $password, $lieu_habitation, $biographie, $facebook, $twitter, $linkdin, $google, $_SESSION['user_id']));
            }
            else{
                $update = $this->_db->prepare("UPDATE User SET nom = ?, prenoms = ?, sexe = ?, date_naissance = ?, lieu_naissance = ?, username = ?, email = ?, telephone = ?, avatar = ?, password = ?, lieu_habitation = ?, biographie = ?, facebook = ?, twitter = ?, linkdin = ?, google = ? WHERE id= ?");
                $update->execute(Array($nom, $prenoms, $sexe, $date_naissance, $lieu_naissance, $username, $email, $telephone, $avatar, $password, $lieu_habitation, $biographie, $facebook, $twitter, $linkdin, $google, $_SESSION['user_id']));
            }
            if($update->rowCount()>0){
                $user = $this->_db->query("SELECT * FROM User WHERE id = '".$_SESSION['user_id']."' ");
                if($user->rowCount()>0){
                    $auth = $user->fetch();
                    $_SESSION['user_id'] = $auth['id'];
                    $_SESSION['nom'] = $auth['nom'];
                    $_SESSION['prenoms'] = $auth['prenoms'];
                    $_SESSION['sexe'] = $auth['sexe'];
                    $_SESSION['date_naissance'] = $auth['date_naissance'];
                    $_SESSION['lieu_naissance'] = $auth['lieu_naissance'];
                    $_SESSION['username'] = $auth['username'];
                    $_SESSION['email'] = $auth['email'];
                    $_SESSION['telephone'] = $auth['telephone'];
                    $_SESSION['avatar'] = $auth['avatar'];
                    $_SESSION['password'] = $auth['password'];
                    $_SESSION['biographie'] = $auth['biographie'];
                    $_SESSION['lieu_habitation'] = $auth['lieu_habitation'];
                    $_SESSION['facebook'] = $auth['facebook'];
                    $_SESSION['linkdin'] = $auth['linkdin'];
                    $_SESSION['twitter'] = $auth['twitter'];
                    $_SESSION['google'] = $auth['google'];
                }
            }
        }

        public function validateAccount($username, $cle){
            $account = $this->_db->prepare("SELECT * FROM User WHERE username = ? AND cle = ?");
            $account->execute(Array($username, $cle));
            if($account->rowCount()>0){
                $donnees = $account->fetch();
                if($donnees['is_active'] == 1){
                    return 0;
                }
                else{
                    $active = $this->_db->prepare("UPDATE User SET is_active = ? WHERE username=? AND cle = ?");
                    $active->execute(Array(1, $username, $cle));
                    if($active->rowCount()){
                        return 1;
                    }
                    else{
                        return 2;
                    }
                }
            }
            else{
                return 3;
            }
        }

        public function isAlreadyExist($email){
            $verif = $this->_db->query("SELECT * FROM User WHERE email = '".$email."'");
            if($verif->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }

        public function getUser($email){
            $user = $this->_db->query("SELECT * FROM User WHERE email = '".$email."'");
            if($user->rowCount()>0){
                $donnees = $user->fetch();
                return $donnees['id'];
            }
            else{
                return 0;
            }
        }
    }

?>