<?php
/*
 * A diferecia de los controladores que todos que todos deban extender 
 * desde un controlador principal. En las vistas no es necesario ya que 
 * estas no son instanciadas, pero si necesitamos un objeto que nos maneje 
 * el trabajo con las vistas, y eso lo va a ser la clase View
 * */
class View
{
	private $_controlador;
	
	public function __construct(Request $peticion) {
		$this->_controlador = $peticion->getControlador();
	}
	
	# $vista
	#Es el nombre de la vista
	//este metodo es quien nos va a hacer las llamadas a las vistas
	public function renderizar ($vista, $item = false) {
		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
		if(is_readable($rutaView)){
			include_once $rutaView;
		} else {
            throw new Exception('Error de vista');
        }
	}
}
?>