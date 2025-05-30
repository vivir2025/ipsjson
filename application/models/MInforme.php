<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MInforme extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // Método 1: consulta por fecha (exportar)
  public function ver_pac_by_fecha($fecha1, $fecha2)
  {
    $consulta = $this->db->query("
      SELECT 
        c.*, pac.*, u2.*, esp.espNombre AS tipo_profesional, 
        h.*, hcc.*, cc.*, cup.*, tp.*, d.*, m.*, e.*, zr.*, r.*, ta.*, o.*, esc.*, a.*, b.*, nov.*, ax.*, 
        p.*, 
       
       CASE 
  WHEN esp.espNombre LIKE '%Enfermero%' 
    AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                        'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
    THEN '890305'
  ELSE p.N_cups
END AS N_cups_ajustado,

CASE 
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890305' THEN '312'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890301' THEN '328'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890366' THEN '329'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890368' THEN '330'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890306' THEN '333'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890308' THEN '344'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) IN ('890311', '890309') THEN '356'
  ELSE ''
END AS codigo_trabajo

      FROM cita AS c
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN hc AS h ON h.cita_idCita = c.idCita
      LEFT JOIN hc_complementaria AS hcc ON hcc.hc_idHc = h.id_hc
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = pac.pacTipDocumento
      INNER JOIN departamento AS d ON d.idDepartamento = pac.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio = pac.municipio_residencia
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = pac.id_zona_residencia
      INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
      INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion
      INNER JOIN ocupacion AS o ON o.idOcupacion = pac.pacOcupacion
      INNER JOIN escolaridad AS esc ON esc.idEscolaridad = pac.escolaridad_idEscolaridad
      INNER JOIN agenda AS a ON c.agenda_idAgenda = a.idAgenda
      LEFT JOIN brigada AS b ON b.idBrigada = pac.Brigada_idBrigada
      LEFT JOIN novedad AS nov ON nov.idnovedad = pac.novedad_idnovedad
      LEFT JOIN auxiliar AS ax ON ax.idauxiliar = pac.auxiliar_idauxiliar
      INNER JOIN proceso AS p ON a.proceso_idProceso = p.idProceso
      INNER JOIN usuario AS u2 ON u2.idUsuario = c.usu_creo_cita
      LEFT JOIN especialidad AS esp ON esp.idEspecialidad = u2.especialidad_idEspecialidad
      WHERE c.citFecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "'
    ");

    return $consulta->result();
  }

  // Método 2: por fecha y brigada (exportar_2)
  public function ver_pac_by_fecha1($fecha1, $fecha2, $idBrigada)
  {
    $consulta = $this->db->query("
      SELECT 
        c.*, pac.*, u.*, esp.espNombre AS tipo_profesional,
        h.*, cc.*, cup.*, ax.*, o.*, raz.*, tp.*, d.*, m.*, e.*, zr.*, esc.*, r.*, a.*, b.*, p.*, hcs.*,
        
        CASE 
  WHEN esp.espNombre LIKE '%Enfermero%' 
    AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                        'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
    THEN '890305'
  ELSE p.N_cups
END AS N_cups_ajustado,

CASE 
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890305' THEN '312'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890301' THEN '328'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890366' THEN '329'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890368' THEN '330'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890306' THEN '333'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890308' THEN '344'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) IN ('890311', '890309') THEN '356'
  ELSE ''
END AS codigo_trabajo

      FROM cita AS c
      INNER JOIN cups_contratado AS cc ON cc.id_cups_contrato = c.idCupsContratado
      INNER JOIN cups AS cup ON cup.idCups = cc.cups_idCups
      INNER JOIN hc AS h ON h.cita_idCita = c.idCita
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      LEFT JOIN auxiliar AS ax ON ax.idauxiliar = pac.auxiliar_idauxiliar
      LEFT JOIN ocupacion AS o ON o.idOcupacion = pac.pacOcupacion
      INNER JOIN raza AS raz ON raz.idRaza = pac.raza_idRaza
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = pac.pacTipDocumento
      INNER JOIN departamento AS d ON d.idDepartamento = pac.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio = pac.municipio_residencia
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = pac.id_zona_residencia
      LEFT JOIN escolaridad AS esc ON esc.idEscolaridad = pac.escolaridad_idEscolaridad
      INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
      INNER JOIN agenda AS a ON c.agenda_idAgenda = a.idAgenda
      LEFT JOIN brigada AS b ON b.idBrigada = pac.Brigada_idBrigada
      INNER JOIN proceso AS p ON a.proceso_idProceso = p.idProceso
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario
      LEFT JOIN especialidad AS esp ON esp.idEspecialidad = u.especialidad_idEspecialidad
      LEFT JOIN hcs_paraclinico AS hcs ON hcs.identificacion = pac.pacDocumento
      WHERE c.citFecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "'
      AND b.idBrigada = " . $idBrigada . "
    ");

    return $consulta->result();
  }

  // Método 3: por fecha (exportar_1)
  public function ver_pac_by_fecha_y_brigada($fecha1, $fecha2)
  {
    $consulta = $this->db->query("
      SELECT 
        c.*, pac.*, u.*, esp.espNombre AS tipo_profesional,
        h.*, tp.*, d.*, m.*, e.*, zr.*, r.*, a.*, b.*, ax.*, p.*,
        
      CASE 
  WHEN esp.espNombre LIKE '%Enfermero%' 
    AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                        'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
    THEN '890305'
  ELSE p.N_cups
END AS N_cups_ajustado,

CASE 
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890305' THEN '312'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890301' THEN '328'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890366' THEN '329'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890368' THEN '330'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890306' THEN '333'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) = '890308' THEN '344'
  WHEN 
    (CASE 
      WHEN esp.espNombre LIKE '%Enfermero%' 
        AND p.proNombre IN ('ESPECIAL CONTROL', 'REFORMULACION', 'TRABAJO SOCIAL', 
                            'NUTRICIONISTA', 'PSICOLOGIA', 'NEFROLOGIA', 'INTERNISTA', 'FISIOTERAPIA') 
        THEN '890305'
      ELSE p.N_cups
    END) IN ('890311', '890309') THEN '356'
  ELSE ''
END AS codigo_trabajo

      FROM cita AS c
      INNER JOIN hc AS h ON h.cita_idCita = c.idCita
      INNER JOIN paciente AS pac ON c.paciente_idPaciente = pac.idPaciente
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      LEFT JOIN brigada AS b ON b.idBrigada = pac.Brigada_idBrigada
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = pac.pacTipDocumento
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = pac.id_zona_residencia
      INNER JOIN departamento AS d ON d.idDepartamento = pac.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio = pac.municipio_residencia
      INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
      INNER JOIN agenda AS a ON c.agenda_idAgenda = a.idAgenda
      LEFT JOIN auxiliar AS ax ON ax.idauxiliar = pac.auxiliar_idauxiliar
      INNER JOIN proceso AS p ON a.proceso_idProceso = p.idProceso
      INNER JOIN usuario AS u ON a.usuario_idUsuario = u.idUsuario
      LEFT JOIN especialidad AS esp ON esp.idEspecialidad = u.especialidad_idEspecialidad
      WHERE c.citFecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "'
    ");

    return $consulta->result();
  }
public function informe_facturacion($fecha1, $fecha2)
{
    // Citas con factura
    $facturados = $this->db->query("
        SELECT 
            td.nom_abreviacion AS tipo_documento,
            p.pacDocumento AS documento,
            p.pacNombre AS nombre,
            p.pacApellido AS apellido,
            f.facFecha AS fecha,
            c.cupCodigo AS cups,
            c.cupNombre AS nombre_cups,
            'Facturado' AS estado_factura
        FROM factura f
        INNER JOIN paciente p ON p.idPaciente = f.paciente_idPaciente
        LEFT JOIN tipo_documento td ON td.idTipDocumento = p.pacTipDocumento
        LEFT JOIN cita ci ON ci.idCita = f.cita_idCita
        LEFT JOIN cups_contratado cc ON cc.id_cups_contrato = ci.idCupsContratado
        LEFT JOIN cups c ON c.idCups = cc.cups_idCups
        WHERE f.facFecha BETWEEN '$fecha1' AND '$fecha2'
          AND f.cita_idCita IS NOT NULL
    ")->result();

    $no_facturados = $this->db->query("
    SELECT 
        td.nom_abreviacion AS tipo_documento,
        p.pacDocumento AS documento,
        p.pacNombre AS nombre,
        p.pacApellido AS apellido,
        ci.citFecha AS fecha,
        c.cupCodigo AS cups,
        c.cupNombre AS nombre_cups,
        'No facturado' AS estado_factura
    FROM cita ci
    INNER JOIN paciente p ON p.idPaciente = ci.paciente_idPaciente
    LEFT JOIN tipo_documento td ON td.idTipDocumento = p.pacTipDocumento
    LEFT JOIN factura f ON f.cita_idCita = ci.idCita
    LEFT JOIN cups_contratado cc ON cc.id_cups_contrato = ci.idCupsContratado
    LEFT JOIN cups c ON c.idCups = cc.cups_idCups
    WHERE f.idFactura IS NULL
      AND ci.citEstado NOT IN ('FINALIZADO', 'FINALIZADO Y FACTURADO')
      AND ci.citFecha BETWEEN '$fecha1' AND '$fecha2'
")->result();


    // Facturas sin cita
    $factura_sin_cita = $this->db->query("
        SELECT 
            td.nom_abreviacion AS tipo_documento,
            p.pacDocumento AS documento,
            p.pacNombre AS nombre,
            p.pacApellido AS apellido,
            f.facFecha AS fecha,
            c.cupCodigo AS cups,
            c.cupNombre AS nombre_cups,
            'Facturado sin cita' AS estado_factura
        FROM factura f
        INNER JOIN paciente p ON p.idPaciente = f.paciente_idPaciente
        LEFT JOIN tipo_documento td ON td.idTipDocumento = p.pacTipDocumento
        INNER JOIN factura_cup fc ON fc.factura_idFactura = f.idFactura
        INNER JOIN cups c ON c.idCups = fc.cups_idCups
        WHERE f.cita_idCita IS NULL
          AND f.facFecha BETWEEN '$fecha1' AND '$fecha2'
    ")->result();

    $citas_finalizadas = $this->db->query("
    SELECT 
        td.nom_abreviacion AS tipo_documento,
        p.pacDocumento AS documento,
        p.pacNombre AS nombre,
        p.pacApellido AS apellido,
        ci.citFecha AS fecha,
        c.cupCodigo AS cups,
        c.cupNombre AS nombre_cups,
        'Facturado' AS estado_factura
    FROM cita ci
    INNER JOIN paciente p ON p.idPaciente = ci.paciente_idPaciente
    LEFT JOIN tipo_documento td ON td.idTipDocumento = p.pacTipDocumento
    INNER JOIN cups_contratado cc ON cc.id_cups_contrato = ci.idCupsContratado
    INNER JOIN cups c ON c.idCups = cc.cups_idCups
    LEFT JOIN factura f ON f.cita_idCita = ci.idCita
    WHERE ci.citEstado IN ('FINALIZADO', 'FINALIZADO Y FACTURADO')
      AND ci.citFecha BETWEEN '$fecha1' AND '$fecha2'
")->result();


    return array_merge($facturados, $no_facturados, $factura_sin_cita, $citas_finalizadas);
}


}



