<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-wrench fa-2x"></i> 
            <a href="<?php echo __URL__ . '/base/contratante/index'; ?>">
                Configuraci&oacute;n f2F</a>->Cuentas de mail

        </h1>

    </section> 
    <section class='content'>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue">
                    <small>aqu&iacute; puedes configurar todo lo referente a los envios de emails</small>
                </h3>

            </div>
            <div class="box-body">


                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-blue">Cuentas de correo</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" 
                                    data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Cuenta</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rsMailusercontratantes AS $mailconfig): ?>
                                        <tr> 
                                            <td><?php echo $mailconfig->account; ?></td>
                                            <td><?php echo $mailconfig->mail_address; ?></td>
                                            <td> 
                                                <a href='/configuracion/mailconfig/detail/<?php echo $mailconfig->id_mail_account; ?>' 
                                                   class='btn btn-default btn-xs' title='Mail detail'>
                                                    <i class='fa fa-tasks'></i>
                                                </a> 
                                            </td> 
                                        </tr> 
                                    <?php endforeach; ?>
                                   
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="<?php echo __URL__ . '/configuracion/mailconfig/add'; ?>" 
                           class="btn btn-sm btn-info btn-flat pull-left">Nueva cuenta</a>
                    </div>
                    <!-- /.box-footer -->
                </div>

            </div>
        </div>
    </section>
</div>