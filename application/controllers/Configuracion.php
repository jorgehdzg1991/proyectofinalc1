<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->CargarVista("configuracion/index");
    }
}