<?php

class postModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getPosts()
    {
        $post = $this->_db->query("select * from posts");
        
        //PDOStatement::fetchAll — Devuelve un array que contiene todas las filas del conjunto de resultados 
        return $post->fetchAll();
    }

    public function insertarPost ($titulo, $cuerpo) {
    	# prepare
    	#este metodo ayuda con la seguridad contra inyecciones SQL
    	#ya que elimina automaticamente las comillas en las consultas,
    	#pero igual hay que sanitizar los datos para lo cual se crearan otras
    	#funciones que realicen esta tarea(sanitizar).
        #en este caso crearemos la funcion getTexto($variable) en el controlador principal (Controllers)
    	$this->_db->prepare("INSERT INTO posts VALUES (NULL,$titulo,$cuerpo)")
    			->execute (
    				array(
    					':titulo' => $titulo,
    					':cuerpo' => $cuerpo
    				));
    }

}

?>
 