<?php
class postController extends Controller {	
	private $_post;
	
	public function __construct() {
		//de esta forma tenemos disponible el objeto View
		parent::__construct();
		# loadModel(metodo) 
		#esta definido en Controller
		#y esta funcion es la encargada de de cargar el archivo models/postModel.php
		$this->_post = $this->loadModel('post');
	}
		
	public function index()
	{
		# getPosts()
		#carga la funcon getPosts() definida en models/postModel.php
		#y es la encargada de obtener los post de la base de datos
		$this->_view->posts = $this->_post->getPosts();
		
		//jagl agregaremos este atributo(es opcional)
		$this->_view->titulo = 'Post';

		//para llamar a la vista
        $this->_view->renderizar('index','post');
	}

	public function nuevo()
	{
		$this->_view->titulo = 'Nuevo Post';
		/*
		 * validar el campo con name titulo
		 * $this->_view->prueba = $this->getTexto('titulo');
		 */
		/*
		 * validar el campo con name titulo
		 * $this->_view->prueba = $this->getInt('guardar');
		 */
		if($this->getInt('guardar') == 1){
			$this->_view->datos = $_POST;
			//si no se ingreso el titulo
			if(!$this->getTexto('titulo')){
				$this->_view->_error = 'Debe introducir el titulo del post';
				$this->_view->renderizar('nuevo', 'post');
				exit;
			}
			//si no ingresa el cuerpo			
			if(!$this->getTexto('cuerpo')){
				$this->_view->_error = 'Debe introducir el cuerpo del post';
				$this->_view->renderizar('nuevo', 'post');
				exit;
			}	
			$this->_post->insertarPost(
					$this->getTexto('titulo'),
					$this->getTexto('cuerpo')
			);
			
			$this->redireccionar('post');				
		}
		
		$this->_view->renderizar('nuevo','post');
	}	
}
?>