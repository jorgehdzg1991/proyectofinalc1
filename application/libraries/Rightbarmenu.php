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
                    "Configuración de temas" => [
                        "link" => "configuracion/index",
                        "activo" => false
                    ],
                    "Usuarios del sistema" => [
                        "link" => "usuarios/index",
                        "activo" => false
                    ]
                ]
            ],
            "Catálogos" => [
                "link" => "catalogos/index",
                "icono" => "fa fa-list-alt",
                "activo" => false,
                "nodos" => [
                    "Productos" => [
                        "link" => "productos/index",
                        "activo" => false
                    ],
                    "Categorías de producto" => [
                        "link" => "categorias/index",
                        "activo" => false
                    ],
                    "Unidades de medición" => [
                        "link" => "unidades/index",
                        "activo" => false
                    ],
                    "Marcas" => [
                        "link" => "marcas/index",
                        "activo" => false
                    ],
                    "Almacenes" => [
                        "link" => "almacenes/index",
                        "activo" => false
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
                "activo" => false,
                "nodos" => [
                    "Entradas" => [
                        "link" => "movimientos/entradas",
                        "activo" => false
                    ],
                    "Salidas" => [
                        "link" => "movimientos/salidas",
                        "activo" => false
                    ],
                    "Ajustes de inventario" => [
                        "link" => "movimientos/ajustes",
                        "activo" => false
                    ]
                ]
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

        foreach ($menu as $elemento => $propiedades) {
            if (isset($propiedades["nodos"])) {
                foreach ($propiedades["nodos"] as $subelemento => $propiedadesSubelemento) {
                    $controlador = explode("/", $propiedadesSubelemento["link"])[0];
                    $controladorActual = explode("/", $moduloActual)[0];

                    if ($controlador == $controladorActual) {
                        $menu[$elemento]["activo"] = true;
                        $menu[$elemento]["nodos"][$subelemento]["activo"] = true;
                    }
                }
            } else {
                if ($propiedades["link"] == $moduloActual) {
                    $menu[$elemento]["activo"] = true;
                }
            }
        }

        return $menu;
    }
}