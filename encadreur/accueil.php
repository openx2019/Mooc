<?php session_start() ?>

<?php
    include("../config/connexion.php");
    include("../controller/ecue.php");
?>

<?php
    if($_SESSION['is_active'] == 0){
        header("Location: contraint");
    }
    if( !(isset($_SESSION['user_id']) && isset($_SESSION['encadreur_id'])) ){
        header("Location: ../login");
    }
    
    $ecue = new Ecue($db);
    $mesMatieres = $ecue->ecues_tuteur($_SESSION['encadreur_id']);
?>


<?php include("_header.php") ?>  

    
    <section style="margin-top : 30px; margin-bottom : 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h6 style="text-indent : 15px">Mes matières</h6>
                    <div class="col-12 mx-auto">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <?php if($mesMatieres->rowCount() > 0) {?>
                                        <?php $i=1; while($row = $mesMatieres->fetch()) { ?>
                                            <tr>
                                                <th scope="row"><?=$i?></th>
                                                <td><?=$row['nom_ecue']?></td>
                                                <td><span class="badge badge-primary mr-3 mb-0">xx Leçons</span></td>
                                                <td><span class="badge badge-warning mr-3 mb-0">xx apprenants</span></td>
                                                <td><a href="addlesson?ecue=<?=$row['id']?>"><button class="btn btn-primary btn-xs mr-0 mb-0">Ajouter une leçon</button></a></td>
                                                <td><a href="mescours?ecue=<?=$row['id']?>"><button class="btn btn-success btn-xs mr-0 mb-0">Voir le cours</button></a></td>
                                            </tr>
                                        <?php $i++; } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('_footer.php') ?>