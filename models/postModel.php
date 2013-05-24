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
}

?>
 