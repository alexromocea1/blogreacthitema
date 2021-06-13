<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';

    use App\Query\UserQuery;

?>
<style>
    .carousel-item {
        height: 28rem;
        background: black;
        color: white;
        position: relative;
        background-position: center;
        background-size: cover;
    }

    .container{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding-bottom: 50px;
    }

    #nb::placeholder {
        color: white;
    }

    .col {
        display: none;
    }

    .overlay-image 
    {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        background-position: center;
        background-size: cover;
        opacity: 0.4;
    }

    h2 {
        color: #198754;
    }

    #date-picker-example::-webkit-input-placeholder {
        color: white;
    }
</style>
    <!-- Carousel -->
<div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
			<div class="carousel-inner">
                
				<div class="carousel-item active">
                
					<div class="overlay-image" style="background-image:url(https://images.unsplash.com/photo-1570872626485-d8ffea69f463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);"></div> 
					<div class="container">
						<div class="carousel-caption text-center">
                        <form class="d-flex p-2 bd-highlight justify-content-center" action="/annonces/BN" method="post">
                            <div class="d-grid">
                                <select class="form-select btn-success mb-1" style="width: 10rem;" name="lieu">
                                    <option selected>Département</option>
                                    <option value="Essonne">Essonne</option>
                                    <option value="Hauts-de-Seine">Hauts-de-Seine</option>
                                    <option value="Paris">Paris</option>
                                    <option value="Seine-et-Marne">Seine-et-Marne</option>
                                    <option value="Seine-Saint-Denis">Seine-Saint-Denis</option>
                                    <option value="Val-de-Marne">Val-de-Marne</option>
                                    <option value="Val-d'Oise">Val-d'Oise</option>
                                    <option value="Yvelines">Yvelines</option>
                                </select>
                                <input type="number" class="btn-success mb-1 rounded p-1" id="nb" placeholder="Nb. de participants" name="nbParticipants" min="3" style="width: 10rem;">
                                <div class="input-group mb-3"  id="datetimepicker" style="width: 10rem;">
                                </div>
                                <button type="submit" class="btn btn-success" style="width: 10rem;">Rechercher</button>
                            </div>
                        </form>
                        
							<h3>Recherchez les Boîtes nuit qui correspondent à vos critères</h3>
							<p>
								Découvrez notre large pannel de Boîtes nuit partenaires
							</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Carousel -->

        <div class="container-md mt">
            <?php if ($level == UserQuery::HOST_INDICATOR || $level == UserQuery::ADMIN_INDICATOR) { ?>

            <div class="container-md d-flex p-2 bd-highlight row gy-2 justify-content-center">
                <a href="/annonces/BN/ajouter" class="btn btn-success">Ajouter une annonce</a>
                <a href="/annonces/BN/modifier" class="btn btn-warning">Modifier une annonce</a>
                <hr style="max-width: 750px;">
            
            <center><div class="row row-cols-1 ">

            <?php } ?>

            <?php if ($level == UserQuery::USER_INDICATOR || $level == UserQuery::VISITOR_INDICATOR) { ?>

            <div class="container-md d-flex p-2 bd-highlight row gy-2 justify-content-center">
                <div class="alert alert-info" role="alert">
                    <center>Pour accéder à ces fonctionnalités, connectez vous en tant que partenaire.</center>
                </div>
                <a href="/annonces/BN/ajouter" class="btn btn-success disabled" >Ajouter une annonce</a>
                <a href="/annonces/BN/modifier" class="btn btn-warning disabled" >Modifier une annonce</a>
                <hr style="max-width: 750px;">
            
            <center><div class="row row-cols-1 ">

            <?php } ?>
        <?php
            error_reporting(0);
        if($_POST['lieu'] != "" && $_POST['nbParticipants'] != "")
            {
                if(empty($var) == false)
                {
                    foreach($Filter as $Filter)
                    {
                    $description = str_split($Filter['description'], 115);
                        echo '<div class="col">';
                            echo '<div class="card mb-3 border-success bg-light d-flex p-2 text-start" id="1" style="max-width: 750px;">';
                                echo '<div class="row g-0">';
                                    echo '<div class="col-md-4">'; 
                                        echo '<img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="..." style="max-width: 250px;" class="rounded mt-3">';
                                    echo '</div>';
                                    echo '<div class="col-md-8">';
                                        echo '<div class="card-body text-success" >';
                                            echo '<h5 class="card-title">'.$Filter['name'].'</h5>';
                                            echo '<p class="card-text">'.$description[0].'...</p>';
                                            echo '<div class="row justify-content-between">';
                                                echo '<small class="text-muted">Localisation : '.$Filter['adress'].' '.$Filter['zip_code'].' '.$Filter['lieu'].'</small></p>'; 
                                                echo '<small class="text-muted">Référence : '.$Filter['id'].'</small></p>';
                                                echo '<div class="col-4">';
                                                    echo '<small class="text-muted">Créee le '.$Filter['date_creation'].' <br>Par '.$Filter['user'].' </small></p>';
                                                echo '</div>';
                                                echo '<div class="col-4">';
                                                    echo '<a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/'.$Filter['id'].'">Voir l\'annonce</a>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    } 
                }
                else
                {
                    echo   '<div class="alert alert-info" role="alert">
                                Aucune annonce trouvé avec vos critères
                            </div>
                            ';
                }
        }

        else
            {
            foreach($BN as $BN)
            {
                $description = str_split($BN['description'], 115);
                    echo '<div class="col">';
                        echo '<div class="card mb-3 border-success bg-light d-flex p-2 text-start" id="1" style="max-width: 750px;">';
                            echo '<div class="row g-0">';
                                echo '<div class="col-md-4">'; 
                                    echo '<img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="..." style="max-width: 250px;" class="rounded mt-3">';
                                echo '</div>';
                                echo '<div class="col-md-8">';
                                    echo '<div class="card-body text-success" >';
                                        echo '<h5 class="card-title">'.$BN['name'].'</h5>';
                                        echo '<p class="card-text">'.$description[0].'...</p>';
                                        echo '<div class="row justify-content-between">';
                                            echo '<small class="text-muted">Localisation : '.$BN['adress'].' '.$BN['zip_code'].' '.$BN['lieu'].'</small></p>'; 
                                            echo '<small class="text-muted">Référence : '.$BN['id'].'</small></p>';
                                            echo '<div class="col-4">';
                                                echo '<small class="text-muted">Créee le '.$BN['date_creation'].' <br>Par '.$BN['user'].' </small></p>';
                                            echo '</div>';
                                            echo '<div class="col-4">';
                                                echo '<a class="btn btn-outline-success me-2" type="button" href="/annonces/Bars/'.$BN['id'].'">Voir l\'annonce</a>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
            }       
        }       
        ?>      
                </div></center>  
                <hr style="max-width: 750px;">  
            </div>
            <center><button class ="btn btn-dark" id="btn-load" style="color: green; font-weight: bold;">Charger plus d'annonces</button></center>
        </div>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".col").slice(0,3).show()
$("#btn-load").on("click", function(){
    $(".col:hidden").slice(0,3).slideDown()
    if ($(".col:hidden").length == 0) {
        $("#btn-load").fadeOut('slow')
    }
})

</script>
<?php
require_once __DIR__ . '/../_inc/footer.php';
?>