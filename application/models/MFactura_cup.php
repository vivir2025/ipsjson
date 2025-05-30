<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MFactura_cup extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }

  public function guardar($datos)
  {
    $consulta = $this->db->insert('factura_cup', $datos);

    return true;
  }

  public function actualizardatos($idFactura_cup, $datos_factura_cup)
  {
    $this->db->where('id_fac_cup', $idFactura_cup);
    $consulta = $this->db->update('factura_cup', $datos_factura_cup);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }
}
