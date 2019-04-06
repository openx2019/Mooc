<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=tutorat", "root", '');
    }
    catch(Exception $e){
        die("Erreur: ".$e->getMessage());
    }
?>