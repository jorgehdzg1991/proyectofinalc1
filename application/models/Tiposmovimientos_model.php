<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiposmovimientos_model extends CI_Model
{
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

    public function obtenerPorTipo($tipo)
    {
        $query = $this->db->get_where("tiposmovimientos", ["direccion" => $tipo]);
        return $query->result_array();
    }
}