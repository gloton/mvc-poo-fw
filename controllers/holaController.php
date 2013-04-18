<?php

class holaController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
#Segundo parametro $this->_view->renderizar('index', 'SEGUNDOPARAMETRO');        
#Esta variable es utilizada para indedicar la pagina que se quiere aparezca por defecto. 
#Para llevar a cabo esto hay que compararla con el item de menu cliqueado. 
#Este menu por ejemplo se encuentra en views/layout/layout1/header.php. 
#Esta variable(parametro) $item se utiliza en header de la situiente forma 
    #el sigueinte codigo es del archivo header.php   
	#        if($item && $_layoutParams['menu'][$i]['id'] == $item ){
	#        	$_item_style = 'current';
	#        } else {
	#        	$_item_style = '';
	#        }
#Con esto por ejemplo decimos si existe $item(que es igual al segundo parametro de la funcion renderizar),
#y ademas este es igual al item de menu elegido $_layoutParams['menu'][$i]['id'], si es asi, 
#se le asignara la clase current a ese item.            
    
    public function index()
    {
        $this->_view->titulo = 'Hola';
        $this->_view->renderizar('index', 'hola');
    }
}
?>
