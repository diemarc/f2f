<div id="page-wrapper">
    <h2>fac2fast/contacto/index</h2>
    <header class="breadcrumb">
        <a href="https://local.factufacil/fac2fast/contacto/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>id_contacto</th> 
<th>nombre</th> 
<th>apellido1</th> 
<th>apellido2</th> 
<th>movil</th> 
<th>telefono</th> 
<th>email</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsContactos AS $contacto):?>
<tr> 
<td><?php echo $contacto->id_contacto; ?></td> 
<td><?php echo $contacto->nombre; ?></td> 
<td><?php echo $contacto->apellido1; ?></td> 
<td><?php echo $contacto->apellido2; ?></td> 
<td><?php echo $contacto->movil; ?></td> 
<td><?php echo $contacto->telefono; ?></td> 
<td><?php echo $contacto->email; ?></td> 
<td> 
 <a href='/fac2fast/contacto/edit/<?php echo $contacto->id_contacto; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/fac2fast/contacto/delete/<?php echo $contacto->id_contacto; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>