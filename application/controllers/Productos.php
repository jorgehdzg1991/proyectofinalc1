<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Productos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("categorias_model");
        $this->load->model("unidades_model");
        $this->load->model("marcas_model");
        $this->load->model("productos_model");
        $this->load->model("usuarios_model");
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
            "titulo" => "Productos",
            "productos" => $datosProductos
        ];

        $this->CargarVista("productos/index", $datos);
    }

    public function crear()
    {
        $categorias = $this->categorias_model->obtenerTodos();
        $marcas = $this->marcas_model->obtenerTodos();
        $unidades = $this->unidades_model->obtenerTodos();

        $datos = [
            "titulo" => "Producto",
            "categorias" => $categorias,
            "marcas" => $marcas,
            "unidades" => $unidades
        ];

        $this->CargarVista("productos/crear", $datos);
    }

    public function guardar()
    {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $categoria = $_POST["categoria"];
        $unidad = $_POST["unidad"];
        $marca = $_POST["marca"];
        $usuarios_id = $this->session->userdata("auth")["id"];

        $result = $this->productos_model->crear([
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "categorias_id" => $categoria,
            "unidades_id" => $unidad,
            "marcas_id" => $marca,
            "usuarios_id" => $usuarios_id
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Producto creado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo guardar el producto. Intente nuevamente.", "error");
        }

        redirect("productos/index");
    }

    public function editar($id)
    {
        $categorias = $this->categorias_model->obtenerTodos();
        $marcas = $this->marcas_model->obtenerTodos();
        $unidades = $this->unidades_model->obtenerTodos();
        $producto = $this->productos_model->obtenerPorId($id);

        $datos = [
            "titulo" => "Productos",
            "categorias" => $categorias,
            "marcas" => $marcas,
            "unidades" => $unidades
        ];

        if ($producto != null) {
            $datos["producto"] = $producto;
            $this->CargarVista("productos/editar", $datos);
        } else {
            $this->setMensajeFlash("Advertencia", "No se encontró el producto que quería editar", "error");
            redirect("productos/index");
        }
    }

    public function actualizar()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];

        $result = $this->productos_model->editar($id, [
            "nombre" => $nombre,
            "descripcion" => $descripcion
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Producto actualizado correctamente", "success");
            redirect("productos/index");
        } else {
            $this->setMensajeFlash("Error", "No se pudo actualizar el producto. Intente nuevamente.", "error");
            redirect("productos/editar/$id");
        }
    }

    public function eliminar($id)
    {
        $result = $this->productos_model->eliminar($id);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Producto eliminado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo eliminar el producto. Intente nuevamente.", "error");
        }

        redirect("productos/index");
    }
}

