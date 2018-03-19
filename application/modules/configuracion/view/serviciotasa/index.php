<div id="page-wrapper">
    <h2>configuracion/serviciotasa/index</h2>
    <header class="breadcrumb">
        <a href="http://local.factufacil/configuracion/serviciotasa/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>id_servicio</th> 
<th>id_tasa</th> 
<th>tasa</th> 
<th>porcentaje</th> 
<th>id_subclase</th> 
<th>servicio</th> 
<th>descripcion</th> 
<th>precio</th> 
<th>created_at</th> 
<th>created_by</th> 
<th>subclase</th> 
<th>clase</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsServiciotasas AS $serviciotasa):?>
<tr> 
<td><?php echo $serviciotasa->id_servicio; ?></td> 
<td><?php echo $serviciotasa->id_tasa; ?></td> 
<td><?php echo $serviciotasa->tasa; ?></td> 
<td><?php echo $serviciotasa->porcentaje; ?></td> 
<td><?php echo $serviciotasa->id_subclase; ?></td> 
<td><?php echo $serviciotasa->servicio; ?></td> 
<td><?php echo $serviciotasa->descripcion; ?></td> 
<td><?php echo $serviciotasa->precio; ?></td> 
<td><?php echo $serviciotasa->created_at; ?></td> 
<td><?php echo $serviciotasa->created_by; ?></td> 
<td><?php echo $serviciotasa->subclase; ?></td> 
<td><?php echo $serviciotasa->clase; ?></td> 
<td> 
 <a href='/configuracion/serviciotasa/edit/<?php echo $serviciotasa->id_servicio; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/configuracion/serviciotasa/delete/<?php echo $serviciotasa->id_servicio; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>