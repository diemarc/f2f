<div id="page-wrapper">
    <h2>system/mailaccount/index</h2>
    <header class="breadcrumb">
        <a href="https://local.factufacil/system/mailaccount/add" 
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
            <?php foreach($rsMailaccounts AS $mailaccount):?>
<tr> 
<td> 
 <a href='/system/mailaccount/edit/<?php echo $mailaccount->id_mail_account; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/system/mailaccount/delete/<?php echo $mailaccount->id_mail_account; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>