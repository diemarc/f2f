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
    <section class="content">

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
                <div class="row">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo __URL__ . '/fac2fast/factura/save/' . $rsContratante->id_contratante; ?>" 
                          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
                          accept-charset="utf-8">
                              <?php echo $kerana_token; ?>
                        <input type="text"name="f_id_empresa" id="f_id_empresa" value="" />

                        <div class="box-body">
                            <div class="breadcrumb">
                                <a href="<?php echo __URL__ . '/fac2fast/f2f/index/'; ?>" class="btn btn-warning">Cancelar</a>
                                <button type="submit" class="btn btn-info">Crear factura</button>

                            </div>
                            <!-- /fecha_facuta -->
                            <!-- cliente -->
                            <div class='form-group  has-success  form-group-sm'> 
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
                                <label for='f_id_tipo' class='col-sm-2 control-label'>Tipo</label> 
                                <div class='col-sm-6'> 
                                    <div class='input-group col-sm-8'> 
                                        <select class="form-control" name="f_id_tipo" id="f_id_tipo" required> 
                                            <option value="">--Seleccione una opcion --</option><?php foreach ($rsTipos AS $tipo): ?>  
                                                <option value="<?php echo $tipo->id_tipo; ?>"> <?php echo $tipo->tipo; ?></option> 
                                            <?php endforeach; ?>  
                                        </select> 

                                    </div> 
                                </div> 
                            </div> 
                            <div class='form-group form-group-sm'> 
                                <label for='f_id_pago' class='col-sm-2 control-label'>Forma pago</label> 
                                <div class='col-sm-6'> 
                                    <div class='input-group col-sm-8'> 
                                        <select class="form-control" name="f_id_pago" id="f_id_pago" required> 
                                            <option value="">--Seleccione una opcion --</option><?php foreach ($rsFormapagos AS $formapago): ?>  
                                                <option value="<?php echo $formapago->id_pago; ?>"> <?php echo $formapago->formapago; ?></option> 
                                            <?php endforeach; ?>  
                                        </select> 

                                    </div> 
                                </div> 
                            </div> 
                            <div class='form-group form-group-sm'> 
                                <label for='f_abono' class='col-sm-2 control-label'>Abono</label> 
                                <div class='col-sm-6'> 
                                    <div class='input-group col-sm-8'> 
                                        <input type="radio" id="f_abono" name="f_abono" class="minimal" value="1">Si
                                        <input type="radio" id="f_abono" name="f_abono" class="minimal" value="0">No
                                    </div> 
                                </div> 
                            </div> 

                            <div class='form-group form-group-sm'> 
                                <label for='f_observacion' class='col-sm-2 control-label'>Observacion</label> 
                                <div class='col-sm-6'> 
                                    <div class='input-group col-sm-8'> 
                                        <textarea name="f_observacion" id="f_observacion" class="form-control"></textarea>

                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="<?php echo __URL__ . '/fac2fast/f2f/index/'; ?>" class="btn btn-warning">Cancelar</a>
                            <button type="submit" class="btn btn-info">Crear factura</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>

