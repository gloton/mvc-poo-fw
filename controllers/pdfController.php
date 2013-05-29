<?php

class pdfController extends Controller
{
    private $_pdf;
    
    public function __construct() {
        parent::__construct();
        //importar libreria
        $this->getLibrary('fpdf/fpdf');
        $this->_pdf = new FPDF;
    }
    
    public function index(){}
    
    //si le agrego parametros tengo que pasarle esos parametros por la url
    //EJEMPLO:http://localhost/mvc-poo-fw/pdf/pdf1/jorge/gatica
    public function pdf1($nombre, $apellido)
    {
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial','B',16);
        $this->_pdf->Cell(40,10,$nombre . ' ' . $apellido);
        $this->_pdf->Output();
    }
    
    public function pdf2($nombre, $apellido)
    {
    	require_once ROOT . 'public' . DS . 'files' . DS . 'pdf2.php';
    }    
}

?>
