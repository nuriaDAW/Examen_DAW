<?php
require __DIR__ . '/vendor/autoload.php';

use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;
use SujalPatel\IntToEnglish\IntToEnglish;

if (!empty($_REQUEST['lat1'])) {


    // Coordenadas
    $p1 = new LatLong($_REQUEST['lat1'], $_REQUEST['lon1']);
    $p2 = new LatLong($_REQUEST['lat2'], $_REQUEST['lon2']);

    // Calcula la distancia entre los dos puntos
    $distanceCalculator = new DistanceCalculator($p1, $p2);

    $distance = $distanceCalculator->get();

    // Muestra la distancia en kilómetros
    echo 'La distancia en kilómetros es: ' . $distance->asKilometres();

    // Muestra la distancia en inglés
    echo '<br > La distancia en inglés es de: ' . IntToEnglish::Int2Eng(round($distance->asKilometres()));
} else {

    echo '

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body>


    <div class="row">

        <div class="col s12  blue center-align card-panel teal lighten-2">
            <h4>Examen Despliegue Aplicaciones Web</h4>
        </div>
        
        <div class="col s12  ">
            
            <p>Lo que vamos a realizar es una aplicacion en PHP, que realize lo siguiente:
            <ol>
            <li>Dado dos puntos calcular la distancia entre ellos. Esos puntos vendran marcados por su latitud y su longitud </li>
            <li>Una vez halla calculado la distancia quiero que me traduzca al ingles esa distancia.</li>
            </ol>
            </p>
            <p>
            Por ejemplo dadas las siguientes coordenadas:
            <ul>
            <li>(41.65518, -4.72372) corresponde a Valladolid </li>
            <li>(37.38283, -5.97317) corresponde a Sevilla </li>
            </ul>
            
            </p>
        
            
        </div>
        <aside>
                    <h5>Enlace Heroku </h5>
                    Pulsa sobre esta imagen para ver desplegada la aplicacion sobre heroku
                    <p>
                    <a title="Heroku" href="https://examen-daw.herokuapp.com/"><img src="imagenes/heroku.png" alt="Heroku" width="120" height="120" /></a>
                    </p>
        </aside>
        <form class="col s12" method = "POST" action="">
            <div class="row">
                
                <div class="input-field col s2">
                    <label for="lat1">Introduce la Latitud Punto 1:</label>
                    <input name="lat1" id="lat1" type="text" class="validate" value="">
                    
                </div>
                <div class="input-field col s2">
                    <label for="lon1">Introduce la Longitud  Punto 1:</label>
                    <input name="lon1" id="lon1" type="text" class="validate" value="">
                
                </div>
                <div class="input-field col s2">
                    <label for="lat2">Introduce la Latitud Punto 2:</label>
                    <input name="lat2" id="lat2" type="text" class="validate" value="">
                
                </div>
                <div class="input-field col s2">
                    <label for="lon2">Introduce la Longitud  Punto 2:</label>
                    <input name="lon2" id="lon2" type="text" class="validate" value="">
                
                </div>
               

                <div class="row "></div> <!-- linea en blanco -->
                <div class="col s4">

                    <button class="btn waves-effect waves-light" type="submit" name="calcular">Calcular

                    </button>

                </div>
                
            </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>';
}
