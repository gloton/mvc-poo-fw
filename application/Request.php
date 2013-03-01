<?php
class Request
{
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    
    public function __construct() {
    	#isset
    	# comprueba si tiene un valor aunque sea nulo (ej:$x = NULL;)
        if(isset($_GET['url'])){
        	
        	#INPUT_GET
        	# indica que le estamos pasando parametros por la url 
        	#url 
        	#indica los parametros que le estamos pasando
        	#FILTER_SANITIZE_URL
        	#devolvera filtrado el parametro url
        	#el filtro FILTER_SANITIZE_URL  Elimina todos los caracteres excepto letras, dígitos
        	#y $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
			#Osea no elimina $ ni el punto, si elimina los espacios.
			#Listado de filtros
			#http://es2.php.net/manual/es/function.filter-input.php
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            
            #explode
            # dividira el parametro $url, cada vez que encuentre un /
            # y lo devolvera en forma de array 
            $url = explode('/', $url);
            
            #array_filter
            # hace que todos los elementos que no sean validos en el arreglo,
            # los va a eliminar
            # ej: si en $url se encuentra la url localhost/mvc////controller////metodo////arg
            # este elimina los / demas (investigar mas) 
            $url = array_filter($url);
            
            #array_shift
            # extrae(saca) el primer elemento del arreglo $url 
            #y se lo asigna a $this->_controlador
            $this->_controlador = strtolower(array_shift($url));
            
            #array_shift
            # al haber un array_shift antes que extrajo el primer elemento
            # ahora array_shift extrae(saca) el siguiente elemento(que paso a ser el 1ro)
            $this->_metodo = strtolower(array_shift($url));
            
            $this->_argumentos = $url;
        }       
        
        //si no se indica un controlador, este establese el valor de
        //DEFAULT_CONTROLLER que se establecio en Config.php
        if(!$this->_controlador){
            $this->_controlador = DEFAULT_CONTROLLER;
        }
        
        if(!$this->_metodo){
            $this->_metodo = 'index'; 
        }
        
        if(!isset($this->_argumentos)){
            $this->_argumentos = array();
        }
    }
    
    public function getControlador()
    {
        return $this->_controlador;
    }
    
    public function getMetodo()
    {
        return $this->_metodo;
    }
    
    public function getArgs()
    {
        return $this->_argumentos;
    }
}

?>