<script src="/src/js/empresa_js.js"></script>
<script src="/src/js/poblacion_js.js"></script>
<script src="/src/js/form_js.js"></script>
<script src="/src/js/factura_js.js"></script>
<script src="/src/js/servicio_js.js"></script>
<script>

    $(function () {
        $("#k_cliente").keypress(function (e) {
            if (e.keyCode === 13) {
                findEmpresa($("#k_cliente").val());
            }
        });
    });
</script>
<style>
    .table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td {
        padding: 2px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="col-sm-8">
            <section class="content">
                <!-- Default box -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-blue">
                            <i class="fa fa-shopping-cart"></i>
                            <strong>Nueva factura</strong>
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo __URL__ . '/fac2fast/factura/save/'; ?>" 
                              id="formKerana" name="formKerana" method="POST" class="form-horizontal"
                              accept-charset="utf-8">
                                  <?php echo $kerana_token; ?>
                            <input type="hidden" required name="f_id_empresa" id="f_id_empresa" value="" />
                            <input type="hidden"name="f_id_tipo" id="f_id_tipo" value="1" />
                            <input type="hidden"name="f_id_empresa" id="f_id_empresa" value="" />
                            <input type="hidden" step="0.01" id="sw_total_factura" value="" />
                            <input type="hidden" step="0.01" id="sw_total_impuesto" value="" />
                            <input type="hidden"name="f_id_contratante" id="f_id_contratante" 
                                   value="<?php echo $_SESSION['f2f_id_contratante']; ?>" />

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <div class="col-sm-8">
                                                <div class="box-title">
                                                    <a href="<?php echo __URL__ . '/fac2fast/f2f/index/'; ?>" 
                                                       class="btn btn-default">Cancelar</a>
                                                    <button type="submit" id="btnGrabarFactura"
                                                            class="hidden btn btn-info">Crear factura</button>

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <section class="content1" id="section_total" style="margin: 0">
                                                    <div class="info-box bg-gray-light">
                                                        <span class="info-box-icon"><i class="fa fa-euro"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Total</span>
                                                            <span class="info-box-number text-blue" id="total_factura"></span>
                                                            <span class="progress-description text-warning">
                                                                <span id="total_factura_impuestos"></span> Impuestos
                                                            </span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                </section>
                                            </div>


                                        </div>
                                        <!-- /.box-header -->
                                        <!-- datos clientes -->
                                        <div class="box-body box-profile">
                                            <header class="breadcrumb">
                                                <span class="label label-default">1</span>
                                                Selecciona un cliente
                                            </header>
                                            <div class="row">
                                                <!-- 1-selecciona un cliente -->
                                                <div class='form-group form-group-sm' id="div_cliente"> 
                                                    <label for='k_cliente' class='col-sm-2 control-label'>Cliente</label> 
                                                    <div class='col-sm-10'> 
                                                        <div class="input-group date col-sm-8" id="div_cliente">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-search" id="i_client"></i></span>
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
                                                <!-- /.selecciona un cliente -->
                                            </div>

                                            <header class="breadcrumb">
                                                <span class="label label-info">2</span>
                                                Fecha de la factura
                                            </header>
                                            <div class="row">
                                                <!-- /cliente -->
                                                <!-- fecha factura -->
                                                <div class='form-group form-group-sm'> 
                                                    <label for='f_fecha_factura' class='col-sm-2 control-label'>Fecha factura</label> 
                                                    <div class='col-sm-6'> 
                                                        <div class="input-group date col-sm-4">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="date" class="form-control pull-right" 
                                                                   name="f_fecha_factura" 
                                                                   id="datepicker">
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
                                        </div>
                                        <!-- /.datos clientes -->
                                        <!-- servicios facturados -->
                                        <div class="box-body box-profile">
                                            <header class="breadcrumb text-green">
                                                <span class="label label-primary">3</span>
                                                <button type="button" class="btn btn-sm btn-success" 
                                                        data-toggle="modal" 
                                                        data-remote="<?php echo __URL__ . '/fac2fast/serviciocontratante/loadContratanteServices'; ?>" 
                                                        data-target="#myModelLarge">
                                                    <i class="fa fa-plus-square-o "></i>&nbsp;
                                                     Agregar servicios para facturar
                                                </button>

                                            </header>
                                            <div class="table-responsive">

                                                <table class="table table-bordered 
                                                       table-condensed table-hover">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th class="col-sm-1">#</th>
                                                            <th class="col-sm-4">Servicio</th>
                                                            <th class="col-sm-1">Cantidad</th>
                                                            <th class="col-sm-2">Precio</th>
                                                            <th class="col-sm-1">% IVA</th>
                                                            <th class="col-sm-1">% Ret.</th>
                                                            <th class="col-sm-2">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="div_servicios_factura">
                                                        <!-- json content -->

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                        <!-- /.servicios facturados -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->

            </section>
        </div>
        <div class="col-sm-4">

            <section class="content hidden" id="section_cliente">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="client_name">

                        </h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- datos clientes -->
                        <div class="box-body box-profile">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item" id="client_nickname">
                                    <b>Raz&oacute;n social</b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" id="client_cif">
                                    <b>CIF</b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" id="client_address">
                                    <b>Direcci&oacute;n</b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" id="client_local">
                                    <b>Localidad</b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" id="client_phone">
                                    <b>Tel&eacute;fono</b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item" id="client_mail">
                                    <b>Email</b> <a class="pull-right"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
        </div>
    </div>
</div>

