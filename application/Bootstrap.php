<?php
class Bootstrap
{
	//como parametro se le pasa un objeto del Request
    public static function run(Request $peticion)
    {
    	# $peticion->getControlador();
    	#contiene solo el nombre del controlador
        $controller = $peticion->getControlador() . 'Controller';
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        
        //jagl deberia contener el metodo
        $metodo = $peticion->getMetodo();
        
        //jagl deberia contener los argumentos
        $args = $peticion->getArgs();
        
        # is_readable
        #Prueba si el archivo tiene permisos de lectura.
        #Si existe y el legible devuelve true, de lo contrario false
        if(is_readable($rutaControlador)){
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
        	
        	if(isset($args)){
        		# call_user_func_array
        		#Llama  al metodo $metodo del objeto $controller
        		#($controller->$metodo) los argumentos contenidos en $args
        		# $controller
        		#Es el controlador que fue pasado por la url
        		#$metodo
        		#Es el metodo que fue pasado por la url
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
        

      
/*         $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        
        //verificamos si es accesible el archivo
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            $controller = new $controller;
            
            //vamos a revisar si el metodo es valido (revisar)
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            else{
                call_user_func(array($controller, $metodo));
            }
            
        } else {
            throw new Exception('no encontrado');
        } */
    }
}

?>