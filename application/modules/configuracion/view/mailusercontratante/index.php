<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-wrench fa-2x"></i> 
            <a href="<?php echo __URL__.'/base/contratante/index';?>">
                Configuraci&oacute;n f2F</a>->Cuentas de mail

        </h1>

    </section> 
    <section class='content'>
        <div class="box">
            <div class="box-header with-border">
                 <a href="<?php echo __URL__.'/configuracion/mailconfig/add';?>" 
                    class="btn btn-success btn-sm">
                     <i class="fa fa-plus"></i>
                 </a>
                <h3 class="box-title text-blue">
                    <small>aqu&iacute; puedes configurar todo lo referente a los envios de emails</small>
                </h3>
                
            </div>
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hover">
                    <thead class='bg-primary'>
                        <tr>
                            <th>Cuenta</th> 
                            <th>Email</th> 
                            <th></th> 

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rsMailusercontratantes AS $mailconfig): ?>
                            <tr> 
                                <td><?php echo $mailconfig->account;?></td>
                                <td><?php echo $mailconfig->mail_address;?></td>
                                <td> 
                                    <a href='/configuracion/mailusercontratante/edit/<?php echo $mailconfig->id_mail_account; ?>' 
                                       class='btn btn-default btn-xs' title='Edit'>
                                        <i class='fa fa-edit'></i>
                                    </a> 
                                    <a href='/configuracion/mailusercontratante/delete/<?php echo $mailconfig->id_mail_account; ?>' 
                                       class='btn btn-danger btn-xs' title='Delete'>
                                        <i class='fa fa-trash'></i></a> 
                                </td> 
                            </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>