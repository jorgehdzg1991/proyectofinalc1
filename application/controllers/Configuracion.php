<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('configuraciones_model');
        $this->load->model('temas_model');
    }

    public function index()
    {
        $configuracion = $this->configuraciones_model->ObtenerConfiguracion();
        $temas = $this->temas_model->obtenerTodos();

        $datosTemas = [];

        foreach ($temas as $tema) {
            $datosTemas[] = [
                'id' => $tema['id'],
                'nombre' => $tema['nombre'],
                'url' => base_url($tema['url'])
            ];
        }

        $this->CargarVista("configuracion/index", [
            'titulo' => 'Configuración de temas',
            'configuracion' => $configuracion,
            'temas' => $datosTemas
        ]);
    }

    public function guardar() {
        $tema = $_POST['tema'];

        $result = $this->configuraciones_model->Actualizar([
            'temas_id' => $tema
        ]);

        if ($result) {
            $this->setMensajeFlash('¡Éxito!', 'Se ha guardado la configuración', 'success');
        } else {
            $this->setMensajeFlash('Error', 'No pudo guardarse la configuración. Intente nuevamente.', 'error');
        }

        redirect('configuracion/index');
    }
}