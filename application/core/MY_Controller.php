<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function CargarVista($nombreVista, $datos = null)
    {
        if ($nombreVista == "login/index") {
            $this->load->view($nombreVista);
            return;
        }

        $datos["auth"] = $this->session->userdata("auth");

        $this->load->library("rightbarmenu");

        $menu = $this->rightbarmenu->ObtenerMenu($nombreVista, $datos["auth"]["perfil"]);

        $datos["menu"] = $menu;

        $this->load->view("compartido/header", $datos);
        $this->load->view($nombreVista);
        $this->load->view("compartido/footer");
    }

    protected function ValidarSesion()
    {
        return $this->session->userdata("auth") ? true : false;
    }

    protected function setMensajeFlash($mensaje, $tipo) {
        $mensajeFlash = [
            "mensaje" => $mensaje,
            "clase" => ""
        ];

        switch ($tipo) {
            case "exito":
                $mensaje["clase"] = "alert alert-success";
                break;
            case "advertencia":
                $mensaje["clase"] = "alert alert-warning";
                break;
            case "error":
                $mensaje["clase"] = "alert alert-danger";
                break;
        }

        $this->session->set_userdata(["mensajeFlash" => $mensajeFlash]);
    }

    protected function getMensajeFlash()
    {
        return $this->session->userdata("mensajeFlash");
    }

    protected function unsetMensajeFlash()
    {
        $this->session->unset_userdata("mensajeFlash");
    }
}