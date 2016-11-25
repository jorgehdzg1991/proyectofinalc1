<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Almacenes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ValidarSesion()) {
            redirect("login/index");
        }

        $this->load->model("almacenes_model");
        $this->load->model("usuarios_model");
    }

    public function index()
    {
        $almacenes = $this->almacenes_model->obtenerTodos();

        $datosAlmacenes = [];

        foreach ($almacenes as $almacen) {
            $usuario = $this->usuarios_model->obtenerPorId($almacen["usuarios_id"]);

            $fecha = new DateTime($almacen["fechaCreacion"]);

            $datosAlmacenes[] = [
                "id" => $almacen["id"],
                "nombre" => $almacen["nombre"],
                "usuario" => $usuario["nombre"],
                "fecha" => $fecha->format('d/m/Y H:i:s')
            ];
        }

        $datos = [
            "titulo" => "Almacenes",
            "almacenes" => $datosAlmacenes
        ];

        $this->CargarVista("almacenes/index", $datos);
    }

    public function crear()
    {
        $datos = [
            "titulo" => "Almacenes"
        ];

        $this->CargarVista("almacenes/crear", $datos);
    }

    public function guardar()
    {
        $nombre = $_POST["nombre"];
        $usuarios_id = $this->session->userdata("auth")["id"];

        $result = $this->almacenes_model->crear([
            "nombre" => $nombre,
            "usuarios_id" => $usuarios_id
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Almacén creado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo guardar el almacén. Intente nuevamente.", "error");
        }

        redirect("almacenes/index");
    }

    public function editar($id)
    {
        $datos = [
            "titulo" => "Almacenes"
        ];

        $almacen = $this->almacenes_model->obtenerPorId($id);

        if ($almacen != null) {
            $datos["almacen"] = $almacen;
            $this->CargarVista("almacenes/editar", $datos);
        } else {
            $this->setMensajeFlash("Advertencia", "No se encontró el almacén que quería editar", "error");
            redirect("almacenes/index");
        }
    }

    public function actualizar()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];

        $result = $this->almacenes_model->editar($id, [
            "nombre" => $nombre
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Almacén actualizado correctamente", "success");
            redirect("almacenes/index");
        } else {
            $this->setMensajeFlash("Error", "No se pudo actualizar el almacén. Intente nuevamente.", "error");
            redirect("almacenes/editar/$id");
        }
    }

    public function eliminar($id)
    {
        $result = $this->almacenes_model->eliminar($id);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Almacén eliminado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo eliminar el almacén. Intente nuevamente.", "error");
        }

        redirect("almacenes/index");
    }
}