<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Temas</li>
    </ol>
    <h1>Configuración de temas</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <?php echo form_open('configuracion/guardar', ['class' => 'form-horizontal']) ?>
                <div class="panel-heading">
                    <h4>Configuración de temas</h4>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="jsonTemas" value='<?php echo json_encode($temas) ?>'>
                    <div class="form-group">
                        <label for="cmbTema" class="control-label col-sm-3">Tema</label>
                        <div class="col-sm-6">
                            <select name="tema" id="cmbTema" class="select2-element" style="width: 100%;">
                                <?php
                                foreach ($temas as $tema) {
                                    $selected = $configuracion['idTema'] == $tema['id']
                                        ? ' selected="selected"'
                                        : '';

                                    echo '
                                    <option value="' . $tema['id'] . '""' . $selected . '>
                                        ' . $tema['nombre'] . '
                                    </option>';
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
                                <button class="btn-primary btn">Guardar configuración</button>
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
        $("#cmbTema").change(function () {
            var temas = JSON.parse($("#jsonTemas").val());
            var idTema = $("#cmbTema").val();

            for (var i = 0; i < temas.length; i++) {
                if (temas[i]['id'] === idTema) {
                    $("#themeswitcher").attr('href', temas[i]['url']);
                    break;
                }
            }
        });
    });
</script>