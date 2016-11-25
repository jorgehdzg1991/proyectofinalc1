<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hojasestilos_model extends CI_Model
{
    public function obtenerTodos()
    {
        $query = $this->db->get_where("hojasestilos");
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("hojasestilos", ["id" => $id], 1);
        return $query->row_array();
    }

    public function crear($data)
    {
        return $this->db->insert("hojasestilos", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("hojasestilos", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->delete("hojasestilos", ["id" => $id]) ? true : false;
    }
}