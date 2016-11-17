<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("usuarios_model");
    }

    public function index()
    {
        $usuarios = $this->usuarios_model->obtenerTodos();

        $datosUsuarios = [];

        foreach ($usuarios as $usuario) {
            $fechaCreacion = new DateTime($usuario["fechaCreacion"]);

            $usuarioCreador = $this->usuarios_model->obtenerPorId($usuario["usuarios_id"]);

            $datosUsuarios[] = [
                "id" => $usuario["id"],
                "nombre" => $usuario["nombre"],
                "perfil" => $usuario["perfil"] == 1 ? 'Administrador' : 'Usuario del sistema',
                "login" => $usuario["login"],
                "usuarioCreador" => $usuarioCreador["nombre"],
                "fechaCreacion" => $fechaCreacion->format('d/m/Y H:i:s')
            ];
        }

        $datos = [
            "titulo" => "Usuarios del sistema",
            "usuarios" => $datosUsuarios
        ];

        $this->CargarVista("usuarios/index", $datos);
    }
}