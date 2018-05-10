<div id="page-wrapper">
    <h2>configuracion/informe/index</h2>
    <header class="breadcrumb">
        <a href="https://local.factufacil/configuracion/informe/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>id_aux_informe</th> 
<th>id_estado</th> 
<th>nombre_informe</th> 
<th>default_template</th> 
<th>modulo_informe</th> 
<th>controller_informe</th> 
<th>action_informe</th> 
<th>estado</th> 
<th>tipo</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsInformes AS $informe):?>
<tr> 
<td><?php echo $informe->id_aux_informe; ?></td> 
<td><?php echo $informe->id_estado; ?></td> 
<td><?php echo $informe->nombre_informe; ?></td> 
<td><?php echo $informe->default_template; ?></td> 
<td><?php echo $informe->modulo_informe; ?></td> 
<td><?php echo $informe->controller_informe; ?></td> 
<td><?php echo $informe->action_informe; ?></td> 
<td><?php echo $informe->estado; ?></td> 
<td><?php echo $informe->tipo; ?></td> 
<td> 
 <a href='/configuracion/informe/edit/<?php echo $informe->id_aux_informe; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/configuracion/informe/delete/<?php echo $informe->id_aux_informe; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>