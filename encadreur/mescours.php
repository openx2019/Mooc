<?php session_start() ?>

<?php
    include("../config/connexion.php");
    include("../controller/ecue.php");
    include("../controller/lecon.php");
?>

<?php
    if($_SESSION['is_active'] == 0){
        header("Location: contraint");
    }
    if( !(isset($_SESSION['user_id']) && isset($_SESSION['encadreur_id'])) ){
        header("Location: ../login");
    }

    if(!(isset($_GET["ecue"]))){
        header("Location: accueil");
    }

    $ecue_id = $_GET['ecue'];


    $ecue = new Ecue($db);
    if(!($ecue->ecue_tuteur($ecue_id, $_SESSION['encadreur_id']))){
        header("Location: accueil");
    }

    $ecuefetch = $ecue->getEcue($ecue_id);

    $lecon = new Lecon($db);

    $liste_lecons = $lecon->ecue_lecon($ecue_id);



?>


<?php include("_header.php") ?>  

    <section style="margin-top : 30px; margin-bottom : 30px">
        <div class="container">
            <h3 style="text-align : center; font-weight : bolder">ECUE : <?=$ecuefetch['nom_ecue']?></h3>
            <div class="row">
                <?php if($liste_lecons->rowCount()> 0) { ?>
                    <?php while($row = $liste_lecons->fetch()) { ?>
                        <div class="col-lg-3 col-md-4 marginTop-30" style="text-align : center">
                            <div class="card text-gray height-100p shadow-v2">
                                <a href="">
                                <img class="card-img-top" src="assets/img/360x220/1.jpg" alt="">
                                </a>
                                <div class="p-4">
                                    <a href="#" class="h6">
                                        <?=$row["titre"]?>
                                    </a>
                                    <button class="btn btn-pill btn-block btn-warning btn-xs">Modifier la lecon</button>
                                    <button class="btn btn-pill btn-block btn-info btn-xs ">Previsualiser la leçon</button>
                                    <button class="btn btn-pill btn-block btn-danger btn-xs"><a href="relesson?id=<?=$row["id"]?>">Supprimer la leçon</a></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else{ ?>
                    <h3 style="font-weigth : bold; margin : 65px auto">Vous n'avez pas ajouté de leçon dans ce cours</h3>
                <?php } ?>
            </div>
            <div class="row" style="margin-top : 20px">
            <div class="offset-md-4 col-md-4 text-center">
                <a href="addlesson?ecue=<?=$ecue_id?>"><button class="btn btn-pill btn-block btn-success btn-xs">Ajouter une leçon</button></a>
            </div>
            </div>
        </div>
    </section>

<?php include('_footer.php') ?>

