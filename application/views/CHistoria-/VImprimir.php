<style type="text/css">
    fieldset {
        border: 1px ridge #0f0fef;
        /* Borde */
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

    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }

    @media all {
        div.saltopagina {
            display: none;
        }
    }

    @media print {
        div.saltopagina {
            display: block;
            page-break-before: always;
        }
    }
</style>

<br>
<input type="button" class="btn btn-danger no-print" onclick="pregunta()" value="--- Regresar ---"><br><br>
<?php if ($dato_historia[0]->proceso_idProceso == 1 && $dato_historia[0]->id_categoria_cups == 1) { ?>
    <!--center>
        <h5 style="color: blue;">HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</h5>
    </center-->
    <div class="mx-auto" style="width: 1300px;">
        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
        <br><br>

        <div class="mx-auto" style="width: 1300px;">
            <?php foreach ($dato_historia as $h) { ?>

                <fieldset>
                    <legend>DATOS PACIENTE</legend>
                    <div class="form-row" style="text-align:center">
                        <div class="form-group col-md-2">
                            <strong>NOMBRE</strong><br>
                            <?php
                            echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";


                            echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                            <?php echo $h->pacFecNacimiento . "<br>";
                            list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                            $anio_dif = date("Y") - $anio;
                            $mes_dif = date("m") - $mes;
                            $dia_dif = date("d") - $dia;

                            if ($dia_dif < 0 || $mes_dif < 0) {
                                $anio_dif--;
                                //return $anio_dif;
                            }

                            echo $anio_dif . "Años";
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>SEXO</strong><br>
                            <?php if ($h->pacSexo == "M") {
                                echo "MASCULINO";
                            } else {
                                echo "FEMENINO";
                            } ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>ESATDO CIVIL</strong><br>
                            <?php echo $h->pacEstCivil; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>TELEFONO</strong><br>
                            <?php echo $h->pacTelefono; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>DIRECCION</strong><br>
                            <?php
                            echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                        </div>
                    </div>
                    <div class="form-row" style="text-align:center">
                        <div class="form-group col-md-3">
                            <strong>ASEGURADORA</strong><br>
                            <?php
                            echo $h->empNombre; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>REGIMEN</strong><br>
                            <?php echo $h->regNombre; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>OCUPACION</strong><br>
                            <?php echo $h->ocuNombre; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>BRIGADA</strong><br>
                            <?php echo $h->zonNombre; ?>
                        </div>
                    </div>

                </fieldset><br>
                <fieldset>
                    <legend>ACUDIENTE</legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-4">
                            <strong>NOMBRE ACOMPAÑANTE</strong><br>
                            <?php
                            echo $h->hcAcompanante; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>PARENTESCO</strong><br>
                            <?php
                            echo $h->hcAcuParentesco; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>TELEFONO</strong><br>
                            <?php
                            echo $h->hcAcuTelefono; ?>
                        </div>
                    </div>

                </fieldset><br>

                <fieldset>
                    <legend>HISTORIA CLINICA</legend>

                    <div style="margin: 10px; text-align:center">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MOTIVO CONSULTA</strong><br>
                                <?php
                                echo $h->hcMotivoConsulta; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>ENFERMEDAD ACTUAL</strong><br>
                                <?php
                                echo $h->hcEnfermedadActual; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>ANTECEDENTES</legend>
                    <div style="margin: 10px; text-align:center">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <strong>DISCAPACIDAD FISICA</strong><br>
                                <?php
                                echo $h->hcDiscapacidadFisica; ?>

                            </div>
                            <div class="form-group col-md-2">
                                <strong>DISCAPACIDAD VISUAL</strong><br>
                                <?php
                                echo $h->hcDiscapacidadVisual; ?>

                            </div>


                            <div class="form-group col-md-2">
                                <strong>DISCAPACIDAD MENTAL</strong><br>
                                <?php
                                echo $h->hcDiscapacidadMental; ?>

                            </div>
                            <div class="form-group col-md-2">
                                <strong>DISCAPACIDAD AUDITIVA</strong><br>
                                <?php
                                echo $h->hcDiscapacidadAuditiva; ?>

                            </div>

                            <div class="form-group col-md-3">
                                <strong>DISCAPACIDAD INTELECTUAL</strong><br>
                                <?php
                                echo $h->hcDiscapacidadIntelectual; ?>

                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-6">
                            <strong>DROGODEPENDIENTE?</strong>
                            <br>
                            <?php
                            echo $h->hcDrogoDependiente; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>DROGODEPENDIENTE CUAL</strong>
                            <br>
                            <?php
                            echo $h->hcDrogoDependienteCual; ?>
                        </div>
                    </div>
                </div><br>

                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-3">
                            <strong>PESO KG</strong>
                            <br>
                            <?php
                            echo $h->hcPeso; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>TALLA CM</strong>
                            <br>
                            <?php
                            echo $h->hcTalla; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>IMC</strong>
                            <br>
                            <?php
                            echo $h->hcIMC; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>CLASIFICACION</strong>
                            <br>
                            <?php
                            echo $h->hcClasificacion; ?>
                        </div>
						 <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>PERIMETRO ABDOMINAL: </strong>
                                <?php
                                echo $h->hcPerimetroAbdominal; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES PERIMETRO ABDOMINAL: </strong>
                                <?php
                                echo $h->hcObsPerimetroAbdominal; ?>

                            </div>
                    </div>
                </div><br>

                <fieldset>
                    <legend>ANTECEDENTES FAMILIARES</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>¿HIPERTENSION ARTERIAL?: </strong>

                                <?php
                                echo $h->hcHipertensionArterial; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION HIPERTENSION ARTERIAL: </strong>

                                <?php
                                echo $h->hcParentescoHipertension; ?>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>¿DIABETES MELLITUS?: </strong>

                                <?php
                                echo $h->hcDiabetesMellitus; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION DIABETES MELLITUS: </strong>

                                <?php
                                echo $h->hcParentescoMellitus; ?>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>¿ARTRITIS?: </strong>

                                <?php
                                echo $h->hcArtritis; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION ARTRITIS: </strong>

                                <?php
                                echo $h->hcParentescoArtritis; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>¿ENF. CARDIOVASCULAR?: </strong>

                                <?php
                                echo $h->hcEnfermedadCardiovascular; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION ENF. CARDIOVASCULAR: </strong>

                                <?php
                                echo $h->hcParentescoCardiovascular; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANTECEDENTES METABOLICOS: </strong>

                                <?php
                                echo $h->hcAntecedenteMetabolico; ?>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION ANTECEDENTES METABOLICOS: </strong>

                                <?php
                                echo $h->hcParentescoMetabolico; ?>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>CANCER (MAMA, ESTOMAGO, PROSTATA, COLON): </strong>

                                <?php
                                echo $h->hcCancerMamaEstomagoProstataColon; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION CANCER: </strong>

                                <?php
                                echo $h->hcParentescoCancer; ?>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>LUCEMIA: </strong>
                                <?php
                                echo $h->hcLucemia; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION LUCEMIA: </strong>

                                <?php
                                echo $h->hcParentescoLucemia; ?>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>VIH: </strong>

                                <?php
                                echo $h->hcVih; ?>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION VIH: </strong>

                                <?php
                                echo $h->hcParentescoVih; ?>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>OTROS: </strong>

                                <?php
                                echo $h->hcOtro; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PARENTESCO Y DESCRIPCION OTRO: </strong>

                                <?php
                                echo $h->hcParentescoOtro; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>ANTECEDENTES PERSONALES</legend>
                    <div style="margin: 10px;">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ENFERMEDAD CARDIOVASCULAR:</strong>
                                <?php
                                echo $h->hcEnfermedadCardiovascularPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ENFERMEDAD CARDIOVASCULAR:</strong>
                                <?php
                                echo $h->hcObsPersonalEnfermedadCardiovascular; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ENFERMEDAD ARTERIAL PERIFERICA: </strong>
                                <?php
                                echo $h->hcArterialPerifericaPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ARTERIAL PERIFERICA: </strong>
                                <?php
                                echo $h->hcObsPersonalArterialPeriferica; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ENFERMEDAD CAROTIDEA: </strong>
                                <?php
                                echo $h->hcCarotideaPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ENFERMEDAD CAROTIDEA: </strong>
                                <?php
                                echo $h->hcObsPersonalCarotidea; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANEURISMA AORTA: </strong>
                                <?php
                                echo $h->hcAneurismaAortaPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ANEURISMA AORTA: </strong>
                                <?php
                                echo $h->hcObsPersonalAneurismaAorta; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SINDROME CORONARIO AGUDO-ANGINA: </strong>
                                <?php
                                echo $h->hcSindromeCoronarioAgudoanginaPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION SINDROME CORONARIO: </strong>
                                <?php
                                echo $h->hcObsPersonalSindromeCoronario; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ARTRITIS: </strong>
                                <?php
                                echo $h->hcArtritisPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ARTRITIS: </strong>
                                <?php
                                echo $h->hcObsPersonalArtritis; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>INFARTO AGUDO MIOCARDIO: </strong>
                                <?php
                                echo $h->hcIamPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION INFARTO AGUDO MIOCARDIO: </strong>
                                <?php
                                echo $h->hcObsPersonalIam; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>REVASCUL CORONARIA: </strong>
                                <?php
                                echo $h->hcRevasculCoronariaPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION REVASCULARIZACION: </strong>
                                <?php
                                echo $h->hcObsPersonalRevasculCoronaria; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>INSUFICIENCIA CARDIACA: </strong>
                                <?php
                                echo $h->hcInsuficienciaCardiacaPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION INSUFICIENCIA CARDIACA: </strong>
                                <?php
                                echo $h->hcObsPersonalInsuficienciaCardiaca; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>AMPUTACION PIE DIABETICO: </strong>
                                <?php
                                echo $h->hcAmputacionPieDiabeticoPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION AMPUTACION PIE DIABETICO: </strong>
                                <?php
                                echo $h->hcObsPersonalAmputacionPieDiabetico; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ENFERMEDAD PULMONARES (TB-TB-MDR) OTRAS: </strong>
                                <?php
                                echo $h->hcEnfermedadPulmonarPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ENFERMEDAD PULMONAR: </strong>
                                <?php
                                echo $h->hcObsPersonalEnfermedadPulmonar; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>VICTIMA DE MALTRATO/VIOLENCIA SEXUAL: </strong>
                                <?php
                                echo $h->hcVictimaMaltratoPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION VICTIMA SEXUAL: </strong>
                                <?php
                                echo $h->hcObsPersonalMaltratoPersonal; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANTECEDENTES QUIRURGICOS: </strong>
                                <?php
                                echo $h->hcAntecedentesQuirurgicos; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ANTECEDENTES QUIRURGICOS: </strong>
                                <?php
                                echo $h->hcObsPersonalAntecedentesQuirurgicos; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ACANTOSIS NIGRICANS: </strong>
                                <?php
                                echo $h->hcAcontosisPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION ACANTOSIS NIGRICANS: </strong>
                                <?php
                                echo $h->hcObsPerrsonalAcontosis; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>OTROS: </strong>
                                <?php
                                echo $h->hcOtroPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION OTROS: </strong>
                                <?php
                                echo $h->hcObsPersonalOtro; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>TEST MORISKY</legend>

                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>OLVIDA ALGUNA VEZ TOMAR SUS MEDICAMENTOS: </strong>
                                <?php
                                echo $h->hcOlvidaTomarMedicamentos; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>TOMAR LOS MEDICAMENTOS A LA HORA INDICADA: </strong>
                                <?php
                                echo $h->hcTomaMedicamentosHoraIndicada; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CUANDO SE ENCUENTRA BIEN ¿DEJA DE TOMAR SUS MEDICAMENTOS?: </strong>
                                <?php
                                echo $h->hcCuandoEstaBienDejaTomarMedicamentos; ?>
                            </div>


                            <div class="form-group col-md-6">
                                <strong>SI ALGUNA VEZ SE SIENTE MAL ¿DEJA DE TOMARLOS?: </strong>
                                <?php
                                echo $h->hcSienteMalDejaTomarlos; ?>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>VALORACION POR PSICOLOGIA: </strong>
                                <?php
                                echo $h->hcValoracionPsicologia; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <fieldset>
                    <legend>OTROS TRATAMIENTOS</legend>

                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>RECIBE TRATAMIENTO ALTERNATIVO?: </strong>
                                <?php
                                echo $h->hcRecibeTratamientoAlternativo; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>RECIBE TRATAMIENTO CON PLANTAS MEDICINALES?: </strong>
                                <?php
                                echo $h->hcRecibeTratamientoConPlantasMedicinales; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>RECIBE O REALIZA RITUALIDAD POR MEDICINA TRADICIONAL?: </strong>
                                <?php
                                echo $h->hcRecibeRitualMedicinaTradicional; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>REVISION POR SISTEMA</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>GENERAL: </strong>
                                <?php
                                echo $h->hcGeneral; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CABEZA: </strong>
                                <?php
                                echo $h->hcCabeza; ?>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>RESPIRATORIO: </strong>
                                <?php
                                echo $h->hcRespiratorio; ?>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>CARDIOVASCULAR: </strong>
                                <?php
                                echo $h->hcCardiovascular; ?>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>GASTROINTESTINAL: </strong>
                                <?php
                                echo $h->hcGastrointestinal; ?>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>OSTEOATROMUSCULAR: </strong>
                                <?php
                                echo $h->hcOsteoatromuscular; ?>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>SISTEMA NERVIOSO CENTRAL: </strong>
                                <?php
                                echo $h->hcSnc; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>EXAMEN FISICO</legend>

                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>PRESION ARTERIAL SISTOLICA: </strong>
                                <?php
                                echo $h->hcPresionArterialSistolicaSentadoPie; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>PRESION ARTERIAL DISTOLICA: </strong>
                                <?php
                                echo $h->hcPresionArterialDistolicaSentadoPie; ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>FRECUENCIA CARDIACA: </strong>
                                <?php
                                echo $h->hcFrecuenciaCardiaca; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>FRECUENCIA RESPIRATORIA: </strong>
                                <?php
                                echo $h->hcFrecuenciaRespiratoria; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CABEZA: </strong>
                                <?php
                                echo $h->hcEfCabeza; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES CABEZA: </strong>
                                <?php
                                echo $h->hcObsCabeza; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>AGUDEZA VISUAL: </strong>
                                <?php
                                echo $h->hcAgudezaVisual; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES AGUDEZA VISUAL: </strong>
                                <?php
                                echo $h->hcObsAgudezaVisual; ?>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CUELLO: </strong>
                                <?php
                                echo $h->hcCuello; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES CUELLO: </strong>
                                <?php
                                echo $h->hcObsCuello; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>TORAX: </strong>
                                <?php
                                echo $h->hcTorax; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES TORAX: </strong>
                                <?php
                                echo $h->hcObsTorax; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MAMAS: </strong>
                                <?php
                                echo $h->hcMamas; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES MAMAS: </strong>
                                <?php
                                echo $h->hcObsMamas; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ABDOMEN: </strong>
                                <?php
                                echo $h->hcAbdomen; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES ABDOMEN: </strong>
                                <?php
                                echo $h->hcObsAbdomen; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>GENITO URINARIO: </strong>
                                <?php
                                echo $h->hcGenitoUrinario; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES GENITO URINARIO: </strong>
                                <?php
                                echo $h->hcObsGenitoUrinario; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>EXTREMIDADES: </strong>
                                <?php
                                echo $h->hcExtremidades; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES EXTREMIDADES: </strong>
                                <?php
                                echo $h->hcObsExtremidades; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>PIEL Y ANEXOS PULSOS: </strong>
                                <?php
                                echo $h->hcPielAnexosPulsos; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES PIEL Y ANEXOS PULSOS: </strong>
                                <?php
                                echo $h->hcObsPielAnexosPulsos; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SISTEMA NERVIOSO: </strong>
                                <?php
                                echo $h->hcSistemaNervioso; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES SISTEMA NERVIOSO: </strong>
                                <?php
                                echo $h->hcObsSistemaNervioso; ?>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ORIENTACION: </strong>
                                <?php
                                echo $h->hcOrientacion; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES ORIENTACION: </strong>
                                <?php
                                echo $h->hcObsOrientacion; ?>

                            </div>
                        </div>

                       
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>HALLAZGOS POSITIVOS AL EXAMEN FISICO: </strong>
                                <?php
                                echo $h->hcHallazgoPositivoExamenFisico; ?>

                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <fieldset>
                    <legend>FACTORES DE RIESGO</legend>

                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>NUMERO DE PORCIONES DE FRUTAS Y VERDURAS DIARIAS: </strong>
                                <?php
                                echo $h->hcNumeroFrutasDiarias; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ELEVADO CONSUMO DE GRASAS SATURADAS: </strong>
                                <?php
                                echo $h->hcElevadoConsumoGrasaSaturada; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ADICIONA SAL DESPUES DE PREPARADOS LOS ALIMENTOS: </strong>
                                <?php
                                echo $h->hcAdicionaSalDespuesPrepararComida; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>DISLIPIDEMIA: </strong>
                                <?php
                                echo $h->hcDislipidemia; ?>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <strong>CONDICION CLINICA ASOCIADA: </strong>
                                <?php
                                echo $h->hcCondicionClinicaAsociada; ?>

                            </div>
                            <div class="form-group col-md-3">
                                <strong>LESION DE ORGANO BLANCO: </strong>
                                <?php
                                echo $h->hcLesionOrganoBlanco; ?>

                            </div>
                            <?php if ($h->hcDescripcionLesionOrganoBlanco == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION LESION DE ORGANO BLANCO:</strong>
                                    <?php
                                    echo $h->hcDescripcionLesionOrganoBlanco; ?>

                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </fieldset><br>
                <fieldset>
                    <legend>EXAMENES</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <strong>ELECTROCARDIOGRAMA</strong><br>
                                <?php
                                echo $h->hcElectrocardiograma; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>ECOCARDIOGRAMA</strong><br>
                                <?php
                                echo $h->hcEcocardiograma; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>ECOGRAFIA RENAL</strong><br>
                                <?php
                                echo $h->hcEcografiaRenal; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>CLASIFICACION</legend>

                    <div style="margin: 10px;">
					
					<div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>HIPERTENSION ARTERIAL: </strong>
                                <?php
                                echo $h->hcHipertensionArterialPersonal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBSERVACION HIPERTENSION ARTERIAL: </strong>
                                <?php
                                echo $h->hcObsPersonallHipertensionArterial; ?>
                            </div>
                        </div>
                       					
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CLASIFIACION HTA: </strong>
                                <?php
                                echo $h->hcClasificacionHta; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>CLASIFICACION DM: </strong>
                                <?php
                                echo $h->hcClasificacionDm; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CLASIFIACION ERC ESTADIO: </strong>
                                <?php
                                echo $h->hcClasificacionErcEstado; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CLASIFIACION ERC CATEGORIA DE ALBUMINURIA PERSISTENTE: </strong>
                                <?php
                                echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CLASIFIACION RIESGO CARDIO VASCULAR: </strong>
                                <?php
                                echo $h->hcClasificacionRcv; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset>
                    <legend>EDUCACION</legend>

                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ALIMENTACION: </strong>
                                <?php
                                echo $h->hcAlimentacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>DISMINUCION DE CONSUMO DE SAL/AZUCAR: </strong>
                                <?php
                                echo $h->hcDisminucionConsumoSalAzucar; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>FOMENTO DE ACTIVIDAD FISICA: </strong>
                                <?php
                                echo $h->hcFomentoActividadFisica; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>IMPORTANCIA DE ADHERENCIA A TRATAMIENTO: </strong>
                                <?php
                                echo $h->hcOmportanciaAdherenciaTratamiento; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CONSUMO DE FRUTAS Y VERDURAS: </strong>
                                <?php
                                echo $h->hcConsumoFrutasVerduras; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>MANEJO DEL ESTRES: </strong>
                                <?php
                                echo $h->hcManejoEstres; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>DISMINUCION DE CONSUMO CIGARRILLO: </strong>
                                <?php
                                echo $h->hcDisminucionConsumoCigarrillo; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>DISMINUCION DE PESO: </strong>
                                <?php
                                echo $h->hcDisminucionPeso; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px;">
                        <div class="form-group col-md-12">
                            <strong>OBSERVACIONES GENERALES</strong><br>
                            <?php
                            echo $h->hcObservacionesGenerales; ?>

                        </div>
                    </div>
                </div><br>
                <fieldset>
                    <legend>DIAGNOSTICO</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>#</th>
                                        <th>CODIGO</th>
                                        <th>DIAGNOSTICO</th>
                                        <th>CLASIFICACION</th>
                                        <th>TIPO</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 1;
                                        foreach ($diagnostico_historia as $dh) {

                                            echo "<tr>";
                                            echo "<td>" . $num++ . "</td>";
                                            echo "<td>" . $dh->diaCodigo . "</td>";
                                            echo "<td>" . $dh->diaNombre . "</td>";
                                            echo "<td>" . $dh->his_dia_tipo . "</td>";
                                            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>CAUSA EXTERNA: </strong>
                                <?php echo $h->hcCausaExterna; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px;">
                        <div class="form-group col-md-12">
                            <strong>FINALIDAD: </strong>
                            <?php
                            echo $h->finalidad_idFinalidad; ?>
                        </div>
                    </div>
                </div><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-6">
                            <strong>PROFESIONAL QUE ATIENDE</strong><br>
                            <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>FIRMA PACIENTE</strong><br>
                            <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                        </div>
                    </div>
                </div><br>

                <?php if (count($medicamento_historia) != 0) { ?>
                    <div class="saltopagina">
                        <div class="mx-auto" style="width: 1300px;">
                            <div style="border: ridge #0f0fef 1px; text-align:center">

                                <div class="form-row" style="margin: 10px;">
                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>
                                    <div class="form-group col-md-4" style=" margin: auto;">

                                        <tr height="">
                                            <td height="">
                                                <div align="center">
                                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr height="">
                                            <td height="">
                                                <div align="center"><small>HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>


                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>


                                </div>
                            </div>
                            <br><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:left;">
                                    <div class="form-group col-md-2">
                                        <strong>DOCUMENTO: </strong><br>
                                        <?php
                                        echo $h->pacDocumento;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>NOMBRE: </strong><br>
                                        <?php
                                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                        <?php echo $h->pacFecNacimiento . " - ";
                                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                        $anio_dif = date("Y") - $anio;
                                        $mes_dif = date("m") - $mes;
                                        $dia_dif = date("d") - $dia;

                                        if ($dia_dif < 0 || $mes_dif < 0) {
                                            $anio_dif--;
                                            //return $anio_dif;
                                        }

                                        echo $anio_dif . "Años";
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>DIRECCION: </strong><br>
                                        <?php
                                        echo $h->pacDireccion; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>TELEFONO: </strong><br>
                                        <?php
                                        echo $h->pacTelefono; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA: </strong><br>
                                        <?php echo date('d-m-Y');

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>DIAGNOSTICO</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO DIAGNOSTICA</center>
                                                        </th>
                                                    </tr>
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>DIAGNOSTICO</th>
                                                    <th>CLASIFICACION</th>
                                                    <th>TIPO</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 1;
                                                    foreach ($diagnostico_historia as $dh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $num++ . "</td>";
                                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                                        echo "<td>" . $dh->diaNombre . "</td>";
                                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend>MEDICAMENTOS</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                        </th>
                                                    </tr>
                                                    <th>MEDICAMENTO</th>
                                                    <th>CANTIDAD</th>
                                                    <th>DOSIS</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($medicamento_historia as $mh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $mh->medNombre . "</td>";
                                                        echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                        echo "<td>" . $mh->hisMedDosis . "</td>";

                                                        echo "</tr>";
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:center;">
                                    <div class="form-group col-md-6">
                                        <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>FIRMA PACIENTE</strong><br>
                                        <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                <?php }
                if (count($remision_historia) != 0) { ?>
                    <div class="saltopagina">
                        <div class="mx-auto" style="width: 1300px;">
                            <div style="border: ridge #0f0fef 1px; text-align:center">

                                <div class="form-row" style="margin: 10px;">
                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>
                                    <div class="form-group col-md-4" style=" margin: auto;">

                                        <tr height="">
                                            <td height="">
                                                <div align="center">
                                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr height="">
                                            <td height="">
                                                <div align="center"><small>HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>


                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>


                                </div>
                            </div>
                            <br><br>

                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:left;">
                                    <div class="form-group col-md-2">
                                        <strong>DOCUMENTO: </strong><br>
                                        <?php
                                        echo $h->pacDocumento;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>NOMBRE: </strong><br>
                                        <?php
                                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                        <?php echo $h->pacFecNacimiento . " - ";
                                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                        $anio_dif = date("Y") - $anio;
                                        $mes_dif = date("m") - $mes;
                                        $dia_dif = date("d") - $dia;

                                        if ($dia_dif < 0 || $mes_dif < 0) {
                                            $anio_dif--;
                                            //return $anio_dif;
                                        }

                                        echo $anio_dif . "Años";
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>DIRECCION: </strong><br>
                                        <?php
                                        echo $h->pacDireccion; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>TELEFONO: </strong><br>
                                        <?php
                                        echo $h->pacTelefono; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA: </strong><br>
                                        <?php echo date('d-m-Y');

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>DIAGNOSTICO</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO DIAGNOSTICA</center>
                                                        </th>
                                                    </tr>
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>DIAGNOSTICO</th>
                                                    <th>CLASIFICACION</th>
                                                    <th>TIPO</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 1;
                                                    foreach ($diagnostico_historia as $dh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $num++ . "</td>";
                                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                                        echo "<td>" . $dh->diaNombre . "</td>";
                                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>

                            <fieldset>
                                <legend>REMISION</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                        </th>
                                                    </tr>
                                                    <th>CODIGO</th>
                                                    <th>REMISION</th>
                                                    <th>OBSERVACION</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($remision_historia as $r) {

                                                        echo "<tr>";
                                                        echo "<td>"
                                                            . $r->remCodigo . "</td>";
                                                        echo "<td>" . $r->remNombre . "</td>";
                                                        echo "<td>" . $r->remObservacion . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:center;">
                                    <div class="form-group col-md-6">
                                        <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>FIRMA PACIENTE</strong><br>
                                        <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                if (count($cups_historia) != 0) { ?>
                    <br>
                    <div class="saltopagina">
                        <div class="mx-auto" style="width: 1300px;">
                            <div style="border: ridge #0f0fef 1px; text-align:center">

                                <div class="form-row" style="margin: 10px;">
                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>
                                    <div class="form-group col-md-4" style=" margin: auto;">

                                        <tr height="">
                                            <td height="">
                                                <div align="center">
                                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr height="">
                                            <td height="">
                                                <div align="center"><small>HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>


                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>


                                </div>
                            </div>
                            <br><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:left;">
                                    <div class="form-group col-md-2">
                                        <strong>DOCUMENTO: </strong><br>
                                        <?php
                                        echo $h->pacDocumento;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>NOMBRE: </strong><br>
                                        <?php
                                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                        <?php echo $h->pacFecNacimiento . " - ";
                                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                        $anio_dif = date("Y") - $anio;
                                        $mes_dif = date("m") - $mes;
                                        $dia_dif = date("d") - $dia;

                                        if ($dia_dif < 0 || $mes_dif < 0) {
                                            $anio_dif--;
                                            //return $anio_dif;
                                        }

                                        echo $anio_dif . "Años";
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>DIRECCION: </strong><br>
                                        <?php
                                        echo $h->pacDireccion; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>TELEFONO: </strong><br>
                                        <?php
                                        echo $h->pacTelefono; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA: </strong><br>
                                        <?php echo date('d-m-Y');

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>DIAGNOSTICO</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO DIAGNOSTICA</center>
                                                        </th>
                                                    </tr>
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>DIAGNOSTICO</th>
                                                    <th>CLASIFICACION</th>
                                                    <th>TIPO</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 1;
                                                    foreach ($diagnostico_historia as $dh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $num++ . "</td>";
                                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                                        echo "<td>" . $dh->diaNombre . "</td>";
                                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend>AYUDAS DIAGNOSTICAS</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO AYUDA DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                                        </th>
                                                    </tr>
                                                    <th>CODIGO</th>
                                                    <th>CUPS</th>
                                                    <th>OBSERVACION</th>

                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($cups_historia as $ch) {

                                                        echo "<tr>";
                                                        echo "<td>" . $ch->cupCodigo . "</td>";
                                                        echo "<td>" . $ch->cupNombre . "</td>";
                                                        echo "<td>" . $ch->cupObservacion . "</td>";

                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:center;">
                                    <div class="form-group col-md-6">
                                        <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>FIRMA PACIENTE</strong><br>
                                        <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
<?php } ?>

<?php } elseif ($dato_historia[0]->proceso_idProceso == 1 && $dato_historia[0]->id_categoria_cups == 2) { ?>

    <div class="mx-auto" style="width: 1300px;">
        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>CONTROL APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
        <br><br>


        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php echo $h->hcAcompanante; ?>

                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php echo $h->hcAcuParentesco; ?>

                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>


            <fieldset>
                <legend>HISTORIA CLINICA</legend>

                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>PRESION ARTERIAL SISTOLICA: </strong>
                            <?php echo $h->hcPresionArterialSistolicaSentadoPie; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>PRESION ARTERIAL DISTOLICA: </strong>
                            <?php echo $h->hcPresionArterialDistolicaSentadoPie; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>FRECUENCIA CARDIACA: </strong>
                            <?php echo $h->hcFrecuenciaCardiaca; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>FRECUENCIA RESPIRATORIA: </strong>
                            <?php echo $h->hcFrecuenciaRespiratoria; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>PERIMETRO ABDOMINAL: </strong>
                            <?php echo $h->hcObsPerimetroAbdominal; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>INSULINO REQUIRIENTE: </strong>
                            <?php echo $h->insulina_requiriente; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>PESO KG: </strong>
                            <?php echo $h->hcPeso; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>TALLA CM: </strong>
                            <?php echo $h->hcTalla; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>IMC: </strong>
                            <?php echo $h->hcIMC; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION: </strong>
                            <?php echo $h->hcClasificacion; ?>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <strong>TASA DE FILTRACION GLOMERULAR CKD-EPI: </strong>
                            <?php echo $h->tasa_filtracion_glomerular_ckd_epi; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>TASA DE FILTRACION GLOMERULAR Cockcroft-Gault: </strong>
                            <?php echo $h->tasa_filtracion_glomerular_gockcroft_gault; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>

            <fieldset>
                <legend>EXAMEN FISICO POR SISTEMA</legend>

                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CABEZA: </strong>
                            <?php echo $h->hcEfCabeza; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>OJOS (AGUDEZA VISUAL): </strong>
                            <?php echo $h->hcAgudezaVisual; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>OIDOS: </strong>
                            <?php echo $h->hcOidos; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>NARIZ Y SENOS PARANASALES: </strong>
                            <?php echo $h->hcNarizSenosParanasales; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CAVIDAD ORAL: </strong>
                            <?php echo $h->hcCavidadOral; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CUELLO: </strong>
                            <?php echo $h->hcCuello; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CARDIO RESPIRATORIO: </strong>
                            <?php echo $h->hcCardioRespiratorio; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>MAMAS: </strong>
                            <?php echo $h->hcMamas; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>GASTROINTESTINAL: </strong>
                            <?php echo $h->hcGastrointestinal; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>GENITO URINARIO: </strong>
                            <?php echo $h->hcGenitoUrinario; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>MUSCULO ESQUELETICO: </strong>
                            <?php echo $h->hcMusculoEsqueletico; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>PIEL Y ANEXOS PULSOS: </strong>
                            <?php echo $h->hcPielAnexosPulsos; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>INSPECCION Y SENSIBILIDAD EN PIES: </strong>
                            <?php echo $h->hcInspeccionSensibilidadPies; ?>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>NERVIOSO: </strong>
                            <?php echo $h->hcSistemaNervioso; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CAPACIDAD CONGNITIVA, ORIENTACION: </strong>
                            <?php echo $h->hcCapacidadCongnitivaOrientacion; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>REFLEJO AQUILIAR: </strong>
                            <?php echo $h->hcReflejoAquiliar; ?>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>REFLEJO PATELAR: </strong>
                            <?php echo $h->hcReflejoPatelar; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <strong>ANT DISLIPIDEMIA FAMILIAR: </strong>
                            <?php echo $h->hcDislipidemia; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>LESION DE ORGANO BLANCO: </strong>
                            <?php
                            echo $h->hcLesionOrganoBlanco; ?>

                        </div>
                        <?php if ($h->hcDescripcionLesionOrganoBlanco == 'SI') { ?>
                            <div class="form-group col-md-6">
                                <strong>DESCRIPCION LESION DE ORGANO BLANCO:</strong>
                                <?php
                                echo $h->hcDescripcionLesionOrganoBlanco; ?>

                            </div>
                        <?php  } ?>
                    </div>
            </fieldset><br>
            <fieldset>
                <legend>EXAMENES</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <strong>ELECTROCARDIOGRAMA</strong><br>
                            <?php
                            echo $h->hcElectrocardiograma; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>ECOCARDIOGRAMA</strong><br>
                            <?php
                            echo $h->hcEcocardiograma; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>ECOGRAFIA RENAL</strong><br>
                            <?php
                            echo $h->hcEcografiaRenal; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <fieldset>
                <legend>REVISION POR SISTEMA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>GENERAL: </strong>
                            <?php
                            echo $h->hcGeneral; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CABEZA: </strong>
                            <?php
                            echo $h->hcCabeza; ?>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <strong>RESPIRATORIO: </strong>
                            <?php
                            echo $h->hcRespiratorio; ?>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>CARDIOVASCULAR: </strong>
                            <?php
                            echo $h->hcCardiovascular; ?>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>GASTROINTESTINAL: </strong>
                            <?php
                            echo $h->hcGastrointestinal; ?>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>OSTEOATROMUSCULAR: </strong>
                            <?php
                            echo $h->hcOsteoatromuscular; ?>
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <strong>SISTEMA NERVIOSO CENTRAL: </strong>
                            <?php
                            echo $h->hcSnc; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>


            <fieldset>
                <legend>CLASIFICACION</legend>

                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION HTA: </strong>
                            <?php echo $h->hcClasificacionHta; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION DM: </strong>
                            <?php echo $h->hcClasificacionDm; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CLASIFIACION ERC ESTADO: </strong>
                            <?php echo $h->hcClasificacionErcEstado; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CLASIFIACION ERC CATEGORIA DE ALBUMINURIA PERSISTENTE: </strong>
                            <?php echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION RCV: </strong>
                            <?php echo $h->hcClasificacionRcv; ?>
                        </div>
                    </div>
            </fieldset><br>

            <fieldset>
                <legend>EDUCACION</legend>

                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>ALIMENTACION: </strong>
                            <?php echo $h->hcAlimentacion; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>FOMENTO DE ACTIVIDAD FISICA: </strong>
                            <?php echo $h->hcFomentoActividadFisica; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>IMPORTANCIA DE ADHERENCIA A TRATAMIENTO: </strong>
                            <?php echo $h->hcOmportanciaAdherenciaTratamiento; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>DISMINUCION DE CONSUMO DE SAL/AZUCAR: </strong>
                            <?php echo $h->hcDisminucionConsumoSalAzucar; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>DISMINUCION DE CONSUMO CIGARRILLO: </strong>
                            <?php echo $h->hcDisminucionConsumoCigarrillo; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>DISMINUCION DE PESO: </strong>
                            <?php echo $h->hcDisminucionPeso; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>CONSUMO DE FRUTAS Y VERDURAS: </strong>
                            <?php echo $h->hcConsumoFrutasVerduras; ?>
                        </div>

                    </div>
                </div>
            </fieldset><br>

            <fieldset>
                <legend>ADHERENCIA FARMACOLOGICA VALORACION TEST DE MORISKY</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>OLVIDA ALGUNA VEZ TOMAR SUS MEDICAMENTOS: </strong>
                            <?php echo $h->hcOlvidaTomarMedicamentos; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>TOMA LOS MEDICAMENTOS A LA HORA INDICADA</strong>
                            <?php echo $h->hcTomaMedicamentosHoraIndicada; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CUANDO SE ENCUENTRA BIEN ¿DEJA DE TOMAR SUS MEDICAMENTOS?: </strong>
                            <?php echo $h->hcCuandoEstaBienDejaTomarMedicamentos; ?>
                        </div>


                        <div class="form-group col-md-6">
                            <strong>CUANDO SE ENCUENTRA MAL ¿DEJA DE TOMAR SUS MEDICAMENTOS?: </strong>
                            <?php echo $h->hcSienteMalDejaTomarlos; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>OTRAS OBSERVACIONES</strong><br>
                        <?php echo $h->hcObservacionesGenerales; ?>
                    </div>
                </div>
            </div><br>
            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>CAUSA EXTERNA: </strong>
                            <?php echo $h->hcCausaExterna; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>FINALIDAD: </strong>
                        <?php echo $h->finalidad_idFinalidad; ?>
                    </div>
                </div>
            </div><br>

            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                    </div>
                    <div class="form-group col-md-6"><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>

            <?php if (count($medicamento_historia) != 0) { ?>
                <div class="saltopagina">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>CONTROL APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>MEDICAMENTOS</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>MEDICAMENTO</th>
                                            <th>CANTIDAD</th>
                                            <th>DOSIS</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($medicamento_historia as $mh) {

                                                echo "<tr>";
                                                echo "<td>" . $mh->medNombre . "</td>";
                                                echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                echo "<td>" . $mh->hisMedDosis . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if (count($remision_historia) != 0) { ?>
                <div class="saltopagina">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>CONTROL APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>REMISION</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>CODIGO</th>
                                            <th>REMISION</th>
                                            <th>OBSERVACION</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($remision_historia as $r) {

                                                echo "<tr>";
                                                echo "<td>"
                                                    . $r->remCodigo . "</td>";
                                                echo "<td>" . $r->remNombre . "</td>";
                                                echo "<td>" . $r->remObservacion . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if (count($cups_historia) != 0) { ?>
                <div class="saltopagina">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>CONTROL APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>AYUDAS DIAGNOSTICAS</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO AYUDA DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>CODIGO</th>
                                            <th>CUPS</th>
                                            <th>OBSERVACIONES</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($cups_historia as $ch) {

                                                echo "<tr>";
                                                echo "<td>" . $ch->cupCodigo . "</td>";
                                                echo "<td>" . $ch->cupNombre . "</td>";
                                                echo "<td>" . $ch->cupObservacion . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>


<?php } elseif ($dato_historia[0]->proceso_idProceso == 2 && $dato_historia[0]->id_categoria_cups == 1) { ?>

    <div class="mx-auto" style="width: 1300px;">

        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>HISTORIA CLINICA TRABAJO SOCIAL PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small>
                                <br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>

            <?php foreach ($antecedentes_personales as $hap) { ?>
                <fieldset>
                    <legend>HISTORIA CLINICA</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MOTIVO DE CONSULTA</strong><br>
                                <?php
                                echo $hap->hcMotivoConsulta; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ESTRUCTURA FAMILIAR</strong><br>
                                <?php
                                echo $hap->hcEstructuraFamiliar; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>N° DE FAMILIAS QUE HABITAN EN LA VIVIENDA</strong><br>
                                <?php
                                echo $hap->hcCantidadHabitantes; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>N° DE PERSONAS QUE CONFORMAN NUCLEO FAMILIAR</strong><br>
                                <?php
                                echo $hap->hcCantidadConformanFamilia; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>COMPOSICION FAMILIAR</strong><br>
                                <?php
                                echo $hap->hcComposicionFamiliar; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>TIPO DE VIVIENDA</strong><br>
                                <?php
                                echo $hap->hcTipoVivienda; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>TENENCIA DE LA VIVIENDA</strong><br>
                                <?php
                                echo $hap->hcTenenciaVivienda; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>MATERIAL PREDOMINANTE DE LAS PAREDES</strong><br>
                                <?php
                                echo $hap->hcMaterialParedes; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MATERIAL PREDOMINANTE DE LOS PISOS</strong><br>
                                <?php
                                echo $hap->hcMaterialPisos; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>ESPACIOS DE LA SALA</strong>
                                <br>
                                <?php
                                echo $hap->hcEspaciosSala; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>COMEDOR</strong>
                                <br>
                                <?php
                                echo $hap->hcComedor; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>BAÑO</strong>
                                <br>
                                <?php
                                echo $hap->hcBanio; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>COCINA</strong>
                                <br>
                                <?php
                                echo $hap->hcCocina; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PATIO</strong>
                                <br>
                                <?php
                                echo $hap->hcPatio; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>N° DE DORMITORIOS</strong>
                                <br>
                                <?php
                                echo $hap->hcCantidadDormitorios; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>N° DE PERSONAS QUE OCUPAN CADA CUARTO PARA DORMIR</strong>
                                <br>
                                <?php
                                echo $hap->hcCantidadPersonasOcupanCuarto; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ENERGIA ELECTRICA</strong><br>
                                <?php
                                echo $hap->hcEnergiaElectrica; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ALCANTARILLADO</strong><br>
                                <?php
                                echo $hap->hcAlcantarillado; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>GAS NATURAL DOMICILIARIO</strong>
                                <br>
                                <?php
                                echo $hap->hcGasNatural; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CENTRO DE ATENCION EN SALUD</strong><br>
                                <?php
                                echo $hap->hcCentroAtencion; ?>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ACUEDUCTO</strong>
                                <br>
                                <?php
                                echo $hap->hcAcueducto; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CENTRO CULTURALES (BIBLIOTECAS, LUDOTECA)</strong><br>
                                <?php
                                echo $hap->hcCentroCulturales; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>VENTILACION</strong>
                                <br>
                                <?php
                                echo $hap->hcVentilacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ORGANIZACION</strong>
                                <br>
                                <?php
                                echo $hap->hcOrganizacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CENTRO DE EDUCACION (ESCUELAS, COLEGIOS)</strong>
                                <br>
                                <?php
                                echo $hap->hcCentroEducacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CENTRO DE RECREACION Y ESPARCIMIENTO (PARQUES)</strong>
                                <br>
                                <?php
                                echo $hap->hcCentroRecreacionEsparcimiento; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>DINAMICA FAMILIAR</strong>
                                <br>
                                <?php
                                echo $hap->hcDinamicaFamiliar; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>DIAGNOSTICO</strong>
                                <br>
                                <?php
                                echo $hap->hcDiagnostico; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ACCIONES A SEGUIR</strong>
                                <br>
                                <?php
                                echo $hap->hcAccionesSeguir; ?>
                            </div>

                        </div>
                    </div>
                </fieldset>

            <?php } ?> <br>
            <div class="saltopagina">
                <fieldset>
                    <legend>DIAGNOSTICO</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>#</th>
                                        <th>CODIGO</th>
                                        <th>DIAGNOSTICO</th>
                                        <th>CLASIFICACION</th>
                                        <th>TIPO</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 1;
                                        foreach ($diagnostico_historia as $dh) {

                                            echo "<tr>";
                                            echo "<td>" . $num++ . "</td>";
                                            echo "<td>" . $dh->diaCodigo . "</td>";
                                            echo "<td>" . $dh->diaNombre . "</td>";
                                            echo "<td>" . $dh->his_dia_tipo . "</td>";
                                            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-6">
                            <strong>PROFESIONAL QUE ATIENDE</strong><br>
                            <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>FIRMA PACIENTE</strong><br>
                            <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

    <?php if (count($medicamento_historia) != 0) { ?>
        <div class="saltopagina">
            <div class="mx-auto" style="width: 1300px;">
                <div style="border: ridge #0f0fef 1px; text-align:center">

                    <div class="form-row" style="margin: 10px;">
                        <div class="form-group col-md-4">

                            <tr>
                                <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                            </tr>

                        </div>
                        <div class="form-group col-md-4" style=" margin: auto;">

                            <tr height="">
                                <td height="">
                                    <div align="center">
                                        <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                    </div>
                                </td>
                            </tr>
                            <tr height="">
                                <td height="">
                                    <div align="center"><small>HISTORIA CLINICA REFORMULACION PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                        <small><?= $dato_historia[0]->citFecha ?></small>
                                    </div>
                                </td>
                            </tr>
                        </div>


                        <div class="form-group col-md-4">

                            <tr>
                                <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                            </tr>

                        </div>


                    </div>
                </div>
                <br><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:left;">
                        <div class="form-group col-md-2">
                            <strong>DOCUMENTO: </strong><br>
                            <?php
                            echo $h->pacDocumento;
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>NOMBRE: </strong><br>
                            <?php
                            echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                            <?php echo $h->pacFecNacimiento . " - ";
                            list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                            $anio_dif = date("Y") - $anio;
                            $mes_dif = date("m") - $mes;
                            $dia_dif = date("d") - $dia;

                            if ($dia_dif < 0 || $mes_dif < 0) {
                                $anio_dif--;
                                //return $anio_dif;
                            }

                            echo $anio_dif . "Años";
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>DIRECCION: </strong><br>
                            <?php
                            echo $h->pacDireccion; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>TELEFONO: </strong><br>
                            <?php
                            echo $h->pacTelefono; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA: </strong><br>
                            <?php echo date('d-m-Y');

                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <fieldset>
                    <legend>DIAGNOSTICO</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>#</th>
                                        <th>CODIGO</th>
                                        <th>DIAGNOSTICO</th>
                                        <th>CLASIFICACION</th>
                                        <th>TIPO</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 1;
                                        foreach ($diagnostico_historia as $dh) {

                                            echo "<tr>";
                                            echo "<td>" . $num++ . "</td>";
                                            echo "<td>" . $dh->diaCodigo . "</td>";
                                            echo "<td>" . $dh->diaNombre . "</td>";
                                            echo "<td>" . $dh->his_dia_tipo . "</td>";
                                            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <fieldset>
                    <legend>MEDICAMENTOS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                            </th>
                                        </tr>
                                        <th>MEDICAMENTO</th>
                                        <th>CANTIDAD</th>
                                        <th>DOSIS</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($medicamento_historia as $mh) {

                                            echo "<tr>";
                                            echo "<td>" . $mh->medNombre . "</td>";
                                            echo "<td>" . $mh->hisMedCantidad . "</td>";
                                            echo "<td>" . $mh->hisMedDosis . "</td>";

                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-6">
                            <strong>PROFESIONAL QUE ATIENDE</strong><br>
                            <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>FIRMA PACIENTE</strong><br>
                            <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    <?php }
} elseif ($dato_historia[0]->proceso_idProceso == 2 && $dato_historia[0]->id_categoria_cups == 2) {  ?>

    <div class="mx-auto" style="width: 1300px;">

        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>FORMATO DE SEGUIMIENTO TRABAJO
                                    SOCIAL</small>
                                <br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>

            <?php foreach ($antecedentes_personales as $hap) { ?>
                <fieldset>
                    <legend>HISTORIA CLINICA</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MOTIVO DE CONSULTA: </strong>
                                <br>
                                <?php
                                echo $hap->hcMotivoConsulta; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>OBJETIVO (S) DE LA VISITA: </strong>
                                <br>
                                <?php
                                echo $hap->hcObjetivoVisita; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SITUACION ENCONTRADA: </strong><br>
                                <?php
                                echo $hap->hcSituacionEncontrada; ?>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>COMPROMISO POR PARTE DEL USUARIO Y/O FAMILIAR: </strong><br>
                                <?php
                                echo $hap->hcCompromiso; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>RECOMENDACIONES</strong><br>
                                <?php
                                echo $hap->hcRecomendaciones; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>FECHA DEL SIGUIENTE SEGUIMIENTO</strong><br>
                                <?php
                                echo $hap->hcSiguienteSeguimiento; ?>

                            </div>
                        </div>

                    </div>
                </fieldset><br>

            <?php } ?> <br>

            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <strong>PROFESIONAL QUE ATIENDE</strong><br>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>FIRMA PACIENTE</strong><br>
                        <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

    <?php if (count($medicamento_historia) != 0) { ?>
        <div class="saltopagina">
            <div class="mx-auto" style="width: 1300px;">
                <div style="border: ridge #0f0fef 1px; text-align:center">

                    <div class="form-row" style="margin: 10px;">
                        <div class="form-group col-md-4">

                            <tr>
                                <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                            </tr>

                        </div>
                        <div class="form-group col-md-4" style=" margin: auto;">

                            <tr height="">
                                <td height="">
                                    <div align="center">
                                        <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                    </div>
                                </td>
                            </tr>
                            <tr height="">
                                <td height="">
                                    <div align="center"><small>FORMATO DE SEGUIMIENTO TRABAJO
                                            SOCIAL</small><br>
                                        <small><?= $dato_historia[0]->citFecha ?></small>
                                    </div>
                                </td>
                            </tr>
                        </div>


                        <div class="form-group col-md-4">

                            <tr>
                                <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                            </tr>

                        </div>


                    </div>
                </div>
                <br><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:left;">
                        <div class="form-group col-md-2">
                            <strong>DOCUMENTO: </strong><br>
                            <?php
                            echo $h->pacDocumento;
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>NOMBRE: </strong><br>
                            <?php
                            echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                            <?php echo $h->pacFecNacimiento . " - ";
                            list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                            $anio_dif = date("Y") - $anio;
                            $mes_dif = date("m") - $mes;
                            $dia_dif = date("d") - $dia;

                            if ($dia_dif < 0 || $mes_dif < 0) {
                                $anio_dif--;
                                //return $anio_dif;
                            }

                            echo $anio_dif . "Años";
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>DIRECCION: </strong><br>
                            <?php
                            echo $h->pacDireccion; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>TELEFONO: </strong><br>
                            <?php
                            echo $h->pacTelefono; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA: </strong><br>
                            <?php echo date('d-m-Y');

                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <fieldset>
                    <legend>DIAGNOSTICO</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>#</th>
                                        <th>CODIGO</th>
                                        <th>DIAGNOSTICO</th>
                                        <th>CLASIFICACION</th>
                                        <th>TIPO</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 1;
                                        foreach ($diagnostico_historia as $dh) {

                                            echo "<tr>";
                                            echo "<td>" . $num++ . "</td>";
                                            echo "<td>" . $dh->diaCodigo . "</td>";
                                            echo "<td>" . $dh->diaNombre . "</td>";
                                            echo "<td>" . $dh->his_dia_tipo . "</td>";
                                            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <fieldset>
                    <legend>MEDICAMENTOS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                            </th>
                                        </tr>
                                        <th>MEDICAMENTO</th>
                                        <th>CANTIDAD</th>
                                        <th>DOSIS</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($medicamento_historia as $mh) {

                                            echo "<tr>";
                                            echo "<td>" . $mh->medNombre . "</td>";
                                            echo "<td>" . $mh->hisMedCantidad . "</td>";
                                            echo "<td>" . $mh->hisMedDosis . "</td>";

                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-6">
                            <strong>PROFESIONAL QUE ATIENDE</strong><br>
                            <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>FIRMA PACIENTE</strong><br>
                            <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    <?php }
} elseif ($dato_historia[0]->proceso_idProceso == 3) { ?>

    <div class="mx-auto" style="width: 1300px;">

        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>HISTORIA CLINICA REFORMULACION PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>HISTORIA CLINICA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>RAZON REFORMULACION</strong><br>
                            <?php
                            echo $h->hcRazonReformulacion; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>MOTIVO REFORMULACION</strong><br>
                            <?php
                            echo $h->hcMotivoReformulacion; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>QUIEN RECLAMA</strong><br>
                            <?php
                            echo $h->hcReformulacionQuienReclama; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>NOMBRE RECLAMA</strong><br>
                            <?php
                            echo $h->hcReformulacionNombreReclama; ?>

                        </div>
                    </div>
                </div>
            </fieldset><br>
            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>


            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <strong>PROFESIONAL QUE ATIENDE</strong><br>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>FIRMA PACIENTE</strong><br>
                        <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>


            <?php if (count($medicamento_historia) != 0) { ?>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA REFORMULACION CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend>MEDICAMENTOS</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>MEDICAMENTO</th>
                                                <th>CANTIDAD</th>
                                                <th>DOSIS</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($medicamento_historia as $mh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $mh->medNombre . "</td>";
                                                    echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                    echo "<td>" . $mh->hisMedDosis . "</td>";

                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            <?php }
            if (count($remision_historia) != 0) { ?>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA REFORMULACION CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>

                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>

                        <fieldset>
                            <legend>REMISION</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>CODIGO</th>
                                                <th>REMISION</th>
                                                <th>OBSERVACION</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($remision_historia as $r) {

                                                    echo "<tr>";
                                                    echo "<td>"
                                                        . $r->remCodigo . "</td>";
                                                    echo "<td>" . $r->remNombre . "</td>";
                                                    echo "<td>" . $r->remObservacion . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if (count($cups_historia) != 0) { ?>
                <br>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA CLINICA REFORMULACION APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend>AYUDAS DIAGNOSTICAS</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO AYUDA DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>CODIGO</th>
                                                <th>CUPS</th>
                                                <th>OBSERVACION</th>

                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($cups_historia as $ch) {

                                                    echo "<tr>";
                                                    echo "<td>" . $ch->cupCodigo . "</td>";
                                                    echo "<td>" . $ch->cupNombre . "</td>";
                                                    echo "<td>" . $ch->cupObservacion . "</td>";

                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        <?php } ?>

    </div>

<?php } elseif ($dato_historia[0]->proceso_idProceso == 4 && $dato_historia[0]->id_categoria_cups == 1) { ?>


    <div class="mx-auto" style="width: 1300px;">

        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>HISTORIA CLÍNICA NUTRICIONISTA PRIMERA VEZ PROGRAMA DE GESTIÓN DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>
            <?php foreach ($antecedentes_personales as $a) { ?>


                <fieldset>
                    <legend>HISTORIA CLINICA</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MOTIVO DE CONSULTA</strong>
                                <br>
                                <?php
                                echo $a->hcMotivoConsulta; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ENFERMEDAD(ES) DIAGNOSTICADA(S)</strong>
                                <br>
                                <?php
                                echo $a->hcEnfermedadDiagnostica; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>HABITO INTESTINAL</strong>
                                <br>
                                <?php
                                echo $a->hcHabitoIntestinal; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>1. QUIRURGICOS</strong>
                                <br>
                                <?php
                                echo $a->hcQuirurgicos; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>QUIRURGICOS OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcQuirurgicosObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>2. ALERGICOS</strong>
                                <br>
                                <?php
                                echo $a->hcAlergicos; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ALERGICOS OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcAlergicosObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>3. FAMILIARES</strong>
                                <br>
                                <?php
                                echo $a->hcFamiliares; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>FAMILIARES OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcFamiliaresObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>4. PSA</strong>
                                <br>
                                <?php
                                echo $a->hcPsa; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>PSA OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcPsaObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>5. FARMACOLOGICOS</strong>
                                <br>
                                <?php
                                echo $a->hcFarmacologicos; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>FARMACOLOGICOS OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcFarmacologicosObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>6. SUEÑO</strong>
                                <br>
                                <?php
                                echo $a->hcSueno; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SUEÑO OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcSuenoObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>7. TABAQUISMO</strong>
                                <br>
                                <?= $dato_historia[0]->hcTabaquismo; ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>TABAQUISMO OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcTabaquismoObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>8. EJERCICIO</strong>
                                <br>
                                <?php
                                echo $a->hcEjercicio; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>EJERCICIO OBSERVACIONES</strong>
                                <br>
                                <?php
                                echo $a->hcEjercicioObservaciones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>METODO ANTICONCEPTIVO</strong>
                                <br>
                                <?php
                                echo $a->hcMetodoConceptivo; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>METODO ANTICONCEPTIVO ¿CUAL?</strong>
                                <br>
                                <?php
                                echo $a->hcMetodoConceptivoCual; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>EMBARAZO ACTUAL</strong>
                                <br>
                                <?php
                                echo $a->hcEmbarazoActual; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SEMANAS DE GESTACION</strong>
                                <br>
                                <?php
                                echo $a->hcSemanasGestacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CLIMATEIRO</strong>
                                <br>
                                <?php
                                echo $a->hcClimatero; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>TOLERANCIA VIA ORAL</strong>
                                <br>
                                <?php
                                echo $a->hcToleranciaViaOral; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PERCEPCION DEL APETITO</strong>
                                <br>
                                <?php
                                echo $a->hcPercepcionApetito; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>PERCEPCION APETITO OBSERVACION</strong>
                                <br>
                                <?php
                                echo $a->hcPercepcionApetitoObservacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ALIMENTOS PREFERIDOS</strong>
                                <br>
                                <?php
                                echo $a->hcAlimentosPreferidos; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ALIMENTOS RECHAZADOS</strong>
                                <br>
                                <?php
                                echo $a->hcAlimentosRechazados; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>SUPLEMENTOS O COMPLOMENTOS NUTRICIONALES Y/O VITAMINICOS</strong>
                                <br>
                                <?php
                                echo $a->hcSuplementoNutricionales; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>¿HA LLEVADO ALGUNA DIETA ESPECIAL?</strong>
                                <br>
                                <?php
                                echo $a->hcDietaEspecial; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>DIETA ESPECIAL CUAL</strong>
                                <br>
                                <?php
                                echo $a->hcDietaEspecialCual; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>DESAYUNO HORA</strong>
                                <br>
                                <?php
                                echo $a->hcDesayunoHora; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>DESAYUNO HORA OBS</strong>
                                <br>
                                <?php
                                echo $a->hcDesayunoHoraObservacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MEDIA MAÑANA HORA</strong>
                                <br>
                                <?php
                                echo $a->hcMediaMañanaHora; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>MEDIA MAÑANA OBS</strong>
                                <br>
                                <?php
                                echo $a->hcMediaMañanaHoraObservacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ALMUERZO HORA</strong>
                                <br>
                                <?php
                                echo $a->hcAlmuerzoHora; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>ALMUERZO OBS</strong>
                                <br>
                                <?php
                                echo $a->hcAlmuerzoHoraObservacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>MEDIA TARDE HORA</strong>
                                <br>
                                <?php
                                echo $a->hcMediaTardeHora; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>MEDIA TARDE OBS</strong>
                                <br>
                                <?php
                                echo $a->hcMediaTardeHoraObservacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CENA HORA</strong>
                                <br>
                                <?php
                                echo $a->hcCenaHora; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>CENA OBS</strong>
                                <br>
                                <?php
                                echo $a->hcCenaHoraObservacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>REFRIGERIO NOCTURNO HORA</strong>
                                <br>
                                <?php
                                echo $a->hcRefrigerioNocturnoHora; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>REFRIGERIO NOCTURNO OBS</strong>
                                <br>
                                <?php
                                echo $a->hcRefrigerioNocturnoHoraObservacion; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>PESO KG</strong>
                                <br>
                                <?=
                                $dato_historia[0]->hcPeso; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>TALLA CM</strong>
                                <br>
                                <?=
                                $dato_historia[0]->hcTalla; ?>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <strong>IMC</strong>
                                <br>
                                <?=
                                $dato_historia[0]->hcIMC; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PERIMETRO ABDOMINAL</strong>
                                <br>
                                <?=
                                $dato_historia[0]->hcPerimetroAbdominal; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CLASIFICACION ESTADO NUTRICIONAL</strong>
                                <br>
                                <?=
                                $dato_historia[0]->hcClasificacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PESO IDEAL</strong>
                                <br>
                                <?php
                                echo $a->hcPesoIdeal; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>INTERPRETACION</strong>
                                <br>
                                <?php
                                echo $a->hcInterpretacion; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>META A MESES</strong>
                                <br>
                                <?php
                                echo $a->hcMetaMeses; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANALISIS NUTRICIONAL</strong>
                                <br>
                                <?php
                                echo $a->hcAnalisisNutricional; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>PLAN A SEGUIR</strong>
                                <br>
                                <?php
                                echo $a->hcPlanSeguir; ?>
                            </div>
                        </div>
                    </div>
                </fieldset> <br>
            <?php } ?> <div></div>
            <!--fieldset>
            <legend>HISTORIA CLINICA</legend>
            <div style="margin: 10px;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>RAZON REFORMULACION</strong><br>
                        <?php
                        echo $h->hcRazonReformulacion; ?>

                    </div>
                    <div class="form-group col-md-6">
                        <strong>MOTIVO REFORMULACION</strong><br>
                        <?php
                        echo $h->hcMotivoReformulacion; ?>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>QUIEN RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionQuienReclama; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>NOMBRE RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionNombreReclama; ?>

                    </div>
                </div>
            </div>
        </fieldset--><br>
            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>


            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                    </div>
                    <div class="form-group col-md-6"><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>



            <?php if (count($medicamento_historia) != 0) { ?>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA NUTRICIONISTA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend>MEDICAMENTOS</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>MEDICAMENTO</th>
                                                <th>CANTIDAD</th>
                                                <th>DOSIS</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($medicamento_historia as $mh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $mh->medNombre . "</td>";
                                                    echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                    echo "<td>" . $mh->hisMedDosis . "</td>";

                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            <?php }
            if (count($remision_historia) != 0) { ?>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA NUTRICIONISTA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>

                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>

                        <fieldset>
                            <legend>REMISION</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>CODIGO</th>
                                                <th>REMISION</th>
                                                <th>OBSERVACION</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($remision_historia as $r) {

                                                    echo "<tr>";
                                                    echo "<td>"
                                                        . $r->remCodigo . "</td>";
                                                    echo "<td>" . $r->remNombre . "</td>";
                                                    echo "<td>" . $r->remObservacion . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if (count($cups_historia) != 0) { ?>
                <br>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA CLINICA NUTRICIONISTA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend>AYUDAS DIAGNOSTICAS</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO AYUDA DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>CODIGO</th>
                                                <th>CUPS</th>
                                                <th>OBSERVACION</th>

                                            </thead>
                                            <tbody>

                                                <?php
                                                foreach ($cups_historia as $ch) {

                                                    echo "<tr>";
                                                    echo "<td>" . $ch->cupCodigo . "</td>";
                                                    echo "<td>" . $ch->cupNombre . "</td>";
                                                    echo "<td>" . $ch->cupObservacion . "</td>";

                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        <?php } ?>

    </div>
    
    <?php } elseif ($dato_historia[0]->proceso_idProceso == 13 && $dato_historia[0]->id_categoria_cups == 1) { ?>
        <div class="mx-auto" style="width: 1300px;">
        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>HISTORIA  CLINICA FISIOTERAPIA PRIMERA VEZ APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
          
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>MOTIVO CONSULTA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                      
                        <?php echo $antecedentes_personales[0]->hcMotivoConsulta; ?>                
                        
                    </div>
                     
                </div>
            </fieldset><br>
            <fieldset>
            <legend>DATOS FISICOS</legend>
            <div class="form-row"style="margin: 10px;">
                   
                
                    <div class="form-group col-md-6">
                        <strong>PESO KG</strong>
                        <?php echo $h->hcPeso; ?>
                    
                    </div>
                    <div class="form-group col-md-6">
                        <strong>TALLA CM</strong>
                        <?php echo $h->hcTalla; ?>
                    
                    </div>
                </div>
                <div style="margin: 10px;">
                    <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>IMC</strong>
                        <?php echo $h->hcIMC; ?>
                    
                    
                    </div>
                    <div class="form-group col-md-6">
                        <strong>PERIMETRO ABDOMINAL</strong>
                       
                        <?php echo $h->hcPerimetroAbdominal; ?>
                    
                    </div>
                </div>
                </fieldset><br>    

    <fieldset>
    <?php foreach ($antecedentes_personales as $a) { ?>
        <legend>EVALUACIÓNES</legend>
        <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                <strong>ACTITUD POSTURAL</strong>
                <br>
                <?php echo $a->hcActitud; ?>
                    </div>

                    <div class="form-group col-md-6">
                <strong>EVALUACIÓN DE SENSIBILIDAD</strong>
                <br>
                <?php echo $a->hcEvaluaciond; ?>
                </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                <strong>EVALUACIÓN DE PIEL</strong>
                <br>
                <?php echo $a->hcEvaluacionp; ?>
                        </div>


                        <div class="form-group col-md-6">
                <strong>ESTADO</strong>
                <br>
                <?php echo $a->hcEstado; ?>
                </div>
                        </div>
                        <div class="form-row">
                <div class="form-group col-md-6">
                <strong>EVALUACIÓN DEL DOLOR</strong>
                <br>
                <?php echo $a->hcEvaluacion_dolor; ?>
                 </div>
           
            <div class="form-group col-md-6">
                <strong>EVALUACIÓN OSTEOARTICULAR</strong>
                <br>
                <?php echo $a->hcEvaluacionos; ?>
                </div>
                        </div>
                        <div class="form-row">
                <div class="form-group col-md-6">
                <strong>EVALUACIÓN NEUROMUSCULAR</strong>
                <br>
                <?php echo $a->hcEvaluacionneu; ?> 
                 </div>
    
                     
                 <div class="form-group col-md-6">
                <strong>PADECE DE UNA ENFERMEDAD CONCOMITANTE</strong>
                <br>
                <?php echo $a->hcComitante; ?>
            </div>
        </div>
            <?php } ?> <div></div>
</fieldset><br>

<fieldset>

<legend>PLAN DE TRATAMIENTO</legend>
       <div style="margin: 10px;">
         <div class="form-row">
         <div class="form-group col-md-6">
         <?php echo $a->hcPlanSeguir; ?>
       </div>
    </div>
</div><br>
</fieldset><br>

    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-12">
                <strong>FINALIDAD</strong>
                <input class="form-control input-sm" name="finalidad" type="text" required="" value="NO APLICA" readonly="">
            </div>
        </div>
    </div><br>
    </fieldset>
    </fieldset> 
    <fieldset>
                <legend>DIAGNÓSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CÓDIGO</th>
                                    <th>DIAGNÓSTICO</th>
                                    <th>CLASIFICACIÓN</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>CAUSA EXTERNA: </strong>
                            <?php echo $h->hcCausaExterna; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>FINALIDAD: </strong>
                        <?php echo $h->finalidad_idFinalidad; ?>
                    </div>
                </div>
            </div><br>


            <?php if (count($medicamento_historia) != 0) { ?>
                <fieldset>
                    <legend>MEDICAMENTOS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FÓRMULA MÉDICA</center>
                                            </th>
                                        </tr>
                                        <th>MEDICAMENTO</th>
                                        <th>CANTIDAD</th>
                                        <th>DOSIS</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($medicamento_historia as $mh) {

                                            echo "<tr>";
                                            echo "<td>" . $mh->medNombre . "</td>";
                                            echo "<td>" . $mh->hisMedCantidad . "</td>";
                                            echo "<td>" . $mh->hisMedDosis . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
            <?php }
            if (count($remision_historia) != 0) { ?>
                <fieldset>
                    <legend>REMISIÓN</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FÓRMULA DE REMISIÓN</center>
                                            </th>
                                        </tr>
                                        <th>CÓDIGO</th>
                                        <th>REMISIÓN</th>
                                        <th>OBSERVACIÓN</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($remision_historia as $r) {

                                            echo "<tr>";
                                            echo "<td>"
                                                . $r->remCodigo . "</td>";
                                            echo "<td>" . $r->remNombre . "</td>";
                                            echo "<td>" . $r->remObservacion . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
            <?php }
            if (count($cups_historia) != 0) { ?>
                <fieldset>
                    <legend>AYUDAS DIAGNÓSTICAS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO AYUDA DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>CÓDIGO</th>
                                        <th>CUPS</th>
                                        <th>OBSERVACIONES</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($cups_historia as $ch) {

                                            echo "<tr>";
                                            echo "<td>" . $ch->cupCodigo . "</td>";
                                            echo "<td>" . $ch->cupNombre . "</td>";
                                            echo "<td>" . $ch->cupObservacion . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
            <?php } ?>


   
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                    </div>
                    <div class="form-group col-md-6"><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>

    <?php
            }
            ?>


    </div>



    <?php } elseif ($dato_historia[0]->proceso_idProceso == 13 && $dato_historia[0]->id_categoria_cups == 2) { ?>
        <div class="mx-auto" style="width: 1300px;">
        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>HISTORIA CLINICA FISIOTERAPIA CONTROL PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
          
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>MOTIVO CONSULTA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                      
                        <?php echo $antecedentes_personales[0]->hcMotivoConsulta; ?>               
                        
                    </div>
                     
                </div>
            </fieldset><br>
            <fieldset>
            <legend>DATOS FISICOS</legend>
            <div class="form-row"style="margin: 10px;">
                   
                
                    <div class="form-group col-md-6">
                        <strong>PESO KG</strong>
                        <?php echo $h->hcPeso; ?>
                    
                    </div>
                    <div class="form-group col-md-6">
                        <strong>TALLA CM</strong>
                        <?php echo $h->hcTalla; ?>
                    
                    </div>
                </div>
                <div style="margin: 10px;">
                    <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>IMC</strong>
                        <?php echo $h->hcIMC; ?>
                    
                    
                    </div>
                    <div class="form-group col-md-6">
                        <strong>PERIMETRO ABDOMINAL</strong>
                        <?php
                                    echo $h->hcPerimetroAbdominal; ?>
                    
                    </div>
                </div>
                </fieldset><br>    

           
   
           
            <fieldset>
            <?php foreach ($antecedentes_personales as $a) { ?>
           <legend>PLAN DE TRATAMIENTO</legend>
                        <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <?php echo $a->hcPlanSeguir; ?>
                    </div>
                </div>
            </div><br>

    </fieldset><br>
    <fieldset>        
         <legend>OBSERVACIONES</legend>
         <div style="margin: 10px;">
     <div class="form-row">
         <div class="form-group col-md-6">
         <?php echo $h->hcObservacionesGenerales; ?>
     </div>
     
 </div>
 
 <?php } ?>
 
</div><br>

</fieldset><br>
            

    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-12">
                <strong>FINALIDAD</strong>
                <input class="form-control input-sm" name="finalidad" type="text" required="" value="NO APLICA" readonly="">
            </div>
        </div>
    </div><br>
  
    <?php } ?> <br>

<fieldset>
    <legend>DIAGNÓSTICO</legend>
    <div style="margin: 10px;">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="7">
                                <center>FORMATO DIAGNOSTICA</center>
                            </th>
                        </tr>
                        <th>#</th>
                        <th>CÓDIGO</th>
                        <th>DIAGNÓSTICO</th>
                        <th>CLASIFICACIÓN</th>
                        <th>TIPO</th>
                    </thead>
                    <tbody>

                        <?php
                        $num = 1;
                        foreach ($diagnostico_historia as $dh) {

                            echo "<tr>";
                            echo "<td>" . $num++ . "</td>";
                            echo "<td>" . $dh->diaCodigo . "</td>";
                            echo "<td>" . $dh->diaNombre . "</td>";
                            echo "<td>" . $dh->his_dia_tipo . "</td>";
                            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                            echo "</tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</fieldset><br>


<?php if (count($medicamento_historia) != 0) { ?>

    <fieldset>
        <legend>MEDICAMENTOS</legend>
        <div style="margin: 10px;">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="7">
                                    <center>FÓRMULA MÉDICA <?php echo date("Y-m-d", time()); ?></center>
                                </th>
                            </tr>
                            <th>MEDICAMENTO</th>
                            <th>CANTIDAD</th>
                            <th>DOSIS</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($medicamento_historia as $mh) {

                                echo "<tr>";
                                echo "<td>" . $mh->medNombre . "</td>";
                                echo "<td>" . $mh->hisMedCantidad . "</td>";
                                echo "<td>" . $mh->hisMedDosis . "</td>";

                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset><br>

<?php }
if (count($remision_historia) != 0) { ?>

    <fieldset>
        <legend>REMISIÓN</legend>
        <div style="margin: 10px;">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="7">
                                    <center>FÓRMULA DE REMISIÓN <?php echo date("Y-m-d", time()); ?></center>
                                </th>
                            </tr>
                            <th>CÓDIGO</th>
                            <th>REMISIÓN</th>
                            <th>OBSERVACIÓN</th>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($remision_historia as $r) {

                                echo "<tr>";
                                echo "<td>"
                                    . $r->remCodigo . "</td>";
                                echo "<td>" . $r->remNombre . "</td>";
                                echo "<td>" . $r->remObservacion . "</td>";
                                echo "</tr>";
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset><br>

  


<?php } ?> <br>
<!--fieldset>
<legend>HISTORIA CLINICA</legend>
<div style="margin: 10px;">
<div class="form-row">
<div class="form-group col-md-6">
    <strong>RAZON REFORMULACION</strong><br>
    <?php
    echo $h->hcRazonReformulacion; ?>

</div>
<div class="form-group col-md-6">
    <strong>MOTIVO REFORMULACION</strong><br>
    <?php
    echo $h->hcMotivoReformulacion; ?>

</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <strong>QUIEN RECLAMA</strong><br>
    <?php
    echo $h->hcReformulacionQuienReclama; ?>
</div>
<div class="form-group col-md-6">
    <strong>NOMBRE RECLAMA</strong><br>
    <?php
    echo $h->hcReformulacionNombreReclama; ?>

</div>
</div>
</div>
</fieldset--><br>



<div class="form-group col-md-13">
<fieldset>
<legend>DIAGNOSTICO</legend>
<div style="margin: 10px;">
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="7">
                        <center>FORMATO DIAGNOSTICA</center>
                    </th>
                </tr>
                <th>#</th>
                <th>CODIGO</th>
                <th>DIAGNOSTICO</th>
                <th>CLASIFICACION</th>
                <th>TIPO</th>
            </thead>
            <tbody>

                <?php
                $num = 1;
                foreach ($diagnostico_historia as $dh) {

                    echo "<tr>";
                    echo "<td>" . $num++ . "</td>";
                    echo "<td>" . $dh->diaCodigo . "</td>";
                    echo "<td>" . $dh->diaNombre . "</td>";
                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                    echo "</tr>";
                }
                ?>


            </tbody>
        </table>
    </div>
</div>
</div>
</fieldset><br>


<div style="border: ridge #0f0fef 1px;">
<div class="form-row" style="margin: 10px; text-align:center;">
<div class="form-group col-md-6">
    <?php

    echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

    <strong>FIRMA DIGITAL</strong><br>
    <strong>PROFESIONAL: </strong>
    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
</div>
<div class="form-group col-md-6"><br><br><br><br><br>
    <strong>FIRMA PACIENTE: </strong>
    <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
</div>
</div>
</div>

    

    





    <?php } elseif ($dato_historia[0]->proceso_idProceso == 4 && $dato_historia[0]->id_categoria_cups == 2) { ?>

<div class="mx-auto" style="width: 1300px;">

    <div style="border: ridge #0f0fef 1px; text-align:center">

        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-4">

                <tr>
                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/login123.png"); ?>" width="100px" /></td>
                </tr>

            </div>
            <div class="form-group col-md-4" style=" margin: auto;">

                <tr height="">
                    <td height="">
                        <div align="center">
                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                        </div>
                    </td>
                </tr>
                <tr height="">
                    <td height="">
                        <div align="center"><small>HISTORIA CLÍNICA NUTRICIONISTA CONTROL PROGRAMA DE GESTIÓN DEL RIESGO CARDIORENAL</small><br>
                            <small><?= $dato_historia[0]->citFecha ?></small>
                        </div>
                    </td>
                </tr>
            </div>


            <div class="form-group col-md-4">

                <tr>
                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/login123.png"); ?>" width="100px" /></td>
                </tr>

            </div>


        </div>
    </div>
</div>
<br><br>

<div class="mx-auto" style="width: 1300px;">
    <?php foreach ($dato_historia as $h) { ?>

        <fieldset>
            <legend>DATOS PACIENTE</legend>
            <div class="form-row" style="text-align:center">
                <div class="form-group col-md-2">
                    <strong>NOMBRE</strong><br>
                    <?php
                    echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                    <?php echo $h->pacFecNacimiento . "<br>";
                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                    $anio_dif = date("Y") - $anio;
                    $mes_dif = date("m") - $mes;
                    $dia_dif = date("d") - $dia;

                    if ($dia_dif < 0 || $mes_dif < 0) {
                        $anio_dif--;
                        //return $anio_dif;
                    }

                    echo $anio_dif . "Años";
                    ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>SEXO</strong><br>
                    <?php if ($h->pacSexo == "M") {
                        echo "MASCULINO";
                    } else {
                        echo "FEMENINO";
                    } ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>ESTADO CIVIL</strong><br>
                    <?php echo $h->pacEstCivil; ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>TELÉFONO</strong><br>
                    <?php echo $h->pacTelefono; ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>DIRECCIÓN</strong><br>
                    <?php
                    echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                </div>
            </div>
            <div class="form-row" style="text-align:center">
                <div class="form-group col-md-3">
                    <strong>ASEGURADORA</strong><br>
                    <?php
                    echo $h->empNombre; ?>
                </div>

                <div class="form-group col-md-3">
                    <strong>RÉGIMEN</strong><br>
                    <?php echo $h->regNombre; ?>
                </div>
                <div class="form-group col-md-3">
                    <strong>OCUPACIÓN</strong><br>
                    <?php echo $h->ocuNombre; ?>
                </div>
                <div class="form-group col-md-3">
                    <strong>BRIGADA</strong><br>
                    <?php echo $h->zonNombre; ?>
                </div>
            </div>

        </fieldset><br>
        <fieldset>
            <legend>ACUDIENTE</legend>
            <div class="form-row" style="margin: 10px; text-align:center">
                <div class="form-group col-md-4">
                    <strong>NOMBRE ACOMPAÑANTE</strong><br>
                    <?php
                    echo $h->hcAcompanante; ?>
                </div>
                <div class="form-group col-md-4">
                    <strong>PARENTESCO</strong><br>
                    <?php
                    echo $h->hcAcuParentesco; ?>
                </div>
                <div class="form-group col-md-4">
                    <strong>TELÉFONO</strong><br>
                    <?php
                    echo $h->hcAcuTelefono; ?>
                </div>
            </div>

        </fieldset><br>
        <?php foreach ($antecedentes_personales as $a) { ?>


            <fieldset>
                <legend>HISTORIA CLÍNICA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>ENFERMEDAD(ES) DIAGNOSTICADA(S)</strong>
                            <br>
                            <?php
                            echo $a->hcEnfermedadDiagnostica; ?>
                           </div>
                </div>
            </div>
            </fieldset><br>
        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-3">
                            <strong>PESO KG</strong>
                            <br>
                            <?=
                            $dato_historia[0]->hcPeso; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>TALLA CM</strong>
                            <br>
                            <?=
                            $dato_historia[0]->hcTalla; ?>
                        </div>
                   

                        <div class="form-group col-md-3">
                            <strong>IMC</strong>
                            <br>
                            <?=
                            $dato_historia[0]->hcIMC; ?>
                        </div>
                   
                   
                        <div class="form-group col-md-3">
                            <strong>CLASIFICACIÓN </strong>
                            <br>
                            <?=
                            $dato_historia[0]->hcClasificacion; ?>
                             </div>
                    </div>
                </div><br>
                <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-6">
                    <strong>TIEMPO DE COMIDA DESAYUNO</strong>
                   
                    <br>
                    <?php
                    echo $a->hcComida_desayuno; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>TIEMPO DE COMIDA 1/2 DESAYUNO</strong>
                    <br>
                    <?php
                    echo $a->hcComidamedio_desayuno; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>TIEMPO DE COMIDA ALMUERZO</strong>
                    <br>
                    <?php
                    echo $a->hcComida_almuerzo; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>TIEMPO DE COMIDA 1/2 TARDE</strong>
                    <br>
                    <?php
                    echo $a->hcComidamedio_almuerzo; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>TIEMPO DE COMIDA CENA</strong>
                    <br>
                    <?php
                    echo $a->hcComida_cena; ?>
                </div>
            </div>
        </div><br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-6">
                    <strong>LÁCTEO</strong>
                    <br>
                    <?php
                    echo $a->hcLacteo; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>LÁCTEO, OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcLacteo_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>HUEVO</strong>
                    <br>
                    <?php
                    echo $a->hcHuevo; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>HUEVO OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcHuevo_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>EMBUTIDO</strong>
                    <br>
                    <?php
                    echo $a->hcEmbutido; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>OBSERVACIÓN EMBUTIDO</strong>
                    <br>
                    <?php
                    echo $a->hcEmbutido_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>CARNE ROJA</strong>
                    <br>
                    <?php
                    echo $a->hcCarneroja; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>CARNE BLANCA</strong>
                    <br>
                    <?php
                    echo $a->hcCarneblanca; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>CARNE VICERA</strong>
                    <br>
                    <?php
                    echo $a->hcCarnevicera; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>CARNE OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcCarneobservacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>LEGUMINOSAS SECAS</strong>
                    <br>
                    <?php
                    echo $a->hcLeguminosas; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>LEGUMINOSAS SECAS OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcLeguminosasobservacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>FRUTAS EN JUGO</strong>
                    <br>
                    <?php
                    echo $a->hcFrutas_jugo; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>FRUTAS EN PORCIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcFrutas_porcion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>FRUTAS OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcFrutas_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>VERDURAS Y HORTALIZAS</strong>
                    <br>
                    <?php
                    echo $a->hcVerduras_hortalizas; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>VERDURAS Y HORTALIZAS OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcVh_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>CEREALES</strong>
                    <br>
                    <?php
                    echo $a->hcCereales; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>CEREALES, OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcCereales_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>RTP</strong>
                    <br>
                    <?php
                    echo $a->hcRTP; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>RTP OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcRTP_observacion; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>AZÚCARES Y DULCES</strong>
                   <br>
                    <?php
                    echo $a->hcAzucar_dulce; ?>
                </div>
                <div class="form-group col-md-6">
                    <strong>AZÚCARES Y DULCES OBSERVACIÓN</strong>
                     <br>
                    <?php
                    echo $a->hcAd_observacion; ?>
                </div>
            </div>
        </div><br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-12">
                    <strong>DIAGNÓSTICO NUTRICIONAL</strong>
                    <br>
                    <?php
                    echo $a->hcDiagnostico_nutri; ?>
                </div>
                <div class="form-group col-md-12">
                    <strong>PLAN A SEGUIR</strong>
                    <br>
                    <?php
                    echo $a->hcPlanSeguir;?>
                </div>
            </div>
        </div><br>
      
                           
        <?php } ?> <br>

        <fieldset>
            <legend>DIAGNÓSTICO</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO DIAGNOSTICA</center>
                                    </th>
                                </tr>
                                <th>#</th>
                                <th>CÓDIGO</th>
                                <th>DIAGNÓSTICO</th>
                                <th>CLASIFICACIÓN</th>
                                <th>TIPO</th>
                            </thead>
                            <tbody>

                                <?php
                                $num = 1;
                                foreach ($diagnostico_historia as $dh) {

                                    echo "<tr>";
                                    echo "<td>" . $num++ . "</td>";
                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                    echo "<td>" . $dh->diaNombre . "</td>";
                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                    echo "</tr>";
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    </div>
             
            </div>
        </fieldset><br>


        <?php if (count($medicamento_historia) != 0) { ?>

            <fieldset>
                <legend>MEDICAMENTOS</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FÓRMULA MÉDICA <?php echo date("Y-m-d", time()); ?></center>
                                        </th>
                                    </tr>
                                    <th>MEDICAMENTO</th>
                                    <th>CANTIDAD</th>
                                    <th>DOSIS</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($medicamento_historia as $mh) {

                                        echo "<tr>";
                                        echo "<td>" . $mh->medNombre . "</td>";
                                        echo "<td>" . $mh->hisMedCantidad . "</td>";
                                        echo "<td>" . $mh->hisMedDosis . "</td>";

                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>

        <?php }
        if (count($remision_historia) != 0) { ?>

            <fieldset>
                <legend>REMISIÓN</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FÓRMULA DE REMISIÓN <?php echo date("Y-m-d", time()); ?></center>
                                        </th>
                                    </tr>
                                    <th>CÓDIGO</th>
                                    <th>REMISIÓN</th>
                                    <th>OBSERVACIÓN</th>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($remision_historia as $r) {

                                        echo "<tr>";
                                        echo "<td>"
                                            . $r->remCodigo . "</td>";
                                        echo "<td>" . $r->remNombre . "</td>";
                                        echo "<td>" . $r->remObservacion . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>

        <?php }  ?>

        <?php } ?> <br>
            <!--fieldset>
            <legend>HISTORIA CLINICA</legend>
            <div style="margin: 10px;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>RAZON REFORMULACION</strong><br>
                        <?php
                        echo $h->hcRazonReformulacion; ?>

                    </div>
                    <div class="form-group col-md-6">
                        <strong>MOTIVO REFORMULACION</strong><br>
                        <?php
                        echo $h->hcMotivoReformulacion; ?>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>QUIEN RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionQuienReclama; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>NOMBRE RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionNombreReclama; ?>

                    </div>
                </div>
            </div>
        </fieldset--><br>
        
     
           
                <div class="form-group col-md-13">
            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>


            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                    </div>
                    <div class="form-group col-md-6"><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>











 <?php } elseif ($dato_historia[0]->proceso_idProceso == 12 && $dato_historia[0]->id_categoria_cups == 1) { ?>
    <div class="mx-auto" style="width: 1300px;">
        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>PSICOLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
          
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong>
                        <?php
                    echo $h->hcAcompanante; ?>           
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong>
                        <?php
                    echo $h->hcAcuParentesco; ?>           
                    <div class="form-group col-md-4">
                        <strong>TELÉFONO</strong>
                        <?php
                    echo $h->hcAcuTelefono; ?>            
                </div>

            </fieldset><br>
            <fieldset>
                <legend>MOTIVO CONSULTA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                      
                        <?php
                        echo $a->hcMotivoConsulta; ?>                     
                        
                    </div>
                     
                </div>
            </fieldset><br>
            <fieldset>
            <legend>DATOS FISICOS</legend>
            <div class="form-row"style="margin: 10px;">
                   
                
                    <div class="form-group col-md-6">
                        <strong>PESO KG</strong>
                        <?php echo $h->hcPeso; ?>
                    
                    </div>
                    <div class="form-group col-md-6">
                        <strong>TALLA CM</strong>
                        <?php echo $h->hcTalla; ?>
                    
                    </div>
                </div>
                <div style="margin: 10px;">
                    <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>IMC</strong>
                        <?php echo $h->hcIMC; ?>
                    
                    
                    </div>
                    <div class="form-group col-md-6">
                        <strong>PERIMETRO ABDOMINAL</strong>
                        <?php echo $h->hcObsPerimetroAbdominal; ?>
                    
                    </div>
                </div>
                </fieldset><br>    

    <fieldset>
        <legend>EVALUACIÓNES</legend>
        <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                <strong>ACTITUD POSTURAL</strong>
                <?php echo $h->hcActitud; ?>
                
                    </div>
                    <?php if ($hap->hcSistemaNerviosoNefroInter == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN ACTITUD POSTURAL </strong>


                            <?php echo $hap->descripcion_sistema_nervioso;  ?>

                        </div>
                    <?php } ?>
                </div>
                    
                    <div class="form-group col-md-6">
                <strong>EVALUACIÓN DE SENSIBILIDAD</strong>
                <?php echo $h->hcEvaluaciond; ?>
            </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                <strong>EVALUACIÓN DE PIEL</strong>
                <?php echo $h->hcEvaluacionp; ?>
                        </div>
                        <div class="form-group col-md-6">
                <strong>ESTADO</strong>
                <?php echo $h->hcEstado; ?>>
                        <div style="margin: 10px;">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                <strong>EVALUACIÓN DEL DOLOR</strong>
                <?php echo $h->hcEvaluacion_dolor; ?>
                 </div>
           
            <div class="form-group col-md-6">
                <strong>EVALUACIÓN OSTEOARTICULAR</strong>
                <?php echo $h->hcEvaluacionos; ?>
                 </div>
            <div class="form-group col-md-6">
                <strong>EVALUACIÓN NEUROMUSCULAR</strong>
                <?php echo $h->hcEvaluacionneu; ?> 
                 </div>
           
            <div class="form-group col-md-6">
                   <strong>EVALUACIÓN OSTEOARTICULAR</strong>
                   <?php echo $h->hcEvaluacionos; ?>      
            </div>
                     
            <div class="form-row" style="margin: 10px;">
                        <div class="form-group col-md-12">
                <strong>PADECE DE UNA ENFERMEDAD CONCOMITANTE</strong>
                <?php echo $h->hcComitante; ?>
            </div>
        
</fieldset><br>
<fieldset>

<legend>PLAN DE TRATAMIENTO</legend>
       <div style="margin: 10px;">
         <div class="form-row">
         <div class="form-group col-md-6">
       <textarea class="form-control" name="plan_seguir" placeholder="plan a seguir" required="" rows="2" id="plan_seguir"></textarea>
       </div>
    </div>
</div><br>


    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-12">
                <strong>FINALIDAD</strong>
                <input class="form-control input-sm" name="finalidad" type="text" required="" value="NO APLICA" readonly="">
            </div>
        </div>
    </div><br>

    <fieldset>
                <legend>DIAGNÓSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CÓDIGO</th>
                                    <th>DIAGNÓSTICO</th>
                                    <th>CLASIFICACIÓN</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>CAUSA EXTERNA: </strong>
                            <?php echo $h->hcCausaExterna; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>FINALIDAD: </strong>
                        <?php echo $h->finalidad_idFinalidad; ?>
                    </div>
                </div>
            </div><br>


            <?php if (count($medicamento_historia) != 0) { ?>
                <fieldset>
                    <legend>MEDICAMENTOS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FÓRMULA MÉDICA</center>
                                            </th>
                                        </tr>
                                        <th>MEDICAMENTO</th>
                                        <th>CANTIDAD</th>
                                        <th>DOSIS</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($medicamento_historia as $mh) {

                                            echo "<tr>";
                                            echo "<td>" . $mh->medNombre . "</td>";
                                            echo "<td>" . $mh->hisMedCantidad . "</td>";
                                            echo "<td>" . $mh->hisMedDosis . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
            <?php }
            if (count($remision_historia) != 0) { ?>
                <fieldset>
                    <legend>REMISIÓN</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FÓRMULA DE REMISIÓN</center>
                                            </th>
                                        </tr>
                                        <th>CÓDIGO</th>
                                        <th>REMISIÓN</th>
                                        <th>OBSERVACIÓN</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($remision_historia as $r) {

                                            echo "<tr>";
                                            echo "<td>"
                                                . $r->remCodigo . "</td>";
                                            echo "<td>" . $r->remNombre . "</td>";
                                            echo "<td>" . $r->remObservacion . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
            <?php }
            if (count($cups_historia) != 0) { ?>
                <fieldset>
                    <legend>AYUDAS DIAGNÓSTICAS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO AYUDA DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>CÓDIGO</th>
                                        <th>CUPS</th>
                                        <th>OBSERVACIONES</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($cups_historia as $ch) {

                                            echo "<tr>";
                                            echo "<td>" . $ch->cupCodigo . "</td>";
                                            echo "<td>" . $ch->cupNombre . "</td>";
                                            echo "<td>" . $ch->cupObservacion . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
            <?php } ?>


    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px; text-align:center;">
            <div class="form-group col-md-6">
                <?php

                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($detalles_cita[0]->usuFirma) . '"/>'; ?><br>
                <strong>FIRMA DIGITAL</strong><br>
                <strong>PROFESIONAL: </strong>
                <em><?= $detalles_cita[0]->usuNombre . " " . $detalles_cita[0]->usuApellido; ?><br>RM: <?= $detalles_cita[0]->usuRegistroProfesional; ?></em>
            </div>
            <div class="form-group col-md-6"><br><br><br><br><br>
                <strong>FIRMA PACIENTE: </strong>
                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
            </div>
        </div>
    </div><br>
    <?php
            }
            ?>


    </div>

    













    <?php } elseif ($dato_historia[0]->proceso_idProceso == 5 && $dato_historia[0]->id_categoria_cups == 1) { ?>

    <div class="mx-auto" style="width: 1300px;">
        <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>PSICOLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                <small><?= $dato_historia[0]->citFecha ?></small>
                            </div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>

            <?php foreach ($antecedentes_personales as $hap) { ?>

                <fieldset>
                    <legend>HISTORIA CLINICA</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>1. MOTIVO CONSULTA</strong><br>
                                <?php
                                echo $hap->hcMotivoConsulta; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>2. ESTRUCTURA FAMILIAR (FAMILIARES O PERSONAS CON LAS QUE CONVIVE EL PACIENTE)</strong><br>
                                <?php
                                echo $hap->hcEstructuraFamiliar; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>3. RED DE APOYO FAMILIAR QUE CONSIDERA EL PACIENTE (FAMILIAR O FAMILIARES A LOS QUE EL PACIENTE CONSIDERE COMO SU RED DE APOYO)</strong><br>
                                <?php
                                echo $hap->hcPsicologiaRedApoyo; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>4. COMPORTAMIENTO EN CONSULTA</strong><br>
                                <?php
                                echo $hap->hcPsicologiaComportamientoConsulta; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>5. TRATAMIENTO ACTUAL Y ADHERENCIA (DESCRIPCION DEL PACIENTE SOBRE EL TRATAMIENTO Y LA ADHERENCIA AL MISMO)</strong><br>
                                <?php
                                echo $hap->hcPsicologiaTratamientoActualAdherencia; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>6. DESCRIPCION DEL PROBLEMA (DESCRIPCION DEL PACIENTE DE LA SITUACION QUE LO AFECTA)</strong><br>
                                <?php
                                echo $hap->hcPsicologiaDescripcionProblema; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>7. ANALISIS Y CONCLUSIONES</strong><br>
                                <?php
                                echo $hap->hcAnalisisConclusiones; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>8. PLAN DE INTERVENCION Y RECOMENDACIONES</strong><br>
                                <?php
                                echo $hap->hcPsicologiaPlanIntervencionRecomendacion; ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
            <?php } ?> <br>
            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>CAUSA EXTERNA: </strong>
                            <?php echo $h->hcCausaExterna; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>


            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>FINALIDAD: </strong>
                        <?php
                        echo $h->finalidad_idFinalidad; ?>
                    </div>
                </div>
            </div><br>

            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <strong>PROFESIONAL QUE ATIENDE</strong><br>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>FIRMA PACIENTE</strong><br>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>
            <?php if (count($medicamento_historia) != 0) { ?>
                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:left;">
                                <div class="form-group col-md-2">
                                    <strong>DOCUMENTO: </strong><br>
                                    <?php
                                    echo $h->pacDocumento;
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>NOMBRE: </strong><br>
                                    <?php
                                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                    <?php echo $h->pacFecNacimiento . " - ";
                                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                    $anio_dif = date("Y") - $anio;
                                    $mes_dif = date("m") - $mes;
                                    $dia_dif = date("d") - $dia;

                                    if ($dia_dif < 0 || $mes_dif < 0) {
                                        $anio_dif--;
                                        //return $anio_dif;
                                    }

                                    echo $anio_dif . "Años";
                                    ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>DIRECCION: </strong><br>
                                    <?php
                                    echo $h->pacDireccion; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>TELEFONO: </strong><br>
                                    <?php
                                    echo $h->pacTelefono; ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>FECHA: </strong><br>
                                    <?php echo date('d-m-Y');

                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <fieldset>
                            <legend>DIAGNOSTICO</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMATO DIAGNOSTICA</center>
                                                    </th>
                                                </tr>
                                                <th>#</th>
                                                <th>CODIGO</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>CLASIFICACION</th>
                                                <th>TIPO</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $num = 1;
                                                foreach ($diagnostico_historia as $dh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $num++ . "</td>";
                                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                                    echo "<td>" . $dh->diaNombre . "</td>";
                                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend>MEDICAMENTOS</legend>
                            <div style="margin: 10px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">
                                                        <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                    </th>
                                                </tr>
                                                <th>MEDICAMENTO</th>
                                                <th>CANTIDAD</th>
                                                <th>DOSIS</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($medicamento_historia as $mh) {

                                                    echo "<tr>";
                                                    echo "<td>" . $mh->medNombre . "</td>";
                                                    echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                    echo "<td>" . $mh->hisMedDosis . "</td>";

                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset><br>
                        <div style="border: ridge #0f0fef 1px;">
                            <div class="form-row" style="margin: 10px; text-align:center;">
                                <div class="form-group col-md-6">
                                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FIRMA PACIENTE</strong><br>
                                    <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            <?php }
            if (count($remision_historia) != 0) { ?>

                <div class="saltopagina">
                    <div class="mx-auto" style="width: 1300px;">
                        <div style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 10px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div align="center"><small>PSICOLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                <small><?= $dato_historia[0]->citFecha ?></small>
                                            </div>
                                        </td>
                                    </tr>
                                </div>


                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                    </tr>

                                </div>


                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>REMISION</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>CODIGO</th>
                                            <th>REMISION</th>
                                            <th>OBSERVACIONES</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($remision_historia as $r) {

                                                echo "<tr>";
                                                echo "<td>"
                                                    . $r->remCodigo . "</td>";
                                                echo "<td>" . $r->remNombre . "</td>";
                                                echo "<td>" . $r->remObservacion . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>FIRMA PACIENTE</strong><br>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>


    </div>

<?php }
    } elseif ($dato_historia[0]->proceso_idProceso == 5 && $dato_historia[0]->id_categoria_cups == 2) { ?>
<div class="mx-auto" style="width: 1300px;">
    <div style="border: ridge #0f0fef 1px; text-align:center">

        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-4">

                <tr>
                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                </tr>

            </div>
            <div class="form-group col-md-4" style=" margin: auto;">

                <tr height="">
                    <td height="">
                        <div align="center">
                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                        </div>
                    </td>
                </tr>
                <tr height="">
                    <td height="">
                        <div align="center"><small>PSICOLOGIA CONTROL APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                            <small><?= $dato_historia[0]->citFecha ?></small>
                        </div>
                    </td>
                </tr>
            </div>


            <div class="form-group col-md-4">

                <tr>
                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                </tr>

            </div>


        </div>
    </div>
</div>
<br><br>

<div class="mx-auto" style="width: 1300px;">
    <?php foreach ($dato_historia as $h) { ?>

        <fieldset>
            <legend>DATOS PACIENTE</legend>
            <div class="form-row" style="text-align:center">
                <div class="form-group col-md-2">
                    <strong>NOMBRE</strong><br>
                    <?php
                    echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                    echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                    <?php echo $h->pacFecNacimiento . "<br>";
                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                    $anio_dif = date("Y") - $anio;
                    $mes_dif = date("m") - $mes;
                    $dia_dif = date("d") - $dia;

                    if ($dia_dif < 0 || $mes_dif < 0) {
                        $anio_dif--;
                        //return $anio_dif;
                    }

                    echo $anio_dif . "Años";
                    ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>SEXO</strong><br>
                    <?php if ($h->pacSexo == "M") {
                        echo "MASCULINO";
                    } else {
                        echo "FEMENINO";
                    } ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>ESATDO CIVIL</strong><br>
                    <?php echo $h->pacEstCivil; ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>TELEFONO</strong><br>
                    <?php echo $h->pacTelefono; ?>
                </div>
                <div class="form-group col-md-2">
                    <strong>DIRECCION</strong><br>
                    <?php
                    echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                </div>
            </div>
            <div class="form-row" style="text-align:center">
                <div class="form-group col-md-3">
                    <strong>ASEGURADORA</strong><br>
                    <?php
                    echo $h->empNombre; ?>
                </div>

                <div class="form-group col-md-3">
                    <strong>REGIMEN</strong><br>
                    <?php echo $h->regNombre; ?>
                </div>
                <div class="form-group col-md-3">
                    <strong>OCUPACION</strong><br>
                    <?php echo $h->ocuNombre; ?>
                </div>
                <div class="form-group col-md-3">
                    <strong>BRIGADA</strong><br>
                    <?php echo $h->zonNombre; ?>
                </div>
            </div>

        </fieldset><br>
        <fieldset>
            <legend>ACUDIENTE</legend>
            <div class="form-row" style="margin: 10px; text-align:center">
                <div class="form-group col-md-4">
                    <strong>NOMBRE ACOMPAÑANTE</strong><br>
                    <?php
                    echo $h->hcAcompanante; ?>
                </div>
                <div class="form-group col-md-4">
                    <strong>PARENTESCO</strong><br>
                    <?php
                    echo $h->hcAcuParentesco; ?>
                </div>
                <div class="form-group col-md-4">
                    <strong>TELEFONO</strong><br>
                    <?php
                    echo $h->hcAcuTelefono; ?>
                </div>
            </div>

        </fieldset><br>

        <?php foreach ($antecedentes_personales as $hap) { ?>

            <fieldset>
                <legend>HISTORIA CLINICA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>1. MOTIVO CONSULTA</strong><br>
                            <?php
                            echo $hap->hcMotivoConsulta; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>2. DESCRIPCION DEL PROBLEMA (DESCRIPCION DEL PACIENTE DE LA SITUACION QUE LO AFECTA)</strong>
                            <?php
                            echo $hap->hcPsicologiaDescripcionProblema; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>3. AVANCES DEL PACIENTE (CAMBIOS EN LA SITUACION INICIAL POR LA CUAL SE ATENDIO EN PSICOLOGIA)</strong>
                            <?php
                            echo $hap->hcAvancePaciente; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>4. PLAN DE INTERVENCION Y RECOMENDACIONES</strong><br><br>
                            <?php
                            echo $hap->hcPsicologiaPlanIntervencionRecomendacion; ?>
                        </div>
                    </div>
                </div>
            </fieldset>
        <?php } ?> <br>
        <fieldset>
            <legend>DIAGNOSTICO</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO DIAGNOSTICA</center>
                                    </th>
                                </tr>
                                <th>#</th>
                                <th>CODIGO</th>
                                <th>DIAGNOSTICO</th>
                                <th>CLASIFICACION</th>
                                <th>TIPO</th>
                            </thead>
                            <tbody>

                                <?php
                                $num = 1;
                                foreach ($diagnostico_historia as $dh) {

                                    echo "<tr>";
                                    echo "<td>" . $num++ . "</td>";
                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                    echo "<td>" . $dh->diaNombre . "</td>";
                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                    echo "</tr>";
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>CAUSA EXTERNA: </strong>
                        <?php echo $h->hcCausaExterna; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>


        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-12">
                    <strong>FINALIDAD: </strong>
                    <?php
                    echo $h->finalidad_idFinalidad; ?>
                </div>
            </div>
        </div><br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px; text-align:center;">
                <div class="form-group col-md-6">
                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                </div>
                <div class="form-group col-md-6">
                    <strong>FIRMA PACIENTE</strong><br>
                    <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                </div>
            </div>
        </div>
        <?php if (count($medicamento_historia) != 0) { ?>
            <div class="saltopagina">
                <div class="mx-auto" style="width: 1300px;">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>MEDICAMENTOS</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>MEDICAMENTO</th>
                                            <th>CANTIDAD</th>
                                            <th>DOSIS</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($medicamento_historia as $mh) {

                                                echo "<tr>";
                                                echo "<td>" . $mh->medNombre . "</td>";
                                                echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                echo "<td>" . $mh->hisMedDosis . "</td>";

                                                echo "</tr>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <strong>PROFESIONAL QUE ATIENDE</strong><br>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                            </div>
                            <div class="form-group col-md-6">
                                <strong>FIRMA PACIENTE</strong><br>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
        <?php }
            if (count($remision_historia) != 0) { ?>

            <div class="saltopagina">
                <div class="mx-auto" style="width: 1300px;">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>PSICOLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                </div>
                <br><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:left;">
                        <div class="form-group col-md-2">
                            <strong>DOCUMENTO: </strong><br>
                            <?php
                            echo $h->pacDocumento;
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>NOMBRE: </strong><br>
                            <?php
                            echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                            <?php echo $h->pacFecNacimiento . " - ";
                            list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                            $anio_dif = date("Y") - $anio;
                            $mes_dif = date("m") - $mes;
                            $dia_dif = date("d") - $dia;

                            if ($dia_dif < 0 || $mes_dif < 0) {
                                $anio_dif--;
                                //return $anio_dif;
                            }

                            echo $anio_dif . "Años";
                            ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>DIRECCION: </strong><br>
                            <?php
                            echo $h->pacDireccion; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>TELEFONO: </strong><br>
                            <?php
                            echo $h->pacTelefono; ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>FECHA: </strong><br>
                            <?php echo date('d-m-Y');

                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <fieldset>
                    <legend>DIAGNOSTICO</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>#</th>
                                        <th>CODIGO</th>
                                        <th>DIAGNOSTICO</th>
                                        <th>CLASIFICACION</th>
                                        <th>TIPO</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 1;
                                        foreach ($diagnostico_historia as $dh) {

                                            echo "<tr>";
                                            echo "<td>" . $num++ . "</td>";
                                            echo "<td>" . $dh->diaCodigo . "</td>";
                                            echo "<td>" . $dh->diaNombre . "</td>";
                                            echo "<td>" . $dh->his_dia_tipo . "</td>";
                                            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <fieldset>
                    <legend>REMISION</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                            </th>
                                        </tr>
                                        <th>CODIGO</th>
                                        <th>REMISION</th>
                                        <th>OBSERVACIONES</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($remision_historia as $r) {

                                            echo "<tr>";
                                            echo "<td>"
                                                . $r->remCodigo . "</td>";
                                            echo "<td>" . $r->remNombre . "</td>";
                                            echo "<td>" . $r->remObservacion . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset><br>
                <div style="border: ridge #0f0fef 1px;">
                    <div class="form-row" style="margin: 10px; text-align:center;">
                        <div class="form-group col-md-6">
                            <strong>PROFESIONAL QUE ATIENDE</strong><br>
                            <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>FIRMA PACIENTE</strong><br>
                            <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            }
        ?>


</div>

<?php }
    } elseif ($dato_historia[0]->proceso_idProceso == 6) { ?>

<div class="mx-auto" style="width: 1300px;">
    <div style="border: ridge #0f0fef 1px; text-align:center">

        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-4">

                <tr>
                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                </tr>

            </div>
            <div class="form-group col-md-4" style=" margin: auto;">

                <tr height="">
                    <td height="">
                        <div align="center">
                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                        </div>
                    </td>
                </tr>
                <tr height="">
                    <td height="">
                        <div align="center"><small>NEFROLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                            <small><?= $dato_historia[0]->citFecha ?></small>
                        </div>
                    </td>
                </tr>
            </div>


            <div class="form-group col-md-4">

                <tr>
                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                </tr>

            </div>


        </div>
    </div>
    <br><br>

    <div class="mx-auto" style="width: 1300px;">
        <?php foreach ($dato_historia as $h) { ?>

            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($h->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACION</strong><br>
                        <?php echo $h->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $h->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong><br>
                        <?php
                        echo $h->hcAcompanante; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong><br>
                        <?php
                        echo $h->hcAcuParentesco; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>

            <fieldset>
                <legend>HISTORIA CLINICA</legend>

                <div style="margin: 10px; text-align:center">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>MOTIVO CONSULTA</strong><br>
                            <?php
                            echo $antecedentes_personales[0]->hcMotivoConsulta; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>ENFERMEDAD ACTUAL</strong><br>
                            <?php
                            echo $h->hcEnfermedadActual; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>

            <?php foreach ($antecedentes_personales as $hap) { ?>

                <fieldset>
                    <legend>ANTECEDENTES PERSONALES</legend>
                    <div style="margin: 10px;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SISTEMA NERVIOSO: DOLORES DE CABEZA, CONVULSIONES, MAREOS, PARALISIS, TRANSTORNOS MENTALES: </strong>
                                <?php
                                echo $hap->hcSistemaNerviosoNefroInter; ?>

                            </div>

                            <?php if ($hap->hcSistemaNerviosoNefroInter == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION SISTEMA NERVIOSO: DOLORES DE CABEZA, CONVULSIONES, MAREOS, PARALISIS, TRANSTORNOS MENTALES </strong>


                                    <?php echo $hap->descripcion_sistema_nervioso;  ?>

                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SISTEMA HEMOLINFATICO: ANEMIA, DESORDENES SANGUINEOS O PROBLEMAS DE COAGULACION: </strong>
                                <?php
                                echo $hap->hcSistemaHemolinfatico; ?>
                            </div>

                            <?php if ($hap->hcSistemaHemolinfatico == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION SISTEMA HEMOLINFATICO: ANEMIA, DESORDENES SANGUINEOS O PROBLEMAS DE COAGULACION </strong>

                                    <?php echo $hap->descripcion_sistema_hemolinfatico;  ?>

                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>APARATO DIGESTIVO: ULCERAS, GASTRITIS, CIRROSIS, DIVERTICULOS, COLITIS, HEMORROIDES </strong>

                                <?php
                                echo $hap->hcAparatoDigestivo; ?>

                            </div>
                            <?php if ($hap->hcAparatoDigestivo == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION APARATO DIGESTIVO: ULCERAS, GASTRITIS, CIRROSIS, DIVERTICULOS, COLITIS, HEMORROIDES</strong>
                                    <?php
                                    echo $hap->descripcion_aparato_digestivo; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ORGANOS DE LOS SENTIDOS: CATARATAS, PTERIGIOS, VISION CORTA, OTITIS, DESVIACION DEL TABIQUE, SINUSITIS, AMIGDALITIS </strong>

                                <?php
                                echo $hap->hcOrganoSentido; ?>

                            </div>

                            <?php if ($hap->hcOrganoSentido == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION ORGANOS DE LOS SENTIDOS: CATARATAS, PTERIGIOS, VISION CORTA, OTITIS, DESVIACION DEL TABIQUE, SINUSITIS, AMIGDALITIS</strong>

                                    <?php
                                    echo $hap->descripcion_organos_sentidos; ?>

                                </div>
                            <?php  } ?>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ENDOCRINO-METABOLICOS: DIABETES, ENFERMEDADES DE LA TIROIDES, ALTERACION DE LAS GRASAS, O ACIDOS URICO SANGUINEOS </strong>

                                <?php
                                echo $hap->hcEndocrinoMetabolico; ?>
                            </div>
                            <?php if ($hap->hcEndocrinoMetabolico == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION ENDOCRINO-METABOLICOS: DIABETES, ENFERMEDADES DE LA TIROIDES, ALTERACION DE LAS GRASAS, O ACIDOS URICO SANGUINEOS</strong>
                                    <?php
                                    echo $hap->descripcion_endocrino_metabolico; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>INMUNOLOGICOS: LUPUS, ARTRITIS REUMATOIDES</strong>

                                <?php
                                echo $hap->hcInmunologico; ?>
                            </div>
                            <?php if ($hap->hcInmunologico == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION INMUNOLOGICOS: LUPUS, ARTRITIS REUMATOIDES</strong>
                                    <?php
                                    echo $hap->descripcion_inmunologico; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CANCER, TUMORES, RADIOTERAPIA O QUIMIOTERAPIA</strong>
                                <?php
                                echo $hap->hcCancerTumoresRadioterapiaQuimio; ?>

                            </div>
                            <?php if ($hap->hcCancerTumoresRadioterapiaQuimio == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION CANCER, TUMORES, RADIOTERAPIA O QUIMIOTERAPIA</strong>
                                    <?php
                                    echo $hap->descripcion_cancer_tumores_radio_quimioterapia; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>GLANDULAS MAMARIAS: DOLORES, MASAS, SECRECIONES</strong>
                                <?php
                                echo $hap->hcGlandulaMamaria; ?>

                            </div>
                            <?php if ($hap->hcGlandulaMamaria == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION GLANDULAS MAMARIAS: DOLORES, MASAS, SECRECIONES</strong>
                                    <?php
                                    echo $hap->descripcion_glandulas_mamarias; ?>
                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>HIPERTENSION, DIABETES, ERC</strong>
                                <?php
                                echo $hap->hcHipertensionDiabetesErc; ?>
                            </div>
                            <?php if ($hap->hcHipertensionDiabetesErc == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION HIPERTENSION, DIABETES, ERC</strong>
                                    <?php
                                    echo $hap->descripcion_hipertension_diabetes_erc; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>REACIONES ALERGICAS: </strong>
                                <?php
                                echo $hap->hcReacionesAlergica; ?>

                            </div>
                            <?php if ($hap->hcReacionesAlergica == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION REACIONES ALERGICAS</strong>
                                    <?php
                                    echo $hap->descripcion_reacion_alergica; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CARDIO VASCULARES: HIPERTENSION, INFARTOS, ANGINAS, SOPLOS, ARITMIAS, ENFERMEDADES CORONARIAS </strong>

                                <?php
                                echo $hap->hcCardioVasculares; ?>

                            </div>
                            <?php if ($hap->hcCardioVasculares == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION CARDIO VASCULARES: HIPERTENSION, INFARTOS, ANGINAS, SOPLOS, ARITMIAS, ENFERMEDADES CORONARIAS</strong>
                                    <?php
                                    echo $hap->descripcion_cardio_vasculares; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>RESPIRATORIOS: ASMA, ENFISEMA, EFECCION LARINGEA O EN BRONQUIOS </strong>
                                <?php
                                echo $hap->hcRespiratorios; ?>

                            </div>
                            <?php if ($hap->hcRespiratorios == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION RESPIRATORIOS: ASMA, ENFISEMA, EFECCION LARINGEA O EN BRONQUIOS</strong>
                                    <?php
                                    echo $hap->descripcion_respiratorios; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CRINARIAS: INSUFICIENCIA RENAL, CALCULOS, ORINA CON SANGRE, INFECCIONES FRECUENTES, PROSTATAS ENFERMAS</strong>

                                <?php
                                echo $hap->hcCrinarias; ?>

                            </div>
                            <?php if ($hap->hcCrinarias == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION CRINARIAS: INSUFICIENCIA RENAL, CALCULOS, ORINA CON SANGRE, INFECCIONES FRECUENTES, PROSTATAS ENFERMAS</strong>
                                    <?php
                                    echo $hap->descripcion_crinarias; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>OSTEOARTICULARES: ENFERMEDADES DE LA COLUMNA, DOLOR DE RODILLA, DEFORMIDADES </strong>
                                <?php
                                echo $hap->hcOsteoarticulares; ?>

                            </div>
                            <?php if ($hap->hcOsteoarticulares == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION OSTEOARTICULARES: ENFERMEDADES DE LA COLUMNA, DOLOR DE RODILLA, DEFORMIDADES</strong>
                                    <?php
                                    echo $hap->descripcion_osteoarticulares; ?>
                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>INFECCIOSOS: HEPATITIS, TUBERCULOSIS, SIDA O VIH(+), ENFERMEDADES DE TRANSMISION SEXUAL </strong>

                                <?php
                                echo $hap->hcInfecciosos; ?>

                            </div>
                            <?php if ($hap->hcInfecciosos == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION INFECCIOSOS: HEPATITIS, TUBERCULOSIS, SIDA O VIH(+), ENFERMEDADES DE TRANSMISION SEXUAL</strong>
                                    <?php
                                    echo $hap->descripcion_infecciosos; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CIRUGIAS TRAUMAS(ACCIDENTES) </strong>
                                <?php
                                echo $hap->hcCirugiaTrauma; ?>

                            </div>
                            <?php if ($hap->hcCirugiaTrauma == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION CIRUGIAS TRAUMAS(ACCIDENTES)</strong>
                                    <?php
                                    echo $hap->descripcion_cirugias_traumas; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>TRATAMINETOS CON MEDICACION</strong>
                                <?php
                                echo $hap->hcTratamientoMedicacion; ?>

                            </div>

                            <?php if ($hap->hcTratamientoMedicacion == 'SI') { ?>

                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION TRATAMINETOS CON MEDICACION</strong>
                                    <?php
                                    echo $hap->descripcion_tratamiento_medicacion; ?>
                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANTECEDENTES QUIRURGICOS: </strong>

                                <?php
                                echo $hap->hcAntecedenteQuirurgico; ?>
                            </div>
                            <?php if ($hap->hcAntecedenteQuirurgico == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION ANTECEDENTES QUIRURGICOS</strong>
                                    <?php
                                    echo $hap->descripcion_antecedentes_quirurgicos; ?>
                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANTECEDENTES FAMILIARES: </strong>
                                <?php
                                echo $hap->hcAntecedentesFamiliares; ?>

                            </div>
                            <?php if ($hap->hcAntecedentesFamiliares == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION ANTECEDENTES FAMILIARES</strong>
                                    <?php
                                    echo $hap->descripcion_antecedentes_familiares; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CONSUMO DE TABACO</strong>
                                <?php
                                echo $hap->hcConsumoTabaco; ?>
                            </div>
                            <?php if ($hap->hcConsumoTabaco == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION CONSUMO DE TABACO</strong>
                                    <?php
                                    echo $hap->descripcion_consumo_tabaco; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>ANTECEDENTES DE ALCOHOL</strong>

                                <?php
                                echo $hap->hcAntecedentesAlcohol; ?>

                            </div>
                            <?php if ($hap->hcAntecedentesAlcohol == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION ANTECEDENTES DE ALCOHOL</strong>
                                    <?php
                                    echo $hap->descripcion_antecedentes_alcohol; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>SEDENTARISMO: </strong>

                                <?php
                                echo $hap->hcSedentarismo; ?>

                            </div>
                            <?php if ($hap->hcSedentarismo == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION SEDENTARISMO</strong>
                                    <?php
                                    echo $hap->descripcion_sedentarismo; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>GINECOLOGICOS, TUMORES O MASA EN OVARIOS, UTERO, MENSTRUACION ANORMAL: </strong>

                                <?php
                                echo $hap->hcGinecologico; ?>
                            </div>
                            <?php if ($hap->hcGinecologico == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION GINECOLOGICOS, TUMORES O MASA EN OVARIOS, UTERO, MENSTRUACION ANORMAL</strong>
                                    <?php
                                    echo $hap->descripcion_ginecologicos; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>CITOLOGIA VAGINAL PATOLOGICAS O ANORMALES</strong>

                                <?php
                                echo $hap->hcCitologiaVaginal; ?>

                            </div>
                            <?php if ($hap->hcCitologiaVaginal == 'SI') { ?>
                                <div class="form-group col-md-6">
                                    <strong>DESCRIPCION CITOLOGIA VAGINAL PATOLOGICAS O ANORMALES</strong>
                                    <?php
                                    echo $hap->descripcion_citologia_vaginal; ?>

                                </div>
                            <?php  } ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <strong>MENARQUIA: </strong>
                                <?php
                                echo $hap->hcMenarquia; ?>

                            </div>
                            <div class="form-group col-md-3">
                                <strong>GESTACIONES: </strong>

                                <?php
                                echo $hap->hcGestaciones; ?>

                            </div>
                            <div class="form-group col-md-2">
                                <strong>PARTOS: </strong>
                                <?php
                                echo $hap->hcParto; ?>

                            </div>
                            <div class="form-group col-md-3">
                                <strong>ABORTOS: </strong>
                                <?php
                                echo $hap->hcAborto; ?>

                            </div>
                            <div class="form-group col-md-2">
                                <strong>CESARIAS: </strong>
                                <?php
                                echo $hap->hcCesaria; ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>METODOS ANTICONCEPTIVOS</strong>
                                <?php
                                echo $hap->hcMetodoConceptivo; ?>

                            </div>
                            <div class="form-group col-md-6">
                                <strong>METODO ANTICONCEPTIVO ¿CUAL?</strong>
                                <?php
                                echo $hap->hcMetodoConceptivoCual; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>OBSERVACIONES ANTECEDENTES PERSONALES</strong>

                                <?php
                                echo $hap->hcAntecedentePersonal; ?>

                            </div>
                        </div>


                    </div>
                </fieldset>
            <?php } ?><br>
            <fieldset>
                <legend>REVISION POR SISTEMA</legend>

                <div style="margin: 10px;">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CABEZA: </strong>
                            <?php
                            echo $h->hcEfCabeza; ?>


                        </div>
                        <div class="form-group col-md-6">
                            <strong>OBSERVACIONES CABEZA: </strong>
                            <?php
                            echo $h->hcObsCabeza; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CUELLO: </strong>
                            <?php
                            echo $h->hcCuello; ?>


                        </div>
                        <div class="form-group col-md-6">
                            <strong>OBSERVACIONES CUELLO: </strong>
                            <?php
                            echo $h->hcObsCuello; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>TORAX: </strong>
                            <?php
                            echo $h->hcTorax; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>OBSERVACIONES TORAX: </strong>

                            <?php
                            echo $h->hcObsTorax; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>ABDOMEN: </strong>

                            <?php
                            echo $h->hcAbdomen; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>OBSERVACIONES ABDOMEN: </strong>
                            <?php
                            echo $h->hcObsAbdomen; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>EXTREMIDADES: </strong>

                            <?php
                            echo $h->hcExtremidades; ?>


                        </div>
                        <div class="form-group col-md-6">
                            <strong>OBSERVACIONES EXTREMIDADES: </strong>
                            <?php
                            echo $h->hcObsExtremidades; ?>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>NEUROLOGICO Y ESTADO MENTAL: </strong>

                            <?php
                            echo $antecedentes_personales[0]->hcNeurologicoEstadoMental; ?>


                        </div>
                        <div class="form-group col-md-6">
                            <strong>OBSERVACIONES NEUROLOGICO Y ESTADO MENTAL: </strong>

                            <?php
                            echo $antecedentes_personales[0]->hcObsNeurologicoEstadoMental; ?>

                        </div>
                    </div>
                </div>
            </fieldset><br>
            <fieldset>
                <legend>EXAMEN FISICO</legend>

                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>PESO KG: </strong>

                            <?php
                            echo $h->hcPeso; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>TALLA CM: </strong>

                            <?php
                            echo $h->hcTalla; ?>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>IMC: </strong>
                            <?php
                            echo $h->hcIMC; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>PERIMETRO ABDOMINAL: </strong>

                            <?php
                            echo $h->hcPerimetroAbdominal; ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>PRESION ARTERIAL SISTOLICA: </strong>
                            <?php
                            echo $h->hcPresionArterialSistolicaSentadoPie; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>PRESION ARTERIAL DISTOLICA: </strong>
                            <?php
                            echo $h->hcPresionArterialDistolicaSentadoPie; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>FRECUENCIA CARDIACA: </strong>
                            <?php
                            echo $h->hcFrecuenciaCardiaca; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>FRECUENCIA RESPIRATORIA: </strong>
                            <?php
                            echo $h->hcFrecuenciaRespiratoria; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>

            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>ANALISIS PLAN</strong><br>
                        <?php
                        echo $h->hcObservacionesGenerales; ?>
                    </div>
                </div>
            </div><br>
            <fieldset>
                <legend>CLASIFICACION</legend>

                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION HTA: </strong>
                            <?php
                            echo $h->hcClasificacionHta; ?>

                        </div>
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION DM: </strong>
                            <?php
                            echo $h->hcClasificacionDm; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CLASIFIACION ERC ESTADO: </strong>
                            <?php
                            echo $h->hcClasificacionErcEstado; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>CLASIFIACION ERC CATEGORIA DE ALBUMINURIA PERSISTENTE: </strong>
                            <?php
                            echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong>CLASIFICACION RCV: </strong>
                            <?php
                            echo $h->hcClasificacionRcv; ?>
                        </div>
                    </div>
            </fieldset><br>
            <fieldset>
                <legend>DIAGNOSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FORMATO DIAGNOSTICA</center>
                                        </th>
                                    </tr>
                                    <th>#</th>
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>

                                    <?php
                                    $num = 1;
                                    foreach ($diagnostico_historia as $dh) {

                                        echo "<tr>";
                                        echo "<td>" . $num++ . "</td>";
                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                        echo "<td>" . $dh->diaNombre . "</td>";
                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group col-md-6">
                            <strong>CAUSA EXTERNA: </strong>
                            <?php echo $h->hcCausaExterna; ?>
                        </div>
                    </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div class="form-group col-md-6">
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                    </div>
                    <div class="form-group col-md-6"><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>

            <?php if (count($medicamento_historia) != 0) { ?>

                <div class="saltopagina">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>NEFROLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>MEDICAMENTOS</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>MEDICAMENTO</th>
                                            <th>CANTIDAD</th>
                                            <th>DOSIS</th>

                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($medicamento_historia as $mh) {

                                                echo "<tr>";
                                                echo "<td>" . $mh->medNombre . "</td>";
                                                echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                echo "<td>" . $mh->hisMedDosis . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if (count($remision_historia) != 0) { ?>
                <div class="saltopagina">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>NEFROLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>REMISION</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>CODIGO</th>
                                            <th>REMISION</th>
                                            <th>OBSERVACION</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($remision_historia as $r) {

                                                echo "<tr>";
                                                echo "<td>"
                                                    . $r->remCodigo . "</td>";
                                                echo "<td>" . $r->remNombre . "</td>";

                                                echo "<td>" . $r->remObservacion . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if (count($cups_historia) != 0) { ?>
                <div class="saltopagina">
                    <div style="border: ridge #0f0fef 1px; text-align:center">

                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>
                            <div class="form-group col-md-4" style=" margin: auto;">

                                <tr height="">
                                    <td height="">
                                        <div align="center">
                                            <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                        </div>
                                    </td>
                                </tr>
                                <tr height="">
                                    <td height="">
                                        <div align="center"><small>NEFROLOGIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                            <small><?= $dato_historia[0]->citFecha ?></small>
                                        </div>
                                    </td>
                                </tr>
                            </div>


                            <div class="form-group col-md-4">

                                <tr>
                                    <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                </tr>

                            </div>


                        </div>
                    </div>
                    <br><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:left;">
                            <div class="form-group col-md-2">
                                <strong>DOCUMENTO: </strong><br>
                                <?php
                                echo $h->pacDocumento;
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>NOMBRE: </strong><br>
                                <?php
                                echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . " - ";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION: </strong><br>
                                <?php
                                echo $h->pacDireccion; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO: </strong><br>
                                <?php
                                echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA: </strong><br>
                                <?php echo date('d-m-Y');

                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>AYUDAS DIAGNOSTICAS</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO AYUDA DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                                </th>
                                            </tr>
                                            <th>CODIGO</th>
                                            <th>CUPS</th>
                                            <th>OBSERVACION</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($cups_historia as $ch) {

                                                echo "<tr>";
                                                echo "<td>" . $ch->cupCodigo . "</td>";
                                                echo "<td>" . $ch->cupNombre . "</td>";
                                                echo "<td>" . $ch->cupObservacion . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        }
    } elseif ($dato_historia[0]->proceso_idProceso == 7) { ?>

        <div class="mx-auto" style="width: 1300px;">
            <div style="border: ridge #0f0fef 1px; text-align:center">

                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-4">

                        <tr>
                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                        </tr>

                    </div>
                    <div class="form-group col-md-4" style=" margin: auto;">

                        <tr height="">
                            <td height="">
                                <div align="center">
                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                </div>
                            </td>
                        </tr>
                        <tr height="">
                            <td height="">
                                <div align="center"><small>INTERNISTA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                </div>
                            </td>
                        </tr>
                    </div>


                    <div class="form-group col-md-4">

                        <tr>
                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                        </tr>

                    </div>


                </div>
            </div>
            <br><br>

            <div class="mx-auto" style="width: 1300px;">
                <?php foreach ($dato_historia as $h) { ?>

                    <fieldset>
                        <legend>DATOS PACIENTE</legend>
                        <div class="form-row" style="text-align:center">
                            <div class="form-group col-md-2">
                                <strong>NOMBRE</strong><br>
                                <?php
                                echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                                echo $h->pacNombre . " " . $h->pacApellido; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                <?php echo $h->pacFecNacimiento . "<br>";
                                list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                $anio_dif = date("Y") - $anio;
                                $mes_dif = date("m") - $mes;
                                $dia_dif = date("d") - $dia;

                                if ($dia_dif < 0 || $mes_dif < 0) {
                                    $anio_dif--;
                                    //return $anio_dif;
                                }

                                echo $anio_dif . "Años";
                                ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>SEXO</strong><br>
                                <?php if ($h->pacSexo == "M") {
                                    echo "MASCULINO";
                                } else {
                                    echo "FEMENINO";
                                } ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>ESATDO CIVIL</strong><br>
                                <?php echo $h->pacEstCivil; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>TELEFONO</strong><br>
                                <?php echo $h->pacTelefono; ?>
                            </div>
                            <div class="form-group col-md-2">
                                <strong>DIRECCION</strong><br>
                                <?php
                                echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                            </div>
                        </div>
                        <div class="form-row" style="text-align:center">
                            <div class="form-group col-md-3">
                                <strong>ASEGURADORA</strong><br>
                                <?php
                                echo $h->empNombre; ?>
                            </div>

                            <div class="form-group col-md-3">
                                <strong>REGIMEN</strong><br>
                                <?php echo $h->regNombre; ?>
                            </div>
                            <div class="form-group col-md-3">
                                <strong>OCUPACION</strong><br>
                                <?php echo $h->ocuNombre; ?>
                            </div>
                            <div class="form-group col-md-3">
                                <strong>BRIGADA</strong><br>
                                <?php echo $h->zonNombre; ?>
                            </div>
                        </div>

                    </fieldset><br>
                    <fieldset>
                        <legend>ACUDIENTE</legend>
                        <div class="form-row" style="margin: 10px; text-align:center">
                            <div class="form-group col-md-4">
                                <strong>NOMBRE ACOMPAÑANTE</strong><br>
                                <?php
                                echo $h->hcAcompanante; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>PARENTESCO</strong><br>
                                <?php
                                echo $h->hcAcuParentesco; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>TELEFONO</strong><br>
                                <?php
                                echo $h->hcAcuTelefono; ?>
                            </div>
                        </div>

                    </fieldset><br>

                    <fieldset>
                        <legend>HISTORIA CLINICA</legend>

                        <div style="margin: 10px; text-align:center">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>MOTIVO CONSULTA</strong><br>
                                    <?php
                                    echo $antecedentes_personales[0]->hcMotivoConsulta; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>ENFERMEDAD ACTUAL</strong><br>
                                    <?php
                                    echo $h->hcEnfermedadActual; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>

                    <?php foreach ($antecedentes_personales as $hap) { ?>

                        <fieldset>
                            <legend>ANTECEDENTES PERSONALES</legend>
                            <div style="margin: 10px;">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>SISTEMA NERVIOSO: DOLORES DE CABEZA, CONVULSIONES, MAREOS, PARALISIS, TRANSTORNOS MENTALES: </strong>
                                        <?php
                                        echo $hap->hcSistemaNerviosoNefroInter; ?>

                                    </div>

                                    <?php if ($hap->hcSistemaNerviosoNefroInter == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION SISTEMA NERVIOSO: DOLORES DE CABEZA, CONVULSIONES, MAREOS, PARALISIS, TRANSTORNOS MENTALES </strong>


                                            <?php echo $hap->descripcion_sistema_nervioso;  ?>

                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>SISTEMA HEMOLINFATICO: ANEMIA, DESORDENES SANGUINEOS O PROBLEMAS DE COAGULACION: </strong>
                                        <?php
                                        echo $hap->hcSistemaHemolinfatico; ?>
                                    </div>

                                    <?php if ($hap->hcSistemaHemolinfatico == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION SISTEMA HEMOLINFATICO: ANEMIA, DESORDENES SANGUINEOS O PROBLEMAS DE COAGULACION </strong>

                                            <?php echo $hap->descripcion_sistema_hemolinfatico;  ?>

                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>APARATO DIGESTIVO: ULCERAS, GASTRITIS, CIRROSIS, DIVERTICULOS, COLITIS, HEMORROIDES </strong>

                                        <?php
                                        echo $hap->hcAparatoDigestivo; ?>

                                    </div>
                                    <?php if ($hap->hcAparatoDigestivo == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION APARATO DIGESTIVO: ULCERAS, GASTRITIS, CIRROSIS, DIVERTICULOS, COLITIS, HEMORROIDES</strong>
                                            <?php
                                            echo $hap->descripcion_aparato_digestivo; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>ORGANOS DE LOS SENTIDOS: CATARATAS, PTERIGIOS, VISION CORTA, OTITIS, DESVIACION DEL TABIQUE, SINUSITIS, AMIGDALITIS </strong>

                                        <?php
                                        echo $hap->hcOrganoSentido; ?>

                                    </div>

                                    <?php if ($hap->hcOrganoSentido == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION ORGANOS DE LOS SENTIDOS: CATARATAS, PTERIGIOS, VISION CORTA, OTITIS, DESVIACION DEL TABIQUE, SINUSITIS, AMIGDALITIS</strong>

                                            <?php
                                            echo $hap->descripcion_organos_sentidos; ?>

                                        </div>
                                    <?php  } ?>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>ENDOCRINO-METABOLICOS: DIABETES, ENFERMEDADES DE LA TIROIDES, ALTERACION DE LAS GRASAS, O ACIDOS URICO SANGUINEOS </strong>

                                        <?php
                                        echo $hap->hcEndocrinoMetabolico; ?>
                                    </div>
                                    <?php if ($hap->hcEndocrinoMetabolico == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION ENDOCRINO-METABOLICOS: DIABETES, ENFERMEDADES DE LA TIROIDES, ALTERACION DE LAS GRASAS, O ACIDOS URICO SANGUINEOS</strong>
                                            <?php
                                            echo $hap->descripcion_endocrino_metabolico; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>INMUNOLOGICOS: LUPUS, ARTRITIS REUMATOIDES</strong>

                                        <?php
                                        echo $hap->hcInmunologico; ?>
                                    </div>
                                    <?php if ($hap->hcInmunologico == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION INMUNOLOGICOS: LUPUS, ARTRITIS REUMATOIDES</strong>
                                            <?php
                                            echo $hap->descripcion_inmunologico; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>CANCER, TUMORES, RADIOTERAPIA O QUIMIOTERAPIA</strong>
                                        <?php
                                        echo $hap->hcCancerTumoresRadioterapiaQuimio; ?>

                                    </div>
                                    <?php if ($hap->hcCancerTumoresRadioterapiaQuimio == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION CANCER, TUMORES, RADIOTERAPIA O QUIMIOTERAPIA</strong>
                                            <?php
                                            echo $hap->descripcion_cancer_tumores_radio_quimioterapia; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>GLANDULAS MAMARIAS: DOLORES, MASAS, SECRECIONES</strong>
                                        <?php
                                        echo $hap->hcGlandulaMamaria; ?>

                                    </div>
                                    <?php if ($hap->hcGlandulaMamaria == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION GLANDULAS MAMARIAS: DOLORES, MASAS, SECRECIONES</strong>
                                            <?php
                                            echo $hap->descripcion_glandulas_mamarias; ?>
                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>HIPERTENSION, DIABETES, ERC</strong>
                                        <?php
                                        echo $hap->hcHipertensionDiabetesErc; ?>
                                    </div>
                                    <?php if ($hap->hcHipertensionDiabetesErc == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION HIPERTENSION, DIABETES, ERC</strong>
                                            <?php
                                            echo $hap->descripcion_hipertension_diabetes_erc; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>REACIONES ALERGICAS: </strong>
                                        <?php
                                        echo $hap->hcReacionesAlergica; ?>

                                    </div>
                                    <?php if ($hap->hcReacionesAlergica == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION REACIONES ALERGICAS</strong>
                                            <?php
                                            echo $hap->descripcion_reacion_alergica; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>CARDIO VASCULARES: HIPERTENSION, INFARTOS, ANGINAS, SOPLOS, ARITMIAS, ENFERMEDADES CORONARIAS </strong>

                                        <?php
                                        echo $hap->hcCardioVasculares; ?>

                                    </div>
                                    <?php if ($hap->hcCardioVasculares == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION CARDIO VASCULARES: HIPERTENSION, INFARTOS, ANGINAS, SOPLOS, ARITMIAS, ENFERMEDADES CORONARIAS</strong>
                                            <?php
                                            echo $hap->descripcion_cardio_vasculares; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>RESPIRATORIOS: ASMA, ENFISEMA, EFECCION LARINGEA O EN BRONQUIOS </strong>
                                        <?php
                                        echo $hap->hcRespiratorios; ?>

                                    </div>
                                    <?php if ($hap->hcRespiratorios == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION RESPIRATORIOS: ASMA, ENFISEMA, EFECCION LARINGEA O EN BRONQUIOS</strong>
                                            <?php
                                            echo $hap->descripcion_respiratorios; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>CRINARIAS: INSUFICIENCIA RENAL, CALCULOS, ORINA CON SANGRE, INFECCIONES FRECUENTES, PROSTATAS ENFERMAS</strong>

                                        <?php
                                        echo $hap->hcCrinarias; ?>

                                    </div>
                                    <?php if ($hap->hcCrinarias == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION CRINARIAS: INSUFICIENCIA RENAL, CALCULOS, ORINA CON SANGRE, INFECCIONES FRECUENTES, PROSTATAS ENFERMAS</strong>
                                            <?php
                                            echo $hap->descripcion_crinarias; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>OSTEOARTICULARES: ENFERMEDADES DE LA COLUMNA, DOLOR DE RODILLA, DEFORMIDADES </strong>
                                        <?php
                                        echo $hap->hcOsteoarticulares; ?>

                                    </div>
                                    <?php if ($hap->hcOsteoarticulares == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION OSTEOARTICULARES: ENFERMEDADES DE LA COLUMNA, DOLOR DE RODILLA, DEFORMIDADES</strong>
                                            <?php
                                            echo $hap->descripcion_osteoarticulares; ?>
                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>INFECCIOSOS: HEPATITIS, TUBERCULOSIS, SIDA O VIH(+), ENFERMEDADES DE TRANSMISION SEXUAL </strong>

                                        <?php
                                        echo $hap->hcInfecciosos; ?>

                                    </div>
                                    <?php if ($hap->hcInfecciosos == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION INFECCIOSOS: HEPATITIS, TUBERCULOSIS, SIDA O VIH(+), ENFERMEDADES DE TRANSMISION SEXUAL</strong>
                                            <?php
                                            echo $hap->descripcion_infecciosos; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>CIRUGIAS TRAUMAS(ACCIDENTES) </strong>
                                        <?php
                                        echo $hap->hcCirugiaTrauma; ?>

                                    </div>
                                    <?php if ($hap->hcCirugiaTrauma == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION CIRUGIAS TRAUMAS(ACCIDENTES)</strong>
                                            <?php
                                            echo $hap->descripcion_cirugias_traumas; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>TRATAMINETOS CON MEDICACION</strong>
                                        <?php
                                        echo $hap->hcTratamientoMedicacion; ?>

                                    </div>

                                    <?php if ($hap->hcTratamientoMedicacion == 'SI') { ?>

                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION TRATAMINETOS CON MEDICACION</strong>
                                            <?php
                                            echo $hap->descripcion_tratamiento_medicacion; ?>
                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>ANTECEDENTES QUIRURGICOS: </strong>

                                        <?php
                                        echo $hap->hcAntecedenteQuirurgico; ?>
                                    </div>
                                    <?php if ($hap->hcAntecedenteQuirurgico == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION ANTECEDENTES QUIRURGICOS</strong>
                                            <?php
                                            echo $hap->descripcion_antecedentes_quirurgicos; ?>
                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>ANTECEDENTES FAMILIARES: </strong>
                                        <?php
                                        echo $hap->hcAntecedentesFamiliares; ?>

                                    </div>
                                    <?php if ($hap->hcAntecedentesFamiliares == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION ANTECEDENTES FAMILIARES</strong>
                                            <?php
                                            echo $hap->descripcion_antecedentes_familiares; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>CONSUMO DE TABACO</strong>
                                        <?php
                                        echo $hap->hcConsumoTabaco; ?>
                                    </div>
                                    <?php if ($hap->hcConsumoTabaco == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION CONSUMO DE TABACO</strong>
                                            <?php
                                            echo $hap->descripcion_consumo_tabaco; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>ANTECEDENTES DE ALCOHOL</strong>

                                        <?php
                                        echo $hap->hcAntecedentesAlcohol; ?>

                                    </div>
                                    <?php if ($hap->hcAntecedentesAlcohol == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION ANTECEDENTES DE ALCOHOL</strong>
                                            <?php
                                            echo $hap->descripcion_antecedentes_alcohol; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>SEDENTARISMO: </strong>

                                        <?php
                                        echo $hap->hcSedentarismo; ?>

                                    </div>
                                    <?php if ($hap->hcSedentarismo == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION SEDENTARISMO</strong>
                                            <?php
                                            echo $hap->descripcion_sedentarismo; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>GINECOLOGICOS, TUMORES O MASA EN OVARIOS, UTERO, MENSTRUACION ANORMAL: </strong>

                                        <?php
                                        echo $hap->hcGinecologico; ?>
                                    </div>
                                    <?php if ($hap->hcGinecologico == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION GINECOLOGICOS, TUMORES O MASA EN OVARIOS, UTERO, MENSTRUACION ANORMAL</strong>
                                            <?php
                                            echo $hap->descripcion_ginecologicos; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>CITOLOGIA VAGINAL PATOLOGICAS O ANORMALES</strong>

                                        <?php
                                        echo $hap->hcCitologiaVaginal; ?>

                                    </div>
                                    <?php if ($hap->hcCitologiaVaginal == 'SI') { ?>
                                        <div class="form-group col-md-6">
                                            <strong>DESCRIPCION CITOLOGIA VAGINAL PATOLOGICAS O ANORMALES</strong>
                                            <?php
                                            echo $hap->descripcion_citologia_vaginal; ?>

                                        </div>
                                    <?php  } ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <strong>MENARQUIA: </strong>
                                        <?php
                                        echo $hap->hcMenarquia; ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <strong>GESTACIONES: </strong>

                                        <?php
                                        echo $hap->hcGestaciones; ?>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>PARTOS: </strong>
                                        <?php
                                        echo $hap->hcParto; ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <strong>ABORTOS: </strong>
                                        <?php
                                        echo $hap->hcAborto; ?>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>CESARIAS: </strong>
                                        <?php
                                        echo $hap->hcCesaria; ?>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>METODOS ANTICONCEPTIVOS</strong>
                                        <?php
                                        echo $hap->hcMetodoConceptivo; ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>METODO ANTICONCEPTIVO ¿CUAL?</strong>
                                        <?php
                                        echo $hap->hcMetodoConceptivoCual; ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <strong>OBSERVACIONES ANTECEDENTES PERSONALES</strong>

                                        <?php
                                        echo $hap->hcAntecedentePersonal; ?>

                                    </div>
                                </div>


                            </div>
                        </fieldset>
                    <?php } ?><br>

                    <fieldset>
                        <legend>REVISION POR SISTEMA</legend>

                        <div style="margin: 10px;">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>CABEZA: </strong>
                                    <?php
                                    echo $h->hcEfCabeza; ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <strong>OBSERVACIONES CABEZA: </strong>
                                    <?php
                                    echo $h->hcObsCabeza; ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>CUELLO: </strong>
                                    <?php
                                    echo $h->hcCuello; ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <strong>OBSERVACIONES CUELLO: </strong>
                                    <?php
                                    echo $h->hcObsCuello; ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>TORAX: </strong>
                                    <?php
                                    echo $h->hcTorax; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>OBSERVACIONES TORAX: </strong>

                                    <?php
                                    echo $h->hcObsTorax; ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>ABDOMEN: </strong>

                                    <?php
                                    echo $h->hcAbdomen; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>OBSERVACIONES ABDOMEN: </strong>
                                    <?php
                                    echo $h->hcObsAbdomen; ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>EXTREMIDADES: </strong>

                                    <?php
                                    echo $h->hcExtremidades; ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <strong>OBSERVACIONES EXTREMIDADES: </strong>
                                    <?php
                                    echo $h->hcObsExtremidades; ?>

                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>NEUROLOGICO Y ESTADO MENTAL: </strong>

                                    <?php
                                    echo $antecedentes_personales[0]->hcNeurologicoEstadoMental; ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <strong>OBSERVACIONES NEUROLOGICO Y ESTADO MENTAL: </strong>

                                    <?php
                                    echo $antecedentes_personales[0]->hcObsNeurologicoEstadoMental; ?>

                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>EXAMEN FISICO</legend>

                        <div style="margin: 10px;">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>PESO KG: </strong>

                                    <?php
                                    echo $h->hcPeso; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>TALLA CM: </strong>

                                    <?php
                                    echo $h->hcTalla; ?>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>IMC: </strong>
                                    <?php
                                    echo $h->hcIMC; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>PERIMETRO ABDOMINAL: </strong>

                                    <?php
                                    echo $h->hcPerimetroAbdominal; ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>PRESION ARTERIAL SISTOLICA: </strong>
                                    <?php
                                    echo $h->hcPresionArterialSistolicaSentadoPie; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>PRESION ARTERIAL DISTOLICA: </strong>
                                    <?php
                                    echo $h->hcPresionArterialDistolicaSentadoPie; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>FRECUENCIA CARDIACA: </strong>
                                    <?php
                                    echo $h->hcFrecuenciaCardiaca; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>FRECUENCIA RESPIRATORIA: </strong>
                                    <?php
                                    echo $h->hcFrecuenciaRespiratoria; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>

                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px;">
                            <div class="form-group col-md-12">
                                <strong>ANALISIS PLAN</strong><br>
                                <?php
                                echo $h->hcObservacionesGenerales; ?>
                            </div>
                        </div>
                    </div><br>
                    <fieldset>
                        <legend>CLASIFICACION</legend>

                        <div style="margin: 10px;">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>CLASIFICACION HTA: </strong>
                                    <?php
                                    echo $h->hcClasificacionHta; ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>CLASIFICACION DM: </strong>
                                    <?php
                                    echo $h->hcClasificacionDm; ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>CLASIFIACION ERC ESTADO: </strong>
                                    <?php
                                    echo $h->hcClasificacionErcEstado; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>CLASIFIACION ERC CATEGORIA DE ALBUMINURIA PERSISTENTE: </strong>
                                    <?php
                                    echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>CLASIFICACION RCV: </strong>
                                    <?php
                                    echo $h->hcClasificacionRcv; ?>
                                </div>
                            </div>
                    </fieldset><br>
                    <fieldset>
                        <legend>DIAGNOSTICO</legend>
                        <div style="margin: 10px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="7">
                                                    <center>FORMATO DIAGNOSTICA</center>
                                                </th>
                                            </tr>
                                            <th>#</th>
                                            <th>CODIGO</th>
                                            <th>DIAGNOSTICO</th>
                                            <th>CLASIFICACION</th>
                                            <th>TIPO</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $num = 1;
                                            foreach ($diagnostico_historia as $dh) {

                                                echo "<tr>";
                                                echo "<td>" . $num++ . "</td>";
                                                echo "<td>" . $dh->diaCodigo . "</td>";
                                                echo "<td>" . $dh->diaNombre . "</td>";
                                                echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-md-6">
                                    <strong>CAUSA EXTERNA: </strong>
                                    <?php echo $h->hcCausaExterna; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset><br>
                    <div style="border: ridge #0f0fef 1px;">
                        <div class="form-row" style="margin: 10px; text-align:center;">
                            <div class="form-group col-md-6">
                                <?php

                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                <strong>FIRMA DIGITAL</strong><br>
                                <strong>PROFESIONAL: </strong>
                                <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                            </div>
                            <div class="form-group col-md-6"><br><br><br><br><br>
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
                        </div>
                    </div>
                    <?php if (count($medicamento_historia) != 0) { ?>
                        <div class="saltopagina">
                            <div style="border: ridge #0f0fef 1px; text-align:center">

                                <div class="form-row" style="margin: 10px;">
                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>
                                    <div class="form-group col-md-4" style=" margin: auto;">

                                        <tr height="">
                                            <td height="">
                                                <div align="center">
                                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr height="">
                                            <td height="">
                                                <div align="center"><small>INTERNISTA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>


                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>


                                </div>
                            </div>
                            <br><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:left;">
                                    <div class="form-group col-md-2">
                                        <strong>DOCUMENTO: </strong><br>
                                        <?php
                                        echo $h->pacDocumento;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>NOMBRE: </strong><br>
                                        <?php
                                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                        <?php echo $h->pacFecNacimiento . " - ";
                                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                        $anio_dif = date("Y") - $anio;
                                        $mes_dif = date("m") - $mes;
                                        $dia_dif = date("d") - $dia;

                                        if ($dia_dif < 0 || $mes_dif < 0) {
                                            $anio_dif--;
                                            //return $anio_dif;
                                        }

                                        echo $anio_dif . "Años";
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>DIRECCION: </strong><br>
                                        <?php
                                        echo $h->pacDireccion; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>TELEFONO: </strong><br>
                                        <?php
                                        echo $h->pacTelefono; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA: </strong><br>
                                        <?php echo date('d-m-Y');

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>DIAGNOSTICO</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO DIAGNOSTICA</center>
                                                        </th>
                                                    </tr>
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>DIAGNOSTICO</th>
                                                    <th>CLASIFICACION</th>
                                                    <th>TIPO</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 1;
                                                    foreach ($diagnostico_historia as $dh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $num++ . "</td>";
                                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                                        echo "<td>" . $dh->diaNombre . "</td>";
                                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend>MEDICAMENTOS</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMULA MEDICA <?php echo date("Y-m-d", time()); ?></center>
                                                        </th>
                                                    </tr>
                                                    <th>MEDICAMENTO</th>
                                                    <th>CANTIDAD</th>
                                                    <th>DOSIS</th>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($medicamento_historia as $mh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $mh->medNombre . "</td>";
                                                        echo "<td>" . $mh->hisMedCantidad . "</td>";
                                                        echo "<td>" . $mh->hisMedDosis . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:center;">
                                    <div class="form-group col-md-6">
                                        <?php

                                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                        <strong>FIRMA DIGITAL</strong><br>
                                        <strong>PROFESIONAL: </strong>
                                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                                    </div>
                                    <div class="form-group col-md-6"><br><br><br><br><br>
                                        <strong>FIRMA PACIENTE: </strong>
                                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    <?php }
                    if (count($remision_historia) != 0) { ?>
                        <div class="saltopagina">
                            <div style="border: ridge #0f0fef 1px; text-align:center">

                                <div class="form-row" style="margin: 10px;">
                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>
                                    <div class="form-group col-md-4" style=" margin: auto;">

                                        <tr height="">
                                            <td height="">
                                                <div align="center">
                                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr height="">
                                            <td height="">
                                                <div align="center"><small>INTERNISTA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>


                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>


                                </div>
                            </div>
                            <br><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:left;">
                                    <div class="form-group col-md-2">
                                        <strong>DOCUMENTO: </strong><br>
                                        <?php
                                        echo $h->pacDocumento;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>NOMBRE: </strong><br>
                                        <?php
                                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                        <?php echo $h->pacFecNacimiento . " - ";
                                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                        $anio_dif = date("Y") - $anio;
                                        $mes_dif = date("m") - $mes;
                                        $dia_dif = date("d") - $dia;

                                        if ($dia_dif < 0 || $mes_dif < 0) {
                                            $anio_dif--;
                                            //return $anio_dif;
                                        }

                                        echo $anio_dif . "Años";
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>DIRECCION: </strong><br>
                                        <?php
                                        echo $h->pacDireccion; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>TELEFONO: </strong><br>
                                        <?php
                                        echo $h->pacTelefono; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA: </strong><br>
                                        <?php echo date('d-m-Y');

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>DIAGNOSTICO</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO DIAGNOSTICA</center>
                                                        </th>
                                                    </tr>
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>DIAGNOSTICO</th>
                                                    <th>CLASIFICACION</th>
                                                    <th>TIPO</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 1;
                                                    foreach ($diagnostico_historia as $dh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $num++ . "</td>";
                                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                                        echo "<td>" . $dh->diaNombre . "</td>";
                                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend>REMISION</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMULA DE REMISION <?php echo date("Y-m-d", time()); ?></center>
                                                        </th>
                                                    </tr>
                                                    <th>CODIGO</th>
                                                    <th>REMISION</th>
                                                    <th>OBSERVACION</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($remision_historia as $r) {

                                                        echo "<tr>";
                                                        echo "<td>"
                                                            . $r->remCodigo . "</td>";
                                                        echo "<td>" . $r->remNombre . "</td>";
                                                        echo "<td>" . $r->remObservacion . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:center;">
                                    <div class="form-group col-md-6">
                                        <?php

                                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                        <strong>FIRMA DIGITAL</strong><br>
                                        <strong>PROFESIONAL: </strong>
                                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                                    </div>
                                    <div class="form-group col-md-6"><br><br><br><br><br>
                                        <strong>FIRMA PACIENTE: </strong>
                                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    <?php }
                    if (count($cups_historia) != 0) { ?>
                        <div class="saltopagina">
                            <div style="border: ridge #0f0fef 1px; text-align:center">

                                <div class="form-row" style="margin: 10px;">
                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>
                                    <div class="form-group col-md-4" style=" margin: auto;">

                                        <tr height="">
                                            <td height="">
                                                <div align="center">
                                                    <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr height="">
                                            <td height="">
                                                <div align="center"><small>INTERNISTA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</small><br>
                                                    <small><?= $dato_historia[0]->citFecha ?></small>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>


                                    <div class="form-group col-md-4">

                                        <tr>
                                            <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                                        </tr>

                                    </div>


                                </div>
                            </div>
                            <br><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:left;">
                                    <div class="form-group col-md-2">
                                        <strong>DOCUMENTO: </strong><br>
                                        <?php
                                        echo $h->pacDocumento;
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>NOMBRE: </strong><br>
                                        <?php
                                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                                        <?php echo $h->pacFecNacimiento . " - ";
                                        list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                                        $anio_dif = date("Y") - $anio;
                                        $mes_dif = date("m") - $mes;
                                        $dia_dif = date("d") - $dia;

                                        if ($dia_dif < 0 || $mes_dif < 0) {
                                            $anio_dif--;
                                            //return $anio_dif;
                                        }

                                        echo $anio_dif . "Años";
                                        ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>DIRECCION: </strong><br>
                                        <?php
                                        echo $h->pacDireccion; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>TELEFONO: </strong><br>
                                        <?php
                                        echo $h->pacTelefono; ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <strong>FECHA: </strong><br>
                                        <?php echo date('d-m-Y');

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <fieldset>
                                <legend>DIAGNOSTICO</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO DIAGNOSTICA</center>
                                                        </th>
                                                    </tr>
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>DIAGNOSTICO</th>
                                                    <th>CLASIFICACION</th>
                                                    <th>TIPO</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $num = 1;
                                                    foreach ($diagnostico_historia as $dh) {

                                                        echo "<tr>";
                                                        echo "<td>" . $num++ . "</td>";
                                                        echo "<td>" . $dh->diaCodigo . "</td>";
                                                        echo "<td>" . $dh->diaNombre . "</td>";
                                                        echo "<td>" . $dh->his_dia_tipo . "</td>";
                                                        echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset>
                                <legend>AYUDAS DIAGNOSTICAS</legend>
                                <div style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <center>FORMATO AYUDA DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                                        </th>
                                                    </tr>
                                                    <th>CODIGO</th>
                                                    <th>CUPS</th>
                                                    <th>OBSERVACION</th>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($cups_historia as $ch) {

                                                        echo "<tr>";
                                                        echo "<td>" . $ch->cupCodigo . "</td>";
                                                        echo "<td>" . $ch->cupNombre . "</td>";
                                                        echo "<td>" . $ch->cupObservacion . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><br>
                            <div style="border: ridge #0f0fef 1px;">
                                <div class="form-row" style="margin: 10px; text-align:center;">
                                    <div class="form-group col-md-6">
                                        <?php

                                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                                        <strong>FIRMA DIGITAL</strong><br>
                                        <strong>PROFESIONAL: </strong>
                                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                                    </div>
                                    <div class="form-group col-md-6"><br><br><br><br><br>
                                        <strong>FIRMA PACIENTE: </strong>
                                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                                    </div>
                                </div>
                            </div><br>
                        </div>
            <?php }
                }
            } ?>
            <script type="text/javascript">
                function pregunta() {
                    if (confirm('¿Realmente desea regresar ? por favor verifique que ya exporto el soporte de historia clinica antes de realizar este paso')) {
                        window.location.replace("<?php echo base_url() . 'index.php/CHistoria/agenda/guardar' ?>");
                    }
                }
            </script>

            <script type="text/javascript">
                window.print();
            </script>