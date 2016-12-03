<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Consulta Almacenes</li>
    </ol>
    <h1>Consulta de Almacenes</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Exitencia en almacenes</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <?php echo form_open("consulta/index", ["id" => "frmConsulta"])?>
                            <div id="fgrConsulta" class="form-group">
                                <select id="cmbConsulta" name="idAlmacen" class="select2-element" style="width: 100%;">
                                    <option value="0">Seleccione un almacen</option>
                                    <?php
                                    foreach ($almacenes as $almacen) {
                                        $selected = $idAlmacen == $almacen["id"] ? ' selected="selected"' : '';
                                        echo '<option value="' . $almacen["id"] . '"' . $selected . '>' . $almacen["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="col-sm-6">
                                    <p class="help-block" style="display: none;">
                                        <i class="fa fa-times"></i> Escoger un almacen
                                    </p>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatables">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Producto</th>
                                        <th>Descripcion</th>
                                        <th>Categoria</th>
                                        <th>Unidad</th>
                                        <th>Marca</th>
                                        <th>Existencia</th>
                                    </tr>
                                    </thead>
                                    <tbody id="cuerpoTablaExistencia">
                                    <?php
                                    foreach ($existencias as $producto) {
                                        if (intval($producto["cantidad"]) == 0) {
                                            continue;
                                        }
                                        echo '
                                        <tr>
                                            <td>' . $producto["id"] . '</td>
                                            <td>' . $producto["producto"] . '</td>
                                            <td>' . $producto["descripcion"] . '</td>
                                            <td>' . $producto["categoria"] . '</td>
                                            <td>' . $producto["unidad"] . '</td>
                                            <td>' . $producto["marca"] . '</td>
                                            <td>' . $producto["cantidad"] . '</td>
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
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#cmbConsulta").change(function () {
            var idAlmacen = $("#cmbConsulta").val();

            if (idAlmacen !== '0') {
                $("#frmConsulta").submit();
            }
        });
    });
</script>

