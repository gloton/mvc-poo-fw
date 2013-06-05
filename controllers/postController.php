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
		$this->_view->prueba = $this->getTexto('titulo');
		$this->_view->renderizar('nuevo','post');
	}	
}
?>