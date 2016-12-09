<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generarReporteExistencias($filtros)
    {
        $restricciones = '';
        $restriccionAlmacen = '';

        if (isset($filtros['categoria'])) {
            $restricciones .= ' WHERE cate.id = ' . $filtros['categoria'];
        }

        if (isset($filtros['marca'])) {
            $prefix = $restricciones == '' ? 'WHERE' : 'AND';
            $restricciones .= ' ' . $prefix . ' marc.id = ' . $filtros['marca'];
        }

        if (isset($filtros['almacen'])) {
            $restriccionAlmacen .= ' AND movi.almacenes_id = ' . $filtros['almacen'];
        }

        $sql = '
        SELECT
            prod.id AS id,
            prod.nombre AS nombre,
            prod.descripcion AS descripcion,
            cate.nombre AS categoria,
            unid.nombre AS unidad,
            unid.abreviatura AS abreviatura,
            marc.nombre AS marca,
            (
                SELECT
                    SUM(movi.cantidad)
                FROM
                    movimientos AS movi
                WHERE
                    movi.productos_id = prod.id
                ' . $restriccionAlmacen . '
            ) AS cantidad
        FROM
            productos AS prod
        INNER JOIN categorias AS cate ON prod.categorias_id = cate.id
        INNER JOIN marcas AS marc ON prod.marcas_id = marc.id
        INNER JOIN unidades AS unid ON prod.unidades_id = unid.id'
            . $restricciones;

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function generarReporteMovimientos($filtros)
    {
        $restricciones = '';

        if (isset($filtros['categoria'])) {
            $prefix = $restricciones == '' ? 'WHERE' : 'AND';
            $restricciones .= ' ' . $prefix . ' cate.id = ' . $filtros['categoria'];
        }

        if (isset($filtros['marca'])) {
            $prefix = $restricciones == '' ? 'WHERE' : 'AND';
            $restricciones .= ' ' . $prefix . ' marc.id = ' . $filtros['marca'];
        }

        if (isset($filtros['almacen'])) {
            $prefix = $restricciones == '' ? 'WHERE' : 'AND';
            $restricciones .= ' ' . $prefix . ' movi.almacenes_id = ' . $filtros['almacen'];
        }

        if (isset($filtros['tipoMovimiento'])) {
            $prefix = $restricciones == '' ? 'WHERE' : 'AND';
            $restricciones .= ' ' . $prefix . ' tipo.id = ' . $filtros['tipoMovimiento'];
        }

        if (isset($filtros['fechas'])) {
            $prefix = $restricciones == '' ? 'WHERE' : 'AND';

            $fechaIni = new DateTime($filtros['fechas']['ini']);
            $fechaFin = new DateTime($filtros['fechas']['fin']);

            $restricciones .= ' ' . $prefix . ' movi.fecha >= \'' . $fechaIni->format('Y-m-d') . '\'';
            $restricciones .= ' AND movi.fecha <= \'' . $fechaFin->format('Y-m-d') . '\'';
        }

        $sql = '
        SELECT
            movi.id AS id,
            tipo.nombre AS tipo,
            prod.nombre AS producto,
            prod.descripcion AS descripcion,
            cate.nombre AS categoria,
            marc.nombre AS marca,
            unid.nombre AS unidad,
            unid.abreviatura AS abreviatura,
            movi.cantidad AS cantidad,
            alma.nombre AS almacen,
            movi.observaciones AS observaciones,
            movi.fecha AS fecha,
            usuarios.nombre AS usuario
        FROM
            movimientos AS movi
        INNER JOIN productos AS prod ON movi.productos_id = prod.id
        INNER JOIN categorias AS cate ON prod.categorias_id = cate.id
        INNER JOIN marcas AS marc ON prod.marcas_id = marc.id
        INNER JOIN unidades AS unid ON prod.unidades_id = unid.id
        INNER JOIN almacenes AS alma ON movi.almacenes_id = alma.id
        INNER JOIN usuarios ON movi.usuarios_id = usuarios.id
        INNER JOIN tiposmovimientos AS tipo ON movi.tiposmovimientos_id = tipo.id'
            . $restricciones;

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}