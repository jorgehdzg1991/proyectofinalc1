<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model
{
    public function obtenerTodos()
    {
        $query = $this->db->get_where("productos", ["estatus" => 1]);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("productos", ["id" => $id], 1);
        return $query->row_array();
    }

        public function crear($data)
    {
        return $this->db->insert("productos", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("productos", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("productos", ["estatus" => 0]) ? true : false;
    }
}