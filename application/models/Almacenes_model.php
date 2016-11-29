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

    public function consultarExistenciasAlmacen($id) {
        $sql = "
        SELECT
            alma.id AS idAlmacen,
            alma.nombre AS nombreAlmacen,
            timo.id AS idTipoMovimiento,
            timo.nombre AS nombreTipoMovimiento,
            prod.id AS idProducto,
            prod.nombre AS nombreProducto,
            prod.descripcion AS descripcionProducto,
            movi.cantidad AS cantidadMovimiento,
            movi.observaciones AS observacionesMovimiento,
            movi.fecha AS fechaMovimiento,
            cate.id AS idCategorias,
            cate.nombre AS nombreCategoria,
            marc.id AS idMarca,
            marc.nombre AS nombreMarca,
            unid.id AS idUnidad,
            unid.nombre AS nombreUnidad,
            unid.abreviatura AS abreviaturaUnidad,
            usua.id AS idUsuarioMovimiento,
            usua.nombre AS nombreUsuarioMovimiento
        FROM
            almacenes AS alma
        INNER JOIN movimientos AS movi ON movi.almacenes_id = alma.id
        INNER JOIN productos AS prod ON movi.productos_id = prod.id
        INNER JOIN tiposmovimientos AS timo ON movi.tiposmovimientos_id = timo.id
        INNER JOIN categorias AS cate ON prod.categorias_id = cate.id
        INNER JOIN marcas AS marc ON prod.marcas_id = marc.id
        INNER JOIN unidades AS unid ON prod.unidades_id = unid.id
        INNER JOIN usuarios AS usua ON movi.usuarios_id = usua.id
        WHERE
            alma.id = $id";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}