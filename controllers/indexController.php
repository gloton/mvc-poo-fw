<?php
/*jagl - al extender esta clase con la clase Controller, obliga a la clase 
indexController a incluir la funcion index*/

//si no se envia un metodo ejecutara esta funcion index
class indexController extends Controller
{
	public function index()
	{
		echo 'Hola desde el indexController... ';
	}
}

?>