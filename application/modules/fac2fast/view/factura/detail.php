<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $rsFactura->razon_social; ?>
            <small>detalle factura</small>
        </h1>

    </section> 
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue">
                    <strong><?php echo $rsFactura->num_factura; ?></strong>
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <a href="<?php echo __URL__ . '/base/contratante/edit/' . $rsFactura->id_factura; ?>" 
                                       class="btn btn-sm btn-app" title="Editar factura">
                                        <i class="fa fa-edit text-primary"></i>
                                        <span class="text-primary">Editar</span>
                                    </a>
                                    <a href="<?php echo __URL__ . '/base/contratante/edit/' . $rsFactura->id_factura; ?>" 
                                       class="btn btn-sm btn-app" title="Descargar factura">
                                        <i class="fa fa-file-pdf-o text-danger"></i>
                                        <span class="text-danger">Descargar</span>
                                    </a>
                                    <a href="<?php echo __URL__ . '/base/contratante/edit/' . $rsFactura->id_factura; ?>" 
                                       class="btn btn-sm btn-app" title="Enviar factura por email">

                                        <i class="fa fa-envelope text-success"></i>
                                        <span class="text-success">Enviar</span>
                                    </a>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body box-profile">
                                <header class="breadcrumb">
                                    Datos fiscales
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
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box box-info box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Otras facturas</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                The body of the box
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>
