<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->CargarVista("login/index");
    }

    public function start()
    {
        $this->load->model("usuarios_model");

        $username = $_POST["login"];
        $password = $_POST["password"];

        $usuario = $this->usuarios_model->obtenerPorCredenciales($username, $password);

        if ($usuario != false) {
            $this->session->set_userdata(["auth" => [
                "id" => $usuario["id"],
                "nombre" => $usuario["nombre"],
                "login" => $usuario["login"],
                "perfil" => $usuario["perfil"]
            ]]);

            redirect("inicio/index");
        } else {
            redirect("login/index");
        }
    }

    public function end()
    {
        $this->session->unset_userdata("auth");
        redirect("login/index");
    }
}