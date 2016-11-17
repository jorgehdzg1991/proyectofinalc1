<?php

class Rightbarmenu
{
    public function ObtenerMenu($moduloActual, $perfilUsuario)
    {
        $menu = [
            "Inicio" => [
                "link" => "inicio/index",
                "icono" => "fa fa-home",
                "activo" => false
            ],
            "Configuración del sistema" => [
                "link" => "configuracion/index",
                "icono" => "fa fa-cogs",
                "activo" => false,
                "nodos" => [
                    "Usuarios del sistema" => [

                    ]
                ]
            ],
            "Catálogos" => [
                "link" => "catalogos/index",
                "icono" => "fa fa-list-alt",
                "activo" => false,
                "nodos" => [
                    "Productos" => [
                        "link" => "productos/index"
                    ],
                    "Categorías de producto" => [
                        "link" => "categorias/index"
                    ],
                    "Unidades de medición" => [
                        "link" => "unidades/index"
                    ],
                    "Marcas" => [
                        "link" => "marcas/index"
                    ],
                    "Almacenes" => [
                        "link" => "almacenes/index"
                    ]
                ]
            ],
            "Consulta en almacenes" => [
                "link" => "consulta/index",
                "icono" => "fa fa-search",
                "activo" => false
            ],
            "Movimientos" => [
                "link" => "movimientos/index",
                "icono" => "fa fa-exchange",
                "activo" => false
            ],
            "Reportes" => [
                "link" => "reportes/index",
                "icono" => "fa fa-files-o",
                "activo" => false
            ]
        ];

        if ($perfilUsuario != 1) {
            unset($menu["Configuración del sistema"]);
        }

        foreach ($menu as $elemento => $valor) {
            if ($valor["link"] == $moduloActual) {
                $menu[$elemento]["activo"] = true;
            }
        }

        return $menu;
    }
}