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
        $this->load->model("categorias_model");
        $this->load->model("unidades_model");
        $this->load->model("marcas_model");
        $this->load->model("productos_model");
        $this->load->model("usuarios_model");
        $this->load->model("almacenes_model");
        
    }

     public function index()
    {
        $productos = $this->productos_model->obtenerTodos();
        $datosProductos = [];
        foreach ($productos as $producto) {
            $categoria = $this->categorias_model->obtenerPorId($producto["categorias_id"]);
            $marca = $this->marcas_model->obtenerPorId($producto["marcas_id"]);
            $unidad = $this->unidades_model->obtenerPorId($producto["unidades_id"]);
            $usuario = $this->usuarios_model->obtenerPorId($producto["usuarios_id"]);
            $fecha = new DateTime($producto["fechaCreacion"]);

            $datosProductos[] = [
                "id" => $producto["id"],
                "nombre" => $producto["nombre"],
                "descripcion" => $producto["descripcion"],
                "categoria" => $categoria["nombre"],
                "unidad" => $unidad["nombre"],
                "marca" => $marca["nombre"],
                "usuario" => $usuario["nombre"],
                "fecha" => $fecha->format('d/m/Y H:i:s'),
                "estatus" => $producto ["estatus"]
            ];
        }

        $datos = [
            "titulo" => "Consultar Almacenes",
            "productos" => $datosProductos
        ];

        $this->CargarVista("consulta/index", $datos);
    }

 }
