<?php
class postController extends Controller {	
	private $_post;
	
	public function __construct() {
		//de esta forma tenemos disponible el objeto View
		parent::__construct();
		$this->_post = $this->loadModel('post');
	}
		
	public function index()
	{
		$this->_view->posts = $this->_post->getPosts();
		
		//jagl agregaremos este atributo(es opcional)
		$this->_view->titulo = 'Post';

		//para llamar a la vista
        $this->_view->renderizar('index','post');
	}
}
?>