<?php

class holaController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
# Segundo parametro $this->_view->renderizar('index', 'SEGUNDOPARAMETRO');        
#Esta variable es utilizada para agregar una clase: current,
#a la que por css se le agrega estilos para indicar al usuario que item se eligio. 
#Para llevar a cabo esto hay que compararla con el item de menu cliqueado. 
#Este menu por ejemplo se encuentra aplicado en views/layout/layout1/header.php. 
#Esta variable(parametro) $item se utiliza en header de la situiente forma 
    #el sigueinte codigo es del archivo header.php   
	#        if($item && $_layoutParams['menu'][$i]['id'] == $item ){
	#        	$_item_style = 'current';
	#        } else {
	#        	$_item_style = '';
	#     
#sin enbargo este es construido en application/View.php 
#Con esto por ejemplo decimos si existe $item(que es igual al segundo parametro de la funcion renderizar),
#y ademas este es igual al item de menu elegido $_layoutParams['menu'][$i]['id'], si es asi, 
#se le asignara la clase current a ese item.           
#Si no se coloca el segundo parametro, o simplemente se le coloca un nombre distinto, no se aplicara
#la clase current, sin embargo la aplicacion seguira en funcionamiento.
#en resumen el segundo parametro es solo para aplicar la clase current
#y funcionara si el segundo parametro coincide con el array $menu, en el valor del id.
    #el sigueinte codigo es del archivo application/View.php
	#    $menu = array(
	#    		array(
	#    				//este nos va a llavar a un controlador
	#    				'id' => 'inicio',
	#    				'titulo' => 'Inicio',
	#    				'enlace' => BASE_URL
	#    		),
	#    
	#    		array(
	#    				//y este otro nos va a llavar a otro controlador
	#    				'id' => 'hola',
	#    				'titulo' => 'Hola',
	#    				'enlace' => BASE_URL . 'hola'
	#    		)
	#    );    
    public function index()
    {
    	//agrega una propiedad a la vista
        $this->_view->titulo = 'Hola';
        
        //saca a pantalla(muestra) la vista
        $this->_view->renderizar('index', 'hola');
    }
}
?>
