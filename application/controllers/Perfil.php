<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("usuarios_model");
    }

    public function index()
    {
        
        $datos["auth"] = $this->session->userdata("auth");
        
        $this->CargarVista("perfil/index", $datos);
    }
    
    public function guardar()
    {
        $nombre = $_POST["nombre"];
        $usuarios_id = $this->session->userdata("auth")["id"];

        $result = $this->usuarios_model->crear([
            "nombre" => $nombre,
            "usuarios_id" => $usuarios_id
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "Usuario guardado correctamente", "success");
        } else {
            $this->setMensajeFlash("Error", "No se pudo guardar el usuario. Intente nuevamente.", "error");
        }

        redirect("perfil/index");
    }

    public function editar()
    {
        $datos = [
            "titulo" => "Perfil"
        ];
        $perfil = $this->session->userdata("auth");

        if ($perfil != null) {
            $datos["perfil"] = $perfil;
            $this->CargarVista("perfil/editar", $datos);
        } else {
            $this->setMensajeFlash("Advertencia", "No se encontró el usuario que quería editar", "error");
            redirect("perfil/index");
        }
    }

    public function actualizar()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        
            
        $result = $this->usuarios_model->editar($id, [
            "nombre" => $nombre
        ]);

        if ($result == true) {
            $this->setMensajeFlash("Éxito", "usuario actualizado correctamente", "success");
            redirect("perfil/index");
        } else {
            $this->setMensajeFlash("Error", "No se pudo actualizar el usuario. Intente nuevamente.", "error");
            redirect("perfil/editar/$id");
        }
    }

}