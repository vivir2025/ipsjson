<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/tcpdf/tcpdf.php';


class Reportes extends CI_Controller {


    public function informe4()
    {
    
        $data['title'] = 'DESCARGADOR MASIVO HISTORIAS CLINICAS';
    
        $this->load->view("CPlantilla/VHead", $data);
    
        $this->load->view("CPlantilla/VBarraMenu");
    
        $this->load->view("Reportes/VConsultar4.php");
    
        $this->load->view("CPlantilla/VFooter");
    }

    public function __construct() {
        parent::__construct();
        $this->load->model('HistoriaClinica_model');
    }

    public function index() {
        $this->load->view('reportes/form_fechas');
    }

    public function generar_pdf() {

        set_time_limit(0);
        // Validar fechas
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');
        
        if(empty($fecha_inicio) || empty($fecha_fin)) {
            $this->session->set_flashdata('error', 'Debe seleccionar ambas fechas');
            redirect('reportes');
        }

        // Obtener datos completos con relaciones
        $historias = $this->HistoriaClinica_model->get_historias_completas_por_fecha($fecha_inicio, $fecha_fin);
        
        if(empty($historias)) {
            $this->session->set_flashdata('error', 'No se encontraron historias clínicas en el rango de fechas');
            redirect('reportes');
        }

        // Configurar PDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        
        $pdf->SetCreator('Sistema de Historias Clínicas');
        $pdf->SetAuthor('IPS');
        $pdf->SetTitle('Historias Clínicas ' . date('Y-m-d'));
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetAutoPageBreak(TRUE, 15);
        $pdf->SetFont('helvetica', '', 10);

        foreach($historias as $hc) {
            // Manejo de la firma en array
    if (!empty($hc['usuFirma'])) {
        $hc['firma_base64'] = 'data:image/jpeg;base64,' . base64_encode($hc['usuFirma']);
    } else {
        $hc['firma_base64'] = null;
    }


            
            $pdf->AddPage();
            
            // Generar contenido HTML
            $html = $this->load->view('reportes/reporte_pdf', ['hc' => $hc, 'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin], true);
            
            // Escribir HTML en PDF
            $pdf->writeHTML($html, true, false, true, false, '');
        }

        // Salida del PDF (D para descarga, I para vista en navegador)
        $pdf->Output('historias_clinicas_'.date('Ymd_His').'.pdf', 'D');
    }
}