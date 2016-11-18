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

    public function crear()
    {
        $datos = [
            "titulo" => "Usuarios del sistema"
        ];

        $this->CargarVista("usuarios/crear", $datos);
    }

    public function guardar()
    {
        $datos = [
            "nombre" => $_POST["nombre"],
            "perfil" => $_POST["perfil"],
            "login" => $_POST["login"],
            "passwd" => md5($_POST["password"]),
            "usuarios_id" => $this->session->userdata("auth")["id"]
        ];

        $result = $this->usuarios_model->crear($datos);

        if ($result) {
            $this->setMensajeFlash("Éxito", "Usuario creado correctamente", "success");
            redirect("usuarios/index");
        } else {
            $this->setMensajeFlash("Error", "Ha ocurrido un error al crear el usuario. Intente nuevamente.");
            redirect("usuarios/crear");
        }
    }

    public function editar($id)
    {

    }

    public function actualizar()
    {

    }

    public function cambiarPassword($id)
    {

    }

    public function actualizarPassword()
    {

    }

    public function eliminar($id)
    {

    }
}