<?php

class nosotrosController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
    	//agrega una propiedad a la vista
        $this->_view->titulo = 'Pagina nosotros';
        
        //saca a pantalla(muestra) la vista
        $this->_view->renderizar('casita', 'nosotros');
    }
}
?>
