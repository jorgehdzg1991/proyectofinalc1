<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Productos</li>
    </ol>
    <h1>Productos</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("productos/crear") ?>" class="btn btn-primary">
                <i class="fa fa-file-o"></i> Crear nuevo producto
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Catálogo de productos</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatables" id="tblProductos">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Unidad</th>
                                <th>Creado por</th>
                                <th>Fecha de creación</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($productos as $producto) {
                                echo '
                                    <tr>
                                        <td>' . $producto["id"] . '</td>
                                        <td>' . $producto["nombre"] . '</td>
                                        <td>' . $producto["descripcion"] . '</td>
                                        <td>' . $producto["categoria"] . '</td>
                                        <td>' . $producto["marca"] . '</td>
                                        <td>' . $producto["unidad"] . '</td>
                                        <td>' . $producto["usuario"] . '</td>
                                        <td>' . $producto["fecha"] . '</td>
                                        <td>
                                            <a href="' . site_url("productos/editar/{$producto["id"]}") . '" class="btn btn-default btn-sm" title="Editar producto">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="javascript: eliminarProducto(\'' . site_url("productos/eliminar/{$producto["id"]}") . '\', \'' . $producto["nombre"] . '\');"
                                               class="btn btn-danger btn-sm" title="Eliminar producto">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
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
    function eliminarProducto(url, nombreProducto) {
        bootbox.confirm({
            title: 'Eliminar producto: ' + nombreProducto,
            message: '¿Realmente deseas eliminar esto producto?',
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
