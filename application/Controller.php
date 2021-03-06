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
}

?>
