<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimientos_model extends CI_Model
{
    public $id;
    public $cantidad;
    public $observaciones;
    public $tiposmovimientos_id;
    public $productos_id;
    public $almacenes_id;
    public $usuarios_id;
    public $fecha;

    public function obtenerTodos()
    {
        $query = $this->db->get_where("movimientos", ["estatus" => 1]);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("movimientos", ["id" => $id], 1);
        return $query->row_array();
    }

    public function crear($data)
    {
        return $this->db->insert("movimientos", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("movimientos", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("movimientos", ["estatus" => 0]) ? true : false;
    }
}