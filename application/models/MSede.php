<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MSede extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }

  public function ver()
  {

    $consulta = $this->db->query("SELECT * FROM sede");

    return $consulta->result();
  }

}
