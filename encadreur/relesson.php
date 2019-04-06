<?php session_start() ?>

<?php
    include("../config/connexion.php");
    include("../controller/ecue.php");
    include("../controller/lecon.php");
?>

<?php
    $lecon = new Lecon($db);
    if(isset($_GET['id'])){
        $lecon->removeLesson($_GET['id']);
        header("Location: accueil");
    }
    else{
        header("Location: accueil");
    }
?>