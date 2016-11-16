<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("marcas_model");
        $this->load->model("usuarios_model");
    }

    public function index()
    {
        $marcas = $this->marcas_model->obtenerTodos();

        $datosMarcas = [];

        foreach ($marcas as $marca) {
            $usuario = $this->usuarios_model->obtenerPorId($marca["usuarios_id"]);

            $fecha = new DateTime($marca["fechaCreacion"]);

            $datosMarcas[] = [
                "id" => $marca["id"],
                "nombre" => $marca["nombre"],
                "usuario" => $usuario["nombre"],
                "fecha" => $fecha->format('d/m/Y H:i:s')
            ];
        }

        $datos = [
            "titulo" => "Marcas",
            "marcas" => $datosMarcas
        ];

        $this->CargarVista("marcas/index", $datos);
    }

    public function crear()
    {
        $datos = [
            "titulo" => "Marcas"
        ];

        $this->CargarVista("marcas/crear", $datos);
    }

    public function guardar()
    {
        $nombre = $_POST["nombre"];
        $usuarios_id = $this->session->userdata("auth")["id"];

        $result = $this->marcas_model->crear([
            "nombre" => $nombre,
            "usuarios_id" => $usuarios_id
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Marca creada correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo guardar la marca. Intente nuevamente.", "error");
        }

        redirect("marcas/index");
    }

    public function editar()
    {

    }

    public function eliminar()
    {

    }
}