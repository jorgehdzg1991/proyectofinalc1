<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li><a href="<?php echo site_url("productos/index") ?>">Productos</a></li>
        <li>Crear producto</li>
    </ol>
    <h1>Producto</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("productos/index") ?>" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <?php echo form_open("productos/guardar", ["class" => "form-horizontal", "id" => "frmGuardarProducto"]) ?>
                    <div class="panel-heading">
                        <h4>Crear un nuevo producto</h4>
                    </div>
                    <div class="panel-body">
                        <div id="fgrNombre" class="form-group">
                            <label for="txtNombre" class="control-label col-sm-3">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtNombre" name="nombre" placeholder="Escribe el nombre del producto">
                            </div>
                            <div class="col-sm-3">
                                <p class="help-block" style="display: none;">
                                    <i class="fa fa-times"></i> El nombre no puede ser vacío
                                </p>
                            </div>
                        </div>
                        <div id="fgrDescripcion" class="form-group">
                            <label for="txtDescripcion" class="control-label col-sm-3">Descripcion</label>
                            <div class="col-sm-6">
                                <textarea name="descripcion"
                                          id="txtDescripcion"
                                          class="form-control"
                                          cols="30"
                                          rows="5"
                                          placeholder="Escribe la descrpcion del producto"></textarea>
                            </div>
                            <div class="col-sm-3">
                                <p class="help-block" style="display: none;">
                                    <i class="fa fa-times"></i> La descripción no puede estar vacía
                                </p>
                            </div>
                        </div>
                        <div id="fgrCategoria" class="form-group">
                            <label for="txtCategoria" class="control-label col-sm-3">Categoria</label>
                            <div class="col-sm-6">
                                <select id="cmbCategorias" name="categoria" class="select2-element" style="width: 100%;">
                                    <option value="0">Seleccione una categoría</option>
                                    <?php
                                    foreach ($categorias as $categoria) {
                                        echo '<option value="' . $categoria["id"] . '">' . $categoria["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <p class="help-block" style="display: none;">
                                    <i class="fa fa-times"></i> Debe escoger una categoría
                                </p>
                            </div>
                        </div>
                        <div id="fgrMarca" class="form-group">
                            <label for="txtMarca" class="control-label col-sm-3">Marca</label>
                            <div class="col-sm-6">
                                <select id="cmbMarcas" name="marca" class="select2-element" style="width: 100%;">
                                    <option value="0">Seleccione una marca</option>
                                    <?php
                                    foreach ($marcas as $marca) {
                                        echo '<option value="' . $marca["id"] . '">' . $marca["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <p class="help-block" style="display: none;">
                                    <i class="fa fa-times"></i> Debe de escoger una marca
                                </p>
                            </div>
                        </div>
                        <div id="fgrUnidad" class="form-group">
                            <label for="txtUnidad" class="control-label col-sm-3">Unidad</label>
                            <div class="col-sm-6">
                                <select id="cmbUnidades" name="unidad" class="select2-element" style="width: 100%;">
                                    <option value="0">Seleccione una unidad</option>
                                    <?php
                                    foreach ($unidades as $unidad) {
                                        echo '<option value="' . $unidad["id"] . '">' . $unidad["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <p class="help-block" style="display: none;">
                                    <i class="fa fa-times"></i> Debe escoger una unidad
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <a href="javascript:guardarProducto();" class="btn-primary btn">Guardar</a>
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
        $("#frmGuardarProducto").keypress(function(e) {
            if(e.which == 13) {
                guardarProducto();
            }
        });

        $("#txtNombre").click(function () {
            $("#fgrNombre").removeClass('has-error');
            $("#fgrNombre .help-block").css('display', 'none');
        });

        $("#txtDescripcion").click(function () {
            $("#fgrDescripcion").removeClass('has-error');
            $("#fgrDescripcion .help-block").css('display', 'none');
        });

        $("#cmbCategoria").click(function () {
            $("#fgrCategoria").removeClass('has-error');
            $("#fgrCategoria .help-block").css('display', 'none');
        });

        $("#cmbMarca").click(function () {
            $("#fgrMarca").removeClass('has-error');
            $("#fgrMarca .help-block").css('display', 'none');
        });

        $("#cmbUnidad").click(function () {
            $("#fgrUnidad").removeClass('has-error');
            $("#fgrUnidad .help-block").css('display', 'none');
        });
    });

    function guardarProducto() {
        $("#fgrNombre").removeClass('has-error');
        $("#fgrDescripcion").removeClass('has-error');
        $("#fgrCategoria").removeClass('has-error');
        $("#fgrMarca").removeClass('has-error');
        $("#fgrUnidad").removeClass('has-error');

        $("#fgrNombre .help-block").css("display", "none");
        $("#fgrDescripcion .help-block").css("display", "none");
        $("#fgrCategoria .help-block").css("display", "none");
        $("#fgrMarca .help-block").css("display", "none");
        $("#fgrUnidad .help-block").css("display", "none");

        var nombre = $("#txtNombre").val();
        var descripcion = $("#txtDescripcion").val();
        var categorias = $("#cmbCategorias").val();
        var marcas = $("#cmbMarcas").val();
        var unidades = $("#cmbUnidades").val();

        if (nombre === "") {
            $("#fgrNombre").addClass('has-error');
            $("#fgrNombre .help-block").css('display', 'block');

            $("#fgrNombre").navegarElemento();

            return;
        }

        if (descripcion === "") {
            $("#fgrDescripcion").addClass('has-error');
            $("#fgrDescripcion .help-block").css('display', 'block');

            $("#fgrDescripcion").navegarElemento();

            return;
        }

        if (categorias === "0") {
            $("#fgrCategoria").addClass('has-error');
            $("#fgrCategoria .help-block").css('display', 'block');

            $("#fgrCategoria").navegarElemento();

            return;
        }

        if (marcas === "0") {
            $("#fgrMarca").addClass('has-error');
            $("#fgrMarca .help-block").css('display', 'block');

            $("#fgrMarca").navegarElemento();

            return;
        }

        if (unidades === "0") {
            $("#fgrUnidad").addClass('has-error');
            $("#fgrUnidad .help-block").css('display', 'block');

            $("#fgrUnidad").navegarElemento();

            return;
        }

        $("#frmGuardarProducto").submit();
    }
</script>