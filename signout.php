<?php
    session_start();
    include("config/connexion.php");
    include("controller/authentification.php");
    $auth = new Auth($db);
    if($auth->logOut()){
        header("Location: login");
    }
    else{
        
    }
?>