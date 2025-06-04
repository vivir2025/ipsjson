<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CRips extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MRips");
        $this->load->model("MEmpresa");
        $this->load->model("MContrato");
    }

    public function detalle_contrato()

    {

        $id = $this->input->post('id');

        $contrato = $this->MContrato->get_data_contrato($id);

        //print_r($contrato);

        if ($contrato != false) {
            echo json_encode($contrato);
        }
    }

    public function index()
    {
        echo "Funcionalidad por defecto. No hay lógica implementada.";
        exit;
    }


    public function archivo_ac()
    {

        $data['title'] = 'IPS | ARCHIVO AC';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoAC.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_af()
    {

        $data['title'] = 'IPS | ARCHIVO AF';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoAF.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_ap()
    {

        $data['title'] = 'IPS | ARCHIVO AP';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoAP.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_ct()
    {

        $data['title'] = 'IPS | ARCHIVO CT';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoCT.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }

    public function archivo_us()
    {

        $data['title'] = 'IPS | ARCHIVO US';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $data['empresa'] = $this->MEmpresa->ver();
        $this->load->view("CRips/VArchivoUS.php", $data);

        $this->load->view("CPlantilla/VFooter");
    }


    
    /**
     * Función principal para exportar RIPS en formato JSON
     */
    public function exportar_rips_json() {
        $fecha1 = date("Y-m-d", strtotime($this->input->post('fecha1')));
        $fecha2 = date("Y-m-d", strtotime($this->input->post('fecha2')));
        $id_ips = $this->input->post('eps');
        $id_contrato = $this->input->post('idContrato');
        
        // Generar nombre de archivo
        $mysql_datetime = date("Y-m-d H:i:s");
        $fecha_archivo = str_ireplace(["-", ":", " "], "", $mysql_datetime);
        $nombre_archivo = "RIPS_JSON_" . $fecha_archivo . ".json";
        
        // Obtener datos base
        $data_usuarios = $this->MRips->ver_citas_us($id_ips, $id_contrato, $fecha1, $fecha2);
        $data_citas = $this->MRips->ver_citas_finalizadas($id_ips, $id_contrato, $fecha1, $fecha2);
        $data_laboratorio = $this->MRips->ver_labora($fecha1, $fecha2);
        $data_factura = $this->MRips->ver_by_empresa($id_ips, $id_contrato, $fecha1, $fecha2);
        
        // Construir estructura JSON
        $rips_json = $this->construir_estructura_json($data_usuarios, $data_citas, $data_laboratorio, $data_factura);
        
        // Configurar headers para descarga
        header('Content-Type: application/json; charset=utf-8');
        header("Content-Disposition: attachment; filename=\"$nombre_archivo\"");
        
        echo json_encode($rips_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    /**
     * Construir la estructura completa del JSON RIPS
     */
    private function construir_estructura_json($data_usuarios, $data_citas, $data_laboratorio, $data_factura) {
        // Obtener información de factura (usando el primer registro como base)
        $info_factura = !empty($data_factura) ? $data_factura[0] : null;
        
        $rips_json = [
            "numDocumentoIdObligado" => "900817959", // NIT de la IPS
            "numFactura" => $info_factura ? "FV" . $info_factura->idFactura : "FCAP" . date("Ymd"),
            "tipoNota" => "",
            "numNota" => "",
            "usuarios" => []
        ];
        
        // Agrupar datos por usuario
        $usuarios_agrupados = $this->agrupar_datos_por_usuario($data_usuarios, $data_citas, $data_laboratorio);
        
        $consecutivo_usuario = 1;
        foreach ($usuarios_agrupados as $documento => $datos_usuario) {
            $usuario_json = $this->construir_usuario_json($datos_usuario, $consecutivo_usuario);
            $rips_json['usuarios'][] = $usuario_json;
            $consecutivo_usuario++;
        }
        
        return $rips_json;
    }
    
    /**
     * Agrupar todos los datos por usuario/documento
     */
    private function agrupar_datos_por_usuario($data_usuarios, $data_citas, $data_laboratorio) {
        $usuarios_agrupados = [];
        
        // Agregar usuarios base
        foreach ($data_usuarios as $usuario) {
            $doc = $usuario->pacDocumento;
            if (!isset($usuarios_agrupados[$doc])) {
                $usuarios_agrupados[$doc] = [
                    'info_personal' => $usuario,
                    'consultas' => [],
                    'procedimientos' => []
                ];
            }
        }
        
        // Agregar consultas
        foreach ($data_citas as $cita) {
            $doc = $cita->pacDocumento;
            if (isset($usuarios_agrupados[$doc])) {
                $usuarios_agrupados[$doc]['consultas'][] = $cita;
            }
        }
        
        // Agregar procedimientos de laboratorio
        foreach ($data_laboratorio as $lab) {
            $doc = $lab->identificacion;
            if (isset($usuarios_agrupados[$doc])) {
                $usuarios_agrupados[$doc]['procedimientos'][] = $lab;
            }
        }
        
        return $usuarios_agrupados;
    }
    
    /**
     * Construir JSON para un usuario específico
     */
    private function construir_usuario_json($datos_usuario, $consecutivo) {
        $info = $datos_usuario['info_personal'];
        
        // Calcular edad
        list($anio, $mes, $dia) = explode("-", $info->pacFecNacimiento);
        $edad = date("Y") - $anio;
        if ((date("m") - $mes) < 0 || ((date("m") - $mes) == 0 && (date("d") - $dia) < 0)) {
            $edad--;
        }
        
        $usuario_json = [
            "tipoDocumentoIdentificacion" => "CC",
            "numDocumentoIdentificacion" => $info->pacDocumento,
            "tipoUsuario" => "02",
            "fechaNacimiento" => date("Y-m-d", strtotime($info->pacFecNacimiento)),
            "codSexo" => $info->pacSexo,
            "codPaisResidencia" => "170",
            "codMunicipioResidencia" => $info->municipio_residencia ?? "19130",
            "codZonaTerritorialResidencia" => $info->zr_nom_abreviacion ?? "01",
            "incapacidad" => "NO",
            "codPaisOrigen" => "170",
            "consecutivo" => $consecutivo,
            "servicios" => [
                "consultas" => [],
                "procedimientos" => []
            ]
        ];
        
        // Agregar consultas
        $consecutivo_consulta = 1;
        foreach ($datos_usuario['consultas'] as $consulta) {
            $diagnosticos = $this->MRips->diagnosticoByIdCita($consulta->idCita);
            
            $consulta_json = [
                "codPrestador" => "191300882403",
                "fechaInicioAtencion" => date("Y-m-d H:i", strtotime($consulta->citFecha)),
                "numAutorizacion" => null,
                "codConsulta" => $consulta->cupCodigo,
                "modalidadGrupoServicioTecSal" => "02",
                "grupoServicios" => "01",
                "codServicio" => "0",
                "finalidadTecnologiaSalud" => "10",
                "causaMotivoAtencion" => "15",
                "codDiagnosticoPrincipal" => isset($diagnosticos[0]->diaCodigo) ? $diagnosticos[0]->diaCodigo : "I10X",
                "codDiagnosticoRelacionado1" => isset($diagnosticos[1]->diaCodigo) ? $diagnosticos[1]->diaCodigo : "",
                "codDiagnosticoRelacionado2" => isset($diagnosticos[2]->diaCodigo) ? $diagnosticos[2]->diaCodigo : "",
                "codDiagnosticoRelacionado3" => isset($diagnosticos[3]->diaCodigo) ? $diagnosticos[3]->diaCodigo : "",
                "tipoDiagnosticoPrincipal" => "01",
                "tipoDocumentoIdentificacion" => "CC",
                "numDocumentoIdentificacion" => $consulta->pacDocumento,
                "vrServicio" => 0,
                "conceptoRecaudo" => "03",
                "valorPagoModerador" => 0,
                "numFEVPagoModerador" => "1",
                "consecutivo" => $consecutivo_consulta
            ];
            
            $usuario_json['servicios']['consultas'][] = $consulta_json;
            $consecutivo_consulta++;
        }
        
        // Agregar procedimientos de laboratorio
        $consecutivo_procedimiento = 1;
        foreach ($datos_usuario['procedimientos'] as $lab) {
            $procedimientos_lab = $this->obtener_procedimientos_laboratorio($lab);
            $diagnosticos = $this->MRips->diagnosticoByIdCita($lab->idCita ?? null);
            
            foreach ($procedimientos_lab as $cup_codigo) {
                $procedimiento_json = [
                    "codPrestador" => "190010882401",
                    "tipoDocumentoIdentificacion" => "CC",
                    "numDocumentoIdentificacion" => $lab->identificacion,
                    "fechaProcedimiento" => date("Y-m-d", strtotime($lab->fecha)),
                    "codProcedimiento" => $cup_codigo,
                    "ambitoRealizacion" => "1",
                    "finalidadProcedimiento" => "10",
                    "personalQueAtiende" => "5",
                    "codDiagnosticoPrincipal" => isset($diagnosticos[1]->diaCodigo) ? $diagnosticos[1]->diaCodigo : "I10X",
                    "codDiagnosticoRelacionado" => isset($diagnosticos[2]->diaCodigo) ? $diagnosticos[2]->diaCodigo : "",
                    "complicacion" => "",
                    "formaRealizacionActo" => "0",
                    "valorProcedimiento" => 0,
                    "consecutivo" => $consecutivo_procedimiento
                ];
                
                $usuario_json['servicios']['procedimientos'][] = $procedimiento_json;
                $consecutivo_procedimiento++;
            }
        }
        
        return $usuario_json;
    }
    
    /**
     * Obtener códigos CUP de procedimientos de laboratorio realizados
     */
    private function obtener_procedimientos_laboratorio($laboratorio) {
        $cup_map = [
            'colesterol_total' => '903818',
            'colesterol_hdl' => '903815',
            'trigliceridos' => '903868',
            'colesterol_ldl' => '903816',
            'hemoglobina' => '902210',
            'hematocrocito' => '902207',
            'plaquetas' => '902209',
            'hemoglobina_glicosilada' => '903427',
            'glicemia_basal' => '903841',
            'glicemia_post' => '903845',
            'creatinina' => '903895',
            'creatinuria' => '903876',
            'microalbuminuria' => '903026',
            'albumina' => '903803',
            'relacion_albuminuria_creatinuria' => '903026',
            'parcial_orina' => '907106',
            'depuracion_creatinina' => '903823',
            'creatinina_orina_24' => '903824',
            'proteina_orina_24' => '903862',
            'hormona_estimulante_tiroides' => '904902',
            'hormona_paratiroidea' => '904911',
            'albumina_suero' => '903803',
            'fosforo_suero' => '903835',
            'nitrogeno_ureico' => '903856',
            'acido_urico_suero' => '903801',
            'calcio' => '903603',
            'sodio_suero' => '903864',
            'potasio_suero' => '903859',
            'hierro_total' => '903846',
            'ferritina' => '903016',
            'transferrina' => '903045',
            'fosfatasa_alcalina' => '903833',
            'acido_folico_suero' => '903105',
            'vitamina_b12' => '903703',
            'nitrogeno_ureico_orina_24' => '903857'
        ];
        
        $procedimientos = [];
        foreach ($cup_map as $campo => $cup) {
            if (!empty($laboratorio->$campo)) {
                $procedimientos[] = $cup;
            }
        }
        
        return $procedimientos;
    }
    
    
}