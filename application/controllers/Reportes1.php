<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

class Reportes1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('HistoriaClinica_model1');
    }

    public function informe4() {
        $data['title'] = 'DESCARGADOR MASIVO HISTORIAS CLINICAS';
        $this->load->view("CPlantilla/VHead", $data);
        $this->load->view("CPlantilla/VBarraMenu");
        $this->load->view("CInforme/VConsultar7.php");
        $this->load->view("CPlantilla/VFooter");
    }

    public function index() {
        $this->load->view('CInforme/VConsultar7.php');
    }

    public function generar_pdf() {
        set_time_limit(0);
        
        // Obtener datos del formulario
        $tipo_filtro = $this->input->post('tipo_filtro');
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');
        $documentos_input = $this->input->post('documentos_pacientes');
        
        $historias = [];
        $titulo_reporte = '';
        $pacientes_procesados = [];
        $documentos_no_encontrados = [];
        
        if ($tipo_filtro == 'fechas') {
            // Filtro por fechas (método original)
            if(empty($fecha_inicio) || empty($fecha_fin)) {
                $this->session->set_flashdata('error', 'Debe seleccionar ambas fechas');
                redirect('reportes1/informe4');
                return;
            }
            
            $historias = $this->HistoriaClinica_model1->get_historias_completas_por_fecha($fecha_inicio, $fecha_fin);
            $titulo_reporte = "Historias Clínicas del $fecha_inicio al $fecha_fin";
            
        } elseif ($tipo_filtro == 'documentos') {
            // Filtro por múltiples documentos
            if(empty($documentos_input)) {
                $this->session->set_flashdata('error', 'Debe ingresar al menos un número de documento');
                redirect('reportes1/informe4');
                return;
            }
            
            // Procesar los documentos (separados por comas, saltos de línea, etc.)
            $documentos_array = $this->procesar_documentos($documentos_input);
            
            if (empty($documentos_array)) {
                $this->session->set_flashdata('error', 'No se pudieron procesar los números de documento');
                redirect('reportes1/informe4');
                return;
            }
            
            // Verificar qué pacientes existen
            $pacientes_encontrados = $this->HistoriaClinica_model1->verificar_multiples_pacientes($documentos_array);
            $documentos_no_encontrados = $this->HistoriaClinica_model1->get_documentos_no_encontrados($documentos_array);
            
            // CAMBIO IMPORTANTE: Solo redirigir si NO se encuentra NINGÚN paciente
            if (empty($pacientes_encontrados)) {
                $this->session->set_flashdata('error', 'No se encontraron pacientes con ninguno de los documentos proporcionados');
                redirect('reportes1/informe4');
                return;
            }
            
            // Obtener historias clínicas solo de los pacientes encontrados
            $documentos_encontrados = array_column($pacientes_encontrados, 'pacDocumento');
            $historias = $this->HistoriaClinica_model1->get_historias_por_multiples_documentos($documentos_encontrados, $fecha_inicio, $fecha_fin);
            
            // Preparar título del reporte
            $total_pacientes_encontrados = count($pacientes_encontrados);
            $total_documentos_ingresados = count($documentos_array);
            $total_no_encontrados = count($documentos_no_encontrados);
            
            $titulo_reporte = "Historias Clínicas de $total_pacientes_encontrados paciente(s)";
            
            // Agregar información sobre documentos no encontrados al título si los hay
            if ($total_no_encontrados > 0) {
                $titulo_reporte .= " ($total_no_encontrados documento(s) no encontrado(s))";
            }
            
            $pacientes_procesados = $pacientes_encontrados;
        }
        
        // CAMBIO: Solo verificar si hay historias clínicas, no si hay documentos no encontrados
        if(empty($historias)) {
            $mensaje_error = ($tipo_filtro == 'fechas') ? 
                'No se encontraron historias clínicas en el rango de fechas seleccionado' :
                'No se encontraron historias clínicas para ninguno de los pacientes especificados';
            
            $this->session->set_flashdata('error', $mensaje_error);
            redirect('reportes1/informe4');
            return;
        }

        // Configurar PDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        
        $pdf->SetCreator('Sistema de Historias Clínicas');
        $pdf->SetAuthor('IPS');
        $pdf->SetTitle($titulo_reporte);
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetAutoPageBreak(TRUE, 15);
        $pdf->SetFont('helvetica', '', 10);

        // Agregar página de resumen si hay documentos no encontrados
        if (!empty($documentos_no_encontrados) && $tipo_filtro == 'documentos') {
            $pdf->AddPage();
            
            $resumen_html = $this->generar_pagina_resumen(
                count($documentos_array), 
                count($pacientes_encontrados), 
                count($documentos_no_encontrados),
                $documentos_no_encontrados,
                $pacientes_encontrados
            );
            
            $pdf->writeHTML($resumen_html, true, false, true, false, '');
        }

        // Generar páginas de historias clínicas
        foreach($historias as $hc) {
            // Manejo de la firma
            if (!empty($hc['usuFirma'])) {
                $hc['firma_base64'] = 'data:image/jpeg;base64,' . base64_encode($hc['usuFirma']);
            } else {
                $hc['firma_base64'] = null;
            }

            $pdf->AddPage();
            
            // Generar contenido HTML
            $html = $this->load->view('reportes/reporte_pdf', [
                'hc' => $hc, 
                'fecha_inicio' => $fecha_inicio, 
                'fecha_fin' => $fecha_fin,
                'titulo_reporte' => $titulo_reporte
            ], true);
            
            $pdf->writeHTML($html, true, false, true, false, '');
        }

        // Nombre del archivo
        if ($tipo_filtro == 'fechas') {
            $nombre_archivo = 'historias_clinicas_'.date('Ymd_His').'.pdf';
        } else {
            $total_encontrados = count($pacientes_procesados);
            $total_no_encontrados = count($documentos_no_encontrados);
            
            if ($total_no_encontrados > 0) {
                $nombre_archivo = "historias_masivas_{$total_encontrados}encontrados_{$total_no_encontrados}omitidos_".date('Ymd_His').'.pdf';
            } else {
                $nombre_archivo = "historias_masivas_{$total_encontrados}pacientes_".date('Ymd_His').'.pdf';
            }
        }

        $pdf->Output($nombre_archivo, 'D');
    }

    // NUEVO MÉTODO: Generar página de resumen
    private function generar_pagina_resumen($total_documentos, $total_encontrados, $total_no_encontrados, $documentos_no_encontrados, $pacientes_encontrados) {
        $html = '
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="color: #2c3e50; font-size: 24px; margin-bottom: 10px;">REPORTE MASIVO DE HISTORIAS CLÍNICAS</h1>
            <h2 style="color: #34495e; font-size: 18px;">Resumen de Procesamiento</h2>
            <hr style="border: 1px solid #bdc3c7;">
        </div>

        <div style="margin-bottom: 25px;">
            <h3 style="color: #2980b9; font-size: 16px; margin-bottom: 15px;">📊 ESTADÍSTICAS GENERALES</h3>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <tr style="background-color: #ecf0f1;">
                    <td style="border: 1px solid #bdc3c7; padding: 10px; font-weight: bold;">Total de documentos procesados:</td>
                    <td style="border: 1px solid #bdc3c7; padding: 10px; text-align: center; font-size: 16px; color: #2c3e50;">' . $total_documentos . '</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #bdc3c7; padding: 10px; font-weight: bold;">Pacientes encontrados:</td>
                    <td style="border: 1px solid #bdc3c7; padding: 10px; text-align: center; font-size: 16px; color: #27ae60;">' . $total_encontrados . '</td>
                </tr>
                <tr style="background-color: #ecf0f1;">
                    <td style="border: 1px solid #bdc3c7; padding: 10px; font-weight: bold;">Documentos no encontrados:</td>
                    <td style="border: 1px solid #bdc3c7; padding: 10px; text-align: center; font-size: 16px; color: #e74c3c;">' . $total_no_encontrados . '</td>
                </tr>
            </table>
        </div>';

        if (!empty($pacientes_encontrados)) {
            $html .= '
            <div style="margin-bottom: 25px;">
                <h3 style="color: #27ae60; font-size: 16px; margin-bottom: 15px;">✅ PACIENTES ENCONTRADOS (' . count($pacientes_encontrados) . ')</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="background-color: #d5f4e6;">
                        <th style="border: 1px solid #27ae60; padding: 8px; text-align: left;">Documento</th>
                        <th style="border: 1px solid #27ae60; padding: 8px; text-align: left;">Nombre Completo</th>
                    </tr>';
            
            foreach($pacientes_encontrados as $paciente) {
                $nombre_completo = trim(
                    ($paciente['pacNombre'] ?? '') . ' ' . 
                    ($paciente['pacNombre2'] ?? '') . ' ' . 
                    ($paciente['pacApellido'] ?? '') . ' ' . 
                    ($paciente['pacApellido2'] ?? '')
                );
                
                $html .= '
                    <tr>
                        <td style="border: 1px solid #27ae60; padding: 8px;">' . $paciente['pacDocumento'] . '</td>
                        <td style="border: 1px solid #27ae60; padding: 8px;">' . $nombre_completo . '</td>
                    </tr>';
            }
            
            $html .= '</table></div>';
        }

        if (!empty($documentos_no_encontrados)) {
            $html .= '
            <div style="margin-bottom: 25px;">
                <h3 style="color: #e74c3c; font-size: 16px; margin-bottom: 15px;">❌ DOCUMENTOS NO ENCONTRADOS (' . count($documentos_no_encontrados) . ')</h3>
                <div style="background-color: #fdf2f2; border: 1px solid #e74c3c; padding: 15px; border-radius: 5px;">
                    <p style="margin-bottom: 10px; font-weight: bold;">Los siguientes documentos no se encontraron en la base de datos:</p>';
            
            // Dividir en columnas para mejor presentación
            $chunks = array_chunk($documentos_no_encontrados, ceil(count($documentos_no_encontrados) / 3));
            $html .= '<table style="width: 100%;"><tr>';
            
            foreach($chunks as $chunk) {
                $html .= '<td style="vertical-align: top; width: 33%; padding-right: 10px;">';
                foreach($chunk as $doc) {
                    $html .= '• ' . $doc . '<br>';
                }
                $html .= '</td>';
            }
            
            $html .= '</tr></table></div></div>';
        }

        $html .= '
        <div style="margin-top: 30px; text-align: center; border-top: 1px solid #bdc3c7; padding-top: 20px;">
            <p style="color: #7f8c8d; font-size: 12px;">
                Reporte generado el ' . date('d/m/Y H:i:s') . '<br>
                Las páginas siguientes contienen las historias clínicas de los pacientes encontrados.
            </p>
        </div>';

        return $html;
    }

    // Resto de métodos sin cambios...
    private function procesar_documentos($documentos_input) {
        $documentos_input = str_replace(["\n", "\r", ";", "|", "\t"], ",", $documentos_input);
        $documentos_array = explode(",", $documentos_input);
        $documentos_array = array_map('trim', $documentos_array);
        $documentos_array = array_filter($documentos_array, function($doc) {
            return !empty($doc) && is_numeric($doc);
        });
        $documentos_array = array_unique($documentos_array);
        return array_values($documentos_array);
    }

    public function validar_documentos() {
        $documentos_input = $this->input->post('documentos');
        
        if (empty($documentos_input)) {
            echo json_encode(['success' => false, 'message' => 'No se proporcionaron documentos']);
            return;
        }
        
        $documentos_array = $this->procesar_documentos($documentos_input);
        
        if (empty($documentos_array)) {
            echo json_encode(['success' => false, 'message' => 'No se pudieron procesar los documentos']);
            return;
        }
        
        $pacientes_encontrados = $this->HistoriaClinica_model1->verificar_multiples_pacientes($documentos_array);
        $documentos_no_encontrados = $this->HistoriaClinica_model1->get_documentos_no_encontrados($documentos_array);
        
        echo json_encode([
            'success' => true,
            'total_documentos' => count($documentos_array),
            'pacientes_encontrados' => $pacientes_encontrados,
            'documentos_no_encontrados' => $documentos_no_encontrados,
            'total_encontrados' => count($pacientes_encontrados),
            'total_no_encontrados' => count($documentos_no_encontrados)
        ]);
    }
}
