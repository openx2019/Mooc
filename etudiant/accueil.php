<?php session_start() ?>

<?php
    if($_SESSION['is_active'] == 0){
        header("Location: contraint");
    }
    if( !(isset($_SESSION['user_id']) && isset($_SESSION['etudiant_id'])) ){
        header("Location: ../login");
    }
?>


<?php include("_header.php") ?>  

    
    <section style="margin-top : 30px; margin-bottom : 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row shadow-v3" style="margin : 10px auto">
                        <div class="col-md-7" style="border-right : 1px solid #ccc">
                            <h4>ECUE Analyse </h4>
                            <div class="row" style="margin-top : -10px">
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Voir plus
                                </a>
                                <a href="/" class="col-md-2 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Forum
                                </a>
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Statistique
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top : 20px">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <ul class="list-unstyled ec-review-rating font-size-12">
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li><a href="" class="text-primary">Donnez votre avis</a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="row shadow-v3" style="margin : 10px auto">
                        <div class="col-md-7" style="border-right : 1px solid #ccc">
                            <h4>ECUE Analyse </h4>
                            <div class="row" style="margin-top : -10px">
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Voir plus
                                </a>
                                <a href="/" class="col-md-2 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Forum
                                </a>
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Statistique
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top : 20px">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <ul class="list-unstyled ec-review-rating font-size-12">
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li><a href="" class="text-primary">Donnez votre avis</a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="row shadow-v3" style="margin : 10px auto">
                        <div class="col-md-7" style="border-right : 1px solid #ccc">
                            <h4>ECUE Analyse </h4>
                            <div class="row" style="margin-top : -10px">
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Voir plus
                                </a>
                                <a href="/" class="col-md-2 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Forum
                                </a>
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Statistique
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top : 20px">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <ul class="list-unstyled ec-review-rating font-size-12">
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li><a href="" class="text-primary">Donnez votre avis</a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="row shadow-v3" style="margin : 10px auto">
                        <div class="col-md-7" style="border-right : 1px solid #ccc">
                            <h4>ECUE Analyse </h4>
                            <div class="row" style="margin-top : -10px">
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Voir plus
                                </a>
                                <a href="/" class="col-md-2 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Forum
                                </a>
                                <a href="/" class="col-md-3 col-xs-3 text-primary" style="border-right : 1px solid #ccc;">
                                    Statistique
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top : 20px">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <ul class="list-unstyled ec-review-rating font-size-12">
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li class="active"><i class="far fa-star"></i></li>
                                <li><a href="" class="text-primary">Donnez votre avis</a></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="offset-md-1 col-md-3" style="background-color : #eee; border-radius : 5px">
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

<?php include('_footer.php') ?>