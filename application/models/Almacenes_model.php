<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacenes_model extends CI_Model
{
    public function obtenerTodos()
    {
        $query = $this->db->get_where("almacenes", ["estatus" => 1]);
        return $query->result_array();
    }

    public function obtenerPorId($id)
    {
        $query = $this->db->get_where("almacenes", ["id" => $id], 1);
        return $query->row_array();
    }

    public function crear($data)
    {
        return $this->db->insert("almacenes", $data) ? true : false;
    }

    public function editar($id, $data)
    {
        return $this->db->where("id", $id)->update("almacenes", $data) ? true : false;
    }

    public function eliminar($id)
    {
        return $this->db->where("id", $id)->update("almacenes", ["estatus" => 0]) ? true : false;
    }

    public function consultarExistenciasAlmacen($idAlmacen) {
        $sql = "
        SELECT
            prod.id AS id,
            prod.nombre AS producto,
            prod.descripcion AS descripcion,
            cate.nombre AS categoria,
            unid.nombre AS unidad,
            marc.nombre AS marca,
            (
                SELECT
                    SUM(movi.cantidad)
                FROM
                    movimientos AS movi
                WHERE
                    movi.productos_id = prod.id
                AND almacenes_id = $idAlmacen
            ) AS cantidad
        FROM
            productos AS prod
        INNER JOIN categorias AS cate ON prod.categorias_id = cate.id
        INNER JOIN unidades AS unid ON prod.unidades_id = unid.id
        INNER JOIN marcas AS marc ON prod.marcas_id = marc.id
        WHERE
            prod.estatus = 1";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}