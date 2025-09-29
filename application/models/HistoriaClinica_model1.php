<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoriaClinica_model1 extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_historias_completas_por_fecha($fecha_inicio, $fecha_fin) {
        // Seleccionar todos los campos necesarios
        $this->db->select('
            hc.*,
            cita.*,
            paciente.*,
            usuario.*,
            agenda.*,
            proceso.*,
            cita.idCita as cita_id,
            agenda.idAgenda as agenda_idAgenda,
            proceso.idProceso as proceso_idProceso,
            paciente.idPaciente as paciente_id,
            usuario.idUsuario as usuario_idUsuario
            

            
        ');
        

        $this->db->from('hc');
        $this->db->join('cita', 'cita.idCita = hc.cita_idCita', 'left');
        $this->db->join('paciente', 'paciente.idPaciente = cita.paciente_idPaciente', 'left');
        
        $this->db->join('agenda', 'agenda.idAgenda = cita.agenda_idAgenda', 'left');
        $this->db->join('proceso', 'proceso.idProceso = agenda.proceso_idProceso', 'left');
        $this->db->join('usuario', 'usuario.idUsuario = agenda.usuario_idUsuario', 'left');
       
        
        // Filtros por fecha 
        $this->db->where('hc.fecha_actual >=', $fecha_inicio);
        $this->db->where('hc.fecha_actual <=', $fecha_fin);
        $this->db->order_by('hc.fecha_actual', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }
     // NUEVO MÉTODO para múltiples documentos
    public function get_historias_por_multiples_documentos($documentos_array, $fecha_inicio = null, $fecha_fin = null) {
        $this->db->select('
            hc.*,
            cita.*,
            paciente.*,
            usuario.*,
            agenda.*,
            proceso.*,
            cita.idCita as cita_id,
            agenda.idAgenda as agenda_idAgenda,
            proceso.idProceso as proceso_idProceso,
            paciente.idPaciente as paciente_id,
            usuario.idUsuario as usuario_idUsuario
        ');
        
        $this->db->from('hc');
        $this->db->join('cita', 'cita.idCita = hc.cita_idCita', 'left');
        $this->db->join('paciente', 'paciente.idPaciente = cita.paciente_idPaciente', 'left');
        $this->db->join('agenda', 'agenda.idAgenda = cita.agenda_idAgenda', 'left');
        $this->db->join('proceso', 'proceso.idProceso = agenda.proceso_idProceso', 'left');
        $this->db->join('usuario', 'usuario.idUsuario = agenda.usuario_idUsuario', 'left');
       
        // Filtro por múltiples documentos
        $this->db->where_in('paciente.pacDocumento', $documentos_array);
        
        // Filtros opcionales por fecha
        if (!empty($fecha_inicio)) {
            $this->db->where('hc.fecha_actual >=', $fecha_inicio);
        }
        if (!empty($fecha_fin)) {
            $this->db->where('hc.fecha_actual <=', $fecha_fin);
        }
        
        $this->db->order_by('paciente.pacDocumento', 'ASC');
        $this->db->order_by('hc.fecha_actual', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // Verificar múltiples pacientes
    public function verificar_multiples_pacientes($documentos_array) {
        $this->db->select('pacNombre, pacNombre2, pacApellido, pacApellido2, pacDocumento');
        $this->db->from('paciente');
        $this->db->where_in('pacDocumento', $documentos_array);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Obtener documentos que no existen
    public function get_documentos_no_encontrados($documentos_array) {
        $pacientes_encontrados = $this->verificar_multiples_pacientes($documentos_array);
        $documentos_encontrados = array_column($pacientes_encontrados, 'pacDocumento');
        return array_diff($documentos_array, $documentos_encontrados);
    }
}
