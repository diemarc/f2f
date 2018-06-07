<div id="page-wrapper">
    <h2>configuracion/mail/index</h2>
    <header class="breadcrumb">
        <a href="https://local.factufacil/configuracion/mail/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsMails AS $mail):?>
<tr> 
<td> 
 <a href='/configuracion/mail/edit/<?php echo $mail->id_email; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/configuracion/mail/delete/<?php echo $mail->id_email; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>