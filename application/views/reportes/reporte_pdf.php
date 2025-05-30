<?php
/**
 * Vista para generar el reporte PDF de historia clínica completa
 */
?>
<style>
    /* Estilos generales */
    body {
        font-family: helvetica;
        font-size: 10pt;
        line-height: 1.5;
    }
    .titulo {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .subtitulo {
        text-align: center;
        font-size: 12px;
        margin-bottom: 10px;
    }
    .seccion {
        margin-top: 15px;
        margin-bottom: 5px;
        font-weight: bold;
        font-size: 12px;
        border-bottom: 1px solid #000;
        padding-bottom: 3px;
    }
    .tabla {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5px;
        font-size: 9pt;
    }
    .tabla th {
        background-color: #f2f2f2;
        border: 1px solid #ddd;
        padding: 4px;
        text-align: left;
    }
    .tabla td {
        border: 1px solid #ddd;
        padding: 4px;
        vertical-align: top;
    }
    .encabezado {
        margin-bottom: 15px;
        border-bottom: 2px solid #000;
        border-top: 2px solid #000;
        padding-bottom: 5px;
    }
    .firma {
        margin-top: 20px;
        border-top: 1px solid #000;
        width: 300px;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        padding-top: 5px;
    }
    .salto-pagina {
        page-break-after: always;
    }
    .texto-resaltado {
        font-weight: bold;
    }
    .texto-pequeno {
        font-size: 8pt;
    }
  

legend {
    text-align: left;
    /* Puedes cambiarlo por center o right */
    width: inherit;
    /* Or auto */
    padding: 0 10px;
    /* To give a bit of padding on the left and right */
    border-bottom: none;
    font-size: 16px;
}

</style>
<table width="100%" >
  <tr>
    <td width="20%" style="text-align: left; vertical-align: middle;">
      <img src="<?= base_url("assets/img/logo.png"); ?>" style="height: 60px;"/>
    </td>
    <td width="60%" style="text-align: center; vertical-align: middle;">
      <h3 style="margin: 2px 0; font-weight: bold; font-size: 14px;">FUNDACIÓN NACER PARA</h3>
      <h3 style="margin: 2px 0; font-weight: bold; font-size: 14px;">VIVIR IPS</h3>
      <small style="margin: 2px 0; font-size: 10px;" class="texts"><?= isset($hc['proNombre']) ? $hc['proNombre'] : ''; ?> CONTROL PROGRAMA DE GESTIÓN DEL RIESGO CARDIO RENAL</small>
      

    </td>
    <td width="20%" style="text-align: right; vertical-align: middle;">
      <img src="<?= base_url("assets/img/logo.png"); ?>" style="height: 60px;"/>
    </td>
  </tr>
</table>

<!-- 1. DATOS DEL PACIENTE -->
<div class="seccion">1. DATOS DEL PACIENTE</div>
<table class="tabla">
    <tr>
        <td width="25%"><strong>Nombre completo:</strong></td>
        <td width="75%"><?= $hc['pacNombre'].' '.$hc['pacNombre2'].' '.$hc['pacApellido'].' '.$hc['pacApellido2']; ?></td>
    </tr>
    <tr>
        <td><strong>Documento:</strong></td>
        <td><?= $hc['pacTipDocumento'].' '.$hc['pacDocumento']; ?></td>
    </tr>
    <tr>
        <td><strong>Fecha nacimiento:</strong></td>
        <td><?= $hc['pacFecNacimiento'].' ('.(date('Y') - date('Y', strtotime($hc['pacFecNacimiento']))).' años)'; ?></td>
    </tr>
    <tr>
        <td><strong>Sexo:</strong></td>
        <td><?= $hc['pacSexo']; ?></td>
    </tr>
    <tr>
        <td><strong>Dirección:</strong></td>
        <td><?= $hc['pacDireccion']; ?></td>
    </tr>
    <tr>
        <td><strong>Teléfono:</strong></td>
        <td><?= $hc['pacTelefono']; ?></td>
    </tr>
    <tr>
        <td><strong>Correo:</strong></td>
        <td><?= $hc['pacCorreo']; ?></td>
    </tr>
    <tr>
        <td><strong>Acudiente:</strong></td>
        <td><?= $hc['nombre_acudiente'].' ('.$hc['pacParentesco'].') - Tel: '.$hc['telefono_acudiente']; ?></td>
    </tr>
    <tr>
        <td><strong>Acompañante:</strong></td>
        <td><?= $hc['hcAcompanante'].' ('.$hc['hcAcuParentesco'].') - Tel: '.$hc['hcAcuTelefono']; ?></td>
    </tr>
</table>

<!-- 2. DATOS DE LA CITA -->
<div class="seccion">2. DATOS DE LA CITA</div>
<table class="tabla">
    <tr>
        <td width="25%"><strong>Fecha cita:</strong></td>
        <td width="25%"><?= $hc['citFecha']; ?></td>
        <td width="25%"><strong>Hora:</strong></td>
        <td width="25%"><?= date('H:i', strtotime($hc['citFechaInicio'])).' a '.date('H:i', strtotime($hc['citFechaFinal'])); ?></td>
    </tr>
    <tr>
        <td><strong>Motivo:</strong></td>
        <td><?= $hc['citMotivo']; ?></td>
        <td><strong>Estado:</strong></td>
        <td><?= $hc['citEstado']; ?></td>
    </tr>
    <tr>
        <td><strong>Patología:</strong></td>
        <td colspan="3"><?= $hc['citPatologia']; ?></td>
    </tr>
    <tr>
        <td><strong>Nota:</strong></td>
        <td colspan="3"><?= $hc['citNota']; ?></td>
    </tr>
</table>

<!-- 3. MOTIVO DE CONSULTA -->
<div class="seccion">3. MOTIVO DE CONSULTA</div>
<table class="tabla">
    <tr>
        <td><?= nl2br($hc['hcMotivoConsulta']); ?></td>
    </tr>
</table>

<!-- 4. ENFERMEDAD ACTUAL -->
<div class="seccion">4. ENFERMEDAD ACTUAL</div>
<table class="tabla">
    <tr>
        <td><?= nl2br($hc['hcEnfermedadActual']); ?></td>
    </tr>
</table>

<!-- 5. ANTECEDENTES -->
<div class="seccion">5. ANTECEDENTES</div>
<table class="tabla">
    <tr>
        <th colspan="4" style="background-color:#e0e0e0;">PERSONALES</th>
    </tr>
    <tr>
        <td width="25%"><strong>Hipertensión:</strong></td>
        <td width="25%"><?= $hc['hcHipertensionArterialPersonal']; ?></td>
        <td width="25%"><strong>Observaciones:</strong></td>
        <td width="25%"><?= $hc['hcObsPersonallHipertensionArterial']; ?></td>
    </tr>
    <tr>
        <td><strong>Diabetes:</strong></td>
        <td><?= $hc['hcDiabetesMellitusPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalMellitus']; ?></td>
    </tr>
    <tr>
        <td><strong>Enf. Cardiovascular:</strong></td>
        <td><?= $hc['hcEnfermedadCardiovascularPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalEnfermedadCardiovascular']; ?></td>
    </tr>
    <tr>
        <td><strong>Artritis:</strong></td>
        <td><?= $hc['hcArtritisPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalArtritis']; ?></td>
    </tr>
    <tr>
        <td><strong>IAM:</strong></td>
        <td><?= $hc['hcIamPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalIam']; ?></td>
    </tr>
    <tr>
        <td><strong>Insuf. Cardiaca:</strong></td>
        <td><?= $hc['hcInsuficienciaCardiacaPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalInsuficienciaCardiaca']; ?></td>
    </tr>
    <tr>
        <td><strong>Enf. Pulmonar:</strong></td>
        <td><?= $hc['hcEnfermedadPulmonarPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalEnfermedadPulmonar']; ?></td>
    </tr>
    <tr>
        <td><strong>Ant. Quirúrgicos:</strong></td>
        <td><?= $hc['hcAntecedentesQuirurgicos']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalAntecedentesQuirurgicos']; ?></td>
    </tr>
    <tr>
        <td><strong>Otros:</strong></td>
        <td><?= $hc['hcOtroPersonal']; ?></td>
        <td><strong>Observaciones:</strong></td>
        <td><?= $hc['hcObsPersonalOtro']; ?></td>
    </tr>

    <tr>
        <th colspan="4" style="background-color:#e0e0e0;">FAMILIARES</th>
    </tr>
    <tr>
        <td><strong>Hipertensión:</strong></td>
        <td><?= $hc['hcHipertensionArterial']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoHipertension']; ?></td>
    </tr>
    <tr>
        <td><strong>Diabetes:</strong></td>
        <td><?= $hc['hcDiabetesMellitus']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoMellitus']; ?></td>
    </tr>
    <tr>
        <td><strong>Artritis:</strong></td>
        <td><?= $hc['hcArtritis']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoArtritis']; ?></td>
    </tr>
    <tr>
        <td><strong>Enf. Cardiovascular:</strong></td>
        <td><?= $hc['hcEnfermedadCardiovascular']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoCardiovascular']; ?></td>
    </tr>
    <tr>
        <td><strong>Cáncer:</strong></td>
        <td><?= $hc['hcCancerMamaEstomagoProstataColon']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoCancer']; ?></td>
    </tr>
    <tr>
        <td><strong>Leucemia:</strong></td>
        <td><?= $hc['hcLucemia']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoLucemia']; ?></td>
    </tr>
    <tr>
        <td><strong>VIH:</strong></td>
        <td><?= $hc['hcVih']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoVih']; ?></td>
    </tr>
    <tr>
        <td><strong>Otros:</strong></td>
        <td><?= $hc['hcOtro']; ?></td>
        <td><strong>Parentesco:</strong></td>
        <td><?= $hc['hcParentescoOtro']; ?></td>
    </tr>
</table>

<!-- 6. EXAMEN FÍSICO -->
<div class="seccion">6. EXAMEN FÍSICO</div>
<table class="tabla">
    <tr>
        <th colspan="4" style="background-color:#e0e0e0;">SIGNOS VITALES</th>
    </tr>
    <tr>
        <td width="25%"><strong>Peso:</strong></td>
        <td width="25%"><?= $hc['hcPeso']; ?> kg</td>
        <td width="25%"><strong>Talla:</strong></td>
        <td width="25%"><?= $hc['hcTalla']; ?> cm</td>
    </tr>
    <tr>
        <td><strong>IMC:</strong></td>
        <td><?= $hc['hcIMC']; ?></td>
        <td><strong>Clasificación:</strong></td>
        <td><?= $hc['hcClasificacion']; ?></td>
    </tr>
    <tr>
        <td><strong>Presión arterial:</strong></td>
        <td><?= $hc['hcPresionArterialSistolicaSentadoPie']; ?>/<?= $hc['hcPresionArterialDistolicaSentadoPie']; ?> mmHg</td>
        <td><strong>Perímetro abdominal:</strong></td>
        <td><?= $hc['hcPerimetroAbdominal']; ?> cm</td>
    </tr>
    <tr>
        <td><strong>Frecuencia cardíaca:</strong></td>
        <td><?= $hc['hcFrecuenciaCardiaca']; ?> lpm</td>
        <td><strong>Frecuencia respiratoria:</strong></td>
        <td><?= $hc['hcFrecuenciaRespiratoria']; ?> rpm</td>
    </tr>
    <tr>
        <td><strong>TFG (CKD-EPI):</strong></td>
        <td><?= $hc['tasa_filtracion_glomerular_ckd_epi']; ?></td>
        <td><strong>TFG (Cockcroft-Gault):</strong></td>
        <td><?= $hc['tasa_filtracion_glomerular_gockcroft_gault']; ?></td>
    </tr>

    <tr>
        <th colspan="4" style="background-color:#e0e0e0;">EXAMEN POR SISTEMAS</th>
    </tr>
    <tr>
        <td><strong>Cabeza:</strong></td>
        <td colspan="3"><?= $hc['hcCabeza']; ?> - <?= $hc['hcObsCabeza']; ?></td>
    </tr>
    <tr>
        <td><strong>ORL:</strong></td>
        <td colspan="3"><?= $hc['hcOrl']; ?></td>
    </tr>
    <tr>
        <td><strong>Oídos:</strong></td>
        <td colspan="3"><?= $hc['hcOidos']; ?></td>
    </tr>
    <tr>
        <td><strong>Nariz/Senos:</strong></td>
        <td colspan="3"><?= $hc['hcNarizSenosParanasales']; ?></td>
    </tr>
    <tr>
        <td><strong>Cavidad oral:</strong></td>
        <td colspan="3"><?= $hc['hcCavidadOral']; ?></td>
    </tr>
    <tr>
        <td><strong>Cardiovascular:</strong></td>
        <td colspan="3"><?= $hc['hcCardiovascular']; ?></td>
    </tr>
    <tr>
        <td><strong>Respiratorio:</strong></td>
        <td colspan="3"><?= $hc['hcRespiratorio']; ?></td>
    </tr>
    <tr>
        <td><strong>Gastrointestinal:</strong></td>
        <td colspan="3"><?= $hc['hcGastrointestinal']; ?></td>
    </tr>
    <tr>
        <td><strong>Abdomen:</strong></td>
        <td colspan="3"><?= $hc['hcAbdomen']; ?> - <?= $hc['hcObsAbdomen']; ?></td>
    </tr>
    <tr>
        <td><strong>Genitourinario:</strong></td>
        <td colspan="3"><?= $hc['hcGenitoUrinario']; ?> - <?= $hc['hcObsGenitoUrinario']; ?></td>
    </tr>
    <tr>
        <td><strong>Musculoesquelético:</strong></td>
        <td colspan="3"><?= $hc['hcMusculoEsqueletico']; ?></td>
    </tr>
    <tr>
        <td><strong>Extremidades:</strong></td>
        <td colspan="3"><?= $hc['hcExtremidades']; ?> - <?= $hc['hcObsExtremidades']; ?></td>
    </tr>
    <tr>
        <td><strong>Piel y anexos:</strong></td>
        <td colspan="3"><?= $hc['hcPielAnexosPulsos']; ?> - <?= $hc['hcObsPielAnexosPulsos']; ?></td>
    </tr>
    <tr>
        <td><strong>Neurológico:</strong></td>
        <td colspan="3"><?= $hc['hcSnc']; ?></td>
    </tr>
    <tr>
        <td><strong>Sistema nervioso:</strong></td>
        <td colspan="3"><?= $hc['hcSistemaNervioso']; ?> - <?= $hc['hcObsSistemaNervioso']; ?></td>
    </tr>
    <tr>
        <td><strong>Capacidad cognitiva:</strong></td>
        <td colspan="3"><?= $hc['hcCapacidadCognitiva']; ?> - <?= $hc['hcObsCapacidadCognitiva']; ?></td>
    </tr>
    <tr>
        <td><strong>Orientación:</strong></td>
        <td colspan="3"><?= $hc['hcOrientacion']; ?> - <?= $hc['hcObsOrientacion']; ?></td>
    </tr>
    <tr>
        <td><strong>Reflejo aquiliano:</strong></td>
        <td colspan="3"><?= $hc['hcReflejoAquiliar']; ?> - <?= $hc['hcObsReflejoAquiliar']; ?></td>
    </tr>
    <tr>
        <td><strong>Reflejo patelar:</strong></td>
        <td colspan="3"><?= $hc['hcReflejoPatelar']; ?> - <?= $hc['hcObsReflejoPatelar']; ?></td>
    </tr>
    <tr>
        <td><strong>Hallazgos positivos:</strong></td>
        <td colspan="3"><?= $hc['hcHallazgoPositivoExamenFisico']; ?></td>
    </tr>
</table>

<!-- 7. DIAGNÓSTICOS Y TRATAMIENTO -->
<div class="seccion">7. DIAGNÓSTICOS Y TRATAMIENTO</div>
<table class="tabla">
    <tr>
        <td width="25%"><strong>Diagnóstico principal:</strong></td>
        <td width="75%"><?= $hc['citPatologia']; ?></td>
    </tr>
    <tr>
        <td><strong>Clasificación HTA:</strong></td>
        <td><?= $hc['hcClasificacionHta']; ?></td>
    </tr>
    <tr>
        <td><strong>Clasificación DM:</strong></td>
        <td><?= $hc['hcClasificacionDm']; ?></td>
    </tr>
    <tr>
        <td><strong>Clasificación ERC:</strong></td>
        <td><?= $hc['hcClasificacionErcEstado']; ?> - <?= $hc['hcClasificacionErcCategoriaAmbulatoriaPersistente']; ?></td>
    </tr>
    <tr>
        <td><strong>RCV:</strong></td>
        <td><?= $hc['hcClasificacionRcv']; ?></td>
    </tr>
    <tr>
        <td><strong>Estado metabólico:</strong></td>
        <td><?= $hc['hcClasificacionEstadoMetabolico']; ?></td>
    </tr>
    <tr>
        <td><strong>Lesión órgano blanco:</strong></td>
        <td><?= $hc['hcLesionOrganoBlanco']; ?> - <?= $hc['hcDescripcionLesionOrganoBlanco']; ?></td>
    </tr>
    <tr>
        <td><strong>Recomendaciones:</strong></td>
        <td>
            <?php
            $recomendaciones = [];
            if($hc['hcAlimentacion'] == 'SI') $recomendaciones[] = "Alimentación saludable";
            if($hc['hcDisminucionConsumoSalAzucar'] == 'SI') $recomendaciones[] = "Reducir consumo de sal/azúcar";
            if($hc['hcFomentoActividadFisica'] == 'SI') $recomendaciones[] = "Actividad física regular";
            if($hc['hcConsumoFrutasVerduras'] == 'SI') $recomendaciones[] = "Aumentar consumo de frutas/verduras";
            if($hc['hcDisminucionConsumoCigarrillo'] == 'SI') $recomendaciones[] = "Reducir consumo de cigarrillo";
            if($hc['hcDisminucionPeso'] == 'SI') $recomendaciones[] = "Reducción de peso";
            if($hc['hcManejoEstres'] == 'SI') $recomendaciones[] = "Manejo del estrés";
            echo implode(', ', $recomendaciones);
            ?>
        </td>
    </tr>
    <tr>
        <td><strong>Adherencia tratamiento:</strong></td>
        <td><?= $hc['hcOmportanciaAdherenciaTratamiento'] == 'SI' ? 'Cumple' : 'No cumple'; ?></td>
    </tr>
    <tr>
        <td><strong>Olvida medicamentos:</strong></td>
        <td><?= $hc['hcOlvidaTomarMedicamentos']; ?></td>
    </tr>
    <tr>
        <td><strong>Toma medicamentos a hora:</strong></td>
        <td><?= $hc['hcTomaMedicamentosHoraIndicada']; ?></td>
    </tr>
    <tr>
        <td><strong>Deja medicamentos cuando mejora:</strong></td>
        <td><?= $hc['hcCuandoEstaBienDejaTomarMedicamentos']; ?></td>
    </tr>
    <tr>
        <td><strong>Deja medicamentos si se siente mal:</strong></td>
        <td><?= $hc['hcSienteMalDejaTomarlos']; ?></td>
    </tr>
    <tr>
        <td><strong>Valoración psicología:</strong></td>
        <td><?= $hc['hcValoracionPsicologia']; ?></td>
    </tr>
    <tr>
        <td><strong>Tratamientos alternativos:</strong></td>
        <td>
            <?php
            $tratamientos = [];
            if($hc['hcRecibeTratamientoAlternativo'] == 'SI') $tratamientos[] = "Tratamientos alternativos";
            if($hc['hcRecibeTratamientoConPlantasMedicinales'] == 'SI') $tratamientos[] = "Plantas medicinales";
            if($hc['hcRecibeRitualMedicinaTradicional'] == 'SI') $tratamientos[] = "Medicina tradicional";
            echo implode(', ', $tratamientos);
            ?>
        </td>
    </tr>
    <tr>
        <td><strong>N° frutas diarias:</strong></td>
        <td><?= $hc['hcNumeroFrutasDiarias']; ?></td>
    </tr>
    <tr>
        <td><strong>Consumo grasas saturadas:</strong></td>
        <td><?= $hc['hcElevadoConsumoGrasaSaturada']; ?></td>
    </tr>
    <tr>
        <td><strong>Añade sal a comida:</strong></td>
        <td><?= $hc['hcAdicionaSalDespuesPrepararComida']; ?></td>
    </tr>
</table>

<!-- 8. EXAMENES COMPLEMENTARIOS -->
<div class="seccion">8. EXAMENES COMPLEMENTARIOS</div>
<table class="tabla">
    <tr>
        <td width="25%"><strong>Ecografía renal:</strong></td>
        <td width="75%"><?= $hc['hcEcografiaRenal']; ?></td>
    </tr>
    <tr>
        <td><strong>Electrocardiograma:</strong></td>
        <td><?= $hc['hcElectrocardiograma']; ?></td>
    </tr>
    <tr>
        <td><strong>Ecocardiograma:</strong></td>
        <td><?= $hc['hcEcocardiograma']; ?></td>
    </tr>
</table>

<!-- 9. OBSERVACIONES GENERALES -->
<div class="seccion">9. OBSERVACIONES GENERALES</div>
<table class="tabla">
    <tr>
        <td><?= nl2br($hc['hcObservacionesGenerales']); ?></td>
    </tr>
</table>

<!-- 10. REFORMULACIONES -->
<?php if(!empty($hc['hcRazonReformulacion']) || !empty($hc['hcMotivoReformulacion'])): ?>
<div class="seccion">10. REFORMULACIONES</div>
<table class="tabla">
    <?php if(!empty($hc['hcRazonReformulacion'])): ?>
    <tr>
        <td width="25%"><strong>Razón:</strong></td>
        <td width="75%"><?= $hc['hcRazonReformulacion']; ?></td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($hc['hcMotivoReformulacion'])): ?>
    <tr>
        <td><strong>Motivo:</strong></td>
        <td><?= $hc['hcMotivoReformulacion']; ?></td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($hc['hcReformulacionQuienReclama'])): ?>
    <tr>
        <td><strong>Quién reclama:</strong></td>
        <td><?= $hc['hcReformulacionQuienReclama']; ?></td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($hc['hcReformulacionNombreReclama'])): ?>
    <tr>
        <td><strong>Nombre reclama:</strong></td>
        <td><?= $hc['hcReformulacionNombreReclama']; ?></td>
    </tr>
    <?php endif; ?>
</table>
<?php endif; ?>
<!-- FIRMA -->
<div class="firma">
    <?php if(!empty($hc['firma_base64'])): ?>
        <p><img alt="Firma del profesional" width="302px" height="70px" src="<?= $hc['firma_base64'] ?>"/></p>
    <?php else: ?>
        <p>Firma no disponible</p>
    <?php endif; ?>
    
    <p>Médico Tratante</p>
    <p><?= !empty($hc['usuNombre']) ? $hc['usuApellido'].'  '.$hc['usuNombre'] : 'Nombre del profesional'; ?></p>
    <p>Licencia: <?= !empty($hc['usuRegistroProfesional']) ? $hc['usuRegistroProfesional'] : 'N°'; ?></p>
</div>
<!-- Salto de página para la siguiente historia clínica -->
<div class="salto-pagina"></div>