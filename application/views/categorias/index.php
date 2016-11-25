<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Categorias</li>
    </ol>
    <h1>Categorias de producto</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("categorias/crear") ?>" class="btn btn-primary">
                <i class="fa fa-file-o"></i> Crear nueva categoria
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Catálogo de categorias</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
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
                            if (count($categorias) > 0) {
                                foreach ($categorias as $categorias) {
                                    echo '
                                    <tr>
                                        <td>' . $categorias["id"] . '</td>
                                        <td>' . $categorias["nombre"] . '</td>
                                        <td>' . $categorias["usuario"] . '</td>
                                        <td>' . $categorias["fecha"] . '</td>
                                        <td>
                                            <a href="' . site_url("categorias/editar/{$categorias["id"]}") . '" class="btn btn-default btn-sm" title="Editar categoría">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="javascript:eliminarCategoria(\'' . site_url("categorias/eliminar/{$categorias["id"]}") . '\', \'' . $categorias["nombre"] . '\');"
                                               class="btn btn-danger btn-sm"
                                               title="Eliminar categoría">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '
                                <tr>
                                    <td colspan="5">
                                        No se encontraron registros en tu catálogo de categorías de producto. 
                                        Si deseas crear una ahora, haz click en el botón de abajo.<br><br>
                                        <a href="' . site_url("categorias/crear") . '" class="btn btn-primary">Crear una categoría ahora</a>
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
    function eliminarCategoria(url, nombreCategoria) {
        bootbox.confirm({
            title: 'Eliminar categoria: ' + nombreCategoria,
            message: '¿Realmente deseas eliminar esta categoría?',
            buttons: {
                'cancel': {
                    label: 'No realmente',
                    className: 'btn-default'
                },
                'confirm': {
                    label: 'Si, elimínala',
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