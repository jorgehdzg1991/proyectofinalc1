<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Unidades</li>
    </ol>
    <h1>Unidades</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("unidades/crear") ?>" class="btn btn-primary">
                <i class="fa fa-file-o"></i> Crear un nueva unidad
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Catálogo de unidades</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Abreviatura</th>
                                <th>Creado por</th>
                                <th>Fecha de creación</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($unidades) > 0) {
                                foreach ($unidades as $unidad) {
                                    echo '
                                    <tr>
                                        <td>' . $unidad["id"] . '</td>
                                        <td>' . $unidad["nombre"] . '</td>  
                                        <td>' . $unidad["abreviatura"] . '</td>    
                                        <td>' . $unidad["usuario"] . '</td>
                                        <td>' . $unidad["fecha"] . '</td>
                                        <td>
                                            <a href="' . site_url("unidades/editar/{$unidad["id"]}") . '"
                                               class="btn btn-default btn-sm"
                                               title="Editar unidades">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="javascript: eliminarUnidad(\'' . site_url("unidades/eliminar/{$unidad["id"]}") . '\', \'' . $unidad["nombre"] . '\');"
                                               class="btn btn-danger btn-sm"
                                               title="Eliminar unidades">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '
                                <tr>
                                    <td colspan="5">
                                        No se encontraron registros en tu catálogo de unidades. 
                                        Si deseas crear una ahora, haz click en el botón de abajo.<br><br>
                                        <a href="' . site_url("unidades/crear") . '" class="btn btn-primary">Crear una unidad ahora</a>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function eliminarUnidad(url, nombreUnidad) {
        bootbox.confirm({
            title: 'Eliminar unidad: ' + nombreUnidad,
            message: '¿Realmente deseas eliminar esta unidad?',
            buttons: {
                'cancel': {
                    label: 'No realmente',
                    className: 'btn-default'
                },
                'confirm': {
                    label: 'Si, elimínalo',
                    className: 'btn-danger'
                }
            },
            callback: function(result) {
                if (result) {
                    window.location = url;
                }
            }
        });

    }
</script><?php



