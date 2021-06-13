<?php
require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>
<style>
    body {
        margin: 0;
        padding: 0;
        background: url()no-repeat;
        background-size: cover;
        background-position: center;
    }

    .container {
        height: 75vh;
        width: 30%;
        background: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0 20px;
    }

    .img {
        height: 70px;
        width: 70px;
        background: url();
        background-size: cover;
        background-position: center;
        border-radius: 50px;
        position: absolute;
        top: 0%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .container h1 {
        color: black;
        margin-top: 50px;

    }

    .container p {
        color: black;
        margin-top: 60px;
        font-size: large;
    }

    .btn-box {
        background: no-repeat;
        outline: none;
        border: 1px solid black;
        color: black;
        width: 50%;
        padding: 7px 15px;
        font-size: large;
        cursor: pointer;
        transition: 0.3s ease;
        margin-top: 50px;
    }

    .btn-box:hover {
        background: black;
        color: white;
    }
</style>


<div class="container">
    <center>
        <h1>Qui sommes nous ?</h1>
        <div class="img">
        </div>
        <p>
            <strong>nLife</strong> est une jeune start-up composée de 3 associés spécialisés dans le domaine de l'informatique et plus particulièrement dans le développement web.
            Notre mission est simple : relancer le trafic des bars et boîtes après la crise sanitaire, pour cela nous allons
            créer un site web du nom de <strong>nightLife</strong> qui recensera les différents bars et boîtes de la
            région parisienne et permettra aux particuliers de louer des salles pour leur soirées.
        </p>
        <a href="/annonces"><button class="btn-box">Annonces</button></a>
    </center>
</div>


<?php
require_once __DIR__ . '/../_inc/footer.php';
?>