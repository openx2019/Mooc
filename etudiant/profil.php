<?php 
    session_start();
    include("../config/connexion.php"); 
    include("../controller/filiere.php");
?>

<?php
    if(!(isset($_SESSION['user_id']) && isset($_SESSION['etudiant_id'])) ){
        header("Location: ../login");
    }
    $filiere = new Filiere($db);
    $getFiliere = $filiere->getFiliere($_SESSION['filiere_id']);
    $getFilieres = $filiere->getFilieres();

?>


<?php include("_header.php") ?>  

    
    <section style="margin-top : 30px; margin-bottom : 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="text-white" style="background: linear-gradient(180deg,#414e53 70%,#3a464b 30%); padding-top : 20px; padding-bottom : 20px;">
                        <div class="container">
                            <div class="row">
                                <div class="offset-md-2 col-md-8" style="text-align : center">
                                    <img src="../assets/img/avatar/4.jpg" class="iconbox iconbox-xxxl" alt="">
                                    <h3><?=$_SESSION['nom_prenoms']?></h3>
                                    <h5>Etudiant en <strong><?=$getFiliere['nom_filiere']?></strong></h5>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="text-white" style="padding-top : 20px; padding-bottom : 20px; background-color : #eee;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white fa fa-user"></span>
                                        </div>
                                        <input placeholder="Nom" name="nom" type="text" class="form-control datetimepicker-input" value="<?=$_SESSION["nom"]?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white fa fa-user"></span>
                                        </div>
                                        <input placeholder="Prenoms" name="prenoms" type="text" class="form-control datetimepicker-input" value="<?=$_SESSION["prenoms"]?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white fa fa-calendar"></span>
                                        </div>
                                        <input placeholder="Date de naissance" name=date type="date" class="form-control datetimepicker-input" value="<?=$_SESSION["date_naissance"]?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white ti-location-pin"></span>
                                        </div>
                                        <input placeholder="Lieu de naissance" name="lieu" type="text" class="form-control datetimepicker-input" value="<?=$_SESSION["lieu_naissance"]?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3"  style="background-color : white; color : #888">
                                        <select data-placeholder="Sexe" name="sexe" class="chosen-select ec-select my_select_box" tabindex="5">
                                            <option value="" ></option>
                                            <option value="M" <?php if($_SESSION['sexe'] == "M") echo "selected" ?>>Masculin</option>
                                            <option value="F" <?php if($_SESSION['sexe'] == "F") echo "selected" ?>>Feminin</option>
                                            <option value="H" <?php if($_SESSION['sexe'] == "H") echo "selected" ?>>Handicapé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white ti-email"></span>
                                        </div>
                                        <input placeholder="Email" name="email" type="email" class="form-control datetimepicker-input" value="<?=$_SESSION["email"]?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3"  style="background-color : white; color : #888">
                                        <select data-placeholder="Votre niveau d'etude" name="niveau" class="chosen-select ec-select my_select_box" tabindex="5">
                                            <option value="" ></option>
                                            <option value="1" <?php if($_SESSION['filiere_id'] == 1) echo "selected" ?>>Licence I</option>
                                            <option value="2" <?php if($_SESSION['filiere_id'] == 2) echo "selected" ?>>Licence II</option>
                                            <option value="3" <?php if($_SESSION['filiere_id'] == 3) echo "selected" ?>>Licence III</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group--focus mb-3"  style="background-color : white; color : #888">
                                        <select data-placeholder="Votre spécialité" name="niveau" class="chosen-select ec-select my_select_box" tabindex="5">
                                            <option value="" ></option>
                                            <?php while($row = $getFilieres->fetch()) { ?>
                                                <option <?php if($_SESSION['filiere_id'] == $row['id']) echo "selected" ?>><?=$row['nom_filiere']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <button data-fancybox="" data-src="#trueModal" data-modal="true" href="javascript:;" class="btn btn-block btn-sm btn-warning">Previsualiser ma carte</button>
                                    <!-- <a data-fancybox="" data-src="#trueModal" data-modal="true" href="javascript:;" class="btn btn-outline-primary align-self-start mt-2">Open demo</a> -->
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-sm btn-primary">Mettre à jour mon profil</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="offset-md-1 col-md-3" style="background-color : #eee; border-radius : 5px; max-height : 200px">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="fa fa-comment-dots"></i> Mes messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-american-sign-language-interpreting"></i> Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-users"></i> Mes groupes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="ti-stats-up"></i> Mes statistiques</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="trueModal" class="p-5" style="display: none; max-width:600px;">
        <h3>
            Visualisation de votre carte
        </h3>
        
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <button data-fancybox-close class="btn btn-danger btn-sm">Fermer</button>
            </div>
        </div>
    </div>

<?php include('_footer.php') ?>