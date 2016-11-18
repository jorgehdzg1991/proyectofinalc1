<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li><a href="<?php echo site_url("usuarios/index") ?>">Usuarios</a></li>
        <li>Editar usuario</li>
    </ol>
    <h1>Usuarios del sistema</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("usuarios/index") ?>" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <?php echo form_open("usuarios/actualizar", ["class" => "form-horizontal", "id" => "frmCrearUsuario"]) ?>
                <div class="panel-heading">
                    <h4>Editar usuario: <?php echo $usuario["nombre"] ?></h4>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="txtId" name="id" value="<?php echo $usuario["id"] ?>">
                    <div class="form-group">
                        <label for="txtNombre" class="control-label col-sm-3">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text"
                                   class="form-control"
                                   id="txtNombre"
                                   name="nombre"
                                   placeholder="Escribe el nombre completo del usuario"
                                   value="<?php echo $usuario["nombre"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cmbPerfil" class="control-label col-sm-3">Perfil</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="perfil" id="cmbPerfil">
                                <option value="2"<?php echo $usuario["perfil"] == "2" ? " selected" : "" ?>>
                                    Usuario del sistema
                                </option>
                                <option value="1"<?php echo $usuario["perfil"] == "1" ? " selected" : "" ?>>
                                    Administrador
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <button class="btn-primary btn">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>