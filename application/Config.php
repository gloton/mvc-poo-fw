<?php
/*esta constante va a representar el controlador por defecto de la aplicacion
 * , es decir, en caso de que no se envie un controlador en la url, el va a llamar
 * el controlador index
 * */

//esta constaante la vamos a utilizar para incluir archivos del lado de las vistas o del lado del usuario
define('BASE_URL', 'http://localhost/mvc-poo-fw/');

define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'default');


/*inicio parametros comunes para todas las vistas*/
define('APP_NAME', 'Mi Framework');
define('APP_SLOGAN', 'mi primer framework php y mvc...');
define('APP_COMPANY', 'www.dlancedu.com');
/*fin parametros comunes para todas las vistas*/
?>