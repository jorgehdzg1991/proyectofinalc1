<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model
{
    public function obtenerTodos()
    {
        $query = $this->db->get_where("categorias", ["estatus" => 1]);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("categorias", ["id" => $id], 1);
        return $query->row_array();
    }

    public function crear($data)
    {
        return $this->db->insert("categorias", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("categorias", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("categorias", ["estatus" => 0]) ? true : false;
    }
}
