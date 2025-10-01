<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CInforme extends CI_Controller
{
    // ✅ CONFIGURACIÓN DE LA API
    private $api_base_url = 'http://fnpvi.nacerparavivir.org/api';
    private $api_token = '404|ZSfxdVBNeFauLMQEckMCj8c44xjPXPki1ChDlLtB2e13933b'; // Tu token validado

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("MInforme");
        $this->load->model("MBrigada");
    }

    public function index()
    {
        $data['title'] = 'IPS | INFORMES';
        $this->load->view("CPlantilla/VHead", $data);
        $this->load->view("CPlantilla/VBarraMenu");
        
        // ✅ OBTENER SEDES DESDE LA API
        $datos["brigada"] = $this->MBrigada->ver();
        $datos["sedes"] = $this->obtener_sedes_api();
        
        $this->load->view("CInforme/VConsultar.php", $datos);
        $this->load->view("CPlantilla/VFooter");
    }

    public function informe5()
    {
        $data['title'] = 'IPS | RIPS-JSON';
        $this->load->view("CPlantilla/VHead", $data);
        $this->load->view("CPlantilla/VBarraMenu");
        
        // ✅ PASAR SEDES A LA VISTA
        $datos["sedes"] = $this->obtener_sedes_api();
        
        $this->load->view("CInforme/VConsultar5.php", $datos);
        $this->load->view("CPlantilla/VFooter");
    }

    /**
     * ✅ FUNCIÓN PRINCIPAL MEJORADA - EXPORTAR JSON RIPS CON VISITAS DOMICILIARIAS
     */
    public function Exportar_json() 
    {
        $fecha1 = $this->input->post('fecha');
        $fecha2 = $this->input->post('fecha1');
        $sede_id = $this->input->post('sede_id');
        
        // Validar fechas
        if (empty($fecha1) || empty($fecha2)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'error' => 'Las fechas son obligatorias',
                    'message' => 'Debe seleccionar fecha desde y fecha hasta'
                ]));
            return;
        }
        
        try {
            // 1. Obtener datos locales (historia clínica)
            $data_local = $this->MInforme->informe_json_rips($fecha1, $fecha2);
            log_message('info', 'Datos locales obtenidos: ' . count($data_local));
            
            // 2. Obtener visitas domiciliarias de la API
            $visitas_api = $this->obtener_visitas_api($fecha1, $fecha2, $sede_id);
            log_message('info', 'Visitas API obtenidas: ' . count($visitas_api));
            
            // 3. Combinar datos
            $data_combinada = $this->combinar_datos_con_visitas($data_local, $visitas_api);
            log_message('info', 'Datos combinados: ' . count($data_combinada));
            
            // 4. Procesar y generar JSON RIPS
            $json_rips = $this->generar_json_rips($data_combinada);
            
            // 5. Enviar respuesta
            $this->output
                ->set_content_type('application/json; charset=utf-8')
                ->set_header('Content-Disposition', 'attachment; filename="rips_' . date('Y-m-d_H-i-s') . '.json"')
                ->set_output(json_encode($json_rips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                
        } catch (Exception $e) {
            log_message('error', 'Error en Exportar_json: ' . $e->getMessage());
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'error' => 'Error interno del servidor',
                    'message' => $e->getMessage()
                ]));
        }
    }

    /**
     * ✅ OBTENER SEDES DESDE LA API
     */
    private function obtener_sedes_api() 
    {
        $url = $this->api_base_url . '/sedes';
        $response = $this->hacer_request_api($url);
        
        if ($response && is_array($response)) {
            return $response;
        }
        
        // Fallback: sedes por defecto si la API falla
        return [
            ['id' => 1, 'nombresede' => 'Cajibío'],
            ['id' => 2, 'nombresede' => 'Piendamó'],
            ['id' => 3, 'nombresede' => 'Morales']
        ];
    }

    /**
     * ✅ OBTENER VISITAS DOMICILIARIAS CON FILTROS
     */
    private function obtener_visitas_api($fecha1, $fecha2, $sede_id = null) 
    {
        $url = $this->api_base_url . '/visitas';
        
        // Construir parámetros de filtro
        $params = [];
        if ($fecha1) $params['fecha_desde'] = $fecha1;
        if ($fecha2) $params['fecha_hasta'] = $fecha2;
        if (!empty($sede_id)) $params['sede_id'] = $sede_id;
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        $response = $this->hacer_request_api($url);
        
        if ($response && isset($response['data'])) {
            return $response['data'];
        } elseif ($response && is_array($response)) {
            return $response;
        }
        
        log_message('warning', 'No se pudieron obtener visitas de la API');
        return [];
    }

    /**
     * ✅ COMBINAR DATOS LOCALES CON VISITAS API
     */
    private function combinar_datos_con_visitas($data_local, $visitas_api) 
    {
        $data_combinada = $data_local;
        
        foreach ($visitas_api as $visita) {
            // Validar datos mínimos
            if (empty($visita['identificacion'])) {
                continue;
            }
            
            // Crear registro de visita domiciliaria
            $registro_visita = (object) [
                'documento' => trim($visita['identificacion']),
                'tipo_documento' => $visita['tipo_documento'] ?? 'CC',
                'cups' => '890114', // CUPS para visita domiciliaria
                'fecha' => $visita['fecha'] ?? date('Y-m-d'),
                'estado_factura' => 'Visita domiciliaria',
                'nombre' => $visita['nombre_apellido'] ?? '',
                'telefono' => $visita['telefono'] ?? '',
                'zona' => $visita['zona'] ?? '',
                'sede_id' => $visita['sede_id'] ?? null,
                'peso' => $visita['peso'] ?? null,
                'talla' => $visita['talla'] ?? null,
                'tension_arterial' => $visita['tension_arterial'] ?? null,
                'glucometria' => $visita['glucometria'] ?? null,
                'es_visita_api' => true
            ];
            
            $data_combinada[] = $registro_visita;
            
            log_message('info', "Visita domiciliaria agregada: {$visita['identificacion']}");
        }
        
        return $data_combinada;
    }

    /**
     * ✅ GENERAR JSON RIPS COMPLETO
     */
    private function generar_json_rips($data_combinada) 
    {
        // Agrupar por paciente
        $pacientes_agrupados = [];
        foreach ($data_combinada as $registro) {
            $documento = trim($registro->documento);
            if (empty($documento)) continue;
            
            if (!isset($pacientes_agrupados[$documento])) {
                $pacientes_agrupados[$documento] = [
                    'info_paciente' => $registro,
                    'servicios' => [
                        'facturado' => [],
                        'no_facturado' => [],
                        'laboratorio_sin_cita' => [],
                        'visita_domiciliaria' => []
                    ]
                ];
            }
            
            // Clasificar servicios
            switch ($registro->estado_factura) {
                case 'Facturado':
                case 'Finalizado':
                    $pacientes_agrupados[$documento]['servicios']['facturado'][] = $registro;
                    break;
                case 'No facturado':
                    $pacientes_agrupados[$documento]['servicios']['no_facturado'][] = $registro;
                    break;
                case 'Laboratorio sin cita':
                    $pacientes_agrupados[$documento]['servicios']['laboratorio_sin_cita'][] = $registro;
                    break;
                case 'Visita domiciliaria':
                    $pacientes_agrupados[$documento]['servicios']['visita_domiciliaria'][] = $registro;
                    break;
            }
        }
        
        // Construir JSON RIPS
        $json_structure = [
            "numDocumentoIdObligado" => "900817959",
            "numFactura" => null,
            "tipoNota" => "RS",
            "numNota" => "PGP",
            "usuarios" => []
        ];
        
        $consecutivo_global = 1524;
        
        foreach ($pacientes_agrupados as $documento => $paciente_data) {
            $info_paciente = $paciente_data['info_paciente'];
            $info_adicional = $this->obtener_info_adicional_paciente($documento);
            
            $usuario = [
                "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
                "numDocumentoIdentificacion" => $documento,
                "tipoUsuario" => "02",
                "fechaNacimiento" => $info_adicional->fecha_nacimiento ?? "1980-01-01",
                "codSexo" => $info_adicional->sexo ?? "M",
                "codPaisResidencia" => "170",
                "codMunicipioResidencia" => "19130",
                "codZonaTerritorialResidencia" => "01",
                "incapacidad" => "NO",
                "codPaisOrigen" => "170",
                "consecutivo" => $consecutivo_global,
                "servicios" => []
            ];
            
            $consecutivo_servicio = 1;
            $consultas_temp = [];
            $procedimientos_temp = [];
            $consultas_agregadas = [];
            
            // Procesar todos los servicios
            $todos_servicios = array_merge(
                $paciente_data['servicios']['facturado'],
                $paciente_data['servicios']['no_facturado'],
                $paciente_data['servicios']['laboratorio_sin_cita'],
                $paciente_data['servicios']['visita_domiciliaria']
            );
            
            foreach ($todos_servicios as $servicio) {
                if ($this->es_consulta($servicio->cups)) {
                    if (!in_array($servicio->cups, $consultas_agregadas)) {
                        $consultas_temp[] = [
                            "causaMotivoAtencion" => "38",
                            "codConsulta" => $servicio->cups,
                            "codDiagnosticoPrincipal" => "I10X",
                            "codDiagnosticoRelacionado1" => "E660",
                            "codDiagnosticoRelacionado2" => null,
                            "codDiagnosticoRelacionado3" => null,
                            "codPrestador" => "191300882403",
                            "codServicio" => 325,
                            "consecutivo" => $consecutivo_servicio++,
                            "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
                            "finalidadTecnologiaSalud" => "44",
                            "grupoServicios" => "01",
                            "modalidadGrupoServicioTecSal" => "01",
                            "numAutorizacion" => "",
                            "numDocumentoIdentificacion" => $documento,
                            "numFEVPagoModerador" => "",
                            "tipoDiagnosticoPrincipal" => "03",
                            "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
                            "conceptoRecaudo" => "05",
                            "valorPagoModerador" => 0,
                            "vrServicio" => 0
                        ];
                        $consultas_agregadas[] = $servicio->cups;
                    }
                } else {
                    $procedimientos_temp[] = [
                        "codPrestador" => "191300882403",
                        "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
                        "idMIPRES" => null,
                        "numAutorizacion" => "",
                        "codProcedimiento" => $servicio->cups,
                        "viaIngresoServicioSalud" => "02",
                        "modalidadGrupoServicioTecSal" => "01",
                        "grupoServicios" => "01",
                        "codServicio" => 325,
                        "finalidadTecnologiaSalud" => "44",
                        "tipoDocumentoIdentificacion" => "CC",
                        "numDocumentoIdentificacion" => $documento,
                        "codDiagnosticoPrincipal" => "I10X",
                        "codDiagnosticoRelacionado" => null,
                        "codComplicacion" => null,
                        "vrServicio" => 0,
                        "conceptoRecaudo" => "05",
                        "valorPagoModerador" => 0,
                        "numFEVPagoModerador" => "FACP522",
                        "consecutivo" => $consecutivo_servicio++
                    ];
                }
            }
            
            // Agregar servicios al usuario
            if (!empty($consultas_temp)) {
                $usuario["servicios"]["consultas"] = $consultas_temp;
            }
            if (!empty($procedimientos_temp)) {
                $usuario["servicios"]["procedimientos"] = $procedimientos_temp;
            }
            
            // Solo agregar si tiene servicios
            if (!empty($consultas_temp) || !empty($procedimientos_temp)) {
                $json_structure["usuarios"][] = $usuario;
                $consecutivo_global++;
            }
        }
        
        return $json_structure;
    }

    /**
     * ✅ HACER REQUEST A LA API CON MANEJO DE ERRORES
     */
    private function hacer_request_api($url, $method = 'GET', $data = null) 
    {
        $headers = [
            'Authorization: Bearer ' . $this->api_token,
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true
        ]);
        
        if ($method === 'POST' && $data) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);
        
        if ($curl_error) {
            log_message('error', "Error cURL: $curl_error");
            return false;
        }
        
        if ($http_code !== 200) {
            log_message('error', "Error HTTP $http_code: $response");
            return false;
        }
        
        $decoded = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'Error decodificando JSON: ' . json_last_error_msg());
            return false;
        }
        
        return $decoded;
    }

    // ✅ MÉTODOS AUXILIARES (mantén los existentes)
    private function es_consulta($cups_code) 
    {
        $consulta_ranges = ['890', '891', '892', '893'];
        $codigo_str = (string)$cups_code;
        
        foreach ($consulta_ranges as $range) {
            if (strpos($codigo_str, $range) === 0) {
                return true;
            }
        }
        return false;
    }

    private function formatear_fecha_hora($fecha) 
    {
        if (empty($fecha)) {
            return date('Y-m-d') . ' 00:00';
        }
        
        $timestamp = strtotime($fecha);
        if ($timestamp === false) {
            return date('Y-m-d') . ' 00:00';
        }
        
        return date('Y-m-d H:i', $timestamp);
    }

    private function obtener_info_adicional_paciente($documento) 
    {
        $query = $this->db->query("
            SELECT 
                pacFecNacimiento as fecha_nacimiento,
                pacSexo as sexo
            FROM paciente 
            WHERE pacDocumento = ?
        ", [$documento]);
        
        $result = $query->row();
        
        if (!$result) {
            return (object) [
                'fecha_nacimiento' => '1980-01-01',
                'sexo' => 'M'
            ];
        }
        
        return $result;
    }

    // ... resto de métodos existentes (informe1, informe2, etc.)
}
