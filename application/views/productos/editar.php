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
                            <input type="text"
                                   class="form-control"
                                   id="txtDescripcion"
                                   name="descripcion"
                                   placeholder="Escribe la descrpcion del producto"
                                   value="<?php echo $producto["descripcion"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Categoria</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="source">
                                <optgroup label="Categorias">
                                    <option value="<?php echo $producto["categorias_id"] ?>"</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-sm-3">Unidad</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="source">
                                <optgroup label="Unidades">
                                    <option value="<?php echo $producto["unidades_id"] ?>"</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Marca</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="source">
                                <optgroup label="Marcas">
                                    <option value="<?php echo $producto["marcas_id"] ?>"</option>
                                </optgroup>
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