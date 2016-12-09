<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Reportes</li>
    </ol>
    <h1>Generar reporte</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <?php echo form_open('reportes/generar', ['class' => 'form-horizontal']) ?>
                <div class="panel-heading">
                    <h4>Generar reportes</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="cmbTipoReporte" class="control-label col-sm-3">Tipo de reporte</label>
                        <div class="col-sm-6">
                            <select name="tipoReporte" id="cmbTipoReporte" class="select2-element" style="width: 100%;">
                                <option value="0">Seleccione un tipo de reporte</option>
                                <option value="1">Reporte de existencias</option>
                                <option value="2">Reporte de movimientos</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="fgrTipoMovimiento" style="display: none;">
                        <label for="cmbTipoMovimiento" class="control-label col-sm-3">Tipo de movimiento</label>
                        <div class="col-sm-6">
                            <select name="tipoMovimiento" id="cmbTipoMovimiento" class="select2-element"
                                    style="width: 100%;">
                                <option value="0">Todos los tipos de movimiento</option>
                                <?php
                                foreach ($tiposMovimientos as $tipo) {
                                    echo '<option value="' . $tipo['id'] . '">' . $tipo['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="fgrFechas" style="display: none;">
                        <label class="col-sm-3 control-label">Rango de fechas</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="fechas" class="form-control" id="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="fgrAlmacen" style="display: none;">
                        <label for="cmbAlmacen" class="control-label col-sm-3">Almacen</label>
                        <div class="col-sm-6">
                            <select name="almacen" id="cmbAlmacen" class="select2-element" style="width: 100%;">
                                <option value="0">Todos los almacenes</option>
                                <?php
                                foreach ($almacenes as $almacen) {
                                    echo '<option value="' . $almacen['id'] . '">' . $almacen['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="fgrCategoria" style="display: none;">
                        <label for="cmbCategoria" class="control-label col-sm-3">Categoría</label>
                        <div class="col-sm-6">
                            <select name="categoria" id="cmbCategoria" class="select2-element" style="width: 100%;">
                                <option value="0">Todas las categorias</option>
                                <?php
                                foreach ($categorias as $categoria) {
                                    echo '<option value="' . $categoria['id'] . '">' . $categoria['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="fgrMarca" style="display: none;">
                        <label for="cmbMarca" class="control-label col-sm-3">Marca</label>
                        <div class="col-sm-6">
                            <select name="marca" id="cmbMarca" class="select2-element" style="width: 100%;">
                                <option value="0">Todas las marcas</option>
                                <?php
                                foreach ($marcas as $marca) {
                                    echo '<option value="' . $marca['id'] . '">' . $marca['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <button class="btn-primary btn">Generar reporte</button>
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
    function ocultarFiltros() {
        $('#fgrAlmacen').css('display', 'none');
        $('#fgrCategoria').css('display', 'none');
        $('#fgrMarca').css('display', 'none');
        $('#fgrTipoMovimiento').css('display', 'none');
        $('#fgrFechas').css('display', 'none');
    }

    function mostrarFiltrosReporteMovimientos() {
        $('#fgrAlmacen').css('display', 'block');
        $('#fgrCategoria').css('display', 'block');
        $('#fgrMarca').css('display', 'block');
        $('#fgrTipoMovimiento').css('display', 'block');
        $('#fgrFechas').css('display', 'block');
    }

    function mostrarFiltrosReporteExistencias() {
        $('#fgrAlmacen').css('display', 'block');
        $('#fgrCategoria').css('display', 'block');
        $('#fgrMarca').css('display', 'block');
    }

    $(document).ready(function () {
        var propiedades = {
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "De",
                "toLabel": "a",
                "customRangeLabel": "Personalizada",
                "daysOfWeek": [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sab"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            }
        };

        $('#datepicker').daterangepicker(propiedades);
        $('#datepicker').val('<?php echo $fechas ?>');

        $('#cmbTipoReporte').change(function () {
            var tipoReporte = $('#cmbTipoReporte').val();

            ocultarFiltros();

            switch (tipoReporte) {
                case '1':
                    mostrarFiltrosReporteExistencias();
                    break;
                case '2':
                    mostrarFiltrosReporteMovimientos();
                    break;
            }
        });
    });
</script>