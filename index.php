<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


//header('Access-Control-Allow-Origin: *'); //Per evitar que si les peticiones es fan en diferents ports, no ho faci bé

// url de la forma: index.php?control=nomControlador
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    // comprovem que existeix el fitxer nomControlador.php
    if (file_exists('controllers/' . $controller . '.php')) {

        include_once 'controllers/' . $controller . '.php';
        // conprovem que tinguem definida la classe nomContrador
        if (class_exists($controller)) {
            // Creem un objecte de la classe nomControlador
            // Al crear l'objecte es crida per defecte el seu constructor
            $objcontroller = new $controller();
            // url de la forma: index.php?control=nomControlador&operacio=nomMetode
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                // Comprovem que el mètode existeixi dins de la classe
                if (method_exists($objcontroller, $action)) {
                    // i el cridem
                    $objcontroller->$action();
                    exit;
                }
            }
            // url de la forma: index.php?control=nomControlador&operacio=nomMetode
            // Com no hem especificat cap mètode cridem al mètode index
            // Per a que funcioni tots els controladors l'han de tenir implementat obligatòriament!!
            $objcontroller->index();
            exit;
        }
    }
}

// url de la forma: index.php
// No s'ha especificat cap controlador en la url
// Es crida per defecte el controlador controlDefault
// Per a que funcioni el programa ha d'estar implementat!!
include_once 'controllers/ControllerDefault.php';
$objcontroller = new ControllerDefault();
// Aquest controlador ha de tenir també obligatòriament el mètode index
$objcontroller->index();

?>