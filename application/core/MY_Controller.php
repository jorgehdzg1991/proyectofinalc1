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
}