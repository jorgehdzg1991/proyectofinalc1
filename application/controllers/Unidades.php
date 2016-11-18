<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Unidades extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("unidades_model");
        $this->load->model("usuarios_model");
    }

    public function index()
    {
        $unidades = $this->unidades_model->obtenerTodos();

        $datosUnidades = [];

        foreach ($unidades as $unidad) {
            $usuario = $this->usuarios_model->obtenerPorId($unidad["usuarios_id"]);

            $fecha = new DateTime($unidad["fechaCreacion"]);

            $datosUnidades[] = [
                "id" => $unidad["id"],
                "nombre" => $unidad["nombre"],
                "abreviatura"=> $unidad["abreviatura"],
                "usuario" => $usuario["nombre"],
                "fecha" => $fecha->format('d/m/Y H:i:s')
            ];
        }

        $datos = [
            "titulo" => "Unidades",
            "unidades" => $datosUnidades
        ];

        $this->CargarVista("unidades/index", $datos);
    }

    public function crear()
    {
        $datos = [
            "titulo" => "Unidades"
        ];

        $this->CargarVista("unidades/crear", $datos);
    }

    public function guardar()
    {
        $nombre = $_POST["nombre"];
        $abreviatura = $_POST["abreviatura"];
        $usuarios_id = $this->session->userdata("auth")["id"];

        $result = $this->unidades_model->crear([
            "nombre" => $nombre,
            "abreviatura"=> $abreviatura,
            "usuarios_id" => $usuarios_id
            
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "La unidad fue creada correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo guardar la unidad. Intente nuevamente.", "error");
        }

        redirect("unidades/index");
    }

    public function editar($id)
    {
        $datos = [
            "titulo" => "Unidades"
        ];

        $unidad = $this->unidades_model->obtenerPorId($id);

        if ($unidad != null) {
            $datos["unidad"] = $unidad;
           
            $this->CargarVista("unidades/editar", $datos);
        } else {
            $this->setMensajeFlash("Advertencia", "No se encontró la unidad que quería editar", "error");
            redirect("unidades/index");
        }
    }

    public function actualizar()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $abreviatura = $_POST["abreviatura"];

        $result = $this->unidades_model->editar($id, [
            "nombre" => $nombre,
            "abreviatura" => $abreviatura
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "La unidad fue actualizado correctamente", "success");
            redirect("unidades/index");
        } else {
            $this->setMensajeFlash("Error", "No se pudo actualizar la unidad. Intente nuevamente.", "error");
            redirect("unidades/editar/$id");
        }
    }

    public function eliminar($id)
    {
        $result = $this->unidades_model->eliminar($id);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "La unidad se ha eliminado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo eliminar a unidad. Intente nuevamente.", "error");
        }

        redirect("unidades/index");
    }
}

