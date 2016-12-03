<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ValidarSesion()) {
            redirect("login/index");
        }

        $this->load->model("usuarios_model");
        $this->load->model("configuraciones_model");
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
            "usuarios" => $datosUsuarios,
            "authId" => $this->session->userdata("auth")["id"]
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
        $datos = [
            "titulo" => "Usuarios del sistema"
        ];

        $usuario = $this->usuarios_model->obtenerPorId($id);

        if ($usuario != null) {
            $datos["usuario"] = [
                "id" => $id,
                "nombre" => $usuario["nombre"],
                "perfil" => $usuario["perfil"]
            ];

            $this->CargarVista("usuarios/editar", $datos);
        } else {
            $this->setMensajeFlash("Advertencia", "No se encontró el usuario que quería editar", "error");
            redirect("usuarios/index");
        }
    }

    public function actualizar()
    {
        $id = $_POST["id"];

        $datos = [
            "nombre" => $_POST["nombre"],
            "perfil" => $_POST["perfil"]
        ];

        $result = $this->usuarios_model->editar($id, $datos);

        if ($result) {
            $this->setMensajeFlash("Éxito", "Usuario actualizado correctamente", "success");
            redirect("usuarios/index");
        } else {
            $this->setMensajeFlash("Error", "Ha ocurrido un error al actualizar el usuario. Intente nuevamente.", "error");
            redirect("usuarios/editar/$id");
        }
    }

    public function eliminar($id)
    {
        if ($this->session->userdata("auth")["id"] == $id) {
            $this->setMensajeFlash("Advertencia", "No puedes eliminar este usuario", "error");
            redirect("usuarios/index");
        }

        $result = $this->usuarios_model->eliminar($id);

        if ($result) {
            $this->setMensajeFlash("Éxito", "Usuario eliminado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "Ha ocurrido un error al eliminar el usuario. Intente nuevamente.", "error");
        }

        redirect("usuarios/index");
    }
}