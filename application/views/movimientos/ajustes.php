<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Movimientos: Ajustes</li>
    </ol>
    <h1>Ajustes de inventario</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <?php echo form_open("movimientos/registrarAjuste", ["class" => "form-horizontal", "id" => "frmAjustes"]) ?>
                <div class="panel-heading">
                    <h4>Realizar ajustes de inventario</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group" id="frgAlmacen">
                        <label for="cmbAlmacen" class="control-label col-sm-3">Almacén</label>
                        <div class="col-sm-6">
                            <select name="almacen" id="cmbAlmacen" class="select2-element" style="width: 100%;">
                                <option value="0">Seleccione un almacén</option>
                                <?php
                                foreach ($almacenes as $almacen) {
                                    echo '<option value="' . $almacen["id"] . '">' . $almacen["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <p class="help-block" style="display: none;">
                                <i class="fa fa-times"></i> Debe seleccionar un almacén
                            </p>
                        </div>
                    </div>
                    <div class="form-group" id="frgProducto">
                        <label for="cmbProducto" class="control-label col-sm-3">Producto</label>
                        <div class="col-sm-6">
                            <select name="producto" id="cmbProducto" class="select2-element" style="width: 100%;">
                                <option value="0">Seleccione un producto</option>
                                <?php
                                foreach ($productos as $producto) {
                                    echo '<option value="' . $producto["id"] . '">' . $producto["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <p class="help-block" style="display: none;">
                                <i class="fa fa-times"></i> Debe seleccionar un producto
                            </p>
                        </div>
                    </div>
                    <div class="form-group" id="frgTipoMov">
                        <label for="cmbTipoMov" class="control-label col-sm-3">Tipo de Ajuste</label>
                        <div class="col-sm-6">
                            <select name="tipo" id="cmbTipoMov" class="select2-element" style="width: 100%;">
                                <option value="0">Seleccione un tipo de ajuste</option>
                                <?php
                                foreach ($tiposmovimientos as $tipo) {
                                    echo '<option value="' . $tipo["id"] . '">' . $tipo["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <p class="help-block" style="display: none;">
                                <i class="fa fa-times"></i> Debe seleccionar un tipo de ajuste
                            </p>
                        </div>
                    </div>
                    <div class="form-group" id="frgCantidad">
                        <label for="txtCantidad" class="control-label col-sm-3">Cantidad</label>
                        <div class="col-sm-6">
                            <input type="number" name="cantidad" id="txtCantidad" class="form-control" min="1" value="1" placeholder="¿Qué cantidad va a salir del almacén?">
                        </div>
                        <div class="col-sm-3">
                            <p class="help-block" style="display: none;">
                                <i class="fa fa-times"></i> La cantidad mínima es 1
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtObservaciones" class="control-label col-sm-3">Observaciones</label>
                        <div class="col-sm-6">
                            <textarea name="observaciones"
                                      id="txtObservaciones"
                                      class="form-control"
                                      cols="30"
                                      rows="5"
                                      placeholder="Agrega tus comentarios"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <a href="javascript: guardarAjuste();" class="btn-primary btn">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#frmAjustes").keypress(function(e) {
            if(e.which == 13) {
                guardarSalida();
            }
        });

        $("#cmbAlmacen").click(function () {
            $("#frgAlmacen").removeClass('has-error');
            $("#frgAlmacen .help-block").css('display', 'none');
        });

        $("#cmbProducto").click(function () {
            $("#frgProducto").removeClass('has-error');
            $("#frgProducto .help-block").css('display', 'none');
        });

        $("#cmbTipoMov").click(function () {
            $("#frgTipoMov").removeClass('has-error');
            $("#frgTipoMov .help-block").css('display', 'none');
        });

        $("#txtCantidad").click(function () {
            $("#frgCantidad").removeClass('has-error');
            $("#frgCantidad .help-block").css('display', 'none');
        });
    });

    function guardarAjuste() {
        var producto = $("#cmbProducto").val();
        var almacen = $("#cmbAlmacen").val();
        var cantidad = $("#txtCantidad").val();

        if (producto === '0') {
            $("#frgProducto").addClass('has-error');
            $("#frgProducto .help-block").css('display', 'block');
            return;
        }

        if (tipo === '0') {
            $("#frgTipoMov").addClass('has-error');
            $("#frgTipoMov .help-block").css('display', 'block');
            return;
        }

        if (almacen === '0') {
            $("#frgAlmacen").addClass('has-error');
            $("#frgAlmacen .help-block").css('display', 'block');
            return;
        }

        if (cantidad < 0) {
            $("#frgCantidad").addClass('has-error');
            $("#frgCantidad .help-block").css('display', 'block');
            return;
        }

        $("#frmAjustes").submit();
    }
</script>