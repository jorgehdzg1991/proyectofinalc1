<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Consulta Almacenes</li>
    </ol>
    <h1>Consulta de Almacenes</h1>
    <div id="fgrConsulta" class="form-group">
                            <label for="txtConsulta" class="control-label col-sm-3">Almacén</label>
                            <div>
                                <select id="cmbConsulta" name="consulta" class="select2-element" style="width: 50%;">
                                    <option value="0">Seleccione un almacen</option>
                                    <?php
                                    foreach ($almacenes as $almacen) {
                                        echo '<option value="' . $almacen["id"] . '">' . $almacen["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <p class="help-block" style="display: none;">
                                    <i class="fa fa-times"></i> Escoger un almacen
                                </p>
                            </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Exitencia en almacenes</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Almacen</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Unidad</th>
                                <th>Creado por</th>
                                
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($productos) > 0) {
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
                                       
                                    </tr>';
                                }
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

