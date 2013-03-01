<?php
//echo $_GET["url"];
define('DS', DIRECTORY_SEPARATOR);

/*Ruta raiz de nuestra aplicacion.
La constante ROOT la vamos a utilizar para hacer la inclusion de archivos que 
este dentro del servidor y que vallamos a ocupar en nuestra aplicacion.
*/
define('ROOT', realpath(dirname(__FILE__)) . DS);

//vamos a definir el directorio de las aplicaciones 
define('APP_PATH', ROOT . 'application' . DS);

require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Registro.php';

echo "video2";
?>