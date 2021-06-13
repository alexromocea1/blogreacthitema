<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/header.php';
require_once __DIR__ . '/../_inc/nav.php';
?>

<!-- LeafLet css-->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">

<style>
    #maCarte {
        height: 50vh;
        width: 95vw;
    }

    #legende {
        margin-top: 5px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
    }

    #legende img {
        width: 30px;
    }

    col-sm {
        align-items: center;
        max-width: 30rem;
    }
</style>
<!--- PAGE ACCUEIL --->
<div class="container-sm d-flex p-2 bd-highlight justify-content-center mt-5">
    <div class="row mt-5 d-flex align-items-center">
        <div class="col-sm">
            <h2><br> <span>nightLife</span></h2>
            <p>Un tout nouveau genre d'expérience.<br>Cliquez sur le bouton en dessous pour avoir accès aux différents évènements près de chez vous !</p>
            <a href="/annonces" class="btn btn-success">En savoir plus</a>
            <p>Vous pouvez aussi cliquez sur la carte ci-dessous pour accéder à plus de détails sur l'établissement !</p>
        </div>


        <div id="maCarte"></div>
        <div id="legende">
            <div class="legendeBar"><img src="https://image.flaticon.com/icons/png/512/4856/4856577.png" alt="icône bar"> Bar</div>
            <div class="legendeBdn"><img src="https://image.flaticon.com/icons/png/512/73/73364.png" alt="icône boîte de nuit"> Boîte de nuit</div>
        </div>


    </div>
</div>

<!-- Fichiers Javascript Leaflet -->
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<script>
    var bars = {
        "Bar Hemingway, 15 Place Vendôme, 75001 Paris": {
            "lat": 48.87054768491501,
            "lon": 2.327505042365793
        },
        "Buddha-Bar Paris, 8-12 Rue Boissy d'Anglas, 75008 Paris": {
            "lat": 48.86950931237648,
            "lon": 2.3206782279224303
        },
        "Little Red Door, 60 Rue Charlot, 75003 Paris": {
            "lat": 48.86365465033627,
            "lon": 2.3635517151994514
        },
        "Serpent A Plume, 24 Place des Vosges, 75003 Paris": {
            "lat": 48.85611580241089,
            "lon": 2.3666317053665713
        },
        "Le Village, 56 Rue de la Montagne Sainte Geneviève, 75005 Paris": {
            "lat": 48.847312249313546,
            "lon": 2.348238505306086
        },
    };

    var boiteDeNuit = {
        "Mix Club, 24 Rue de l'Arrivée, 75015 Paris": {
            "lat": 48.84164601023168,
            "lon": 2.3224974676241645
        },
        "Le Roméo Paris, 71 Boulevard Saint-Germain, 75005 Paris": {
            "lat": 48.85064918677897,
            "lon": 2.3450500826887613
        },
        "Le Next, 17 Rue Tiquetonne, 75002 Paris": {
            "lat": 48.864577163912706,
            "lon": 2.3486031434858763
        }

    };
    var tableauMarqueurs = [];

    // On initialise la carte
    var carte = L.map('maCarte').setView([48.852969, 2.349903], 13);

    // On charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {

        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(carte);

    var marqueurs = L.markerClusterGroup();

    // On personnalise le marqueur pour les bars
    var iconeDeBar = L.icon({
        iconUrl: "https://image.flaticon.com/icons/png/512/4856/4856577.png",
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    })

    // On personnalise le marqueur pour les boîtes de nuit
    var iconeDeBdn = L.icon({
        iconUrl: "https://image.flaticon.com/icons/png/512/73/73364.png",
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    })

    // On parcourt les différentes bars
    for (ville in bars) {
        // On crée le marqueur et on lui attribue une popup
        var marqueur = L.marker([bars[ville].lat, bars[ville].lon], {
            icon: iconeDeBar
        }); //.addTo(carte); Inutile lors de l'utilisation des clusters
        marqueur.bindPopup("<p>" + ville + "</p>");
        marqueurs.addLayer(marqueur); // On ajoute le marqueur au groupe

        // On ajoute le marqueur au tableau
        tableauMarqueurs.push(marqueur);
    }
    //On parcout les différentes boîtes de nuit.
    for (ville in boiteDeNuit) {
        // On crée le marqueur et on lui attribue une popup
        var marqueur = L.marker([boiteDeNuit[ville].lat, boiteDeNuit[ville].lon], {
            icon: iconeDeBdn
        }); //.addTo(carte); Inutile lors de l'utilisation des clusters
        marqueur.bindPopup("<p>" + ville + "</p>");
        marqueurs.addLayer(marqueur); // On ajoute le marqueur au groupe

        // On ajoute le marqueur au tableau
        tableauMarqueurs.push(marqueur);
    }
    // On regroupe les marqueurs dans un groupe Leaflet
    var groupe = new L.featureGroup(tableauMarqueurs);

    // On adapte le zoom au groupe
    carte.fitBounds(groupe.getBounds().pad(0.5));

    carte.addLayer(marqueurs);
</script>

<?php

// inclusion du footer
require_once __DIR__ . '/../_inc/footer.php';
