<?php

// inclusion du footer

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>

<style>

.t1 {
    display : none;
}

.t2 {
    display : none;
}

.t3 {
    display : none;
}

.t4 {
    display : none;
}

</style>

<h1>Se connecter</h1>
<?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
    <section class="Form my-4 mx-5">
        <div class="container d-flex p-2 bd-highlight justify-content-center">

            <div class="col-lg-7 px-5 pt-5">
                <h1 style="color:#017143">nLife</h1>
                <h4>Connectez vous à votre compte</h4>
                <?php if (isset($_SESSION["login"])) { ?> <p class="btn btn-danger disabled" style="height: 35px; opacity: 1;">Ce compte n'existe pas</p> <?php }?>
                <form action="/login" method="POST">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="text" placeholder="Nom de compte" class="form-control my-3 p-3" name="login" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Mot de passe" class="form-control my-3 p-3" name="password" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button type="submit" class="btn mt-3 mb-4 btn-success btn-lg">Connexion</button>
                        </div>
                    </div>
                    <!---<a href="#">Mot de passe oublié ?</a>-->
                    <p>Vous ne possédez pas de compte ? <a href="/register">Inscrivez-vous ici !</a></p>
                </form>
            </div>

        </div>
    </section>
<?php unset($_SESSION["login"]);} else { ?>
    <center><p><b>Vous êtes connecté sous le pseudo :</b> <b style="color:darkgreen;"><u><?php echo $_SESSION["login"] ?></u></b></p></center>
    <form action="/logout" method="POST">

        <center><input type=hidden id="disconnect" name="disconnect" value="disconnect" />
        <input class="btn btn-outline-dark" type="submit" value="Se deconnecter"></center>
        
    </form>
    <center class="mt-5"><h2><u>Section Commentaires</u></h2></center>
    
    <div class="row">
        <div class="col m-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>

                                <th scope="col"><h2>Bars</h2></th>
                                
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($Comments)) {
                                foreach ($Comments as $Comments) {
                                    echo '<tr class="t2">
                                            <td class="w-25">
                                                <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td><h2>'.$Comments['name'].'</h2><a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/'. $Comments['Bars_id'] . '">Voir l\'annnonce</a><br><br>' . $Comments['comment_description'] . '</td>
                                            
                    
                                        </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load2" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>
            </div>
        </div><br><br>
        <div class="col m-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>
                                <th scope="col"><h2>Boîtes de nuit</h2></th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($CommentsBN)){
                                foreach ($CommentsBN as $CommentsBN) {
                                    echo '<tr class="t1">
                                            <td class="w-25">
                                                <img src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td><h2>'.$CommentsBN['name'].'</h2><a class="btn btn-outline-success me-2" type="button" href="/annonces/BN/'. $CommentsBN['boites_de_nuit_id'] . '">Voir l\'annnonce</a><br><br>' . $CommentsBN['comment_description'] . '</td>
                    
                                        </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load1" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>
            </div>
        </div>

        <?php if ($level == UserQuery::HOST_INDICATOR || $level == UserQuery::ADMIN_INDICATOR) { ?>

            <center class="mt-5"><h2><u>Section Annonces</u></h2></center><br><br><br><br><br><br>
            
            <div class="row">
                    <div class="col m-5">
                    <center><a href="http://localhost:8000/annonces/bars/ajouter"><button class="btn btn-success"> Ajouter une annonce de bars</button></a></center>
                        <table class="table table-image">
                            <thead>
                                <tr>

                                    <th scope="col"><h2>Bars</h2></th>
                                    <th scope="col"><h2></h2></th>
                                    <th scope="col"><h2></h2></th>
                                        

                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            if (isset($AnnoncesBars)){
                                foreach ($AnnoncesBars as $AnnoncesBars) {
                                    echo '<tr class="t3">
                                            <td class="w-25">
                                                <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td><h2>'.$AnnoncesBars['name'].'</h2><br><h3>Adresse : '.$AnnoncesBars['adress'].' '.$AnnoncesBars['zip_code'].'</h3><a class="btn btn-outline-success me-2" type="button" href="/annonces/BN/'. $AnnoncesBars['id'] . '">Voir l\'annnonce</a><br><br>' . $AnnoncesBars['description'] . '</td>
                    
                                        </tr>';
                                }
                            }
                            ?>

                            </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load3" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>

                <div class="col m-5">
                <center><a href="http://localhost:8000/annonces/BN/ajouter"><button class="btn btn-success"> Ajouter une annonce de Boîte de nuit</button></a></center>
                <table class="table table-image">
                            <thead>
                                <tr>

                                    <th scope="col"><h2>Boîtes de nuit</h2></th>
                                    <th scope="col"><h2></h2></th>
                                    <th scope="col"><h2></h2></th>
                                        

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($AnnoncesBN)){
                                foreach ($AnnoncesBN as $AnnoncesBN) {
                                    echo '<tr class="t4">
                                            <td class="w-25">
                                                <img src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" class="img-fluid img-thumbnail" alt="Sheep">
                                            </td>
                                            <td><h2>'.$AnnoncesBN['name'].'</h2><br><h3>Adresse : '.$AnnoncesBN['adress'].' '.$AnnoncesBN['zip_code'].'</h3><a class="btn btn-outline-success me-2" type="button" href="/annonces/BN/'. $AnnoncesBN['id'] . '">Voir l\'annnonce</a><br><br>' . $AnnoncesBN['description'] . '</td>
                    
                                        </tr>';
                                }
                            }
                            ?>
                            
                            </tbody>
                    </table>
                    <center><button class ="btn btn-dark" id="btn-load4" style="color: green; font-weight: bold;">Charger plus de commentaires</button></center>
                </div>
             
            </div>

        <?php } ?>

        <?php if ($level == UserQuery::ADMIN_INDICATOR) { ?>

            <center class="mt-5"><h2><u>Section ADMIN</u></h2><br><br><br>
            
                <table class="table" style="max-width: 500px;">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($allUsers as $Users)
                            echo'<tr>
                            <th scope="row">'.$Users['id'].'</th>
                            <form action="/modifier_user" method="post">
                            <td><input type="text" name="pseudo" value="'.$Users['login'].'" readonly="readonly"></td>
                            <td><select class="form-select" name="newlevel">
                                    <option selected>'.$Users['level'].'</option>
                                    <option value="user">user</option>
                                    <option value="host">host</option>
                                    <option value="admin">admin</option>
                                </select>
                                <br>
                                <button class="btn btn-success" type="submit">Sauvegarder</button>
                            </form>
                          </td>
                            </tr>';
                    ?>
                    </tbody>
                </table>
                </center>

        <?php } ?>
            

    </div>



    
<?php } if ($userLevel === UserQuery::USER_INDICATOR) { ?>
<center><button class="btn btn-success" style="width : 500px; font-weight: bold;">Vous possedez un établissement et voulez devenir partenaire ? Contactez-nous !</button></center>

<?php
}
 if ($level == UserQuery::VISITOR_INDICATOR) { ?>
<script>
document.title = "Login";
</script>

<?php } else {?>

<script>
document.title = "Profil - <?=$_SESSION["login"]?>";
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".t1").slice(0,3).show()
$("#btn-load1").on("click", function(){
    $(".t1:hidden").slice(0,3).slideDown()
    if ($(".t1:hidden").length == 0) {
        $("#btn-load1").fadeOut('slow')
    }
})

$(".t2").slice(0,3).show()
$("#btn-load2").on("click", function(){
    $(".t2:hidden").slice(0,3).slideDown()
    if ($(".t2:hidden").length == 0) {
        $("#btn-load2").fadeOut('slow')
    }
})

$(".t3").slice(0,3).show()
$("#btn-load3").on("click", function(){
    $(".t3:hidden").slice(0,3).slideDown()
    if ($(".t3:hidden").length == 0) {
        $("#btn-load3").fadeOut('slow')
    }
})

$(".t4").slice(0,3).show()
$("#btn-load4").on("click", function(){
    $(".t4:hidden").slice(0,3).slideDown()
    if ($(".t4:hidden").length == 0) {
        $("#btn-load4").fadeOut('slow')
    }
})


</script>



<?php
}


// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
