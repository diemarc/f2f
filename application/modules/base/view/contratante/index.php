<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-wrench fa-2x"></i> Configuraci&oacute;n f2F
        </h1>

    </section> 
    <section class='content'>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue">
                    <<?php echo $rsContratante->contratante; ?>
                    <small>aqu&iacute; puedes configurar todo lo referente a tu empresa</small>
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- datos de empresa -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-default">
                            <div class="inner">
                                <h3> <?php echo $rsContratante->contratante; ?></h3>

                                <p>Datos de empresa</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tasks"></i>
                            </div>
                            <a href="<?php echo __URL__ . '/base/contratante/detail/' . $rsContratante->id_contratante; ?>" class="small-box-footer">
                                ver <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./datos_empresa -->
                    <!-- usuarios -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>Usuarios</h3>

                                <p>Gesti&oacute;n de usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?php echo __URL__ . '/base/contratante/detail/' . $rsContratante->id_contratante; ?>" class="small-box-footer">
                                ver <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./usuarios -->
                    <!-- mails -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua-gradient">
                            <div class="inner">
                                <h3>Email</h3>

                                <p>Cuentas de envios,logs</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <a href="<?php echo __URL__ . '/configuracion/mailconfig/index'; ?>" class="small-box-footer">
                                ver <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./mails -->
                    <!-- plantillas -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>Plantillas</h3>
                                <p>Plantillas de factura/presupuestos/mails</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-sticky-note"></i>
                            </div>
                            <a href="<?php echo __URL__ . '/base/contratante/detail/' . $rsContratante->id_contratante; ?>" class="small-box-footer">
                                ver <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./plantillas -->
                </div>
            </div>
        </div>
    </section>
</div>