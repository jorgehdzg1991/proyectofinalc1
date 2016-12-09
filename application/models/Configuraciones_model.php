<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ObtenerConfiguracion() {
        $sql = "
        SELECT
            tema.id AS idTema,
            tema.url AS url
        FROM
            configuraciones AS conf
        INNER JOIN temas AS tema ON conf.temas_id = tema.id
        WHERE
            conf.id = 1";

        $query = $this->db->query($sql);

        return $query->row_array();
    }

    public function Actualizar($data) {
        return $this->db->where("id", 1)->update("configuraciones", $data) ? true : false;
    }
}