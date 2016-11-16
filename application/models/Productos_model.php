<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Productos_model extends CI_Model
{
    public $id;
    public $nombre;
    public $descrpcion;
    public $categorias_id;
    public $unidades_id;
    public $marcas_id;
    public $usuarios_id;
    public $fechaCreacion;
    public $estatus;
    
    public function obtenerTodos()
    {
        $query = $this->db->get_where("productos", ["estatus" => 1], 1);
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