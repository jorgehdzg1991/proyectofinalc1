<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimientos_model extends CI_Model
{
    public function obtenerTodos()
    {
        $query = $this->db->get_where("movimientos", ["fecha" => date("Y-m-d")]);
        return $query->result_array();
    }

   public function obtenerPorTipo($idTipo)
    {
        $query = $this->db->get_where("movimientos", ["tiposmovimientos_id" => $idTipo], 1);
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
 
}