<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MRol extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }

  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM rol");

    return $consulta->result();
  }
}
