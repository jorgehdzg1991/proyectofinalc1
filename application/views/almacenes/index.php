<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Almacenes</li>
    </ol>
    <h1>Almacenes</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("almacenes/crear") ?>" class="btn btn-primary">
                <i class="fa fa-file-o"></i> Crear nuevo almacén
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Catálogo de almacenes</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Creado por</th>
                                <th>Fecha de creación</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($almacenes) > 0) {
                                foreach ($almacenes as $almacen) {
                                    echo '
                                    <tr>
                                        <td>' . $almacen["id"] . '</td>
                                        <td>' . $almacen["nombre"] . '</td>
                                        <td>' . $almacen["usuario"] . '</td>
                                        <td>' . $almacen["fecha"] . '</td>
                                        <td>
                                            <a href="' . site_url("almacenes/editar/{$almacen["id"]}") . '"
                                               class="btn btn-default btn-sm"
                                               title="Editar almacén">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="javascript: eliminarAlmacen(\'' . site_url("almacenes/eliminar/{$almacen["id"]}") . '\', \'' . $almacen["nombre"] . '\');"
                                               class="btn btn-default btn-sm"
                                               title="Eliminar almacén">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '
                                <tr>
                                    <td colspan="5">
                                        No se encontraron registros en tu catálogo de almacenes. 
                                        Si deseas crear uno ahora, haz click en el botón de abajo.<br><br>
                                        <a href="' . site_url("almacenes/crear") . '" class="btn btn-primary">Crear un almacén ahora</a>
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
    function eliminarAlmacen(url, nombreAlmacen) {
        bootbox.confirm({
            title: 'Eliminar almacén: ' + nombreAlmacen,
            message: '¿Realmente deseas eliminar este almacén?',
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
</script>