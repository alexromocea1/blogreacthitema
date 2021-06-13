<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';

    use App\Query\UserQuery;
?>

<div class="container-md d-flex p-2 bd-highlight justify-content-center mt-3" >
    <div class="col-lg-9 mt-5">
    <hr>
    <h1>Ajouter une annonce [Boîtes de nuit]</h1>
    <?php if ($level == UserQuery::HOST_INDICATOR || $level == UserQuery::ADMIN_INDICATOR) { ?>
    <form method="post" action="/annonces/BN/add">
   
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" class="form-control " placeholder="Nom de l'annonce" name="name" required>
        </div>
        <div class="row">
            <div class="col-sm me-2">
                <label for="exampleInputPassword1" class="form-label">Ville</label>
                <select class="form-select form-select-lg mb-3 " name="lieu" >
                    <option selected>Ville</option>
                    <option value="Essonne">Essonne</option>
                    <option value="Hauts-de-Seine">Hauts-de-Seine</option>
                    <option value="Paris">Paris</option>
                    <option value="Seine-et-Marne">Seine-et-Marne</option>
                    <option value="Seine-Saint-Denis">Seine-Saint-Denis</option>
                    <option value="Val-de-Marne">Val-de-Marne</option>
                    <option value="Val-d'Oise">Val-d'Oise</option>
                    <option value="Yvelines">Yvelines</option>
                </select>

            </div>
            <div class="col-sm ms-3 me-3">
                <label for="exampleInputPassword1" class="form-label">Adresse</label>
                <input class="form-control form-control-lg mb-3" type="text" name="adress" placeholder="5 rue de Jean Louis">
            </div>
            <div class="col-sm ms-3 me-3">
                <label for="exampleInputPassword1" class="form-label">Code postal</label>
                <input class="form-control form-control-lg " type="number" name="zip_code" placeholder="95190">
            </div>
        </div>

        <div class="row">
            <div class="col-sm ms-3 me-3">
                <label for="exampleInputPassword1" class="form-label">Prix</label>
                <input type="number" step="0.01" class="form-control form-control-lg mb-3" placeholder="Prix" name="price" id="exampleInputPassword1">
            </div>

            <div class="col-sm ms-3 me-3">
                <label for="exampleInputPassword1" class="form-label">Nb. de personne max</label>
                <input type="number" class="form-control form-control-lg mb-3" placeholder="ex : 200" name="max_person" id="exampleInputPassword1">
            </div>
        </div>

        <div class="mb-3 mt-2">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" name="description" placeholder="Description de l'annonce"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Ajouter l'annonce</button>
    </form>
    <?php } else{ ?>
            <p>Veuillez vous connecter avec un compte hôte </p>
    <?php } ?>
      </div>
</div>


<?php
require_once __DIR__ . '/../_inc/footer.php';
?>