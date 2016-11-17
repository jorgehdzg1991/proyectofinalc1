<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("usuarios_model");
    }

    public function index() {


        $datos = [
            "titulo" => "Usuarios del sistema"
        ];

        $this->CargarVista("usuarios/index", $datos);
    }
}