

<?php
    session_start();
    if((isset($_SESSION['user_id']))){
        if($_SESSION['is_active'] == 1){
            header("Location: accueil");
        }
    }
    else{
        header("Location: ../login");
    }
?>

<?php include("_header.php") ?>  

    <section class="padding-y-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2><i class="fas fa-times text-danger mr-1" style="font-size : 50px"></i> Desolé <?=$_SESSION['nom_prenoms']?></h2>
                    <h4 class="my-4">Votre compte n'est pas activé</h4>
                    <p>
                        Votre compte a été bien créé mais vous n'avez pas retiré votre carte de membre
                        <br>
                        Votre code de membre est : <strong>54BGRFD0457</strong>
                    </p>
                    <a href="profil" class="btn btn-primary btn-sm">Retour sur mon profil</a>
                </div>
            </div> 
        </div>
    </section>

<?php include('_footer.php') ?>


