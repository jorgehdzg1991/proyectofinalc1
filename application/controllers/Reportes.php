<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('reportes_model');
        $this->load->model('almacenes_model');
        $this->load->model('categorias_model');
        $this->load->model('marcas_model');
        $this->load->model('tiposmovimientos_model');
    }

    public function index($pdf = null)
    {
        $almacenes = $this->almacenes_model->obtenerTodos();
        $categorias = $this->categorias_model->obtenerTodos();
        $marcas = $this->marcas_model->obtenerTodos();
        $tiposMovimientos = $this->tiposmovimientos_model->obtenerTodos();
        $fechas = '01/' . date('m/Y') . ' - ' . date('d/m/Y');

        $this->CargarVista('reportes/index', [
            'titulo' => 'Reportes',
            'almacenes' => $almacenes,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'tiposMovimientos' => $tiposMovimientos,
            'fechas' => $fechas
        ]);
    }

    public function generar()
    {
        switch ($_POST['tipoReporte']) {
            case '1':
                $filtros = [];

                if ($_POST['almacen'] != '0') {
                    $filtros['almacen'] = $_POST['almacen'];
                }

                if ($_POST['categoria'] != '0') {
                    $filtros['categoria'] = $_POST['categoria'];
                }

                if ($_POST['marca'] != '0') {
                    $filtros['marca'] = $_POST['marca'];
                }

                $datos = $this->reportes_model->generarReporteExistencias($filtros);
                break;
            case '2':
                $filtros = [];

                if ($_POST['tipoMovimiento'] != '0') {
                    $filtros['tipoMovimiento'] = $_POST['tipoMovimiento'];
                }

                if ($_POST['almacen'] != '0') {
                    $filtros['almacen'] = $_POST['almacen'];
                }

                if ($_POST['categoria'] != '0') {
                    $filtros['categoria'] = $_POST['categoria'];
                }

                if ($_POST['marca'] != '0') {
                    $filtros['marca'] = $_POST['marca'];
                }

                $fechas = explode(' ', $_POST['fechas']);

                $fechaIni = new DateTime(str_replace('/', '-', $fechas[0]));
                $fechaFin = new DateTime(str_replace('/', '-', $fechas[2]));

                $filtros['fechas']['ini'] = $fechaIni->format('Y-m-d');
                $filtros['fechas']['fin'] = $fechaFin->format('Y-m-d');

                $datos = $this->reportes_model->generarReporteMovimientos($filtros);
                break;
        }

        if (count($datos) > 0) {
            $html = $this->generarHTML($datos);
            $pdf = $this->generarPDF($html);

            $this->setMensajeFlash('¡Éxito!', 'Reporte generado correctamente', 'success');
        } else {
            $this->setMensajeFlash('Error', 'La consulta no produjo ningún resultado', 'error');
        }

        redirect('reportes/index');
    }

    private function generarHTML($datos)
    {
        $encabezados = array_keys($datos[0]);

        $htmlTabla = '<tr class="header">';

        foreach ($encabezados as $encabezado) {
            $htmlTabla .= '<th>' . mb_strtoupper($encabezado) . '</th>';
        }

        $htmlTabla .= '</tr>';

        foreach ($datos as $renglon) {
            $htmlTabla .= '<tr>';

            foreach ($renglon as $celda) {
                $htmlTabla .= '<td>' . $celda . '</td>';
            }

            $htmlTabla .= '</tr>';
        }

        $html = '
        <!DOCTYPE html>
        <html>
            <head>
                <title>Reporte</title>
                <meta charset="utf-8">
                <style>
                    html {
                        font-family:Calibri, Arial, Helvetica, sans-serif;
                        font-size:11pt;
                        background-color:white
                    }
                    table { border-collapse:collapse; }
                    td, th {
                        text-align:center;
                        vertical-align:top;
                        padding:5px;
                        border: 1px solid #000;
                    }
                    tr.header {
                        background-color:#b5b5b5;
                        font-weight:bold;
                    }
                </style>
            </head>
            <body>
                <table>
                    ' . $htmlTabla . '
                </table>
            </body>
        </html>';

        return $html;
    }

    private function generarPDF($html)
    {
        $pdf = new \TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->setFontSubsetting(false);

        $fechaReporte = date("d-m-Y");

        $descripcion = "Reporte del $fechaReporte";

        $pdf->SetCreator("MTDyDM");
        $pdf->SetAuthor("MTDyDM");
        $pdf->SetTitle($descripcion);
        $pdf->SetSubject($descripcion);
        $pdf->SetKeywords($descripcion);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->SetMargins(10, 20, 10);
        $pdf->SetAutoPageBreak(false, 15);

        $pdf->SetFont('helvetica', '', 7);

        $pdf->AddPage();
        
        $pdf->writeHTML($html);

        $file = FCPATH . '/files/' . date('YmdHis') . '.pdf';

        $pdf->Output($file, "F");

        return $file;
    }
}