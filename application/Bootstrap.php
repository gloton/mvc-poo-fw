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
        
        if(is_readable($rutaControlador)){
        	require_once $rutaControlador;
        	$controller = new $controller;
        	
        	//vamos a revisar si el metodo es valido (revisar)
        	if(is_callable(array($controller, $metodo))){
        		$metodo = $peticion->getMetodo();
        	} else {
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