<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';
	require_once __DIR__ . '/../_inc/carousel-b-n.php';
?>
	<style>
		.carousel-item {
			height: 32rem;
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

		.card:hover{
			transform: scale(1.05);
			box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
		}

		.row {
			--bs-gutter-x: 0rem;
		}

		#slide-1 {
			background-image:url();
		}
	</style>

		<!-- Card BARS -->
		<div class="container-md">
		<div class="container-md" style="margin-top: 2rem;">
		<h2 class="d-flex justify-content-center mt-5">Bars</h2>
		<div class="row d-flex justify-content-center">

		<?php
			foreach($BestBars as $Best)
			{
				echo '<div class="col-md-2 me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="Card image cap">
						<div class="card-body" style="height: 165px">
							<h5 class="card-title col">'.$Best["name"].'</h5>
							<p class="card-text">'.$Best["adress"].' '.$Best["zip_code"].'</p>
							<div class="row container-sm" style="position:absolute; bottom:0;">
							<a href="/annonces/Bars/'.$Best["Bars_id"].'" class="btn btn-outline-success btn-sm col" style="height: 30px;">Reservez</a>
							<p class="col text-end ms-2 pe-4">'.round($Best['AVG(reviews)'], 1).' &#9733 <br>'.$Best["COUNT(reviews)"].' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
							<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
							<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						  </svg></p>
							</div>
						</div>
					</div>
				</div>';
			}
			
			?>
				<div class="d-flex justify-content-center">
					<a class="btn btn-outline-success me-2" type="button" href="/annonces/bars">Voir tous les bars</a>
				</div>
		</div>
		</div>
		
		<!-- Card BARS -->

		<hr class="my-6">

		<!-- Card BOITES -->
		
		<div class="container-md" style="margin-top: 2rem;">
		<h2 class="d-flex justify-content-center mt-5">Boîtes de nuit</h2>
		<div class="row d-flex justify-content-center">
		<?php
			foreach($BestBN as $Best2)
			{
				echo '<div class="col-md-2 me-2 mt-2">
					<div class="card mb-4 text-white bg-dark">
						<img class="card-img-top" src="https://images.unsplash.com/photo-1596131397999-bb01560efcae?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80" alt="Card image cap">
						<div class="card-body" style="height: 165px">
							<h5 class="card-title col">'.$Best2["name"].'</h5>
							<p class="card-text">'.$Best2["adress"].' '.$Best["zip_code"].'</p>
							<div class="row container-sm" style="position:absolute; bottom:0;">
							<a href="/annonces/BN/'.$Best2["boites_de_nuit_id"].'" class="btn btn-outline-success btn-sm col" style="height: 30px;">Reservez</a>
							<p class="col text-end ms-2 pe-4">'.round($Best2['AVG(reviews)'], 1).' &#9733 <br>'.$Best2["COUNT(reviews)"].' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
							<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
							<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						  </svg></p>
							</div>
						</div>
					</div>
				</div>';
			}
			
			?>
				<div class="d-flex justify-content-center">
					<a class="btn btn-outline-success me-2" type="button" href="/annonces/BN">Voir toutes les boîtes de nuit</a>
				</div>
		</div>
		</div>
		</div>
		<!-- Card BOITES -->

<?php
require_once __DIR__ . '/../_inc/footer.php';
?>