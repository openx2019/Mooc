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

    $lecon = new Lecon($db);
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // echo $_POST['titre']." ".htmlspecialchars($_POST['contenu']);
        $ecue_id = $lecon->new_lecon($_POST['titre'], $_POST['contenu'], $ecue_id, $_SESSION['encadreur_id']);
        if($ecue_id){
            header("Location: mescours.php?ecue=".$ecue_id);
        }
    }


    $ecuefetch = $ecue->getEcue($ecue_id);
?>


<?php include("_header.php") ?>  

    <section style="margin-top : 15px; margin-bottom : 30px">
        <div class="container">
            <h3 style="text-align : center; font-weight : bolder; margin : 15px auto">ECUE : <?=$ecuefetch['nom_ecue']?></h3>
            <div class="row">
                <div class="col-md-8">
                    <form method = "POST">
                        <div class="form-group">
                            <input type="text" name="titre" id="titre" class="form-control" placeholder = "Titre de la leçon">
                        </div>

                        <div class="form-group">
                            <textarea name="contenu" id="contenu" class="form-control rounded-pill" rows="5" placeholder="Contenu de la leçon"></textarea>
                            <script>
                                editor = CKEDITOR.replace('contenu', {
                                    forcePasteAsPlainText : true,
                                    width   : '100%',
                                    uiColor : '#f5f3de',
                                    removePlugins: 'sourcearea'
                                });
                             </script>
                        </div>

                        <div class="row">
                            <div class="offset-md-2 col-md-4">
                                <button class="btn btn-warning btn-block btn-sm">Previsualiser l'affichage</button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-info btn-block btn-sm">Enregistrer la leçon</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4" id="essai">
                    
                </div>
            </div>
        </div>
    </section>

    <script>
         editor.on('change', function(){
            document.getElementById("essai").innerHTML = editor.getData()
         });
    </script>

<?php include('_footer.php') ?>