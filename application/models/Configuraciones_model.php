<?php

/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 07/12/2016
 * Time: 07:52 PM
 */
class Configuraciones_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ObtenerConfiguracion() {
        $sql = "
        SELECT
            tema.url AS url
        FROM
            configuraciones AS conf
        INNER JOIN temas AS tema ON conf.temas_id = tema.id
        WHERE
            conf.id = 1";

        $query = $this->db->query($sql);

        return $query->row_array();
    }
}