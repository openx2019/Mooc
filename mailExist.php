<?php 
	include("config/connexion.php");
    include("controller/authentification.php");

    $verif = new Auth($db);

    $email = $_POST['email'];

   	$bool = $verif->isAlreadyExist($email);

    if($bool){
    	$stat = 1;
    }
    else{
    	$stat = 0;
    }

    echo json_encode($stat);

?>