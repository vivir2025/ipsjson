<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MBrigada extends CI_Model {

  public function __construct() {
  
    parent::__construct();
    $this->load->database();
  }
    public function ver() {

        $consulta = $this->db->query("SELECT *

          FROM brigada");

        return $consulta->result();
    }
}
