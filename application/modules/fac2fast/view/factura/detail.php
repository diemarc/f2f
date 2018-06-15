<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>
                <?php echo $rsFactura->razon_social; ?>
                <small>detalle factura</small>
            </h1>

        </section> 
        <!-- Main content -->

        <div class="col-sm-8">
            <section class="content">
                <!-- Default box -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-blue">
                            <strong><?php echo $rsFactura->num_factura; ?></strong>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <div class="box-title">
                                            <a href="<?php echo __URL__ . '/base/contratante/edit/' . $rsFactura->id_facturas; ?>" 
                                               class="btn btn-sm btn-app" title="Editar factura" disabled >
                                                <i class="fa fa-edit text-primary"></i>
                                                <span class="text-primary">Editar</span>
                                            </a>
                                            <a href="<?php echo __URL__ . '/fac2fast/f2fInformes/generar/' . $rsFactura->id_facturas; ?>" 
                                               class="btn btn-sm btn-app" title="Descargar factura">
                                                <i class="fa fa-file-pdf-o text-danger"></i>
                                                <span class="text-danger">Descargar</span>
                                            </a>
                                            <a href="<?php echo __URL__ . '/fac2fast/f2fEnvio/sendInvoice/' . $rsFactura->id_facturas; ?>" 
                                               class="btn btn-sm btn-app" title="Enviar factura por email">

                                                <i class="fa fa-envelope text-success"></i>
                                                <span class="text-success">Enviar</span>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 pull-right">
                                            <div class="info-box">
                                                <span class="info-box-icon">
                                                    <i class="fa fa-euro"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total</span>
                                                    <span class="info-box-number">
                                                        <?php echo $total; ?>
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- datos clientes -->
                                    <div class="box-body box-profile">
                                        <header class="breadcrumb text-blue">
                                            Datos de cliente facturado
                                        </header>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Raz&oacute;n social</b> <a class="pull-right"><?php echo $rsFactura->razon_social; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>CIF</b> <a class="pull-right"><?php echo $rsFactura->cif; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Direcci&oacute;n</b> <a class="pull-right"><?php echo $rsFactura->direccion; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Localidad</b> <a class="pull-right"><?php echo $rsFactura->poblacion . ' (' . $rsFactura->provincia . ')'; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tel&eacute;fono</b> <a class="pull-right"><?php echo $rsFactura->telefono; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.datos clientes -->
                                    <!-- servicios facturados -->
                                    <div class="box-body box-profile">
                                        <header class="breadcrumb text-green">
                                            Servicios facturados
                                        </header>
                                        <table class="table table-bordered 
                                               table-striped table-condensed table-hover">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>Servicio</th>
                                                    <th style="">precio</th>
                                                    <th style="">Cantidad</th>
                                                    <th style=""> % IVA</th>
                                                    <th style=""> % Retenci&oacute;n</th>
                                                    <th style="">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($rsFacturasServicios AS $servicio): ?>
                                                    <tr class="">
                                                        <td>
                                                            <?php echo $servicio->servicio; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $servicio->precio; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $servicio->cantidad; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $servicio->iva; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $servicio->retencion; ?>
                                                        </td>
                                                        <td style="">
                                                            <?php echo $servicio->total; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>

                                        </table>


                                    </div>
                                    <!-- /.servicios facturados -->
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

            </section>
        </div>
        <div class="col-sm-4">
            <section class="content">
                <div class="box box-solid box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Historial</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="progress-group">
                            <span class="progress-text">Iniciado</span>
                            <span class="progress-number">13-06-2018</span>

                            <div class="progress sm">
                                <div class="progress-bar progress" style="width: 30%"></div>
                            </div>
                        </div>
                        <div class="progress-group">
                            <span class="progress-text">Enviado</span>
                            <span class="progress-number">14-06-2018</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="progress-group">
                            <span class="progress-text">Cobrado</span>
                            <span class="progress-number">15-06-2018</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-success" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="progress-group">
                            <span class="progress-text">Abonado</span>
                            <span class="progress-number">15-06-2018</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-red" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
        </div>


    </div>
</div>
