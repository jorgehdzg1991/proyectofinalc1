<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimientos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("productos_model");
        $this->load->model("almacenes_model");
        $this->load->model("movimientos_model");
    }

    public function entradas()
    {
        $productos = $this->productos_model->obtenerTodos();
        $almacenes = $this->almacenes_model->obtenerTodos();

        $datos = [
            "titulo" => "Movimientos",
            "productos" => $productos,
            "almacenes" => $almacenes
        ];

        $this->CargarVista("movimientos/entradas", $datos);
    }

    public function registrarEntrada() {
        $almacen = $_POST["almacen"];
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];
        $observaciones = $_POST["observaciones"];

        $usuario = $this->session->userdata("auth");

        $datosMovimiento = [
            "cantidad" => $cantidad,
            "observaciones" => $observaciones,
            "tiposmovimientos_id" => 1,
            "productos_id" => $producto,
            "almacenes_id" => $almacen,
            "usuarios_id" => $usuario["id"]
        ];

        $result = $this->movimientos_model->crear($datosMovimiento);

        if ($result) {
            $this->setMensajeFlash("Éxito", "Entrada registrada correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "Ha ocurrido un error al registrar la entrada", "error");
        }

        redirect("movimientos/entradas");
    }

    public function salidas()
    {

    }

    public function ajustes()
    {

    }
}