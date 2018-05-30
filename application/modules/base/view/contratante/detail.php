<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-wrench fa-2x"></i> 
            <a href="<?php echo __URL__.'/base/contratante/index';?>">
                Configuraci&oacute;n f2F</a>->Detalle empresa

        </h1>
        <h3 class="text-primary">
            <?php echo $rsContratante->contratante; ?>
            <small>aqu&iacute; puedes editar todo lo referente a tu empresa</small>
        </h3>

    </section> 
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue"><?php echo $rsContratante->razon_social; ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <a href="<?php echo __URL__ . '/base/contratante/edit/' . $rsContratante->id_contratante; ?>" class="btn btn-sm btn-info">
                                        <i class="fa fa-edit"></i>Editar
                                    </a>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body box-profile">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Nombre corto</b> <a class="pull-right"><?php echo $rsContratante->contratante; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Raz&oacute;n social</b> <a class="pull-right"><?php echo $rsContratante->razon_social; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>CIF</b> <a class="pull-right"><?php echo $rsContratante->cif; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Direcci&oacute;n</b> <a class="pull-right"><?php echo $rsContratante->direccion; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Localidad</b> <a class="pull-right"><?php echo $rsContratante->poblacion . ' (' . $rsContratante->provincia . ')'; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tel&eacute;fono</b> <a class="pull-right"><?php echo $rsContratante->telefono; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="pull-right"><?php echo $rsContratante->email; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Contacto</b> <a class="pull-right"><?php echo $rsContratante->contacto; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Observaciones</b> <a class="pull-right"><?php echo nl2br($rsContratante->observacion); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo __URL__ . '/data/logos/seva/ipr_small.jpg'; ?>" alt="logo de mi empresa">

                                <h3 class="profile-username text-center"><?php echo $rsContratante->razon_social; ?></h3>
                                <p class="text-muted text-center"><?php echo $rsContratante->contratante; ?></p>

                                <a href="#" class="btn btn-success btn-block"><b>Cambiar logo</b></a>
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
