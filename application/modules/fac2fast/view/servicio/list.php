<div class="box box-primary direct-chat direct-chat-primary">
    <div class="modal-header">
        <div class="box-header with-border">
            <h2 class="box-title text-primary">Mis servicios</h2>

            <div class="box-tools pull-right">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"
                                    data-toggle="modal" 
                                    data-remote="<?php echo __URL__ . '/fac2fast/servicio/add'; ?>" 
                                    data-target="#myModel"
                                    ><i class="fa fa-plus"></i> Nuevo</button>
                        </div>

                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr class="bg-aqua-gradient">
                                <th style="width: 10px">#</th>
                                <th>Servicio</th>
                                <th>Desc</th>
                                <th>PrecioBase</th>
                                <th>Iva</th>
                                <th>Retenci&oacute;n</th>
                                <th style="width: 40px"></th>
                            </tr>

                            <?php
                            foreach ($rsServicios AS $servicio):
                                $icon_default = ($servicio->is_default == 1) ?
                                        'fa fa-star text-success' : 'fa fa-star-o';
                                ?>
                                <tr>
                                    <td>
                                        <i class="<?php echo $icon_default; ?>"></i>
                                    </td>
                                    <td><?php echo $servicio->servicio; ?></td>
                                    <td><?php echo $servicio->descripcion; ?></td>
                                    <td><?php echo $servicio->precio; ?></td>
                                    <td><?php echo $servicio->iva_servicio; ?></td>
                                    <td><?php echo $servicio->retencion_servicio; ?></td>
                                    <td>
                                        <a href="" class="btn btn-sm bg-navy" title="Seleccionar">
                                            <i class="fa fa-check"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
</div>