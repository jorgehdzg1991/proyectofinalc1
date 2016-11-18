<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li><a href="<?php echo site_url("usuarios/index") ?>">Usuarios</a></li>
        <li>Crear usuario</li>
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
                <?php echo form_open("usuarios/guardar", ["class" => "form-horizontal", "id" => "frmCrearUsuario"]) ?>
                <div class="panel-heading">
                    <h4>Crear un nuevo usuario</h4>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <h4>Información general del usuario</h4>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="txtNombre" class="control-label col-sm-3">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="txtNombre" name="nombre" placeholder="Escribe el nombre completo del usuario">
                        </div>
                    </div>
                    <div id="fgrPerfil" class="form-group">
                        <label for="cmbPerfil" class="control-label col-sm-3">Perfil</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="perfil" id="cmbPerfil">
                                <option value="0">Seleccione un perfil de usuario</option>
                                <option value="2">Usuario del sistema</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <p class="help-block" style="display: none;">
                                <i class="fa fa-times"></i> No seleccionó un perfil de usuario
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h4>Inicio de sesión</h4>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="txtLogin" class="control-label col-sm-3">Nombre de inicio de sesión</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="txtLogin" name="login" placeholder="Escribe el nombre con el que iniciará sesión el usuario">
                        </div>
                    </div>
                    <div id="fgrPassword" class="form-group">
                        <label for="txtPassword" class="control-label col-sm-3">Contraseña</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="txtPassword" name="password" placeholder="Escribe tu contraseña (16 caracteres máximo)" maxlength="16">
                        </div>
                        <div class="col-sm-3">
                            <p class="help-block" style="display: none;">
                                <i class="fa fa-times"></i> Las contraseñas no coinciden
                            </p>
                        </div>
                    </div>
                    <div id="fgrRepassword" class="form-group">
                        <label for="txtRepassword" class="control-label col-sm-3">Vuelve a escribir tu contraseña</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="txtRepassword" placeholder="Las contraseñas deben coincidir" maxlength="16">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <a href="javascript:guardarNuevoUsuario();" class="btn-primary btn">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#frmCrearUsuario").keypress(function(e) {
            if(e.which == 13) {
                guardarNuevoUsuario();
            }
        });

        $("#cmbPerfil").click(function () {
            $("#fgrPerfil").removeClass('has-error');
            $("#fgrPerfil .help-block").css('display', 'none');
        });

        $("#txtPassword, #txtRepassword").click(function () {
            $("#fgrPassword").removeClass('has-error');
            $("#fgrPassword .help-block").css('display', 'none');
            $("#fgrRepassword").removeClass('has-error');
        });
    });

    function guardarNuevoUsuario() {
        var perfil = $("#cmbPerfil").val();
        var password = $("#txtPassword").val();
        var repassword = $("#txtRepassword").val();

        if (perfil === '0') {
            $("#fgrPerfil").addClass('has-error');
            $("#fgrPerfil .help-block").css('display', 'block');

            $("#fgrPerfil").navegarElemento();

            return;
        }

        if (password !== repassword) {
            $("#fgrPassword").addClass('has-error');
            $("#fgrPassword .help-block").css('display', 'block');
            $("#fgrRepassword").addClass('has-error');

            $("#fgrPassword").navegarElemento();

            return;
        }

        $("#frmCrearUsuario").submit();
    }
</script>