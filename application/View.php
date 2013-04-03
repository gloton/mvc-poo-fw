<?php
/*
 * A diferecia de los controladores que todos deban extender 
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

		$menu = array(
				array(
						//este nos va a llavar a un controlador
						'id' => 'inicio',
						'titulo' => 'Inicio',
						'enlace' => BASE_URL
				),
		
				array(
						//y este otro nos va a llavar a otro controlador
						'id' => 'hola',
						'titulo' => 'Hola',
						'enlace' => BASE_URL . 'hola'
				)
		);
		# $_layoutParams
		#con este array se le enviaran la informacion sobre las rutas 
		#para agregar las rutas absolutas a las carpetas; css, img y js
		
		#Cuando le colocamos BASE_URL, no se le incluye la constante DS porque siempre el separador sera slash ej; 'views/layout/'
		$_layoutParams = array(
				'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
				'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
				'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
				'menu' => $menu
		);
		//crearemos una carpeta por cada controlador ej;	controllers/indexController.php views/index	
		$rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
		if(is_readable($rutaView)){
			//para incluir el header
			include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
			//es el contenido de la vista ej;views/index/index.phtml (depende del controlador)
			include_once $rutaView;
			//para incluir el footer
			include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
		} else {
            throw new Exception('Error de vista');
        }
	}
}
?>