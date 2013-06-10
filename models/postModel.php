<?php

class postModel extends Model
{
    public $result;
    public function __construct() {
        parent::__construct();
    }
    
    public function getPosts()
    {
        $post = $this->_db->query("select * from posts");
        
        //PDOStatement::fetchAll — Devuelve un array que contiene todas las filas del conjunto de resultados 
        return $post->fetchAll();
    }

    public function insertarPost ($titulo, $cuerpo) 
    {
    	# prepare
    	#este metodo ayuda con la seguridad contra inyecciones SQL
    	#ya que elimina automaticamente las comillas en las consultas,
    	#pero igual hay que sanitizar los datos para lo cual se crearan otras
    	#funciones que realicen esta tarea(sanitizar).
        #en este caso crearemos la funcion getTexto($variable) en el controlador principal (Controllers)
    	$this->result = $this->_db->prepare("INSERT INTO posts VALUES (null, :titulo, :cuerpo)");
    	$this->result->execute(
    			array(
    					':titulo' => $titulo,
    					':cuerpo' => $cuerpo
    			));

        #otra forma de haber ejecutado correctamente esta consulta es como coloco a continuacion
        /*
        $this->_db->prepare("INSERT INTO posts VALUES (NULL,:titulo,:cuerpo)")
                ->execute (
                    array(
                        ':titulo' => $titulo,
                        ':cuerpo' => $cuerpo
                    ));        
        */
        #pero a mi me causa confucion
    }

    	/* Yo, lo habia escrito asi, pero esta mal (NULL,$titulo,$cuerpo) era (null, :titulo, :cuerpo)")
    	$this->_db->prepare("INSERT INTO posts VALUES (NULL,$titulo,$cuerpo)")
    			->execute (
    				array(
    					':titulo' => $titulo,
    					':cuerpo' => $cuerpo
    				));
		*/    				
}

?>
 