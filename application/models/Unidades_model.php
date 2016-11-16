<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades_model extends CI_Model
{
    public $id;
    public $nombre;
    public $abreviatura;
    public $usuario_id;
    public $fechaCreacion;
    public $estatus;
    
    public function obtenerTodos()
    {
        $query = $this->db->get_where("unidades", ["estatus" => 1], 1);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("unidades", ["id" => $id], 1);
        return $query->row_array();
    }

        public function crear($data)
    {
        return $this->db->insert("unidades", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("unidades", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("unidades", ["estatus" => 0]) ? true : false;
    }
}