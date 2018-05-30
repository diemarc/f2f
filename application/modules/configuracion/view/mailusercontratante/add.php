<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            <i class="fa fa-envelope fa-2x"></i> Nueva cuenta de mail

        </h1>
    </section> 

    <section class='content'>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue">
                    <small>Nueva cuenta para el envio de mails</small>
                </h3>
            </div>
            <div class="box-body">
                <form action="<?php echo __URL__; ?>/configuracion/mailconfig/save" 
                      id="formNewEmpresa" name="formNewEmpresa" method="POST" class="form-horizontal"
                      accept-charset="utf-8">
                          <?php echo $kerana_token; ?>
                    <div class="breadcrumb">
                        <a href="<?php echo __URL__ . '/configuracion/mailconfig/index'; ?>" class="btn btn-warning">Cancelar</a>
                        <button type="submit" class="btn btn-success">Crear cuenta</button>
                    </div>

                    <header class="breadcrumb">
                        Datos de cuenta
                    </header>
                    <div class='form-group form-group-sm'> 
                        <label for='f_account' class='col-sm-2 control-label'>Nombre de cuenta</label> 
                        <div class='col-sm-4'> 
                            <div class='input-group col-sm-8'> 
                                <input type="text" id="f_account" name="f_account" class="form-control"
                                       required maxlength="250"   />
                            </div> 
                        </div> 
                    </div> 
                    <div class='form-group form-group-sm bg-grey'> 
                        <label for='f_mail_address' class='col-sm-2 control-label'>Direcci&oacute;n de email</label> 
                        <div class='col-sm-6'> 
                            <div class='input-group col-sm-8'> 
                                <input type="email" id="f_mail_address" 
                                       required name="f_mail_address" class="form-control"  maxlength="250"   />
                            </div> 
                        </div> 
                    </div> 

                    <header class="breadcrumb">
                        Configuraci&oacute;n del servidor de envio
                    </header>

                    <div class='form-group form-group-sm'> 
                        <label for='f_mail_username' class='col-sm-2 control-label'>Usuario</label> 
                        <div class='col-sm-2'> 
                            <div class='input-group col-sm-8'> 
                                <input type="text" id="f_mail_username" name="f_mail_username" 
                                       class="form-control" required   />
                            </div> 
                        </div> 
                    </div> 
                    <div class='form-group form-group-sm'> 
                        <label for='f_mail_password' class='col-sm-2 control-label'>Password</label> 
                        <div class='col-sm-2'> 
                            <div class='input-group col-sm-8'> 
                                <input type="password" id="f_mail_password" name="f_mail_password" 
                                       class="form-control"  maxlength="100" required   />
                            </div> 
                        </div> 
                    </div> 
                    <div class='form-group form-group-sm'> 
                        <label for='f_mail_smtp_server' class='col-sm-2 control-label'>Servidor de salida</label> 
                        <div class='col-sm-4'> 
                            <div class='input-group col-sm-8'> 
                                <input type="text" id="f_mail_smtp_server" name="f_mail_smtp_server" 
                                       class="form-control"  maxlength="45" required   />
                            </div> 
                        </div> 
                    </div> 
                    <div class='form-group form-group-sm'> 
                        <label for='f_mail_smtp_port' class='col-sm-2 control-label'>Puerto de salida</label> 
                        <div class='col-sm-1'> 
                            <div class='input-group col-sm-8'> 
                                <input type="number" id="f_mail_smtp_port" 
                                       name="f_mail_smtp_port" class="form-control" 
                                       maxlength="20" value="587" required  />
                            </div> 
                        </div> 
                    </div> 
                </form>
            </div>
        </div>
    </section>
</div>

