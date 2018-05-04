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
            <small>sera emitida por <strong>
                    <?php echo $_SESSION['f2f_contratante']; ?></strong></small>
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
                        <div class="breadcrumb">
                            <a href="<?php echo __URL__ . '/fac2fast/f2f/index/'; ?>" 
                               class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-success">Crear factura</button>
                        </div>

                        <div class="row">
                            <!-- cliente -->
                            <div class='form-group form-group-sm' id="div_cliente"> 
                                <label for='k_cliente' class='col-sm-2 control-label'>Cliente</label> 
                                <div class='col-sm-6'> 
                                    <div class="input-group date col-sm-8" id="div_cliente">
                                        <span class="input-group-addon">
                                            <i class="fa fa-building"></i></span>
                                        <input class="form-control" name="k_cliente" id="k_cliente" 
                                               placeholder="busca un cliente" 
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
                                        <input type="date" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div> 
                            </div> 
                            <div class='form-group form-group-sm'> 
                                <label for='f_id_pago' class='col-sm-2 control-label'>Forma pago</label> 
                                <div class='col-sm-4'> 
                                    <div class='input-group col-sm-6'> 
                                        <select class="form-control" name="f_id_pago" id="f_id_pago" required> 
                                            <option value="">--Seleccione una opcion --</option><?php foreach ($rsFormapagos AS $formapago): ?>  
                                                <option value="<?php echo $formapago->id_pago; ?>"> <?php echo $formapago->formapago; ?></option> 
                                            <?php endforeach; ?>  
                                        </select> 

                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Servicios</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="bg-default">
                                            <th style="width: 10px">#</th>
                                            <th>Servicio</th>
                                            <th>Cantidad</th>
                                            <th style="width: 40px">Precio</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Update software</td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">55%</span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Clean database</td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">70%</span></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Cron job running</td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue">30%</span></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Fix and squish bugs</td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">90%</span></td>
                                        </tr>
                                    </tbody></table>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo __URL__ . '/fac2fast/f2f/index/'; ?>" 
                           class="btn btn-default">Cancelar</a>
                        <button type="submit" 
                                class="btn btn-success">Crear factura</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</div>

