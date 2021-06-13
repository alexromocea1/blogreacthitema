<?php


require_once __DIR__ . '/../_inc/header.php';
?>
    <center>  
        <h1 style="text-decoration: none; color:brown;">Supprimez votre annonce :</h1>
        
        <form method="post" action="/admin/game/form/delete-fait"> 
            <label id="first">Référence : </label>
            <input type="text" name="id" required><br/></p>

            <button type="submit" name="save">Supprimer</button>
        </form>
    </center>

<?php




// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';