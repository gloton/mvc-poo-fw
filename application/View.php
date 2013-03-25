<?php
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