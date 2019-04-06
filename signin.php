<?php

    session_start();

    include("config/connexion.php");
    include("controller/authentification.php");
    include("controller/etudiant.php");

    $succes = true;
    $nom = ""; $prenoms = ""; $sexe = ""; $date =""; $email = ""; $tel = ""; $password = "";
    $messageNom = ""; $messagePrenoms = ""; $messageSexe = ""; $messageDate = ""; $messageEmail = ""; $messageTel = ""; $messagePassword = ""; $messagePasswordConfirme = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        // Validation de nom
        if(isset($_POST['nom']) and !empty($_POST['nom'])){
            if(preg_match("#[a-zA-Z]#", $_POST['nom']) and strlen($_POST['nom']) > 2){
                $nom = $_POST['nom'];
                $succesNom = true;
            }
            else{
                $nom = $_POST['nom'];
                $messageNom = "Ce champ doit être d'au moins 3 caractères";
                $succesNom = false;
            }
        }
        else{
            $messageNom = "Ce champ doit être d'au moins 3 caractères";
            $succesNom = false;
        }

        // Validation de prenoms

        if(isset($_POST['prenoms']) && !empty($_POST['prenoms'])){
            if(preg_match("#[a-zA-Z]#", $_POST['prenoms']) && strlen($_POST['prenoms']) > 2){
                $prenoms = $_POST['prenoms'];
                $succesPrenoms = true;
            }
            else{
                $prenoms = $_POST['prenoms'];
                $messagePrenoms = "Ce champ doit être d'au moins 3 caractères";
                $succesPrenoms = false;
            }
        }
        else{
            $messagePrenoms = "Ce champ doit être d'au moins 3 caractères";
            $succesPrenoms = false;
        }

        // Validation de sexe

        if(isset($_POST['sexe']) && !empty($_POST['sexe'])){
            if($_POST['sexe'] == ""){
                $sexe = $_POST['sexe'];
                $messageSexe = "Veuillez sélectionner votre sexe";
                $succesSexe = false;
            }
            else{
                $sexe = $_POST['sexe'];
                $succesSexe = true;
            }
        }
        else{
            $messageSexe = "Veuillez sélectionner votre sexe";
            $succesSexe = false;
        }

        // Validation de date

        if(isset($_POST['date']) && !empty($_POST['date'])){
            $date = $_POST["date"];
            $succesDate = true;
        }
        else{
            $messageDate = "Ce champ est obligatoire";
            $succesDate = false;
        }

        // Validation de email

        if(isset($_POST['email']) && !empty($_POST['email'])){
            if(preg_match ("#^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$#" , $_POST['email'] )){
                $email = $_POST['email'];
                $succesEmail = true;
            }
            else{
                $email = $_POST['email'];
                $messageEmail = "Votre email n'est pas valide";
                $succesEmail = false;
            }
        }
        else{
            $messageEmail = "Votre email n'est pas valide";
            $succesEmail = false;
        }

        // Validation telephone

        if(isset($_POST['tel']) && !empty($_POST['tel'])){
            if( preg_match ( "#^(\d\d\s){3}(\d\d)$#" , $_POST['tel'] )){
                $tel = $_POST['tel'];
                $succesTel = true;
            }
            else{
                $tel = $_POST['tel'];
                $messageTel = "Votre numéro de téléphone n'est pas valide";
                $succesTel = false;
            }
        }
        else{
            $messageTel = "Votre numéro de téléphone n'est pas valide";
            $succesTel = false;
        }


        // Validation password

        if(isset($_POST['password']) && !empty($_POST['password'])){
            if(strlen($_POST['password']) > 5){
                $password = $_POST['password'];
                $succesPassword = true;
            }
            else{
                $password = $_POST['password'];
                $messagePassword = "Votre mot de passe doit être d'au moins 6 caractères";
                $succesPassword = false;
            }
        }
        else{
            $messagePassword = "Votre mot de passe doit être d'au moins 6 caractères";
            $succesPassword = false;
        }

        // Validation de password Confirmation
        if(isset($_POST['passwordConfirmation']) && !empty($_POST['passwordConfirmation'])){
            if($_POST['passwordConfirmation'] != $_POST['password']){
                $succesPassword = false;
                $messagePasswordConfirme = "Ce valeur de ce champ doit être identique à la valeur du champ password";
            }
            else{
                if( strlen($_POST['passwordConfirmation']) < 6){
                    $messagePasswordConfirme = "Ce valeur de ce champ doit être identique à la valeur du champ password";
                }
            }
        }
        else{
            $succesPassword = false;
            $messagePasswordConfirme = "Ce valeur de ce champ doit être identique à la valeur du champ password";
        }

        $succes = $succesNom && $succesPrenoms && $succesDate && $succesSexe && $succesEmail && $succesTel && $succesPassword;
        if($succes){
            // On envoi les données
            $user = new Auth($db);
            $etudiant = new Etudiant($db);
            $result = $user->signUp($nom, $prenoms, $sexe, $tel, $email, $email, $password);
            if($result){
                // Attribution du compte
                $user_id = $result;
                $attri = $etudiant->ajouterEtudiant($user_id);
                if($attri){
                   $user->signIn($email, $password);
                }
                else{
                    $succes = false;
                    $message = "Le compte a été créé mais n'a pas été attribué. Veuillez ressayer ou contacter l'admin";
                }
            }
            else{
                if($user->getUser($email)){
                    $user_id = $user->getUser($email);
                    $attri = $etudiant->ajouterEtudiant($user_id);
                    if($attri){
                        // Logging
                    }
                    else{
                        $succes = false;
                        $message = "Ce mail est déjà inscrit";
                    }
                }
                else{
                    $succes = false;
                    $message = "Ce mail est déjà inscrit";
                }
            }
        }
        else{
            $message = "Veuillez bien remplir les champs";
        }
    }

?>

<?php include("_header/header.php") ?>  

  <section class="padding-y-100 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card shadow-v2"> 
            <div class="card-header border-bottom" style="background-color : #369bfd; ">
              <h3 class="mt-4 text-center" style="color : white">
                <strong><i class="fa fa-user-plus"></i> Inscription </strong>
              </h3>
            </div>         
            <div class="card-body">
                <form method="POST" class="px-lg-4">

                    <?php if(!$succes) {?>
                        <div class="alert alert-danger">
                            Echec d'enregistrément : <?=$message?>
                        </div>
                    <?php }  ?>


                    <p style="text-align : center; color : red; margin-top : -5px"><span style="color : black;"> NB :</span> Tous les champs ci-dessous sont obligatoires</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white fa fa-user"></span>
                                </div>
                                <input placeholder="Nom" id="nomInscription" name="nom" type="text" class="form-control datetimepicker-input" value="<?=$nom?>">
                            </div>
                            <p id="validNom" style="color : #2CAF58; display: none; font-size : 12px; margin-top : -10px">Nom valide</p>
                            <p id="erreurNom" style="color : red; display: none; font-size : 12px; margin-top : -10px">Le nom doit contenir au moins 2 caractères</p>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messageNom?></p><br>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white fa fa-user"></span>
                                </div>
                                <input placeholder="Prenoms" id="prenomInscription" name="prenoms" type="text" class="form-control datetimepicker-input" value="<?=$prenoms?>">
                            </div>
                            <p id="validPrenom" style="color : #2CAF58; display: none; font-size : 12px; margin-top : -10px">Prenom valide</p>
                            <p id="erreurPrenom" style="color : red; display: none; font-size : 12px; margin-top : -10px">Le prenom doit contenir au moins 2 caractères</p>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messagePrenoms?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <select id="sexeInscription" data-placeholder="Sexe" name="sexe" class="chosen-select ec-select my_select_box" tabindex="5">
                                    <option value="" <?php if($sexe == "") { echo "selected"; } ?>></option>
                                    <option value="M" <?php if($sexe == "M") { echo "selected"; } ?>>Masculin</option>
                                    <option value="F" <?php if($sexe == "F") { echo "selected"; } ?>>Feminin</option>
                                    <option value="H" <?php if($sexe == "H") { echo "selected"; } ?>>Handicapé</option>
                                </select>
                            </div>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messageSexe?></p><br>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white fa fa-calendar"></span>
                                </div>
                                <input id="dateInscription" placeholder="Date de naissance" name=date type="date" class="form-control datetimepicker-input" id="ec-datepicker" data-toggle="datetimepicker" data-target="#ec-datepicker">
                            </div>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messageDate?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white ti-email"></span>
                                </div>
                                <input placeholder="Email" id="emailInscription" name="email" type="email" class="form-control datetimepicker-input" value="<?=$email?>">
                            </div>
                            <p id="erreur" style="color : red; display: none; font-size : 12px; margin-top : -10px">Ce mail est deja occupé</p>
                            <p id="format" style="color : red; display: none; font-size : 12px; margin-top : -10px">Mauvais format( ex: toto@gmail.com)</p>
                            <p id="succes" style="color : #0f0; display: none; font-size : 12px; margin-top : -10px">email valide</p>

                            <p id="vide" style="color : red; display: none; font-size : 12px; margin-top : -10px">Vous devez saisir un email</p>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messageEmail?></p><br>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white fa fa-phone "></span>
                                </div>
                                <input placeholder="Telephone" id="telInscription" name="tel" type="tel" class="form-control datetimepicker-input" value="<?=$tel?>">
                            </div>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messageTel?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white ti-lock"></span>
                                </div>
                                <input placeholder="Mot de passe" id="mpInscription" name="password" type="password" class="form-control datetimepicker-input">
                            </div>
                            <p id="mp" style="color : red; display: none; font-size : 12px; margin-top : -10px">Veillez renseigné un mot de passe</p>
                            <p id="mpForm" style="color : red; display: none; font-size : 12px; margin-top : -10px">Le mot de passe doit contenir au moins 6 caractères</p>
                            <p id="mpFormV" style="color : #2CAF58; display: none; font-size : 12px; margin-top : -10px">Mot de passe validé</p>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messagePassword?></p>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group--focus mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white ti-lock"></span>
                                </div>
                                <input placeholder="Confirmation de mot de passe" id="mpcInscription" name="passwordConfirmation" type="password" class="form-control datetimepicker-input">
                            </div>
                            <p id="mpc" style="color : red; display: none; font-size : 12px; margin-top : -10px">Les deux mots de passe ne correspondent pas !</p>
                            <p id="mpcC" style="color : #2CAF58; display: none; font-size : 12px; margin-top : -10px">Confirmation effectuéé</p>
                            <p style="color : red; font-size : 12px; margin-top : -10px"><?=$messagePasswordConfirme?></p><br>
                        </div>
                    </div>

                    <button class="btn btn-block btn-sm btn-primary">S'inscrire</button>
                    <p class="my-3 text-center">
                        Avez-vous déjà un compte? <a href="login.php" class="text-warning">Connexion</a>
                    </p>
                </form>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </section>

<?php include('_footer/footer.php') ?>