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

//probaremos nuestra clase request
$r = new Request();
echo $r->getControlador() . '<br />';
echo $r->getMetodo() . '<pre>';
print_r($r->getArgs());		
echo '</pre>';

/** inicio 15:50 01-03-2013
 * LOS RESULTADOS QUE DAN AL PROBAR LA CLASE Request SON**/
/*
 * 
http://localhost/mvc-poo-fw/controlador/metodo/argumentos
imprime 
controlador
metodo

Array
(
    [0] => argumentos
)


http://localhost/mvc-poo-fw/controlador/metodo/arg1/arg2/argc/argd
imprime
controlador
metodo

Array
(
    [0] => arg1
    [1] => arg2
    [2] => argc
    [3] => argd
)

http://localhost/mvc-poo-fw/cualquier/cosa/arg1/arg2/argc/argd
imprime
cualquier
cosa

Array
(
    [0] => arg1
    [1] => arg2
    [2] => argc
    [3] => argd
)

fin 15:50 01-03-2013 */
?>