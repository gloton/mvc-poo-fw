<?php
/*esta constante va a representar el controlador por defecto de la aplicacion
 * , es decir, en caso de que no se envie un controlador en la url, el va a llamar
 * el controlador index
 * */

//esta constaante la vamos a utilizar para incluir archivos del lado de las vistas o del lado del usuario
define('BASE_URL', 'http://localhost/mvc-poo-fw/');

define('DEFAULT_CONTROLLER', 'index');

# layout1
#es uno de los layout dentro de la carpeta views/layout
# es decir, esta carpeta es la views/layout/layout1
//aca define el layout a utilizar: layout hasta ahora; layout1, default
define('DEFAULT_LAYOUT', 'layout1');


/*inicio parametros comunes para todas las vistas*/
define('APP_NAME', 'Mi Framework');
define('APP_SLOGAN', 'mi primer framework php y mvc...');
define('APP_COMPANY', 'www.dlancedu.com');
/*fin parametros comunes para todas las vistas*/
?>