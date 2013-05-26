<?php

class pdfController extends Controller
{
    private $_pdf;
    
    public function __construct() {
        parent::__construct();
        //importar libreria
        $this->getLibrary('fpdf');
        $this->_pdf = new FPDF;
    }
    
    public function index(){}
    
    public function pdf1()
    {
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial','B',16);
        $this->_pdf->Cell(40,10, 'Hola Mundo');
        $this->_pdf->Output();
    }
}

?>
