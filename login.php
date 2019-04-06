<?php

    session_start();

    include("config/connexion.php");
    include("controller/authentification.php");

    $succes = true;
    $username =""; $password ="";
    $messageUsername = ""; $messagePassword = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      if(isset($_POST['username']) && !empty($_POST['username'])){
        $username = $_POST['username'];
        $succesUsername = true;
      }
      else{
        $succesUsername = false;
        $messageUsername = "Ce champ est obligatoire";
      }

      if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
        $succesPassword = true;
      }
      else{
        $succesPassword = false;
        $messagePassword = "Ce champ est obligatoire";
      }

      $succes = $succesPassword && $succesUsername;
      if($succes){
        $auth = new Auth($db);
        $auth->signIn($username, $password);
        $succes = false;
        $message = "Nom d'utilisateur et/ou mot de passe incorrect";
      }
      else{
        $message = "Veuillez bien remplir les champs ci-dessous";
      }
    }
?>






<?php include("_header/header.php") ?>  

  <section class="padding-y-100 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card shadow-v2"> 
            <div class="card-header border-bottom" style="background-color : #369bfd; ">
              <h3 class="mt-4 text-center" style="color : white">
                <strong><i class="fa fa-user"></i> Authentification </strong>
              </h3>
            </div>         
            <div class="card-body">
              <form method="POST" class="px-lg-4">

                <?php if(!$succes) { ?>
                  <div class="alert alert-danger">
                    <?=$message?>
                  </div>
                <?php } ?>

                <div class="input-group input-group--focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white ti-email"></span>
                  </div>
                  <input type="text" value="<?=$username?>" id="username" autocomplete="off" name="username" class="form-control datetimepicker-input" placeholder="Email">
                </div>
                <p class="vide" style="color : red"><?=$messageUsername?></p>
                <p id="format" style="color : red; display: none; font-size : 12px; margin-top : 10px">Mauvais format( ex: toto@gmail.com)</p>
                <p id="succes" ></p>
                
                <div class="input-group input-group--focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white ti-lock"></span>
                  </div>
                  <input type="password" value="<?=$password?>" autocomplete="off" id="password" name="password" class="form-control datetimepicker-input" placeholder="Password">
                </div>
                <p class="videpwd" style="color : red"><?=$messagePassword?></p>
                <div class="d-md-flex justify-content-between my-4 float-right">
                  <a href="" class="text-warning d-block pull-right">Mot de passe oublié?</a>
                </div>
                <button class="btn btn-block btn-sm btn-primary">Connexion</button>
                <p class="my-5 text-center">
                  Vous n'avez pas de compte? <a href="signin.php" class="text-warning">Inscription</a>
                </p>
              </form>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </section>

<?php include('_footer/footer.php') ?>