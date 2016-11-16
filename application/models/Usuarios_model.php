<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
    public $id;
    public $nombre;
    public $perfil;
    public $login;
    public $passwd;
    public $fechaRegistro;
    public $estatus;

    public function obtenerTodos()
    {
        $query = $this->db->get_where("usuarios", ["estatus" => 1]);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("usuarios", ["id" => $id], 1);
        return $query->row_array();
    }

    public function obtenerPorCredenciales($username, $password)
    {
        $query = $this->db->get_where("usuarios", [
            "login" => $username,
            "passwd" => md5($password),
            "estatus" => 1
        ], 1);

        return $query->row_array();
    }

    public function crear($data)
    {
        return $this->db->insert("usuarios", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("usuarios", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("usuarios", ["estatus" => 0]) ? true : false;
    }
}