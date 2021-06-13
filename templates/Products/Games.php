<?php
// inclusion du footer
require_once __DIR__ . '/../_inc/header.php';
?>
    <center>  
        <h1 style="text-decoration: none; color:darkblue;">Découvrez notre catalogue de jeux vidéos</h1>
    </center>

<?php
foreach($games as $game)
{
    echo '<center>';
    echo '<div>';
    echo 'Référence : '. $game['id'].'<br>';
    echo 'Nom : '. $game['name'].'<br>';
    echo 'Console : '. $game['console'].'<br>';
    echo 'Prix : '. $game['price'].' € <br>';
    echo '<a href="/admin/game/form/update"><button>Modifier</button></a>';
    echo '<a href="/admin/game/form/delete"><button>Supprimer</button></a>';
    echo '</div>';
    echo '</center><br><br>';
}
// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';