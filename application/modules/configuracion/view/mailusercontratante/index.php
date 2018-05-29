<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-envelope fa-2x"></i> Cuentas de mail

        </h1>
        <header class="breadcrumb">
            <a href="https://local.factufacil/configuracion/mailconfig/add" 
               class="btn btn-success">Agregar</a>
        </header>

    </section> 
    <section class='content'>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue">
                    <small>aqu&iacute; puedes configurar todo lo referente a los envios de emails</small>
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <table class="table table-bordered table-condensed table-hover">
                        <thead class='bg-warning'>
                            <tr>
                                <th>Options</th> 

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rsMailusercontratantes AS $mailusercontratante): ?>
                                <tr> 
                                    <td> 
                                        <a href='/configuracion/mailusercontratante/edit/<?php echo $mailusercontratante->id_mail_account; ?>' 
                                           class='btn btn-default btn-xs' title='Edit'>
                                            <i class='fa fa-edit'></i>
                                        </a> 
                                        <a href='/configuracion/mailusercontratante/delete/<?php echo $mailusercontratante->id_mail_account; ?>' 
                                           class='btn btn-danger btn-xs' title='Delete'>
                                            <i class='fa fa-trash'></i></a> 
                                    </td> 
                                </tr> 
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>