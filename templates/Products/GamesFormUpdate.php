<?php


require_once __DIR__ . '/../_inc/header.php';
?>
    <center>  
        <h1 style="text-decoration: none; color:darkseagreen;">Modifiez votre annonce :</h1>
        
        <form method="post" action="/admin/game/form/update-fait"> 
            <label id="first">Référence : </label>
            <input type="text" name="id" required><br/></p>

            <label id="first">Nom : </label>
            <input type="text" name="name" required><br/></p>

            <label id="first">Console : </label>
            <select id="pet-select" name="plateform" required>
                <option value="">--Choississez votre console--</option>
                <option value="Playstation">Playstation</option>
                <option value="Xbox">Xbox</option>
                <option value="Switch">Switch</option>
            </select><br/></p>

            <label id="first">Prix : </label>
            <input type="text" name="price" required><br/></p>

            <button type="submit" name="save">Modifier</button>
        </form>
    </center>

<?php



// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';