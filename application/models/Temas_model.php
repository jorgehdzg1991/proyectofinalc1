<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ObtenerTodos() {
        $query = $this->db->get("temas");
        return $query->result_array();
    }
}