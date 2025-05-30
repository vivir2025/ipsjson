<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MDepartamento extends CI_Model {

  public function __construct() {
  
    parent::__construct();
    $this->load->database();
  }

   /*public function ver() {

        $consulta = $this->db->query("SELECT *

          FROM departamento");

        return $consulta->result();
    }*/
    public function ver()
    {

        $this->db->select('*');
        $records = $this->db->get('departamento');
        $departamento = $records->result_array();
        return $departamento;
    }
}
