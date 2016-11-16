<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiposmovimientos_model extends CI_Model
{
    public $id;
    public $nombre;

    public function obtenerTodos()
    {
        $query = $this->db->get("tiposmovimientos");
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("tiposmovimientos", ["id" => $id], 1);
        return $query->row_array();
    }
}