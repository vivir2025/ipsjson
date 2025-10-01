<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CInforme extends CI_Controller
{

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
		$datos["brigada"] = $this->MBrigada->ver();

        $this->load->view("CInforme/VConsultar.php", $datos);

        $this->load->view("CPlantilla/VFooter");
    }

public function informe1()
    {

        $data['title'] = 'IPS | INFORMES';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CInforme/VConsultar1.php");

        $this->load->view("CPlantilla/VFooter");
    }
    public function informe2()
    {

        $data['title'] = 'IPS | INFORMES';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CInforme/VConsultar2.php");

        $this->load->view("CPlantilla/VFooter");
    }
    public function informe3(){

         $data['title'] = 'IPS | INFORMES';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CInforme/VConsultar3.php");

        $this->load->view("CPlantilla/VFooter");
    }

    public function informe4()
    {
    
        $data['title'] = 'DESCARGADOR MASIVO HISTORIAS CLINICAS';
    
        $this->load->view("CPlantilla/VHead", $data);
    
        $this->load->view("CPlantilla/VBarraMenu");
    
        $this->load->view("CInforme/VConsultar4.php");
    
        $this->load->view("CPlantilla/VFooter");
    }

        public function   informe5(){

         $data['title'] = 'IPS | RIPS-JSON';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CInforme/VConsultar5.php");

        $this->load->view("CPlantilla/VFooter");
    }

        public function   informe6(){

         $data['title'] = 'IPS | INFORME APP';

        $this->load->view("CPlantilla/VHead", $data);

        $this->load->view("CPlantilla/VBarraMenu");

        $this->load->view("CInforme/VConsultar6.php");

        $this->load->view("CPlantilla/VFooter");
    }
     public function informe7()
    {
    
        $data['title'] = 'DESCARGADOR MASIVO HISTORIAS CLINICAS';
    
        $this->load->view("CPlantilla/VHead", $data);
    
        $this->load->view("CPlantilla/VBarraMenu");
    
        $this->load->view("CInforme/VConsultar7.php");
    
        $this->load->view("CPlantilla/VFooter");
    }



    public function exportar() {
        // create file name
        $filename = date('Y-m-d',time()).'.xls';  

        $fecha1 = $this->input->post('fecha');
        $fecha2 = $this->input->post('fecha1');
        $data = $this->MInforme->ver_pac_by_fecha($fecha1, $fecha2);


        header("Pragma: public");
        header("Expires: 0");
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=$filename");
        header("Pragma: no-cache");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


        echo "<table border=1";
        if (sizeof($data) > 0) {
            echo "<tr >";
            echo "<td>Primer Nombre</td>";
            echo "<td>Segundo Nombre</td>";
            echo "<td>Primer Apellido</td>";
            echo "<td>Segundo Apellido</td>";
            echo "<td>Tipo Id</td>";
            echo "<td>Numero de Identificacion</td>";
            echo "<td>Fecha de Nacimiento</td>";
            echo "<td>Edad</td>";
            echo "<td>Sexo</td>";
            echo "<td>Genero</td>";
            echo "<td>Grupo Etnico</td>";
            echo "<td>Grupo Poblacion</td>";
            echo "<td>Orientacion Sexual</td>";
            echo "<td>Tipos de Discapacidad</td>";
            echo "<td>Codigo Ocupacion</td>";
            echo "<td>Escolaridad</td>";
            echo "<td>Brigada</td>";

            echo "<td>Codigo DANE Municipio de Residencia</td>";
            echo "<td>Descripcion Municipio de Residencia</td>";
            echo "<td>Zona</td>";
            echo "<td>Direccion de Residencia</td>";

            echo "<td>Numero de Telefono</td>";

            echo "<td>Codigo Habilitacion IPS de Atencion</td>";
            echo "<td>Nombre IPS Atencion</td>";
            echo "<td>Fecha de Ingreso al Programa</td>";
            echo "<td>Diagnostico HTA</td>";
            echo "<td>Fecha Diagnostico HTA</td>";
            echo "<td>Diagnostico DM</td>";
            echo "<td>Fecha Diagnostico DM</td>";
            echo "<td>Tipo de Diabetes</td>";
            echo "<td>Diagnostico EPOC</td>";
            echo "<td>Fecha Diagnostico de EPOC</td>";
            echo "<td>Diagnostico ERC</td>";
            echo "<td>Fecha Diagnostico ERC</td>";
            echo "<td>Dx Enfermedad Cardiaca Isquemica</td>";
            echo "<td>Dx Enfermedad Cerebrovascular</td>";
            echo "<td>Dx Enfermedad Arterial Periferica</td>";
            echo "<td>Dx Insuficiencia Cardiaca</td>";
            echo "<td>Dx Retinopatia</td>";
            echo "<td>Dx Aterosclerosis</td>";
            echo "<td>Discapacidad</td>";
            echo "<td>Habito Tabaquico</td>";
            echo "<td>Cocina con Leña</td>";
            echo "<td>Fecha de Control</td>";
            echo "<td>Peso (kg)</td>";
            echo "<td>Talla (cms)</td>";
            echo "<td>IMC</td>";
            echo "<td>Perimetro de Cintura</td>";
            echo "<td>Presion Arterial Sistolica</td>";
            echo "<td>Presion Arterial Diastolica</td>";
            ///////////////////////////////////////////
            echo "<td>Colesterol Total</td>";
            echo "<td>Fecha Colesterol Total</td>";
            echo "<td>Colesterol HDL</td>";
            echo "<td>Fecha Colesterol HDL</td>";
            echo "<td>Colesterol LDL</td>";
            echo "<td>Fecha Colesterol LDL</td>";
            echo "<td>Trigliceridos</td>";
            echo "<td>Fecha Trigliceridos</td>";
            echo "<td>Hemoglobina Glicosilada</td>";
            echo "<td>Fecha Hemoglobina Glicosilada</td>";
            echo "<td>Creatinina Serica N 1</td>";
            echo "<td>Fecha Creatinina Serica N 1</td>";
            echo "<td>Creatinina Serica N 2</td>";
            echo "<td>Fecha Creatinina Serica N 2</td>";
            echo "<td>Creatinina Serica N 3</td>";
            echo "<td>Fecha Creatinina Serica N 3</td>";
            echo "<td>Albuminuria/Creatinuria N 1</td>";
            echo "<td>Fecha Cociente Albuminuria/Creatinuria N 1</td>";
            echo "<td>Albuminuria/Creatinuria N 2</td>";
            echo "<td>Fecha Cociente Albuminuria/Creatinuria N 2</td>";
            echo "<td>Albuminuria/Creatinuria N 3</td>";
            echo "<td>Fecha Cociente Albuminuria/Creatinuria N 3</td>";
            echo "<td>Uroanalsis</td>";
            echo "<td>Fecha Uroanalisis</td>";
            echo "<td>TFG COCKCROFT-GAULT N 1</td>";
            echo "<td>TFG COCKCROFT-GAULT N 2</td>";
            echo "<td>TFG COCKCROFT-GAULT N 3</td>";
            echo "<td>Albuminuria</td>";
            echo "<td>Fecha Albuminuria</td>";
            echo "<td>Estadio ERC</td>";
            echo "<td>Paratohormona (PTH)</td>";
            echo "<td>Fecha PTH</td>";
            echo "<td>Hemoglobina</td>";
            echo "<td>Fecha hemoglobina</td>";
            echo "<td>Albumina Serica</td>";
            echo "<td>Fecha Albumina</td>";
            echo "<td>Fosforo</td>";
            echo "<td>Fecha Fosforo</td>";
            echo "<td>Paciente Recibe IECA</td>";
            echo "<td>Paciente Recibe ARA</td>";
            echo "<td>Paciente Recibe Insulina</td>";
            echo "<td>Adherencia al Tratamiento (Test de Morinsky)</td>";
            echo "<td>Clasificacion del Riesgo Cardiovascular</td>";
            echo "<td>Clasificacion del Estado Metabolico</td>";

            echo "<td>Novedades</td>";

            echo "<td>Fecha de Muerte</td>";
            echo "<td>Fecha de Observacion</td>";
            echo "<td>Observacion</td>";
            echo "<td>Municipio Atencion</td>";
            echo "<td>ESTADIO ERC CKD EPI</td>";
            echo "<td>CRUCE NOVEDAD 2</td>";
            echo "<td>OBSERVACION</td>";
            echo "<td>Hierro Serico</td>";
            echo "<td>Fecha Hierro Serico</td>";
            echo "<td>BUN</td>";
            echo "<td>Fecha BUN</td>";
            echo "<td>Potasio Serico</td>";
            echo "<td>Fecha Potasio Serico</td>";
            echo "<td>Proteinuria Orina</td>";
            echo "<td>Fecha Proteinuria Orina</td>";
            echo "<td>Sodio en Suero</td>";
            echo "<td>Fecha Sodio en Suero</td>";
            echo "<td>TSH Ultrasensible</td>";
            echo "<td>Fecha TSH Ultrasensible</td>";
            echo "<td>Transferrina</td>";
            echo "<td>Fecha Transferrina</td>";
            echo "<td>Calcio Sangre</td>";
            echo "<td>Fecha Calcio Sangre</td>";
            echo "<td>Acido Urico</td>";
            echo "<td>Fecha Acido Urico</td>";
            echo "<td>Fosfatasa</td>";
            echo "<td>Fecha Fosfatasa</td>";
            echo "<td>Hematocrito</td>";
            echo "<td>Fecha Hematocrito</td>";
            echo "<td>Fecha Uroanalisis</td>";
            echo "<td>Glucosa</td>";
            echo "<td>Fecha Glucosa</td>";
            echo "<td>Creatinuria en orina</td>";
            echo "<td>Fecha Creatinuria en orina</td>";
            echo "<td>Cups</td>";
            echo "<td>BRIGADA</td>";
            echo "<td>ZONA</td>";
            echo "<td>AUXILIAR</td>";
            echo "<td>Contrato</td>";
            echo "<td>AR</td>";
			echo "<td>TIPO DE CONSULTA</td>";
           
            echo "<td>FECHA ACTUAL</td>";
            echo "<td>FECHA FINAL</td>";
			echo "<td>MEDICO</td>";
            echo "<td>APELLIDO</td>";

            echo "<td>Tipo Profesional</td>";
            echo "<td>Codigo Trabajo</td>";

            echo "<td>ID_AUXILIAR</td>";
            echo "<td>AUXILIAR</td>";
			 echo "<td>PROGRAMADO</td>";
            echo "</tr>"; 
            echo "<tbody>";
            foreach ($data as $d) {
                list($anio, $mes, $dia) = explode("-", $d->pacFecNacimiento);
                $anio_dif = date("Y") - $anio;
                $mes_dif = date("m") - $mes;
                $dia_dif = date("d") - $dia;

                if($d->pacSexo == 'M'){
                    $sexo = 'Hombre';
                }else{
                    $sexo = 'Mujer';
                } 

                if ($dia_dif < 0 || $mes_dif < 0) {
                    $anio_dif--;
                            //return $anio_dif;
                }
                echo "<tr>";
                echo "<td>" . $d->pacNombre . "</td>";
                echo "<td>" . $d->pacNombre2 . "</td>";
                echo "<td>" . $d->pacApellido . "</td>";
                echo "<td>" . $d->pacApellido2 . "</td>";
                echo "<td>" . $d->nom_abreviacion . "</td>";
                echo "<td>" . $d->pacDocumento . "</td>";
                echo "<td>" . $d->pacFecNacimiento . "</td>";
                echo "<td>" . $anio_dif ."</td>";
                echo "<td>" . $sexo ."</td>";
                echo "<td>" . $d->pacSexo . "</td>";
                echo "<td>Grupo Etnico</td>";
                echo "<td>Grupo Poblacion</td>";
                echo "<td>Orientacion Sexual</td>";
                echo "<td>Tipos de Discapacidad</td>";
                echo "<td>" . $d->ocuCodigo . "</td>";
                echo "<td>" . $d->escNombre . "</td>";
                echo "<td>" . $d->briNombre . "</td>";
                echo "<td>Codigo DANE Municipio de Residencia</td>";
                echo "<td>" . $d->municipio_residencia . "</td>";
                echo "<td>" . $d->zonNombre . "</td>";
                echo "<td>" . $d->pacDireccion . "</td>";
                echo "<td>" . $d->pacTelefono . "</td>";
                echo "<td>". $d->empCodigo ."</td>";
                echo "<td>" . $d->empNombre . "</td>";
                echo "<td>Fecha de Ingreso al Programa </td>";
                echo "<td>" . $d->hcHipertensionArterialPersonal . "</td>";
                echo "<td>" . $d->citFecha . "</td>";
                echo "<td>" . $d->hcDiabetesMellitusPersonal . "</td>";
                echo "<td>" . $d->citFecha . "</td>";
                echo "<td>" . $d->hcClasificacionDm . "</td>";
                echo "<td>Diagnostico EPOC</td>";
                echo "<td>Fecha Diagnostico EPOC</td>";
                echo "<td>" . $d->hcClasificacionErcEstado . "</td>";
                echo "<td>" . $d->citFecha . "</td>";
                echo "<td>Dx Enfermedad Cardiaca Isquemica</td>";
                echo "<td>Dx Enfermedad Cerebrovascular</td>";
                echo "<td>Dx Enfermedad Arterial Periferica</td>";
                echo "<td>Dx Insuficiencia Cardiaca</td>";
                echo "<td>Dx Retinopatia</td>";
                echo "<td>Dx Aterosclerosis</td>";
                echo "<td>Discapacidad</td>";
                echo "<td>" . $d->hcTabaquismo . "</td>";
                echo "<td>Cocina con Leña</td>";
                echo "<td>" . $d->citFecha . "</td>";
                echo "<td>" . $d->hcPeso . "</td>";
                echo "<td>" . $d->hcTalla . "</td>";
                echo "<td>" . $d->hcIMC . "</td>";
                echo "<td>" . $d->hcPerimetroAbdominal . "</td>";
                echo "<td>" . $d->hcPresionArterialSistolicaSentadoPie . "</td>";
                echo "<td>" . $d->hcPresionArterialDistolicaSentadoPie . "</td>";

                echo "<td>Colesterol Total</td>";
                echo "<td>Fecha Colesterol Total</td>";
                echo "<td>Colesterol HDL</td>";
                echo "<td>Fecha Colesterol HDL</td>";
                echo "<td>Colesterol LDL</td>";
                echo "<td>Fecha Colesterol LDL</td>";
                echo "<td>Trigliceridos</td>";
                echo "<td>Fecha Trigliceridos</td>";
                echo "<td>Hemoglobina Glicosilada</td>";
                echo "<td>Fecha Hemoglobina Glicosilada</td>";
                echo "<td>Creatinina Serica N 1</td>";
                echo "<td>Fecha Creatinina Serica N 1</td>";
                echo "<td>Creatinina Serica N 2</td>";
                echo "<td>Fecha Creatinina Serica N 2</td>";
                echo "<td>Creatinina Serica N 3</td>";
                echo "<td>Fecha Creatinina Serica N 3</td>";
                echo "<td>Albuminuria/Creatinuria N 1</td>";
                echo "<td>Fecha Cociente Albuminuria/Creatinuria N 1</td>";
                echo "<td>Albuminuria/Creatinuria N 2</td>";
                echo "<td>Fecha Cociente Albuminuria/Creatinuria N 2</td>";
                echo "<td>Albuminuria/Creatinuria N 3</td>";
                echo "<td>Fecha Cociente Albuminuria/Creatinuria N 3</td>";
                echo "<td>Uroanalsis</td>";
                echo "<td>Fecha Uroanalisis</td>";
                echo "<td>" . $d->tasa_filtracion_glomerular_gockcroft_gault . "</td>";
                echo "<td>TFG COCKCROFT-GAULT N 2</td>";
                echo "<td>TFG COCKCROFT-GAULT N 3</td>";
                echo "<td>Albuminuria</td>";
                echo "<td>Fecha Albuminuria</td>";
                echo "<td>Estadio ERC</td>";
                echo "<td>Paratohormona (PTH)</td>";
                echo "<td>Fecha PTH</td>";
                echo "<td>Hemoglobina</td>";
                echo "<td>Fecha hemoglobina</td>";
                echo "<td>Albumina Serica</td>";
                echo "<td>Fecha Albumina</td>";
                echo "<td>Fosforo</td>";
                echo "<td>Fecha Fosforo</td>";
                echo "<td>Paciente Recibe IECA</td>";
                echo "<td>Paciente Recibe ARA</td>";
                echo "<td>" . $d->insulina_requiriente . "</td>";
                echo "<td>" . $d->adherente . "</td>";
                echo "<td>" . $d->hcClasificacionRcv . "</td>";
                echo "<td>" . $d->hcClasificacionEstadoMetabolico . "</td>";
				echo "<td>" . $d->tipo_novedad . "</td>";
                echo "<td>Fecha de Muerte</td>";
                echo "<td>Fecha de Observacion</td>";
                echo "<td>" . $d->pacObservacion . "</td>";
                echo "<td>Municipio Atencion</td>";
                echo "<td>" . $d->hcClasificacionErcCategoriaAmbulatoriaPersistente . "</td>";
                echo "<td>CRUCE NOVEDAD 2</td>";
                echo "<td>OBSERVACION</td>";
                echo "<td>Hierro Serico</td>";
                echo "<td>Fecha Hierro Serico</td>";
                echo "<td>BUN</td>";
                echo "<td>Fecha BUN</td>";
                echo "<td>Potasio Serico</td>";
                echo "<td>Fecha Potasio Serico</td>";
                echo "<td>Proteinuria Orina</td>";
                echo "<td>Fecha Proteinuria Orina</td>";
                echo "<td>Sodio en Suero</td>";
                echo "<td>Fecha Sodio en Suero</td>";
                echo "<td>TSH Ultrasensible</td>";
                echo "<td>Fecha TSH Ultrasensible</td>";
                echo "<td>Transferrina</td>";
                echo "<td>Fecha Transferrina</td>";
                echo "<td>Calcio Sangre</td>";
                echo "<td>Fecha Calcio Sangre</td>";
                echo "<td>Acido Urico</td>";
                echo "<td>Fecha Acido Urico</td>";
                echo "<td>Fosfatasa</td>";
                echo "<td>Fecha Fosfatasa</td>";
                echo "<td>Hematocrito</td>";
                echo "<td>Fecha Hematocrito</td>";
                echo "<td>Fecha Uroanalisis</td>";
                echo "<td>Glucosa</td>";
                echo "<td>Fecha Glucosa</td>";
                echo "<td>Creatinuria en orina</td>";
                echo "<td>Fecha Creatinuria en orina</td>";
                echo "<td>" . $d->briNombre . "</td>";   
                echo "<td>" . $d->zonNombre . "</td>";
                echo "<td>" . $d->usu_creo_cita . "</td>";
                echo "<td>" . $d->proceso_idProceso . "</td>";
                echo "<td>AR</td>";
				echo "<td>" . $d->cupNombre . "</td>";



                echo "<td>" . $d->tipo_profesional . "</td>";
                echo "<td>" . $d->codigo_trabajo . "</td>";

             
                echo "<td>" . $d->fecha_actual . "</td>"; 
				echo "<td>" . $d->fecha_final. "</td>";
				echo "<td>Mientras sale</td>";
               echo "<td>Mientras sale</td>";
                echo "<td>" . $d->idauxiliar . "</td>";
                echo "<td>" . $d->idauxiliar . " " . $d->nombreauxiliar . "</td>";	
echo "<td>";

					if ($d->usu_creo_cita == $d->idUsuario) {
						echo $d->usu_creo_cita . " - " . $d->usuNombre . " " . $d->usuApellido;
					} else {
						echo $d->usu_creo_cita . " - No disponible"; // Muestra el ID y un mensaje si no coinciden
					}

				echo "</td>";				
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td>No se encontro ningun procedimiento de facturacion pendiente para este usuario.</td></tr>";
        }

        echo "</table>";

    }

    public function exportar_1() {
        // create file name
        $filename = date('Y-m-d',time()).'.xls';  
    
        $fecha1 = $this->input->post('fecha');
        $fecha2 = $this->input->post('fecha1');
    
        
        $data = $this->MInforme->ver_pac_by_fecha_y_brigada($fecha1, $fecha2);
    
    
     header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=$filename");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    
        echo "<table border=1";
        if (sizeof($data) > 0) {
            echo "<tr >";
            echo "<td>Primer Nombre</td>";
            echo "<td>Segundo Nombre</td>";
            echo "<td>Primer Apellido</td>";
            echo "<td>Segundo Apellido</td>";
            echo "<td>Tipo Documento</td>";
            echo "<td>Numero de Identificacion</td>";
            echo "<td>Fecha de Nacimiento</td>";
             echo "<td>Direccion</td>";
             echo "<td>Edad</td>";
             echo "<td>TALLA</td>";
            
            echo "<td>Sexo</td>";
            echo "<td>Genero</td>";
            echo "<td>Departamento Afiliado</td>";
            echo "<td>Municipio Afiliado</td>";
            echo "<td>Telefono</td>";
            echo "<td>Fecha Solicitud Cita</td>";
            echo "<td>Fecha en que el usuario solicita le sea asignada la cita (fecha deseada)</td>";
            echo "<td>Fecha para la cual se asigna la cita</td>";
            echo "<td>Cups</td>";
            echo "<td>Zona</td>";
            echo "<td>Brigada</td>";
            echo "<td>Departamento IPS</td>";
            echo "<td>NIT</td>";
            echo "<td>Codigo Habilitacion</td>";
            echo "<td>Razon Social de Institución prestadora de servicios</td>";
            echo "<td>Servicio Solicitado</td>";
            echo "<td>Regimen</td>";
        
            echo "<td>Fecha apertura hc</td>";
            echo "<td>Fecha cierre hc</td>";
             
            echo "<td>Medico</td>";
            echo "<td>AUX</td>";
        echo "<td></td>";
        echo "<td>Tipo Profesional</td>";
        echo "<td>Codigo Trabajo</td>";
         
            echo "</tr>"; 
            echo "<tbody>";
            foreach ($data as $d) {
                list($anio, $mes, $dia) = explode("-", $d->pacFecNacimiento);
                $anio_dif = date("Y") - $anio;
                $mes_dif = date("m") - $mes;
                $dia_dif = date("d") - $dia;
    
                if($d->pacSexo == 'M'){
                    $sexo = 'Hombre';
                }else{
                    $sexo = 'Mujer';
                } 
    
                if ($dia_dif < 0 || $mes_dif < 0) {
                    $anio_dif--;
                            //return $anio_dif;
                }
                echo "<tr>";
                echo "<td>" . strtoupper($d->pacNombre) . "</td>";
                echo "<td>" . strtoupper($d->pacNombre2) . "</td>";
                echo "<td>" . strtoupper($d->pacApellido) . "</td>";
                echo "<td>" . strtoupper($d->pacApellido2) . "</td>";
                echo "<td>" . $d->nom_abreviacion . "</td>";
                echo "<td>" . $d->pacDocumento . "</td>";
                echo "<td>" . $d->pacFecNacimiento . "</td>";
                 echo "<td>" . $d->pacDireccion . "</td>";
                echo "<td>" . $anio_dif ."</td>";
                echo "<td>" . str_replace('.', '', $d->hcTalla) . "</td>";
    
                echo "<td>" . $sexo ."</td>";
                echo "<td>" . $d->pacSexo . "</td>";
               
                echo "<td>" . $d->depNombre . "</td>";
                echo "<td>" . $d->munNombre . "</td>";
                echo "<td>" . $d->pacTelefono . "</td>";  
                echo "<td>" . $d->citFecha . "</td>";     
                echo "<td>" . $d->citFechaDeseada . "</td>";  
                echo "<td>" . $d->citFechaInicio . "</td>";
                echo "<td>" . $d->N_cups_ajustado . "</td>";
                echo "<td>" . $d->zonNombre . "</td>";
    
                echo "<td>" . $d->briNombre . "</td>";   
                echo "<td>Cauca</td>";
                echo "<td>900817959</td>";  
                echo "<td>190010882401</td>";
                echo "<td>Fundacion Nacer Para Vivir IPS</td>";
                echo "<td>" . $d->proNombre . "</td>";
                echo "<td>" . $d->regNombre . "</td>";   
      
                echo "<td>" . $d->fecha_actual . "</td>";
                echo "<td>" . $d->fecha_final . "</td>";
                echo "<td>" . $d->usuNombre . " " . $d->usuApellido . "</td>";   
                echo "<td>" . $d->idauxiliar . " " . $d->nombreauxiliar . "</td>";	
                echo "<td> " . $d->usu_creo_cita . " " . $d->usuNombre . " </td>";
                
                echo "<td>" . $d->tipo_profesional . "</td>";
                echo "<td>" . $d->codigo_trabajo . "</td>";
                    
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td>No se encontro ningun procedimiento de facturacion pendiente para este usuario.</td></tr>";
        }
    
        echo "</table>";
    
    }     
//////generar visitas domiciliarias 

public function exportar_2() {
    // create file name
    $filename = date('Y-m-d', time()) . '.xls';

    // Obtener las fechas seleccionadas desde el formulario
    $fecha1 = $this->input->post('fecha');
    $fecha2 = $this->input->post('fecha1');

    $idBrigada = $this->input->post('id_brigada');

    // Obtener los campos seleccionados en el formulario
    $campos_seleccionados = $this->input->post('campos');

    $data = $this->MInforme->ver_pac_by_fecha1($fecha1, $fecha2, $idBrigada);

    header("Pragma: public");
    header("Expires: 0");
    header("Content-type: application/x-msdownload");
    header("Content-Disposition: attachment; filename=$filename");
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

    // Imprimir las cabeceras de las columnas
    echo "<table border=1";
    echo "<tr>";
    foreach ($campos_seleccionados as $campo) {
        echo "<td>" . $campo . "</td>";
    }
    echo "</tr>";
 // Agrega aquí los demás campos con sus respectivos nombres de columna
                    // en la base de datos.
    if (sizeof($data) > 0) {
        foreach ($data as $d) {
            list($anio, $mes, $dia) = explode("-", $d->pacFecNacimiento);
            $anio_dif = date("Y") - $anio;
            $mes_dif = date("m") - $mes;
            $dia_dif = date("d") - $dia;

            if($d->pacSexo == 'M'){
                $sexo = 'Hombre';
            }else{
                $sexo = 'Mujer';
            } 

            if ($dia_dif < 0 || $mes_dif < 0) {
                $anio_dif--;
                        //return $anio_dif;
            } 

            echo "<tr>";
            foreach ($campos_seleccionados as $campo) {
                switch ($campo) {
                    case 'Nombre':
                        echo "<td>" . $d->pacNombre . "</td>";
                        break;
                    case 'Seg Nombre':
                        echo "<td>" . $d->pacNombre2 . "</td>";
                        break;
                    case 'Apellido':
                        echo "<td>" . $d->pacApellido . "</td>";
                        break;
                    case 'Apellido2':
                        echo "<td>" . $d->pacApellido2 . "</td>";
                        break;
                    case 'Tipo Documento':
                        echo "<td>" . $d->nom_abreviacion . "</td>";
                        break;
                    case 'Identificación':
                        echo "<td>" . $d->pacDocumento . "</td>";
                        break;
                    case 'Fecha de nacimiento':
                        echo "<td>". $d->pacFecNacimiento . "</td>";
                        break;
                    case 'Edad':
                         echo "<td>" . $anio_dif . "</td>";
                        break;
                    
                    case 'Genero':
                        echo "<td>" . $d->pacSexo . "</td>";
                        break;
                    case 'Departamento Afiliado':
                        echo "<td>" . $d->depNombre . "</td>";
                        break;
                    case 'Municipio Afiliado':
                        echo "<td>" . $d->munNombre . "</td>";
                        break;
                    case 'Telefóno':
                        echo "<td>" . $d->pacTelefono . "</td>";
                        break;
                    case 'Grupo Etnico':
                        echo "<td>" . $d->razNombre . "</td>";
                        break;
                    case 'Grupo Poblacion':
                        echo "<td>28</td>";
                        break;  
                    case 'Orientacion Sexual':
                        echo "<td>6</td>";
                        break;
                    case 'Tipos de Discapacidad':
                         echo "<td>8</td>";
                        break;
                    case 'Codigo Ocupacion':
                        echo "<td>" . $d->ocuCodigo . "</td>";
                        break;   
                    case 'Escolaridad':
                        echo "<td>" . $d->escNombre . "</td>";
                        break; 
                    case 'Codigo DANE Municipio de Residencia':
                        echo "<td>19130</td>";
                        break;    
                    case 'Descripcion Municipio de Residencia':
                        echo "<td>" . $d->municipio_residencia . "</td>";
                        break;   
                    case 'Direccion de Residencia':
                        echo "<td>" . $d->zonNombre ."</td>";
                        break; 
                    case 'Zona':
                        echo "<td>". $d->zonNombre."</td>";
                        break;
                        case 'Zona':
                            echo "<td>". $d->briNombre."</td>";
                            break;
                        ///hasta aqui llega datos del paciente 
                        ///////////sigue datos historia clinica
                        

                    case 'Peso (kg)':
                        echo "<td>" . $d->hcPeso . "</td>";
                        break;
                    case 'Talla (cms)':
                        echo "<td>" . $d->hcTalla . "</td>";
                        break;
                    case 'IMC':
                        echo "<td>". $d->hcIMC . "</td>";
                        break;
                    case 'Perimetro de Cintura':
                        echo "<td>". $d->hcPerimetroAbdominal . "</td>";
                        break;
                    case 'Presion Arterial Sistolica':
                        echo "<td>". $d->hcPresionArterialSistolicaSentadoPie . "</td>";
                        break;
                        case 'Presion Arterial Diastolica':
                            echo "<td>". $d->hcPresionArterialDistolicaSentadoPie . "</td>";
                            break;

                    case 'Codigo Habilitacion IPS de Atencion':
                        echo "<td>" . $d->empCodigo . "</td>";
                        break;
                    case 'Nombre IPS Atencion':
                        echo "<td>" . $d->empNombre ."</td>";
                        break;
                    case 'Fecha de Ingreso al Programa':
                        echo "<td>Fecha de Ingreso al Programa</td>";
                        break;
                    case 'Diagnostico HTA':
                        echo "<td>" . $d->hcHipertensionArterialPersonal ."</td>";
                        break;
                    case 'Fecha Diagnostico HTA':
                        echo "<td>" . $d->citFecha . "</td>";
                            break;
                    case 'Diagnostico DM':
                        echo "<td>" . $d->hcDiabetesMellitusPersonal .  "</td>";
                        break;
                    case 'Fecha Diagnostico DM':
                        echo "<td>" . $d->citFecha . "</td>";
                        break;
                    case 'Tipo de Diabetes':
                        echo "<td>"  . $d->hcClasificacionDm . "</td>";
                        break;
                    case 'Diagnostico EPOC':
                        echo "<td>Diagnostico EPOC</td>";
                        break;
                    case 'Fecha Diagnostico EPOC':
                        echo "<td>Fecha Diagnostico EPOC</td>";
                        break;

                    case 'Diagnostico ERC':
                        echo "<td>" . $d->hcClasificacionErcEstado . "</td>";
                        break;
                    case 'Fecha Diagnostico ERC':
                        echo "<td>" . $d->citFecha . "</td>";
                        break;
                    case 'Dx Enfermedad Cardiaca Isquemica':
                        echo "<td>Dx Enfermedad Cardiaca Isquemica</td>";
                        break;
                    case 'Dx Enfermedad Cerebrovascular':
                        echo "<td>Dx Enfermedad Cerebrovascular</td>";
                        break;
                    case 'Dx Enfermedad Arterial Periferica':
                        echo "<td>Dx Enfermedad Arterial Periferica</td>";
                        break;
                    case 'Dx Insuficiencia Cardiaca':
                        echo "<td>Dx Insuficiencia Cardiaca</td>";
                        break;
                    case 'Dx Retinopatia':
                        echo "<td>Dx Retinopatia</td>";
                        break;
                    case 'Dx Aterosclerosis':
                        echo "<td>Dx Aterosclerosis</td>";
                        break;
                    case 'Discapacidad':
                        echo "<td>Discapacidad</td>";
                        break;
                    case 'Habito Tabaquico':
                        echo "<td>" . $d->hcTabaquismo . "</td>";
                        break;
                    case 'Cocina con Leña':
                        echo "<td>Cocina con Leña</td>";
                         break;
                    case 'Fecha de Control':
                        echo "<td>" . $d->citFecha . "</td>";
                        break;
///////////////comienzo los datos paraclinicos
                    case 'colesterol_total':
                        echo "<td>" . $d->colesterol_total . "</td>";
                        break;
                    case 'colesterol_hdl':
                        echo "<td>" . $d->colesterol_hdl . "</td>";
                        break;
                    case 'trigliceridos':
                        echo "<td>" . $d->trigliceridos . "</td>";
                        break;
                     case 'colesterol_ldl':
                        echo "<td>" . $d->colesterol_ldl . "</td>";
                         break;
                    case 'hemoglobina':
                        echo "<td>" . $d->hemoglobina . "</td>";
                         break;
                    case 'hematocrocito':
                         echo "<td>" . $d->hematocrocito . "</td>";
                         break;
                    case 'plaquetas':
                        echo "<td>" . $d->plaquetas . "</td>";
                        break;
                    case 'hemoglobina_glicosilada':
                        echo "<td>" . $d->hemoglobina_glicosilada . "</td>";
                        break;
                    case 'glicemia_basal':
                        echo "<td>" . $d->glicemia_basal . "</td>";
                        break;
                    case 'glicemia_post':
                        echo "<td>" . $d->glicemia_post . "</td>";
                        break;
                    case 'creatinina':
                        echo "<td>" . $d->creatinina . "</td>";
                        break;
                    case 'creatinuria':
                        echo "<td>" . $d->creatinuria . "</td>";
                        break;
                    case 'microalbuminuria':
                        echo "<td>" . $d->microalbuminuria . "</td>";
                        break;
                    case 'albumina':
                        echo "<td>" . $d->albumina . "</td>";
                        break;
                    case 'relacion_albuminuria_creatinuria':
                        echo "<td>" . $d->relacion_albuminuria_creatinuria . "</td>";
                        break;
                    case 'parcial_orina':
                        echo "<td>" . $d->parcial_orina . "</td>";
                        break;
                    case 'depuracion_creatinina':
                        echo "<td>" . $d->depuracion_creatinina . "</td>";
                        break;
                    case 'creatinina_orina_24':
                        echo "<td>" . $d->creatinina_orina_24 . "</td>";
                        break;
                    case 'proteina_orina_24':
                        echo "<td>" . $d->proteina_orina_24 . "</td>";
                        break;
                    case 'hormona_estimulante_tiroides':
                        echo "<td>" . $d->hormona_estimulante_tiroides . "</td>";
                        break;
                    case 'hormona_paratiroidea':
                        echo "<td>" . $d->hormona_paratiroidea . "</td>";
                        break;
                    case 'albumina_suero':
                        echo "<td>" . $d->albumina_suero . "</td>";
                        break;
                    case 'fosforo_suero':
                        echo "<td>" . $d->fosforo_suero . "</td>";
                        break;
                    case 'nitrogeno_ureico':
                        echo "<td>" . $d->nitrogeno_ureico . "</td>";
                        break;
                    case 'acido_urico_suero':
                        echo "<td>" . $d->acido_urico_suero . "</td>";
                        break;
                    case 'calcio':
                        echo "<td>" . $d->calcio . "</td>";
                        break;
                    case 'sodio_suero':
                        echo "<td>" . $d->sodio_suero . "</td>";
                        break;
                    case 'potasio_suero':
                        echo "<td>" . $d->potasio_suero . "</td>";
                        break;
                    case 'hierro_total':
                        echo "<td>" . $d->hierro_total . "</td>";
                        break;
                    case 'ferritina':
                        echo "<td>" . $d->ferritina . "</td>";
                        break;
                    case 'transferrina':
                        echo "<td>" . $d->transferrina . "</td>";
                        break;
                    case 'fosfatasa_alcalina':
                        echo "<td>" . $d->fosfatasa_alcalina . "</td>";
                        break;
                    case 'acido_folico_suero':
                        echo "<td>" . $d->acido_folico_suero . "</td>";
                        break;
                    case 'vitamina_b12':
                        echo "<td>" . $d->vitamina_b12 . "</td>";
                        break;
                    case 'nitrogeno_ureico_orina_24':
                        echo "<td>" . $d->nitrogeno_ureico_orina_24 . "</td>";
                        break;
            
        /////////////// sigue datos de calidad
                    case 'Fecha Solicitud Cita':
                        echo "<td>" . $d->citFecha . "</td>";
                        break;
                    case 'Fecha en que el usuario le asigna la cita':
                        echo "<td>" . $d->citFechaDeseada . "</td>";
                        break;
                    case 'Fecha Que se le asigna la cita':
                        echo "<td>" . $d->citFechaInicio . "</td>";
                        break;
                    case 'Departamento IPS':
                        echo "<td> Cauca </td>";
                        break;
                    case 'NIT':
                        echo "<td>900817959</td>";
                        break;
                    case 'Codigo Habilitacion':
                        echo "<td>190010882401</td>";
                        break;
                    case 'Razon Social de Institución prestadora de servicios':
                        echo "<td>Fundacion Nacer Para Vivir IPS</td>";
                        break;
                    case 'Servicio Solicitado':
                        echo "<td>". $d->proNombre ."</td>";
                        break;
                    case 'Regimen':
                        echo "<td>". $d->regNombre ."</td>";
                        break;
                    case 'Cups': 
                        echo "<td>" . $d->N_cups_ajustado . "</td>";
                        break;
                  

                    case 'Inicio de cita':
                        echo "<td>". $d->fecha_actual ."</td>";
                        break;
                    case 'Finalización Cita':
                        echo "<td>". $d->fecha_final."</td>";
                        break;
                    case 'Medico':
                        echo "<td>". $d->usuNombre ." " . $d->usuApellido . "</td>";
                        break;
                    case 'Auxiliar':
                        echo "<td>". $d->nombreauxiliar . "</td>";
                        break;
                    case 'Tipo Profesional':
                        echo "<td>" . $d->tipo_profesional . "</td>";
                        break;
                    case 'Codigo Trabajo':
                        echo "<td>" . $d->codigo_trabajo . "</td>";
                        break;
                                                                                            
                }
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . sizeof($campos_seleccionados) . "'>No se encontraron datos para las fechas seleccionadas.</td></tr>";
    }

    echo "</table>";
}
public function exportar3() {
    $filename = 'informe_facturacion_' . date('Y-m-d') . '.xls';

    $fecha1 = $this->input->post('fecha');
    $fecha2 = $this->input->post('fecha1');

    $data = $this->MInforme->informe_facturacion($fecha1, $fecha2);

    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=$filename");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "<table border='1'>";
    echo "<tr style='background-color:#f2f2f2; font-weight:bold;'>";
    echo "<th>Tipo Documento</th>";
    echo "<th>Documento</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Fecha</th>";
    echo "<th>CUPS</th>";
    echo "<th>Nombre del CUPS / Examen</th>";
    echo "<th>Estado Factura</th>";
     echo "<th>Profesional</th>";
    echo "</tr>";

    if (!empty($data)) {
        foreach ($data as $d) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($d->tipo_documento ?? 'N/A') . "</td>";
            echo "<td>" . htmlspecialchars($d->documento ?? 'N/A') . "</td>";
            echo "<td>" . strtoupper(htmlspecialchars($d->nombre ?? '')) . "</td>";
            echo "<td>" . strtoupper(htmlspecialchars($d->apellido ?? '')) . "</td>";
            echo "<td>" . htmlspecialchars($d->fecha ?? '') . "</td>";
            echo "<td>" . htmlspecialchars($d->cups ?? 'N/A') . "</td>";
            echo "<td>" . htmlspecialchars($d->nombre_cups ?? 'N/A') . "</td>";
            echo "<td>" . htmlspecialchars($d->estado_factura ?? 'N/A') . "</td>";
            echo "<td>" . htmlspecialchars(($d->usuNombre ?? 'N/A') . ' ' . ($d->usuApellido ?? 'N/A')) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No se encontraron registros para el rango de fechas seleccionado.</td></tr>";
    }

    echo "</table>";
}


/* public function Exportar_json() {
    $fecha1 = $this->input->post('fecha');
    $fecha2 = $this->input->post('fecha1');
    
    $data = $this->MInforme->informe_json_rips($fecha1, $fecha2);
    
    // Agrupar datos por paciente
    $pacientes_agrupados = [];
    foreach ($data as $registro) {
        $documento = $registro->documento;
        if (!isset($pacientes_agrupados[$documento])) {
            $pacientes_agrupados[$documento] = [
                'info_paciente' => $registro,
                'servicios' => [
                    'facturado' => [],
                    'no_facturado' => [],
                    'laboratorio_sin_cita' => []
                ]
            ];
        }
        
        // Clasificar servicios por estado
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
        }
    }
    
    // Construir estructura JSON RIPS
    $json_structure = [
        "numDocumentoIdObligado" => "900817959",
        "numFactura" => null ,
        "tipoNota" => "RS",
        "numNota" => "PGP",
        "usuarios" => []
    ];
    //paraunificar con el consecutivo
    
    $consecutivo_global = 1684;
    
    foreach ($pacientes_agrupados as $documento => $paciente_data) {
        $info_paciente = $paciente_data['info_paciente'];
        
        // Verificar que el documento no esté vacío
        if (empty($documento) || $documento == null) {
            continue; // Saltar este paciente si no tiene documento
        }
        
        // Obtener información adicional del paciente (fecha nacimiento, sexo, etc.)
        $info_adicional = $this->obtener_info_adicional_paciente($documento);
        
        $usuario = [
            "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
            "numDocumentoIdentificacion" => "$documento",
            "tipoUsuario" => "02",
            "fechaNacimiento" => $info_adicional->fecha_nacimiento ?? "1980-01-01",
            "codSexo" => $info_adicional->sexo ?? "M",
            "codPaisResidencia" => "170",
            "codMunicipioResidencia" => "19130",
            "codZonaTerritorialResidencia" => "01",
            "incapacidad" => "NO",
            "codPaisOrigen" => "170",
            "consecutivo" => $consecutivo_global++,
            "servicios" => []
        ];
        
        $consecutivo_servicio = 1;
        $consultas_agregadas = []; // Array para controlar consultas duplicadas
        $tiene_servicios = false; // Flag para verificar si tiene servicios
        
        // Arrays temporales para consultas y procedimientos
        $consultas_temp = [];
        $procedimientos_temp = [];
        
        // Procesar servicios facturados
        foreach ($paciente_data['servicios']['facturado'] as $servicio) {
            if ($this->es_consulta($servicio->cups)) {
                // Verificar si ya se agregó esta consulta
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
                        "numDocumentoIdentificacion" => "$documento",
                        "numFEVPagoModerador" => "",
                        "tipoDiagnosticoPrincipal" => "03",
                        "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
                        "conceptoRecaudo" => "05",
                        "valorPagoModerador" => 0,
                        "vrServicio" => 0
                    ];
                    $consultas_agregadas[] = $servicio->cups; // Marcar como agregada
                    $tiene_servicios = true;
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
                    "numDocumentoIdentificacion" => "$documento",
                    "codDiagnosticoPrincipal" => "I10X",
                    "codDiagnosticoRelacionado" => null,
                    "codComplicacion" => null,
                    "vrServicio" => 0,
                    "conceptoRecaudo" => "05",
                    "valorPagoModerador" => 0,
                    "numFEVPagoModerador" => "FACP522",
                    "consecutivo" => $consecutivo_servicio++
                ];
                $tiene_servicios = true;
            }
        }
        
        // Procesar servicios no facturados
        foreach ($paciente_data['servicios']['no_facturado'] as $servicio) {
            if ($this->es_consulta($servicio->cups)) {
                // Verificar si ya se agregó esta consulta
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
                        "numDocumentoIdentificacion" => "$documento",
                        "numFEVPagoModerador" => "",
                        "tipoDiagnosticoPrincipal" => "03",
                        "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
                        "conceptoRecaudo" => "05",
                        "valorPagoModerador" => 0,
                        "vrServicio" => 0
                    ];
                    $consultas_agregadas[] = $servicio->cups; // Marcar como agregada
                    $tiene_servicios = true;
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
                    "numDocumentoIdentificacion" => "$documento",
                    "codDiagnosticoPrincipal" => "I10X",
                    "codDiagnosticoRelacionado" => null,
                    "codComplicacion" => null,
                    "vrServicio" => 0,
                    "conceptoRecaudo" => "05",
                    "valorPagoModerador" => 0,
                    "numFEVPagoModerador" => "FACP522",
                    "consecutivo" => $consecutivo_servicio++
                ];
                $tiene_servicios = true;
            }
        }
        
        // Procesar laboratorios sin cita
        foreach ($paciente_data['servicios']['laboratorio_sin_cita'] as $servicio) {
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
                "numDocumentoIdentificacion" => "$documento",
                "codDiagnosticoPrincipal" => "I10X",
                "codDiagnosticoRelacionado" => null,
                "codComplicacion" => null,
                "vrServicio" => 0,
                "conceptoRecaudo" => "05",
                "valorPagoModerador" => 0,
                "numFEVPagoModerador" => "FACP522",
                "consecutivo" => $consecutivo_servicio++
            ];
            $tiene_servicios = true;
        }
        
        // Solo agregar el usuario si tiene servicios
        if ($tiene_servicios) {
            // Solo agregar consultas si existen
            if (!empty($consultas_temp)) {
                $usuario["servicios"]["consultas"] = $consultas_temp;
            }
            
            // Solo agregar procedimientos si existen
            if (!empty($procedimientos_temp)) {
                $usuario["servicios"]["procedimientos"] = $procedimientos_temp;
            }
            
            $json_structure["usuarios"][] = $usuario;
        }
    }
    
    // Enviar respuesta JSON
    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="rips_' . date('Y-m-d_H-i-s') . '.json"');
    echo json_encode($json_structure, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} */
// public function Exportar_json() {
//     $fecha1 = $this->input->post('fecha');
//     $fecha2 = $this->input->post('fecha1');
    
//     $data = $this->MInforme->informe_json_rips($fecha1, $fecha2);
    
//     // Agrupar datos por paciente
//     $pacientes_agrupados = [];
//     foreach ($data as $registro) {
//         $documento = trim($registro->documento); // ✅ TRIM para eliminar espacios
//         if (!isset($pacientes_agrupados[$documento])) {
//             $pacientes_agrupados[$documento] = [
//                 'info_paciente' => $registro,
//                 'servicios' => [
//                     'facturado' => [],
//                     'no_facturado' => [],
//                     'laboratorio_sin_cita' => []
//                 ]
//             ];
//         }
        
//         // Clasificar servicios por estado
//         switch ($registro->estado_factura) {
//             case 'Facturado':
//             case 'Finalizado':
//                 $pacientes_agrupados[$documento]['servicios']['facturado'][] = $registro;
//                 break;
//             case 'No facturado':
//                 $pacientes_agrupados[$documento]['servicios']['no_facturado'][] = $registro;
//                 break;
//             case 'Laboratorio sin cita':
//                 $pacientes_agrupados[$documento]['servicios']['laboratorio_sin_cita'][] = $registro;
//                 break;
//         }
//     }
    
//     // Construir estructura JSON RIPS
//     $json_structure = [
//         "numDocumentoIdObligado" => "900817959",
//         "numFactura" => null,
//         "tipoNota" => "RS",
//         "numNota" => "PGP",
//         "usuarios" => []
//     ];
    
//     // ✅ SOLUCIÓN: Inicializar consecutivo solo UNA VEZ
//     $consecutivo_global = 1524;
    
//     foreach ($pacientes_agrupados as $documento => $paciente_data) {
//         $info_paciente = $paciente_data['info_paciente'];
        
//         // Verificar que el documento no esté vacío
//         if (empty($documento) || $documento == null) {
//             continue; // Saltar este paciente si no tiene documento
//         }
        
//         // Obtener información adicional del paciente
//         $info_adicional = $this->obtener_info_adicional_paciente($documento);
        
//         $usuario = [
//             "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
//             "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí también
//             "tipoUsuario" => "02",
//             "fechaNacimiento" => $info_adicional->fecha_nacimiento ?? "1980-01-01",
//             "codSexo" => $info_adicional->sexo ?? "M",
//             "codPaisResidencia" => "170",
//             "codMunicipioResidencia" => "19130",
//             "codZonaTerritorialResidencia" => "01",
//             "incapacidad" => "NO",
//             "codPaisOrigen" => "170",
//             "consecutivo" => $consecutivo_global, // ✅ Asignar ANTES de incrementar
//             "servicios" => []
//         ];
        
//         $consecutivo_servicio = 1;
//         $consultas_agregadas = [];
//         $tiene_servicios = false;
        
//         // Arrays temporales para consultas y procedimientos
//         $consultas_temp = [];
//         $procedimientos_temp = [];
        
//         // Procesar servicios facturados
//         foreach ($paciente_data['servicios']['facturado'] as $servicio) {
//             if ($this->es_consulta($servicio->cups)) {
//                 if (!in_array($servicio->cups, $consultas_agregadas)) {
//                     $consultas_temp[] = [
//                         "causaMotivoAtencion" => "38",
//                         "codConsulta" => $servicio->cups,
//                         "codDiagnosticoPrincipal" => "I10X",
//                         "codDiagnosticoRelacionado1" => "E660",
//                         "codDiagnosticoRelacionado2" => null,
//                         "codDiagnosticoRelacionado3" => null,
//                         "codPrestador" => "191300882403",
//                         "codServicio" => 325,
//                         "consecutivo" => $consecutivo_servicio++,
//                         "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
//                         "finalidadTecnologiaSalud" => "44",
//                         "grupoServicios" => "01",
//                         "modalidadGrupoServicioTecSal" => "01",
//                         "numAutorizacion" => "",
//                         "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
//                         "numFEVPagoModerador" => "",
//                         "tipoDiagnosticoPrincipal" => "03",
//                         "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
//                         "conceptoRecaudo" => "05",
//                         "valorPagoModerador" => 0,
//                         "vrServicio" => 0
//                     ];
//                     $consultas_agregadas[] = $servicio->cups;
//                     $tiene_servicios = true;
//                 }
//             } else {
//                 $procedimientos_temp[] = [
//                     "codPrestador" => "191300882403",
//                     "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
//                     "idMIPRES" => null,
//                     "numAutorizacion" => "",
//                     "codProcedimiento" => $servicio->cups,
//                     "viaIngresoServicioSalud" => "02",
//                     "modalidadGrupoServicioTecSal" => "01",
//                     "grupoServicios" => "01",
//                     "codServicio" => 325,
//                     "finalidadTecnologiaSalud" => "44",
//                     "tipoDocumentoIdentificacion" => "CC",
//                     "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
//                     "codDiagnosticoPrincipal" => "I10X",
//                     "codDiagnosticoRelacionado" => null,
//                     "codComplicacion" => null,
//                     "vrServicio" => 0,
//                     "conceptoRecaudo" => "05",
//                     "valorPagoModerador" => 0,
//                     "numFEVPagoModerador" => "FACP522",
//                     "consecutivo" => $consecutivo_servicio++
//                 ];
//                 $tiene_servicios = true;
//             }
//         }
        
//         // Procesar servicios no facturados
//         foreach ($paciente_data['servicios']['no_facturado'] as $servicio) {
//             if ($this->es_consulta($servicio->cups)) {
//                 if (!in_array($servicio->cups, $consultas_agregadas)) {
//                     $consultas_temp[] = [
//                         "causaMotivoAtencion" => "38",
//                         "codConsulta" => $servicio->cups,
//                         "codDiagnosticoPrincipal" => "I10X",
//                         "codDiagnosticoRelacionado1" => "E660",
//                         "codDiagnosticoRelacionado2" => null,
//                         "codDiagnosticoRelacionado3" => null,
//                         "codPrestador" => "191300882403",
//                         "codServicio" => 325,
//                         "consecutivo" => $consecutivo_servicio++,
//                         "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
//                         "finalidadTecnologiaSalud" => "44",
//                         "grupoServicios" => "01",
//                         "modalidadGrupoServicioTecSal" => "01",
//                         "numAutorizacion" => "",
//                         "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
//                         "numFEVPagoModerador" => "",
//                         "tipoDiagnosticoPrincipal" => "03",
//                         "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
//                         "conceptoRecaudo" => "05",
//                         "valorPagoModerador" => 0,
//                         "vrServicio" => 0
//                     ];
//                     $consultas_agregadas[] = $servicio->cups;
//                     $tiene_servicios = true;
//                 }
//             } else {
//                 $procedimientos_temp[] = [
//                     "codPrestador" => "191300882403",
//                     "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
//                     "idMIPRES" => null,
//                     "numAutorizacion" => "",
//                     "codProcedimiento" => $servicio->cups,
//                     "viaIngresoServicioSalud" => "02",
//                     "modalidadGrupoServicioTecSal" => "01",
//                     "grupoServicios" => "01",
//                     "codServicio" => 325,
//                     "finalidadTecnologiaSalud" => "44",
//                     "tipoDocumentoIdentificacion" => "CC",
//                     "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
//                     "codDiagnosticoPrincipal" => "I10X",
//                     "codDiagnosticoRelacionado" => null,
//                     "codComplicacion" => null,
//                     "vrServicio" => 0,
//                     "conceptoRecaudo" => "05",
//                     "valorPagoModerador" => 0,
//                     "numFEVPagoModerador" => "FACP522",
//                     "consecutivo" => $consecutivo_servicio++
//                 ];
//                 $tiene_servicios = true;
//             }
//         }
        
//         // Procesar laboratorios sin cita
//         foreach ($paciente_data['servicios']['laboratorio_sin_cita'] as $servicio) {
//             $procedimientos_temp[] = [
//                 "codPrestador" => "191300882403",
//                 "fechaInicioAtencion" => $this->formatear_fecha_hora($servicio->fecha),
//                 "idMIPRES" => null,
//                 "numAutorizacion" => "",
//                 "codProcedimiento" => $servicio->cups,
//                 "viaIngresoServicioSalud" => "02",
//                 "modalidadGrupoServicioTecSal" => "01",
//                 "grupoServicios" => "01",
//                 "codServicio" => 325,
//                 "finalidadTecnologiaSalud" => "44",
//                 "tipoDocumentoIdentificacion" => "CC",
//                 "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
//                 "codDiagnosticoPrincipal" => "I10X",
//                 "codDiagnosticoRelacionado" => null,
//                 "codComplicacion" => null,
//                 "vrServicio" => 0,
//                 "conceptoRecaudo" => "05",
//                 "valorPagoModerador" => 0,
//                 "numFEVPagoModerador" => "FACP522",
//                 "consecutivo" => $consecutivo_servicio++
//             ];
//             $tiene_servicios = true;
//         }
        
//         // Solo agregar el usuario si tiene servicios
//         if ($tiene_servicios) {
//             // Solo agregar consultas si existen
//             if (!empty($consultas_temp)) {
//                 $usuario["servicios"]["consultas"] = $consultas_temp;
//             }
            
//             // Solo agregar procedimientos si existen
//             if (!empty($procedimientos_temp)) {
//                 $usuario["servicios"]["procedimientos"] = $procedimientos_temp;
//             }
            
//             $json_structure["usuarios"][] = $usuario;
//             $consecutivo_global++; // ✅ INCREMENTAR SOLO cuando se agrega un usuario válido
//         }
//     }
    
//     // Enviar respuesta JSON
//     header('Content-Type: application/json; charset=utf-8');
//     header('Content-Disposition: attachment; filename="rips_' . date('Y-m-d_H-i-s') . '.json"');
//     echo json_encode($json_structure, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// }


// private function formatear_fecha_hora($fecha) {
//     if (empty($fecha)) {
//         return date('Y-m-d') . ' 00:00';
//     }
    
//     $timestamp = strtotime($fecha);
//     if ($timestamp === false) {
//         return date('Y-m-d') . ' 00:00';
//     }
    
//     // Verificar si la fecha original tiene información de hora
//     $fecha_original = date('H:i:s', $timestamp);
//     if ($fecha_original == '00:00:00') {
//         return date('Y-m-d', $timestamp) . ' 00:00';
//     }
    
//     return date('Y-m-d H:i', $timestamp);
// }

// private function obtener_info_adicional_paciente($documento) {
//     return $this->db->query("
//         SELECT 
//             pacFecNacimiento as fecha_nacimiento,
//             pacSexo as sexo
//         FROM paciente 
//         WHERE pacDocumento = ?
//     ", [$documento])->row();
// }

// private function es_consulta($cups_code) {
//     // Definir rangos de códigos que corresponden a consultas
//     $consulta_ranges = ['890', '891', '892', '893'];
//     $codigo_str = (string)$cups_code;
    
//     foreach ($consulta_ranges as $range) {
//         if (strpos($codigo_str, $range) === 0) {
//             return true;
//         }
//     }
//     return false;
// }

 /**
     * ✅ FUNCIÓN PRINCIPAL COMPLETA - EXPORTAR JSON RIPS CON VISITAS DOMICILIARIAS
     */
    public function Exportar_json() {
        $fecha1 = $this->input->post('fecha');
        $fecha2 = $this->input->post('fecha1');
        $sede_id = $this->input->post('sede_id'); // Nuevo parámetro para filtrar por sede
        
        // 1. Obtener datos locales (historia clínica)
        $data = $this->MInforme->informe_json_rips($fecha1, $fecha2);
        
        // 2. Obtener visitas domiciliarias de la API
        $visitas_domiciliarias = $this->obtener_visitas_api($fecha1, $fecha2, $sede_id);
        
        // 3. Combinar datos locales con visitas de la API
        $data_combinada = $this->combinar_datos_con_visitas($data, $visitas_domiciliarias);
        
        // Agrupar datos por paciente
        $pacientes_agrupados = [];
        foreach ($data_combinada as $registro) {
            $documento = trim($registro->documento); // ✅ TRIM para eliminar espacios
            if (!isset($pacientes_agrupados[$documento])) {
                $pacientes_agrupados[$documento] = [
                    'info_paciente' => $registro,
                    'servicios' => [
                        'facturado' => [],
                        'no_facturado' => [],
                        'laboratorio_sin_cita' => [],
                        'visita_domiciliaria' => [] // ✅ NUEVO TIPO DE SERVICIO
                    ]
                ];
            }
            
            // Clasificar servicios por estado
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
                case 'Visita domiciliaria': // ✅ NUEVO CASO
                    $pacientes_agrupados[$documento]['servicios']['visita_domiciliaria'][] = $registro;
                    break;
            }
        }
        
        // Construir estructura JSON RIPS
        $json_structure = [
            "numDocumentoIdObligado" => "900817959",
            "numFactura" => null,
            "tipoNota" => "RS",
            "numNota" => "PGP",
            "usuarios" => []
        ];
        
        // ✅ SOLUCIÓN: Inicializar consecutivo solo UNA VEZ
        $consecutivo_global = 1524;
        
        foreach ($pacientes_agrupados as $documento => $paciente_data) {
            $info_paciente = $paciente_data['info_paciente'];
            
            // Verificar que el documento no esté vacío
            if (empty($documento) || $documento == null) {
                continue; // Saltar este paciente si no tiene documento
            }
            
            // Obtener información adicional del paciente
            $info_adicional = $this->obtener_info_adicional_paciente($documento);
            
            $usuario = [
                "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
                "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí también
                "tipoUsuario" => "02",
                "fechaNacimiento" => $info_adicional->fecha_nacimiento ?? "1980-01-01",
                "codSexo" => $info_adicional->sexo ?? "M",
                "codPaisResidencia" => "170",
                "codMunicipioResidencia" => "19130",
                "codZonaTerritorialResidencia" => "01",
                "incapacidad" => "NO",
                "codPaisOrigen" => "170",
                "consecutivo" => $consecutivo_global, // ✅ Asignar ANTES de incrementar
                "servicios" => []
            ];
            
            $consecutivo_servicio = 1;
            $consultas_agregadas = [];
            $tiene_servicios = false;
            
            // Arrays temporales para consultas y procedimientos
            $consultas_temp = [];
            $procedimientos_temp = [];
            
            // ✅ PROCESAR TODOS LOS TIPOS DE SERVICIOS INCLUYENDO VISITAS DOMICILIARIAS
            $todos_servicios = array_merge(
                $paciente_data['servicios']['facturado'],
                $paciente_data['servicios']['no_facturado'],
                $paciente_data['servicios']['laboratorio_sin_cita'],
                $paciente_data['servicios']['visita_domiciliaria'] // ✅ INCLUIR VISITAS
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
                            "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
                            "numFEVPagoModerador" => "",
                            "tipoDiagnosticoPrincipal" => "03",
                            "tipoDocumentoIdentificacion" => $info_paciente->tipo_documento ?? "CC",
                            "conceptoRecaudo" => "05",
                            "valorPagoModerador" => 0,
                            "vrServicio" => 0
                        ];
                        $consultas_agregadas[] = $servicio->cups;
                        $tiene_servicios = true;
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
                        "numDocumentoIdentificacion" => trim($documento), // ✅ TRIM aquí
                        "codDiagnosticoPrincipal" => "I10X",
                        "codDiagnosticoRelacionado" => null,
                        "codComplicacion" => null,
                        "vrServicio" => 0,
                        "conceptoRecaudo" => "05",
                        "valorPagoModerador" => 0,
                        "numFEVPagoModerador" => "FACP522",
                        "consecutivo" => $consecutivo_servicio++
                    ];
                    $tiene_servicios = true;
                }
            }
            
            // Solo agregar el usuario si tiene servicios
            if ($tiene_servicios) {
                // Solo agregar consultas si existen
                if (!empty($consultas_temp)) {
                    $usuario["servicios"]["consultas"] = $consultas_temp;
                }
                
                // Solo agregar procedimientos si existen
                if (!empty($procedimientos_temp)) {
                    $usuario["servicios"]["procedimientos"] = $procedimientos_temp;
                }
                
                $json_structure["usuarios"][] = $usuario;
                $consecutivo_global++; // ✅ INCREMENTAR SOLO cuando se agrega un usuario válido
            }
        }
        
        // Enviar respuesta JSON
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename="rips_' . date('Y-m-d_H-i-s') . '.json"');
        echo json_encode($json_structure, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * ✅ OBTENER VISITAS DOMICILIARIAS DE LA API EXTERNA
     */
    private function obtener_visitas_api($fecha1, $fecha2, $sede_id = null) {
        $api_url = 'http://fnpvi.nacerparavivir.org/api/visitas';
        $token = 'TU_TOKEN_SANCTUM_AQUI'; // ✅ REEMPLAZAR CON TU TOKEN REAL
        
        // Construir parámetros de filtro
        $params = [];
        if ($fecha1) $params['fecha_desde'] = $fecha1;
        if ($fecha2) $params['fecha_hasta'] = $fecha2;
        if ($sede_id) $params['sede_id'] = $sede_id;
        
        $query_string = !empty($params) ? '?' . http_build_query($params) : '';
        $full_url = $api_url . $query_string;
        
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);
        
        if ($curl_error) {
            log_message('error', 'Error cURL API visitas: ' . $curl_error);
            return [];
        }
        
        if ($http_code !== 200) {
            log_message('error', 'Error HTTP API visitas: ' . $http_code . ' - ' . $response);
            return [];
        }
        
        $data = json_decode($response, true);
        
        if (!$data) {
            log_message('error', 'Respuesta inválida de API visitas: ' . $response);
            return [];
        }
        
        // ✅ MANEJAR DIFERENTES ESTRUCTURAS DE RESPUESTA
        if (isset($data['data'])) {
            $visitas = $data['data'];
        } elseif (is_array($data)) {
            $visitas = $data;
        } else {
            log_message('error', 'Estructura de respuesta no reconocida: ' . json_encode($data));
            return [];
        }
        
        log_message('info', 'Visitas obtenidas de API: ' . count($visitas));
        return $visitas;
    }

    /**
     * ✅ COMBINAR DATOS LOCALES CON VISITAS DE LA API
     */
    private function combinar_datos_con_visitas($data_local, $visitas_api) {
        $data_combinada = $data_local;
        
        foreach ($visitas_api as $visita) {
            // Verificar que la visita tenga los datos necesarios
            if (!isset($visita['identificacion']) || empty($visita['identificacion'])) {
                continue;
            }
            
            // ✅ OBTENER TIPO DE DOCUMENTO DE LA API O USAR CC POR DEFECTO
            $tipo_documento = 'CC'; // Por defecto
            if (isset($visita['tipo_documento']) && !empty($visita['tipo_documento'])) {
                $tipo_documento = $visita['tipo_documento'];
            }
            
            // ✅ CREAR OBJETO SIMULANDO ESTRUCTURA DE DATOS LOCAL
            $registro_visita = (object) [
                'documento' => trim($visita['identificacion']),
                'tipo_documento' => $tipo_documento,
                'cups' => '890105', // ✅ CUPS PARA VISITA DOMICILIARIA
                'fecha' => $visita['fecha'] ?? date('Y-m-d'),
                'estado_factura' => 'Visita domiciliaria', // ✅ NUEVO ESTADO
                'nombre' => $visita['nombre_apellido'] ?? '',
                'telefono' => $visita['telefono'] ?? '',
                'zona' => $visita['zona'] ?? '',
                // Agregar más campos según necesidad
                'peso' => $visita['peso'] ?? null,
                'talla' => $visita['talla'] ?? null,
                'tension_arterial' => $visita['tension_arterial'] ?? null,
                'glucometria' => $visita['glucometria'] ?? null,
            ];
            
            $data_combinada[] = $registro_visita;
        }
        
        return $data_combinada;
    }

    /**
     * ✅ FORMATEAR FECHA Y HORA
     */
    private function formatear_fecha_hora($fecha) {
        if (empty($fecha)) {
            return date('Y-m-d') . ' 00:00';
        }
        
        $timestamp = strtotime($fecha);
        if ($timestamp === false) {
            return date('Y-m-d') . ' 00:00';
        }
        
        // Verificar si la fecha original tiene información de hora
        $fecha_original = date('H:i:s', $timestamp);
        if ($fecha_original == '00:00:00') {
            return date('Y-m-d', $timestamp) . ' 00:00';
        }
        
        return date('Y-m-d H:i', $timestamp);
    }

    /**
     * ✅ OBTENER INFORMACIÓN ADICIONAL DEL PACIENTE
     */
    private function obtener_info_adicional_paciente($documento) {
        $query = $this->db->query("
            SELECT 
                pacFecNacimiento as fecha_nacimiento,
                pacSexo as sexo
            FROM paciente 
            WHERE pacDocumento = ?
        ", [$documento]);
        
        $result = $query->row();
        
        // ✅ RETORNAR OBJETO VACÍO SI NO SE ENCUENTRA EL PACIENTE
        if (!$result) {
            return (object) [
                'fecha_nacimiento' => '1980-01-01',
                'sexo' => 'M'
            ];
        }
        
        return $result;
    }

    /**
     * ✅ VERIFICAR SI UN CÓDIGO CUPS ES UNA CONSULTA (INCLUYE VISITAS DOMICILIARIAS)
     */
    private function es_consulta($cups_code) {
        // ✅ INCLUIR RANGO 890 PARA VISITAS DOMICILIARIAS
        $consulta_ranges = ['890', '891', '892', '893'];
        $codigo_str = (string)$cups_code;
        
        foreach ($consulta_ranges as $range) {
            if (strpos($codigo_str, $range) === 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * ✅ VERIFICAR SI EL TOKEN SANCTUM ES VÁLIDO
     */
    private function verificar_token_sanctum($token) {
        $verify_url = 'http://fnpvi.nacerparavivir.org/api/perfil';
        
        $headers = [
            'Authorization: Bearer ' . $token,
            'Accept: application/json'
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $verify_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return $http_code === 200;
    }

    /**
     * ✅ MÉTODO PARA OBTENER TOKEN SANCTUM VÁLIDO (OPCIONAL)
     */
    private function obtener_token_api() {
        // Puedes almacenar el token en la base de datos o archivo de configuración
        $token_guardado = '404|ZSfxdVBNeFauLMQEckMCj8c44xjPXPki1ChDlLtB2e13933b';
        
        // Verificar si el token es válido
        if ($this->verificar_token_sanctum($token_guardado)) {
            return $token_guardado;
        }
        
        // Si el token no es válido, podrías implementar lógica para renovarlo
        log_message('error', 'Token Sanctum no válido o expirado');
        return null;
    }

    /**
     * ✅ MÉTODO PARA LOGUEAR ERRORES DE API (OPCIONAL)
     */
    private function log_api_error($mensaje, $datos = []) {
        $log_data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'mensaje' => $mensaje,
            'datos' => $datos
        ];
        
        log_message('error', 'API Error: ' . json_encode($log_data));
    }

    /**
     * ✅ MÉTODO PARA LIMPIAR Y VALIDAR DATOS DE LA API (OPCIONAL)
     */
    private function limpiar_datos_visita($visita) {
        return [
            'identificacion' => trim($visita['identificacion'] ?? ''),
            'nombre_apellido' => trim($visita['nombre_apellido'] ?? ''),
            'fecha' => $visita['fecha'] ?? date('Y-m-d'),
            'telefono' => trim($visita['telefono'] ?? ''),
            'zona' => trim($visita['zona'] ?? ''),
            'tipo_documento' => $visita['tipo_documento'] ?? 'CC',
            'peso' => is_numeric($visita['peso'] ?? null) ? $visita['peso'] : null,
            'talla' => is_numeric($visita['talla'] ?? null) ? $visita['talla'] : null,
            'tension_arterial' => trim($visita['tension_arterial'] ?? ''),
            'glucometria' => is_numeric($visita['glucometria'] ?? null) ? $visita['glucometria'] : null,
        ];
    }
}



