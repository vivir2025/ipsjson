<style>
#boton:hover { 
   -webkit-transform:scale(1.3);transform:scale(1.3);
   overflow:hidden;
   border-radius: 90px;
   background:#F04848;

} </style>


<style>
#segundo:hover { 
   -webkit-transform:scale(1.3);transform:scale(1.3);
   overflow:hidden;
   border-radius: 30px;
   background:#0004FF;

} </style>

<style>
#tercero:hover { 
   -webkit-transform:scale(1.3);transform:scale(1.3);
   overflow:hidden;
   border-radius: 30px;
   background:#FFD800;

} </style>
<style>
#cuarto:hover { 
   -webkit-transform:scale(1.3);transform:scale(1.3);
   overflow:hidden;
   border-radius: 30px;
   background:#00B305;

} </style>
<style>
#quinto:hover { 
   -webkit-transform:scale(1.3);transform:scale(1.3);
   overflow:hidden;
   border-radius: 30px;
   background:#029FFF;

} </style>


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CHistorial extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->helper("url");
      $this->load->model("MHistorial");
      $this->load->model("MHistoria");
   }

   public function index()
   {

      $data['title'] = 'IPS | HISTORIA CLINICA';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $this->load->view("CHistorial/VListar.php");

      $this->load->view("CPlantilla/VFooter");
   }

   public function buscar_paciente()
   {

      $pacDocumento = $this->input->post('documento');

      $data = $this->MHistorial->getPacientexdoc($pacDocumento);
      //print_r($data);

      echo "<div class='container'>";
      echo "<table class='table table-bordered bg-white'>";


      if (sizeof($data) > 0) {

         //echo "<div class='alert alert-info alert-dismissible fade show' role='alert'";

         echo "<tr>";
         echo "<td>Paciente</td>";
         echo "<td>Tipo</td>";
         echo "<td>Area</td>";
         echo "<td>Profesional</td>";
         echo "<td>Fecha</td>";
         echo "<td>Opcion</td>";
         echo "</tr>";
         echo "<tbody>";
         foreach ($data as $d) {

            $url1 = base_url('index.php/CHistorial/imprimir_medicamento/' . $d->id_hc);
            $url2 = base_url('index.php/CHistorial/imprimir_remision/' . $d->id_hc);
            $url3 = base_url('index.php/CHistorial/imprimir_ayudas_diagnostica/' . $d->id_hc);

           
            if ($d->proceso_idProceso == 1 && $d->id_categoria_cups == 1) {
               $proceso = 'ESPECIAL PRIMERA VEZ';
            } elseif ($d->proceso_idProceso == 1 && $d->id_categoria_cups == 2) {
               $proceso = 'ESPECIAL CONTROL';
            } elseif ($d->proceso_idProceso == 2 && $d->id_categoria_cups == 1) {
               $proceso = 'TRABAJO SOCIAL PRIMERA VEZ';
            } elseif ($d->proceso_idProceso == 2 && $d->id_categoria_cups == 2) {
               $proceso = 'TRABAJO SOCIAL CONTROL';
            } elseif ($d->proceso_idProceso == 4 && $d->id_categoria_cups == 1) {
               $proceso = 'NUTRICIONISTA PRIMERA VEZ';
            } elseif ($d->proceso_idProceso == 4 && $d->id_categoria_cups == 2) {
               $proceso = 'NUTRICIONISTA CONTROL';
            } elseif ($d->proceso_idProceso == 5 && $d->id_categoria_cups == 1) { 
               $proceso = 'PSICOLOGIA PRIMERA VEZ';
            } elseif ($d->proceso_idProceso == 5 && $d->id_categoria_cups == 2) {
               $proceso = 'PSICOLOGIA CONTROL';
            } elseif ($d->proceso_idProceso == 13 && $d->id_categoria_cups == 1) { 
               $proceso = 'FISIOTERAPIA  PRIMERA VEZ';
            } elseif ($d->proceso_idProceso == 13 && $d->id_categoria_cups == 2) {
               $proceso = 'FISIOTERAPIA CONTROL';
        
            } else {
               $proceso = $d->proNombre;
            }

            echo "<tr>";
            echo "<td>CC: " . $d->pacDocumento . "<br>Nombre: " . $d->pacNombre . " " . $d->pacNombre2 . " " . $d->pacApellido . " " . $d->pacApellido2 . "</td>";
            echo "<td>ESPECIALIDAD</td>";
            echo "<td>" . $proceso . "</td>";
            echo "<td>" . $d->usuNombre . " " . $d->usuApellido . "</td>";
            echo "<td>" . $d->citFecha . "</td>";
            echo  "<td align=center>";
           
            echo "<img style='width: 10%; border-radius: 50%;' id='boton' src='" . base_url('assets/img/123.jpg') . "' title='Historia Clinica Completa' onclick='verHistoriaCompleta(" . $d->id_hc . ", " . $d->id_cat_cups . ", " . $d->proceso_idProceso . ")'>";



            echo "<img width= 10% id=segundo src='" . base_url('assets/img/imprimir1.png') . "'  title='Historia Clinica' onclick='verValoracion($d->id_hc, $d->id_cat_cups, $d->proceso_idProceso)'> ";


            if ($d->proceso_idProceso == 1 || $d->proceso_idProceso == 2 || $d->proceso_idProceso == 3 || $d->proceso_idProceso == 4 || $d->proceso_idProceso == 5 || $d->proceso_idProceso == 6 || $d->proceso_idProceso == 7) {
               echo "<img  width= 11% id=tercero src='" . base_url('assets/img/medicamentos.png') . "'    title='Medicamento' onClick='finestraSecundaria(\"{$url1}\")'>
                ";
            }
            if ($d->proceso_idProceso == 1 || $d->proceso_idProceso == 3 || $d->proceso_idProceso == 4 || $d->proceso_idProceso == 5 || $d->proceso_idProceso == 6 || $d->proceso_idProceso == 7) {
               echo "<img   width= 10% id=cuarto src='" . base_url('assets/img/remision.png') . "'  title='Remision' onClick='finestraSecundaria(\"{$url2}\")'> ";
            }
            if ($d->proceso_idProceso == 1 || $d->proceso_idProceso == 3 || $d->proceso_idProceso == 6 || $d->proceso_idProceso == 7) {
               echo "<img  width= 10% id=quinto src='" . base_url('assets/img/ayuda.png') . "'  title='Ayuda Dianostica' onClick='finestraSecundaria(\"{$url3}\")'> ";
            }
            echo "<img  width= 11% id=quinto src='" . base_url('assets/img/paraclinico1.png') . "'  title='Paraclinicos' onclick='vervistaparaclinico($d->pacDocumento)'>";
            echo "<img  width= 11% id=quinto  src='" . base_url('assets/img/visitas.png') . "'   title='Visitas Domiciliarias' onclick='verVisitas($d->pacDocumento)'>";
            echo "</td>";
            echo "</tr>";
         }
         echo "</tbody>";
      } else {

         echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
         No hay historial para mostrar.
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
         </button>
         </div>";
      }

      echo "</table>";
      echo "</div>";
   }
   public function buscar_paciente2()
   {
       $pacDocumento = $this->input->post('documento');
   
       // Obtener solo visitas domiciliarias
       $dataVisitasDomiciliarias = $this->MHistorial->getPacientexdocSoloVisitas($pacDocumento);
   
       echo "<div class='container'>";
       echo "<table class='table table-bordered bg-white'>";
 
 
       if (sizeof($dataVisitasDomiciliarias) > 0) {
         echo "<tr>";
         echo "<td><b>Paciente</b></td>";
      
         echo "<td><b>Zona</b></td>";
         echo "<td><b>Auxiliar</b></td>";
         echo "<td><b>Fecha</b></td>";
         echo "<td><b>Opcion</b></td>";
         echo "</tr>";
         echo "<tbody>";
         foreach ($dataVisitasDomiciliarias as $d) {
            echo "<tr>";
            echo "<td>CC: " . $d->identificacion . "</td>";
           
            echo "<td>" . $d->zona . " </td>";
            echo "<td>" . $d->encargado . " </td>";
            echo "<td>" . $d->fecha . "</td>";
            echo  "<td align=center>";
            echo "<img  width= 11% id=quinto src='" . base_url("assets/img/visitas.png") . "'  title='Visitas Domiciliarias' onclick='verVisitas($d->id_hcs_visitas)'>";
            echo "</td>";
            echo "</tr>";

         }
         echo "</tbody>";
    
   } else {

      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      No hay Visitas Domiciliarias por Mostrar.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
   }

   echo "</table>";
   echo "</div>";
   
}
public function buscar_paciente4()
{
    $pacDocumento = $this->input->post('documento');

    // Obtener solo visitas domiciliarias
    $dataDesentimiento = $this->MHistorial->getPacientexdocDesentimiento($pacDocumento);

    echo "<div class='container'>";
    echo "<table class='table table-bordered bg-white'>";


    if (sizeof($dataDesentimiento) > 0) {
      echo "<tr>";
      echo "<td><b>Paciente</b></td>";
   
      echo "<td><b>Zona</b></td>";
      echo "<td><b>Auxiliar</b></td>";
      echo "<td><b>Fecha</b></td>";
      echo "<td><b>Opcion</b></td>";
      echo "</tr>";
      echo "<tbody>";
      foreach ($dataDesentimiento as $d) {
         echo "<tr>";
         echo "<td>CC: " . $d->identificacion . "</td>";
        
         echo "<td>" . $d->direccion . " </td>";
         echo "<td>" . $d->realiza . " </td>";
         echo "<td>" . $d->fecha . "</td>";
         echo  "<td align=center>";
         echo "<img  width= 11% id=quinto src='" . base_url("assets/img/visitas.png") . "'  title='Visitas Domiciliarias' onclick='verVisitas($d->id_de)'>";
         echo "</td>";
         echo "</tr>";

      }
      echo "</tbody>";
 
} else {

   echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
   No hay Desentimientos por Mostrar.
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
   <span aria-hidden='true'>&times;</span>
   </button>
   </div>";
}

echo "</table>";
echo "</div>";

}


    public function buscar_paciente1()
{
    $pacDocumento = $this->input->post('documento');
    $fechaInicio = $this->input->post('fecha_inicio');
    $fechaFin = $this->input->post('fecha_fin');

    $data = $this->MHistorial->getPacientexdoc($pacDocumento);

    if (!empty($data)) {
        // Imprimir el nombre del paciente
       
        
        echo "<p class='bg-primary text-white'>Nombre: " . $data[0]->pacNombre . " " . $data[0]->pacNombre2 . " " . $data[0]->pacApellido . " " . $data[0]->pacApellido2 . " <br> CC: " . $data[0]->pacDocumento . " </p>";
        

        // Ejecutar la consulta SQL para obtener las citas del paciente
        $query = $this->db->query("SELECT proceso.proNombre, COUNT(*) as total_procesos
                                    FROM proceso
                                    LEFT JOIN agenda ON agenda.proceso_idProceso = proceso.idProceso
                                    LEFT JOIN cita ON cita.agenda_idAgenda = agenda.idAgenda
                                    LEFT JOIN paciente ON cita.paciente_idPaciente = paciente.idPaciente
                                    WHERE paciente.pacDocumento = ? AND cita.citFecha BETWEEN ? AND ?
									 AND (cita.citEstado = 'FINALIZADO' OR cita.citEstado = 'FINALIZADO Y FACTURADO')
                                    GROUP BY proceso.proNombre",
                                    array($pacDocumento, $fechaInicio, $fechaFin));
        $resultados = $query->result_array();

        // Mostrar la tabla de citas
        echo "<table class='table table-bordered bg-white'>";
        echo "<thead>";
        echo "<tr class='bg-success text-white'>";
        echo "<td>Área</td>";
        echo "<td>Total de Citas</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Mostrar los resultados de la consulta dentro de la tabla
        foreach ($resultados as $resultado) {
            echo "<tr>";
            echo "<td>" . $resultado['proNombre'] . "</td>";
            echo "<td>" . $resultado['total_procesos'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        No hay citas por contar.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}

public function get_consultas_especialidades() {
   ob_clean();
   header('Content-Type: application/json');

   $fechaInicio = $this->input->post('fecha_inicio');
   $fechaFin = $this->input->post('fecha_fin');

   // Consulta para todas las especialidades
   $query = $this->db->query("
       SELECT 
           p.idProceso,
           COUNT(*) as total
       FROM cita c
       JOIN agenda a ON c.agenda_idAgenda = a.idAgenda
       JOIN proceso p ON a.proceso_idProceso = p.idProceso
       WHERE c.citFecha BETWEEN ? AND ?
       AND p.idProceso IN (1, 2, 3, 4, 5, 6, 7, 13)
       AND c.citEstado IN ('FINALIZADO', 'FINALIZADO Y FACTURADO')
       GROUP BY p.idProceso
   ", [$fechaInicio, $fechaFin]);

   $resultados = $query->result_array();

   // Formatear respuesta
   $response = [
      'control' => 0,
       'internista' => 0,
       'psicologia' => 0,
       'nutricion' => 0,
       'trabajo_social' => 0,
       'nefrologia' => 0,
       'fisioterapia' => 0
   ];

   foreach ($resultados as $row) {
       switch ($row['idProceso']) {
           case 1: $response['control'] = $row['total']; break;
           case 2: $response['trabajo_social'] = $row['total']; break;
           case 3: $response['reformulacion'] = $row['total']; break;
           case 4: $response['nutricion'] = $row['total']; break;
           case 5: $response['psicologia'] = $row['total']; break;
           case 6: $response['nefrologia'] = $row['total']; break;
           case 7: $response['internista'] = $row['total']; break;
           case 13: $response['fisioterapia'] = $row['total']; break;
       }
   }

   echo json_encode($response);
   exit();
}

   

   public function imprimir_ayudas_diagnostica($id_hc)
   {

      $data['title'] = 'IPS | IMPRIMIO: ' . $this->session->userdata('nom_user');

      $this->load->view("CPlantilla/VHead", $data);


      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);


      $this->load->view("CHistorial/VAyudaDiagnostica.php", $datos);

      $this->load->view("CPlantilla/VFooter", $data);
   }

   public function imprimir_remision($id_hc)
   {

      $data['title'] = 'IPS | IMPRIMIO: ' . $this->session->userdata('nom_user');

      $this->load->view("CPlantilla/VHead", $data);


      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $this->load->view("CHistorial/VRemision.php", $datos);

      $this->load->view("CPlantilla/VFooter", $data);
   }

   public function imprimir_medicamento($id_hc)
   {

      $data['title'] = 'IPS | IMPRIMIO: ' . $this->session->userdata('nom_user');

      $this->load->view("CPlantilla/VHead", $data);


      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $this->load->view("CHistorial/VMedicamento.php", $datos);

      $this->load->view("CPlantilla/VFooter", $data);
   }

   public function imprimir_diagnostico($id_hc)
   {

      $data['title'] = 'IPS | IMPRIMIO: ' . $this->session->userdata('nom_user');

      $this->load->view("CPlantilla/VHead", $data);


      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $this->load->view("CHistorial/VDiagnostico.php", $datos);

      $this->load->view("CPlantilla/VFooter", $data);
   }

  public function hc_1($id_hc)
   {

      $data['title'] = 'IPS | HC PRIMERA VEZ';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_1.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_2($id_hc)
   {

      $data['title'] = 'IPS | HC CONTROL';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_2.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_3($id_hc)
   {

      $data['title'] = 'IPS | HC PSICOLOGIA';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);
      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_3.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_10($id_hc)
   {

      $data['title'] = 'IPS | HC PSICOLOGIA';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);
      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_10.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_4($id_hc)
   {

      $data['title'] = 'IPS | HC NEFROLOGIA';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_4.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_5($id_hc)
   {

      $data['title'] = 'IPS | HC INTERNISTA';

      $this->load->view("CPlantilla/VHead", $data);

      $this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_5.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_6($id_hc)
   {

      $data['title'] = 'IPS | HC TRABAJO SOCIAL';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_6.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_7($id_hc)
   {

      $data['title'] = 'IPS | HC REFORMULACION';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_7.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_8($id_hc)
   {

      $data['title'] = 'IPS | HC TRABAJO SOCIAL CONTROL';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);
      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_8.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }

   public function hc_9($id_hc)
   {

      $data['title'] = 'IPS | HC NUTRICIONISTA';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_9.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }


   public function hc_11($id_hc)
   {

      $data['title'] = 'IPS | HC NUTRICIONISTA CONTROL';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_11.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }


public function hc_12($id_hc)
   {

      $data['title'] = 'IPS | HC ';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_12.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }


   public function hc_13($id_hc)
   {

      $data['title'] = 'IPS | HC FISIOTERAPIA CONTROL';

      $this->load->view("CPlantilla/VHead", $data);

      //$this->load->view("CPlantilla/VBarraMenu");

      $datos['medicamento_historia'] = $this->MHistoria->detalle_historia_medicamento($id_hc);
      $datos['remision_historia'] = $this->MHistoria->detalle_historia_remision($id_hc);
      $datos['cups_historia'] = $this->MHistoria->detalle_historia_cups($id_hc);
      $datos['diagnostico_historia'] = $this->MHistoria->detalle_historia_diagnostico($id_hc);

      $datos['antecedentes_personales'] = $this->MHistoria->detalle_antecedentes_personales($id_hc);

      $datos['dato_historia'] = $this->MHistoria->datos_historia($id_hc);

      $this->load->view("CHistorial/hc_13.php", $datos);

      $this->load->view("CPlantilla/VFooter");
   }
}


