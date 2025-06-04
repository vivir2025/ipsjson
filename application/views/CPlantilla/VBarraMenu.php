<style>
    
#miBoton:hover { 
transform:scale(1.0);
background: #07C245; /* color de fondo */
color: #fff; 
border-radius: 5px; 
}

.rt {
color: white;
}

#particles-js
{
  height:100vh ;
  width: 100%;
  position: fixed;
  z-index: -1;
  background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);
} 
.listo {
    border-radius: 30%;
    background-color: white;
    padding: 3px;
    margin-right: 30px;
    width: 90px;
    height: 90px;

}
.listos {

    background-color: white;
     border-radius: 10px;
     padding: 5px;

    width: 50px;
    height: 50px;

}
 
 
</style>
<link rel="shortcut icon" href="<?= base_url("assets/img/icino.png"); ?>" type="image/x-icon">
<div id="particles-js"> </div>
<?php
if (!$this->session->userdata('login')) {
    redirect(base_url());
}
?>
<nav class="navbar  navbar-expand-lg  responsive">
    <a   href="<?= site_url('CHome') ?>"><img  class="listo" src="<?php echo base_url("assets/img/listo.png"); ?>" /></a>
    <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <?php if ($this->session->userdata('rol_user') == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">Admin.Usuario </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item " href="<?= site_url('CPaciente') ?>">Listar Paciente</a>

                        <a id=miBoton class="dropdown-item" href="<?= site_url('CUsuario') ?>">Listar Usuario</a>
                    </div>
                </li>
              
                <!--li class="nav-item">
                <a style="color: white;" class="nav-link" href="<?= site_url('CContrato') ?>">Admin. Contrato</a>
            </li-->
            <?php }

            if ($this->session->userdata('rol_user') == 3) { ?>
                <li class="nav-item dropdown">
                    <a  style="color: white;" class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">  Admin. Usuario </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a id=miBoton class="dropdown-item" href="<?= site_url('CPaciente') ?>">Listar Paciente</a>
                    </div>
                </li>
				
            <?php }
            if ($this->session->userdata('rol_user') == 1 || $this->session->userdata('rol_user') == 3) { ?>
                <li class="nav-item dropdown">
                    <a style="color: white;" class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <button  id=miBoton type="button" class="btn btn-primary">   Admin.Agenda </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CAgenda') ?>">Cronograma</a>
                        <a  id=miBoton  class="dropdown-item" href="<?= site_url('CAgenda/paciente') ?>">Paciente</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a style="color: white;" class="nav-link dropdown-" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">   Admin.Facturacion </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CFactura') ?>">Facturar Cita</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CFactura/factura_sin_agendamiento') ?>">Facturar Servicio</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CFactura/refacturar_paciente') ?>">Refacturar</a>
                    </div>
                </li>
				<li class="nav-item dropdown">
                    <a  class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">   Informes </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme/informe1') ?>">Informe 1552</a>
						<a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria/contador') ?>">Contador Citas</a>
						  						
                    </div>
                </li>
            <?php }
            if ($this->session->userdata('rol_user') == 1) { ?>
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">  Rips  </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CRips/archivo_ac') ?>">Generar Rip AC</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CRips/archivo_af') ?>">Generar Rip AF</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CRips/archivo_ap') ?>">Generar rip AP</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CRips/archivo_ct') ?>">Generar rip CT</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CRips/archivo_us') ?>">Generar rip US</a>
                    </div>
                </li>
            <?php
            }
            if ($this->session->userdata('rol_user') == 2) { ?>
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button id=miBoton type="button" class="btn btn-primary"> Gestor </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria') ?>">Cronograma</a>
                        <!--a class="dropdown-item" href="">Historial Citas</a-->
                    </div>
                </li>
            <?php }

            if ($this->session->userdata('rol_user') == 1 || $this->session->userdata('rol_user') == 2 || $this->session->userdata('rol_user') == 3) { ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">  Historial  </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CHistorial') ?>">Historia</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria/visitas') ?>">Visitas Domiciliarias</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria/desentimiento') ?>">Disentimientos</a>
                        <a  id=miBoton class="dropdown-item" href="http://temporal.nacerparavivir.org/" target="_blank">Historia Antigua</a>
                     </div>
                </li>
				
            <?php }

            if ($this->session->userdata('rol_user') == 1) { ?>
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton  type="button" class="btn btn-primary">  Configuracion </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CCups') ?>">Admin. Cups</a>
                        <a  id=miBoton  class="dropdown-item" href="<?= site_url('CEmpresa') ?>">Admin. EPS</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CContrato') ?>">Admin. Contrato</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria/upload_paraclinico') ?>">Admin. Paraclinico</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria/upload_Visitas') ?>">Admin. Visitas</a>
						<a  id=miBoton class="dropdown-item" href="https://lookerstudio.google.com/s/uVld-qx6KSo" target="_blank">Dashboard Visitas</a>
						<a  id=miBoton class="dropdown-item" href="https://lookerstudio.google.com/s/plQT6uUJUfE" target="_blank">Mapa de Calor</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary">   Informes </button>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme') ?>">Informe Base</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme/informe1') ?>">Informe 1552</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme/informe3') ?>">Informe Facturacion</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme/informe4') ?>">Informe Historia Clinica</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme/informe5') ?>">Exportar Rips Json</a>
						<a  id=miBoton class="dropdown-item" href="<?= site_url('CHistoria/contador') ?>">Contador Citas</a>
						  <a  id=miBoton class="dropdown-item" href="<?= site_url('CInforme/informe2') ?>">Generador Reporte Dinamico</a>
						
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button  id=miBoton type="button" class="btn btn-primary"> Backups </button>
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a  id=miBoton  class="dropdown-item" href="<?= site_url('CBackup') ?>">Backup Paciente</a>
                        <a  id=miBoton  class="dropdown-item" href="<?= site_url('CBackup/backup_pacActualizado') ?>">Backup Actualización Paciente</a>
                        <a  id=miBoton class="dropdown-item" href="<?= site_url('CBackup/backup_hc') ?>">Backup HC</a>
                    </div>
                </li>

            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar">
    <li class="nav-item dropdown">
        <div class="dropdown">
            
            <button class="btn dropdown-toggle rt" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $this->session->userdata('nom_rol')   ?> 
                <img src="<?php echo base_url("assets/img/2413434.png"); ?>" alt="Botón" class="listos" />
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a  id=miBoton  class="dropdown-item" href="<?= site_url('CPerfil') ?>">Mi Perfil</a>
                <a id=miBoton  class="dropdown-item" href="<?= site_url('CLogin/logout') ?>">Cerrar Sesión</a>
            </div>
        </div>
    </li>
</ul>

    </div>
</nav>






