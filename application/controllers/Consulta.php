<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Consulta extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ValidarSesion()) {
            redirect("login/index");
        }
        $this->load->model("usuarios_model");
        $this->load->model("almacenes_model");

    }

    public function index()
    {
        $almacenes = $this->almacenes_model->obtenerTodos();

        $datos = [
            "titulo" => "Consultar Almacenes",
            "almacenes" => $almacenes,
            "idAlmacen" => "0",
            "existencias" => []
        ];

        if (isset($_POST["idAlmacen"])) {
            $datos["idAlmacen"] = $_POST["idAlmacen"];
            $datos["existencias"] = $this->almacenes_model->consultarExistenciasAlmacen($_POST["idAlmacen"]);
        }

        $this->CargarVista("consulta/index", $datos);
    }

}
