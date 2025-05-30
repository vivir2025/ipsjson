<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MTipoAfiliacion extends CI_Model {

  public function __construct() {
  
    parent::__construct();
    $this->load->database();
  }

   public function ver() {

        $consulta = $this->db->query("SELECT *

          FROM tipo_afiliciacion");

        return $consulta->result();
    }
}
