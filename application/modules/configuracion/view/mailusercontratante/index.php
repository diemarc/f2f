<div id="page-wrapper">
    <h2>configuracion/mailusercontratante/index</h2>
    <header class="breadcrumb">
        <a href="https://local.factufacil/configuracion/mailusercontratante/add" 
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
            <?php foreach($rsMailusercontratantes AS $mailusercontratante):?>
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
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>