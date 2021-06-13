<!-- Menu (NAVBAR) -->
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
	<div class="container-md">
		<a class="navbar-brand d-flex align-items-center" href="/" style="font-weight: bold;">N-Life</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0 md-auto">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="/">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="/annonces">Annonces</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						À propos
					</a>
					<ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item bg-dark" href="/contact" style="color: aliceblue;">Contact</a></li>
						<li>
							<hr class="dropdown-divider" style="border-color: darkgreen;">
						</li>
						<li><a class="dropdown-item bg-dark" href="/quiNous" style="color: aliceblue;">Qui sommes-nous ?</a></li>
					</ul>
				</li>
			</ul>
			<form class="d-flex">
				<?php

				use App\Core\Container;
				use App\Query\UserQuery;

				$userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
				if ($userLevel === UserQuery::VISITOR_INDICATOR) {
				?>
					<a class='btn btn-outline-success me-2' type='button' href='/login' style="min-width: 120px; height: 30px; margin-top: 10px; padding-top: 2px;">Se connecter</a>
					<a class='btn btn-outline-success' type='button' href='/register' style="min-width: 100px; height: 30px; margin-top: 10px; padding-top: 2px;">S'inscrire</a>
				<?php
				} else {
					echo "<a class='btn btn-outline-success me-2' type='button' href='/login'>Profil</a>";
				}
				?>
			</form>
		</div>
	</div>
</nav>
<!-- Menu (NAVBAR) -->