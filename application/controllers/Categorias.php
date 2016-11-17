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

    public function editar()
    {

    }

    public function eliminar()
    {

    }
}