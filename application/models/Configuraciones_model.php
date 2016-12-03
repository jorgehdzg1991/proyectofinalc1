<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones_model extends CI_Model
{
    public function obtenerTodos()
    {
        $query = $this->db->get_where("configuraciones");
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("configuraciones", ["id" => $id], 1);
        return $query->row_array();
    }

    public function crear($data)
    {
        return $this->db->insert("configuraciones", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("configuraciones", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete("configuraciones", ["id" => $id]) ? true : false;
    }
}