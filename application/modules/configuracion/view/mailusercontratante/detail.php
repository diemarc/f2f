<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-wrench fa-2x"></i> 
            <a href="<?php echo __URL__ . '/base/contratante/index'; ?>">
                Configuraci&oacute;n f2F</a>->
            <a href="<?php echo __URL__ . '/configuracion/mailconfig/index'; ?>">
                Cuentas de mail</a>->Detalle <?php echo $rsMailConfig->account; ?>

        </h1>

    </section> 
    <section class='content'>
        <div class="box">
            <div class="box-header with-border">

                <h3 class="box-title text-blue">
                    <small>aqu&iacute; puedes configurar todo lo referente 
                        a la cuenta de <strong><?php echo $rsMailConfig->account; ?></strong></small>
                </h3>

            </div>
            <div class="box-body">
                <div class="col-sm-6">
                    <div class="box box-info">
                        <div class="box-body box-profile">
                            
                            <h3 class="profile-username text-center"><?php echo $rsMailConfig->mail_address;?></h3>


                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Servidor saliente</b> <a class="pull-right"><?php echo $rsMailConfig->mail_smtp_server;?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Usuario</b> <a class="pull-right"><?php echo $rsMailConfig->mail_username;?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Puerto</b> <a class="pull-right"><?php echo $rsMailConfig->mail_smtp_port;?></a>
                                </li>
                            </ul>

                            <a href="<?php echo __URL__.'/configuracion/mailconfig/edit/'.$rsMailConfig->id_mail_account;?>" class="btn btn-info "><b>Editar configuraci&oacute;n</b></a>
                            <a href="<?php echo __URL__.'/configuracion/mail/sendTestMail/'.$rsMailConfig->id_mail_account;?>" class="btn btn-primary "><b>Enviar mail de prueba</b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-sm-6">
                    
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="fa fa-users"></i>
                            <h3 class="box-title text-blue">Usuarios asociados</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                            <ul class="todo-list">
                                <?php foreach($rsUsersMails AS $user):?>
                                <li>
                                    <span class="text"><?php echo $user->name.' '.$user->lastname;?></span>
                                    <small class="label label-info"><i class="fa fa-user"></i> <?php echo $user->username;?></small>
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
</div>