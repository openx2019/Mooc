<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    
    <!-- Title-->
    <title>OpenX | MOOC</title>
    
    <!-- SEO Meta-->
    <meta name="description" content="Education theme by EchoTheme">
    <meta name="keywords" content="HTML5 Education theme, responsive HTML5 theme, bootstrap 4, Clean Theme">
    <meta name="author" content="education">
    
    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
            
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico">
    <link rel="shortcut icon" href="../assets/img/favicon/114x114.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/img/favicon/96x96.png">
    
    
    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">
    
    
    <!-- Icon fonts -->
    <link rel="stylesheet" href="../assets/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/fonts/themify-icons/css/themify-icons.css">
    
    
    <!-- stylesheet-->    
    <link rel="stylesheet" href="../assets/css/vendors.bundle.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    
  </head>
  
  <body>

    <nav class="ec-nav sticky-top bg-white">
      <div class="container">
        <div class="navbar p-0 navbar-expand-lg">
          <div class="navbar-brand">
            <a class="logo-default" href="index"><img alt="" src="../assets/img/logo-black.png"></a>
          </div>
          <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
            <div class="hamburger hamburger--spin js-hamburger">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
          </span>
          <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
            <ul class="nav navbar-nav ec-nav__navbar ml-auto">
                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                  <a class="nav-link" href="accueil">Tableau de bord</a>
                </li>

                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                  <a class="nav-link" href="">Cours</a>
                </li>

                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                  <a class="nav-link" href="">Programme</a>
                </li>
            </ul>
          </div>
          <div class="nav-toolbar">
            <div class="dropdown" data-dropdown-event="hover">
              <img class="iconbox iconbox-sm mx-1" src="../assets/img/avatar/4.jpg" alt=""> <?=$_SESSION['nom_prenoms']?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="profil">
                  <i class="ti-user mr-2"></i>
                  <span>Profil</span>
                </a>
                <a class="dropdown-item" href="../signout">
                  <i class="ti-lock mr-2"></i>
                  <span>Deconnexion</span>
                </a>
              </div>
            </div>
          </div>	
        </div>
      </div>	
    </nav>





