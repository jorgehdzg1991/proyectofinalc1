<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li><a href="<?php echo site_url("unidades/index") ?>">Unidades</a></li>
        <li>Editar unidades</li>
    </ol>
    <h1>Unidades</h1>
    <div class="options">
        <div class="btn-toolbar">
            <a href="<?php echo site_url("unidades/index") ?>" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <?php echo form_open("unidades/actualizar", ["class" => "form-horizontal"]) ?>
                <div class="panel-heading">
                    <h4>Editar unidad: <?php echo $unidad["nombre"] ?></h4>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $unidad["id"] ?>">
                    <div class="form-group">
                        <label for="txtNombre" class="control-label col-sm-3">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text"
                                   class="form-control"
                                   id="txtNombre"
                                   name="nombre"
                                   placeholder="Escribe el nombre de la unidad"
                                   value="<?php echo $unidad["nombre"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtAbreviatura" class="control-label col-sm-3">Abreviatura</label>
                        <div class="col-sm-6">
                            <input type="text"
                                   class="form-control"
                                   id="txtAbreviatura"
                                   name="abreviatura"
                                   placeholder="Escribe la abrevatura"
                                   value="<?php echo $unidad["abreviatura"] ?>">
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

