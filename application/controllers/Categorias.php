<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("categorias_model");
        $this->load->model("usuarios_model");
    }

    public function index()
    {
        $categorias = $this->categorias_model->obtenerTodos();

        $datosCategorias = [];

        foreach ($categorias as $categorias) {
            $usuario = $this->usuarios_model->obtenerPorId($categorias["usuarios_id"]);

            $fecha = new DateTime($categorias["fechaCreacion"]);

            $datosCategorias[] = [
                "id" => $categorias["id"],
                "nombre" => $categorias["nombre"],
                "usuario" => $usuario["nombre"],
                "fecha" => $fecha->format('d/m/Y H:i:s')
            ];
        }

        $datos = [
            "titulo" => "Categorias",
            "categorias" => $datosCategorias
        ];

        $this->CargarVista("categorias/index", $datos);
    }

    public function crear()
    {
        $datos = [
            "titulo" => "Categorias"
        ];

        $this->CargarVista("categorias/crear", $datos);
    }

    public function guardar()
    {
        $nombre = $_POST["nombre"];
        $usuarios_id = $this->session->userdata("auth")["id"];

        $result = $this->categorias_model->crear([
            "nombre" => $nombre,
            "usuarios_id" => $usuarios_id
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Categoria creada", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo guardar la categoria. Intente nuevamente.", "error");
        }

        redirect("categorias/index");
    }

    public function editar($id)
    {
        $datos = [
            "titulo" => "Categorias"
        ];

        $categorias = $this->categorias_model->obtenerPorId($id);

        if ($categorias != null) {
            $datos["categorias"] = $categorias;
            $this->CargarVista("categorias/editar", $datos);
        } else {
            $this->setMensajeFlash("Advertencia", "No se encontró la categorias que quería editar", "error");
            redirect("categorias/index");
        }
    }

    public function actualizar()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];

        $result = $this->categorias_model->editar($id, [
            "nombre" => $nombre
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Categoria actualizada correctamente", "success");
            redirect("categorias/index");
        } else {
            $this->setMensajeFlash("Error", "No se pudo actualizar la categoria. Intente nuevamente.", "error");
            redirect("categorias/editar/$id");
        }
    }

    public function eliminar($id)
    {
        $result = $this->categorias_model->eliminar($id);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Categoria eliminada correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo eliminar la Categoria. Intente nuevamente.", "error");
        }

        redirect("categorias/index");
    }
}