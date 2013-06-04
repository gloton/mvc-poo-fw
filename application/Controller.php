<?php

//tiene que ser una clase abstracta para que no pueda ser instanciada
abstract class Controller
{
	protected $_view;
	
	public function __construct() {
		//de esta forma tenemos disponible el objeto View en el controlador ppal
		$this->_view = new View (new Request);
	}	
	/*	este medodo es abstracto que obliga a que todas las clases que 
		hereden de Controller, implementen el metodo index por obligacion
		aunque este no tenga codigo.
		De esta manera, nos aseguramos que siempre haya un metodo index en
		todos nuestros controladores, que es el metodo que se va a asignar 
		por defecto en el archivo Request.php 
		
        if(!$this->_metodo){
            $this->_metodo = 'index'; 
        }
        cuando no se envie un metodo al controlador, o se envie un metodo
        por error, ya eso lo va a corregir el bootstrap
    */ 
    abstract public function index ();
    
    //crearemos un metodo que nos importe los modelos
    protected function loadModel($modelo)
    {
    	$modelo = $modelo . 'Model';
    	$rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
    
    	if(is_readable($rutaModelo)){
    		require_once $rutaModelo;
    		$modelo = new $modelo;
    		return $modelo;
    	}
    	else {
    		throw new Exception('Error de modelo');
    	}
    }
    
    protected function getLibrary($libreria)
    {
    	$rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
    
    	if(is_readable($rutaLibreria)){
    		require_once $rutaLibreria;
    	}
    	else{
    		throw new Exception('Error de libreria');
    	}
    }    

    //este metodo va a tomar una variable enviada por el metodo post,
    //y devolvera este dato filtrado
    protected function getTexto($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
        	# ENT_QUOTES
        	#es para que transforme las comillas simples y dobles
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }

        return '';

    }
}

?>
