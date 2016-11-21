<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url("inicio/index") ?>">Inicio</a></li>
        <li>Perfil</li>
    </ol>
    <h1>Perfil</h1>    
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $auth["nombre"] ?></h4>
                        <small><cite>ID: <i class="glyphicon glyphicon-map-marker">
                                </i><?php echo $auth["id"] ?></cite></small>
                        <br/>
                        <small><cite>Usuario: <i class="glyphicon glyphicon-map-marker">
                                </i><?php echo $auth["login"] ?></cite></small>
                        <br/>
                        <small><cite>Tipo de Usuario: <i class="glyphicon glyphicon-map-marker">
                                </i><?php 
                                if($auth["perfil"]==1){ 
                                    echo "Administrador";
                                }
                                else{
                                    echo "Usuario del sistema";                                    
                                }
                                ?></cite></small>
                        <br/><br/>
                        <div class="options">
                            <div class="btn-toolbar">
                                <a href="<?php echo site_url("perfil/editar") ?>" class="btn btn-primary">
                                    <i class="fa fa-file-o"></i> Editar
                                </a>
                                <td><a href="#" disabled class="btn btn-default">Actualizar</a></td>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
