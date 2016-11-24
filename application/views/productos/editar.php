<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li><a href="<?php echo site_url("productos/index") ?>">Prouctos</a></li>
        <li>Editar producto</li>
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
                <?php echo form_open("productos/actualizar", ["class" => "form-horizontal"]) ?>
                <div class="panel-heading">
                    <h4>Editar producto: <?php echo $producto["nombre"] ?></h4>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $producto["id"] ?>">
                    <div class="form-group">
                        <label for="txtNombre" class="control-label col-sm-3">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text"
                                   class="form-control"
                                   id="txtNombre"
                                   name="nombre"
                                   placeholder="Escribe el nombre del producto"
                                   value="<?php echo $producto["nombre"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtDescripcion" class="control-label col-sm-3">Descripcion</label>
                        <div class="col-sm-6">
                            <textarea name="descripcion"
                                      id="txtDescripcion"
                                      class="form-control"
                                      cols="30"
                                      rows="5"
                                      placeholder="Escribe la descrpcion del producto"><?php echo $producto["descripcion"] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtCategoria" class="control-label col-sm-3">Categoria</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="txtCategorias" name="categoria">
                                <?php
                                foreach ($categorias as $categoria) {
                                    $selected = $categorias["id"] == $producto["categorias_id"] ? ' selected' : '';
                                    echo '<option value="' . $categoria["id"] . '"' . $selected . '>' . $categoria["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtUnidad" class="control-label col-sm-3">Unidad</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="txtUnidades" name="unidad">
                                <?php
                                foreach ($unidades as $unidad) {
                                    $selected = $unidad["id"] == $producto["unidades_id"] ? ' selected' : '';
                                    echo '<option value="' . $unidad["id"] . '"' . $selected . '>' . $unidad["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtMarca" class="control-label col-sm-3">Marca</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="txtMarcas" name="marca">
                                <?php
                                foreach ($marcas as $marca) {
                                    $selected = $marca["id"] == $producto["marcas_id"] ? ' selected' : '';
                                    echo '<option value="' . $marca["id"] . '"' . $selected . '>' . $marca["nombre"] . '</option>';
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
                                <button class="btn-primary btn">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>