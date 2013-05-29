<?php
class Bootstrap
{
	//como parametro se le pasa un objeto del Request
    public static function run(Request $peticion)
    {
    	# $peticion->getControlador();
    	#contiene solo el nombre del controlador
    	#Ej; mvc-poo-fw/dfsdfdf/uuuu, en este caso su valor es dfsdfdf (toma el primero)
    	#en caso no pasarle nada , es decir, mvc-poo-fw, toma el valor index (Request.php)   
    	 	
    	//concatena el nombre del controlador con Controler
    	//ejemplo; nombrecontroladorController
        $controller = $peticion->getControlador() . 'Controller'; 
        
        //ruta completa al archivo controlador dentro de la carpeta controllers
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        
        //jagl deberia contener el metodo
        $metodo = $peticion->getMetodo();
        
        //jagl deberia contener los argumentos
        $args = $peticion->getArgs();
        
        # is_readable
        #Prueba si el archivo tiene permisos de lectura.
        #Si existe y el legible devuelve true, de lo contrario false
        if(is_readable($rutaControlador)) {
        	
        	//si no se le pasa ningun controlador se pasa por defecto el controlador index es decir 
        	//incluira el archivo($rutaControlador) C:\servidor\Apache2\htdocs\mvc-poo-fw\controllers\holaController.php(windows)
        	//incluira el archivo($rutaControlador) /home/jorgew7/public_html/php/mvc/mvc-poo-fw/controllers/indexController.php(linux)

        	require_once $rutaControlador;

        	$controller = new $controller;
        	
        	# is_callable
        	#comprueba si una funcion es llamable (es en la documentacion).
        	#En este caso $controller es un objeto, y metodo un string que contienen 
        	#el nombre de la funcion que esta dentro de ese objeto($controller)
        	//vamos a revisar si el metodo es valido (revisar)
        	if(is_callable(array($controller, $metodo))){
        		$metodo = $peticion->getMetodo();
        	} else {
        		$metodo = 'index';
        	}

        	//jagl isset($args) creo que siempre deberia dar verdadero
        	if(isset($args)){
        		# call_user_func_array
        		#Llama  al metodo $metodo del objeto $controller
        		#($controller->$metodo) los argumentos contenidos en $args
        		# $controller
        		#Es el controlador que fue pasado por la url
        		#$metodo
        		#Es el metodo que fue pasado por la url
        		
        		//aqui es donde se llama a al metodo de del controlador, en el caso del menu hola
        		//llama al metodo index del controlador holaController
        		//El metodo puede llamarse de otra forma, siempre y cuando exista en el controlador llamado
        		//lo cual se determina en la linea if(is_callable(array($controller, $metodo))){
        		call_user_func_array(array($controller, $metodo), $args);
        	}
        	else{
        		# call_user_func
        		# Llama al metodo $metodo del objeto $controller
        		call_user_func(array($controller, $metodo));
        	}        	
        } else {
            throw new Exception('no encontrado');
        }

    }
}

?>