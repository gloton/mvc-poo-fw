<?php
/*jagl - al extender esta clase con la clase Controller, obliga a la clase 
indexController a incluir la funcion index*/

//si no se envia un metodo ejecutara esta funcion index
class indexController extends Controller
{
	public function __construct() {
		//de esta forma tenemos disponible el objeto View
		parent::__construct();
	}
	public function index()
	{
		//jagl agregaremos este atributo(es opcional)
		$this->_view->titulo = 'Portada';
		//para llamar a la vista
        $this->_view->renderizar('index','inicio');
	}
}

?>