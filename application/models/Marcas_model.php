<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_model extends CI_Model
{
    public $id;
    public $nombre;
    public $usuarios_id;
    public $fechaCreacion;
    public $estatus;
    
    public function obtenerTodos()
    {
        $query = $this->db->get_where("marcas", ["id" => $id], 1);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("marcas", ["id" => $id], 1);
        return $query->row_array();
    }

        public function crear($data)
    {
        return $this->db->insert("marcas", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("marcas", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("marcas", ["estatus" => 0]) ? true : false;
    }
}