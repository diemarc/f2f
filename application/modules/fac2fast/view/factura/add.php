<script src="/src/js/empresa_js.js"></script>
<script src="/src/js/poblacion_js.js"></script>
<script src="/src/js/form_js.js"></script>
<script src="/src/js/factura_js.js"></script>
<script>

    $(function () {
        $("#k_cliente").keypress(function (e) {
            if (e.keyCode === 13) {
                findEmpresa($("#k_cliente").val());
            }
        });
    });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-blue">
            Nueva factura
        </h1>
    </section> 
    <!-- Main content -->
    <!-- Default box -->
    <div class="box box-solid">
        <div class="box-body">
            <div class="row">
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo __URL__ . '/fac2fast/factura/save/'; ?>" 
                      id="formKerana" name="formKerana" method="POST" class="form-horizontal"
                      accept-charset="utf-8">
                          <?php echo $kerana_token; ?>
                    <input type="hidden"name="f_id_empresa" id="f_id_empresa" value="" />
                    <input type="hidden"name="f_id_tipo" id="f_id_tipo" value="1" />
                    <input type="hidden"name="f_id_contratante" id="f_id_contratante" 
                           value="<?php echo $_SESSION['f2f_id_contratante']; ?>" />

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <div class='form-group form-group-sm' id="div_cliente"> 
                                    <label for='k_cliente' class='col-sm-2 control-label'>Cliente</label> 
                                    <div class='col-sm-6'> 
                                        <div class="input-group date col-sm-8" id="div_cliente">
                                            <span class="input-group-addon">
                                                <i class="fa fa-building"></i></span>
                                            <input class="form-control" name="k_cliente" id="k_cliente" 
                                                   placeholder="busca un cliente" autocomplete="off"
                                                   type="text">
                                        </div>
                                        <!-- cliente livesearch -->
                                        <div id="live_search_empresa" class="hidden">
                                            <div class="col-sm-10">
                                                <div class="box box-success direct-chat direct-chat-success" id="">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Cliente encontrado</h3>
                                                    </div>
                                                    <div class="box-body">

                                                        <div class="direct-chat-text">
                                                            <table class="table table-bordered">
                                                                <tbody class="small" id="json_empresas">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of div live search -->
                                        <!-- client not found -->
                                        <div class="box box-solid direct-chat direct-chat-warning hidden" id="div_cliente_notfound">
                                            <div class="box-body">

                                                <div class="direct-chat-msg right">
                                                    <div class="direct-chat-text">
                                                        Cliente no encontrado,deseas crearlo? 
                                                        <button type="button" class="btn btn-sm btn-circle btn-primary" data-toggle="modal" 
                                                                data-remote="<?php echo __URL__ . '/fac2fast/empresa/add/'; ?>" data-target="#myModel">Si</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.client not found -->
                                    </div> 
                                </div> 
                                <!-- /cliente -->
                                <!-- fecha factura -->
                                <div class='form-group form-group-sm'> 
                                    <label for='f_fecha_factura' class='col-sm-2 control-label'>Fecha factura</label> 
                                    <div class='col-sm-6'> 
                                        <div class="input-group date col-sm-4">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control pull-right" name="f_fecha_factura" id="datepicker">
                                        </div>
                                    </div> 
                                </div> 
                                <!-- forma de pago -->
                                <div class='form-group form-group-sm'> 
                                    <label for='f_id_pago' class='col-sm-2 control-label'>Forma pago</label> 
                                    <div class='col-sm-4'> 
                                        <div class='input-group col-sm-6'> 
                                            <select class="form-control" name="f_id_pago" id="f_id_pago" required> 
                                                <?php foreach ($rsFormapagos AS $formapago): ?>  
                                                    <option value="<?php echo $formapago->id_pago; ?>"
                                                    <?php echo ($formapago->id_pago == 4) ? 'selected' : ''; ?>
                                                            > 
                                                                <?php echo $formapago->formapago; ?>
                                                    </option> 
                                                <?php endforeach; ?>  
                                            </select> 

                                        </div> 
                                    </div> 
                                </div> 
                                <!-- /forma de pago -->
                            </div>
                            <!-- total factura -->
                            <div class="col-md-4 col-xs-12">
                                <div class="info-box bg-default">
                                    <span class="info-box-icon"><i class="fa fa-euro"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text"><strong id="span_empresa"></strong></span>
                                        <span class="info-box-number">41,410</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%"></div>
                                        </div>
                                        <span class="progress-description" >
                                            total factura
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <!-- /total factura -->
                        </div>
                        <div class="hidden box1" id="div_conceptos">
                            <div class="box-header">
                                <h3 class="box-title ">Conceptos a facturar</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-info">
                                            <th style="width: 10px">#</th>
                                            <th>Servicio</th>
                                            <th>Base imponible</th>
                                            <th>Cantidad</th>
                                            <th>IVA</th>
                                            <th>Retenci&oacute;n</th>
                                            <th style="">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rsServicios AS $servicio): ?>
                                            <tr class="">
                                                <td style="width: 10px">
                                                    <?php echo $servicio->id_servicio; ?>
                                                </td>
                                                <td>
                                                    <div class='col-sm-12'> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right"
                                                                   name="f_concepto[<?php echo $servicio->id_servicio; ?>]"
                                                                   value="<?php echo $servicio->servicio; ?>"/>
                                                        </div>
                                                    </div> 

                                                </td>
                                                <td>
                                                    <div class='col-sm-6'> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-euro"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right"
                                                                   name="f_concepto_precio[<?php echo $servicio->id_servicio; ?>]"
                                                                   value="<?php echo $servicio->precio; ?>"/>
                                                        </div>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <div class='col-sm-4'> 
                                                        <input type="number" class="form-control pull-right"
                                                               name="f_concepto_cantidad[<?php echo $servicio->id_servicio; ?>]"
                                                               value="1"/>
                                                    </div> 

                                                </td>
                                                <td>
                                                    <div class='col-sm-8'> 
                                                        <input type="number" class="form-control pull-right"
                                                               name="f_concepto_iva[<?php echo $servicio->id_servicio; ?>]"
                                                               value="<?php echo $rsIva->porcentaje; ?>"/>
                                                    </div> 

                                                </td>
                                                <td>
                                                    <div class='col-sm-8'> 

                                                        <input type="number" class="form-control pull-right"
                                                               name="f_concepto_irpf[<?php echo $servicio->id_servicio; ?>]"
                                                               value="<?php echo $rsIrpf->porcentaje; ?>"/>
                                                    </div> 

                                                </td>
                                                <td style="">
                                                    <div class='col-sm-6'> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-euro"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right"
                                                                   value="<?php echo $servicio->precio; ?>"/>
                                                        </div>
                                                    </div> 

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo __URL__ . '/fac2fast/f2f/index/'; ?>" 
                           class="btn btn-default">Cancelar</a>
                        <button type="submit" id="btnGrabarFactura"
                                class="hidden btn btn-success">Crear factura</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</div>

