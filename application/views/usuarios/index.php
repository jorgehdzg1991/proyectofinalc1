<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Usuarios</li>
    </ol>
    <h1>Usuarios del sistema</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("usuarios/crear") ?>" class="btn btn-primary">
                <i class="fa fa-user"></i> Crear nuevo usuario
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Usuarios del sistema</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Inicio de sesión</th>
                                <th>Perfil</th>
                                <th>Creado por</th>
                                <th>Fecha de creación</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($usuarios) > 0) {
                                foreach ($usuarios as $usuario) {
                                    $accionEliminar = $authId != $usuario["id"] ? '
                                    <a href="javascript: eliminarUsuario(\'' . site_url("usuarios/eliminar/{$usuario["id"]}") . '\', \'' . $usuario["nombre"] . '\');"
                                       class="btn btn-danger btn-sm"
                                       title="Eliminar usuario">
                                        <i class="fa fa-trash-o"></i>
                                    </a>' : '';

                                    echo '
                                    <tr>
                                        <td>' . $usuario["id"] . '</td>
                                        <td>' . $usuario["nombre"] . '</td>
                                        <td>' . $usuario["login"] . '</td>
                                        <td>' . $usuario["perfil"] . '</td>
                                        <td>' . $usuario["usuarioCreador"] . '</td>
                                        <td>' . $usuario["fechaCreacion"] . '</td>
                                        <td>
                                            <a href="' . site_url("usuarios/editar/{$usuario["id"]}") . '"
                                               class="btn btn-default btn-sm"
                                               title="Editar usuario">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            ' . $accionEliminar . '
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '
                                <tr>
                                    <td colspan="5">
                                        Actualmente no hay usuarios registrados en el sistema. Haz click en el
                                        botón de abajo para crear uno nuevo.<br><br>
                                        <a href="' . site_url("usuarios/crear") . '" class="btn btn-primary">Crear un usuario ahora</a>
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
    function eliminarUsuario(url, nombreUsuario) {
        bootbox.confirm({
            title: 'Eliminar usuario: ' + nombreUsuario,
            message: '¿Realmente deseas eliminar este usuario?',
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