<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Marcas</li>
    </ol>
    <h1>Marcas</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("marcas/crear") ?>" class="btn btn-primary">
                <i class="fa fa-file-o"></i> Crear nueva marca
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Catálogo de marcas</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
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
                            foreach ($marcas as $marca) {
                                echo '
                                <tr>
                                    <td>' . $marca["id"] . '</td>
                                    <td>' . $marca["nombre"] . '</td>
                                    <td>' . $marca["usuario"] . '</td>
                                    <td>' . $marca["fecha"] . '</td>
                                    <td>
                                        <a href="' . site_url("marcas/editar") . '" class="btn btn-default btn-sm" title="Editar marca">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="' . site_url("marcas/eliminar") . '" class="btn btn-default btn-sm" title="Eliminar marca">
                                            <i class="fa fa-times"></i>
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