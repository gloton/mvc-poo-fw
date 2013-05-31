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
    	$this->_db->prepare("INSERT INTO posts VALUES (NULL,$titulo,$cuerpo)")
    			->execute (
    				array(
    					'titulo' => $titulo,
    					'cuerpo' => $cuerpo
    				));
    }

}

?>
 