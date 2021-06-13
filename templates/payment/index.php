<?php

// inclusion du header

use App\Query\UserQuery;

require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
<div class = "mt-5">
<br/>
    <br/>
    <?php if ($level == UserQuery::VISITOR_INDICATOR) { ?>
        Vous n'êtes pas connecté
    <?php } else if (!isset($locationData) || $locationData === false ) { ?>
        Cette annonce n'existe pas
    <?php } else if(isset($locationData) || $locationData !== false) { ?>
        <div class="container">
            <p>Etablissement : <?php echo $locationData->getName() ?></p>
            <p>Prix : <?php echo $locationData->getPrice() ?> euro</p>
        </div>
        <div class="container border">
            <form method="POST" action="/payment_processing" id = "payment-form" >
                <div class="form-group">
                    <input type="hidden" name = "type" value = <?php echo $type ?> />
                    <input type="hidden" name = "id" value = <?php echo $id ?> />

                    <label for="name">Nom et prénom : </label>
                    <input type = text name="name" placeholder = "Nom Prenom" class="form-control" required></input>
                    <label for="name">Email : </label>
                    <input type = "email" name="email" placeholder = "Email" class="form-control" required></input>

                    <label for="number">Informations bancaires : </label>
                    <input type = "text" placeholder = "numero de carte" name = number required></input>
                    <select name = "exp_month" ><?php for($i = 0; $i < 12;$i = $i + 1){ ?>
                        <option> <?php echo ($i+1)?></option>
                        <?php } ?>
                    </select>

                    <select name = "exp_year"><?php for($i = 2020; $i < 2030;$i = $i + 1){ ?>
                        <option> <?php echo ($i+1)?></option>
                        <?php } ?>
                    </select>

                    <input type = text placeholder = "Code à 3 chiffre" name = "cvc"></input><br/>


                    <label for="person_number">Nombre de personne : </label>

                    <input type="number" name = "person_number" min = 0 required class="form-control"/>

                    <label for="location_date">Date de la location : </label>
                    <select name = "location_date" class="form-control" required><?php foreach($dates as $date){ ?>
                        <option value = <?php echo $date[0] ?>> <?php  echo date('d/m/Y', strtotime($date[0]))?></option>
                        <?php } ?>
                    </select> 

                    <br/>
                    <label>En cliquant sur "Confirmer", vous accepter <a href = "/legal"target="_blank" >notre traitement des données</a></label>
                    <input type="checkbox" class="form-check-input" required/>
                    <br/>
                    <input type="submit" value = "Confirmer"/>
                </div>
            </form>
        </div>
    <?php } ?>
    </div>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
?>


