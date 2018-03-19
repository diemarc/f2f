<div id="page-wrapper">
    <h2>fac2fast/empresa/index</h2>
    <header class="breadcrumb">
        <a href="http://local.factufacil/fac2fast/empresa/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>id_empresa</th> 
<th>cif</th> 
<th>empresa</th> 
<th>razon_social</th> 
<th>id_poblacion</th> 
<th>direccion</th> 
<th>telefono</th> 
<th>email</th> 
<th>contacto</th> 
<th>cta_bancaria</th> 
<th>observacion</th> 
<th>created_at</th> 
<th>created_by</th> 
<th>aux_estados_id_estado</th> 
<th>estado</th> 
<th>tipo</th> 
<th>poblacion</th> 
<th>provincia</th> 
<th>ccaa</th> 
<th>pais</th> 
<th>cod_poblacion</th> 
<th>cod_provincia</th> 
<th>cod_ccaa</th> 
<th>cod_pais</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsEmpresas AS $empresa):?>
<tr> 
<td><?php echo $empresa->id_empresa; ?></td> 
<td><?php echo $empresa->cif; ?></td> 
<td><?php echo $empresa->empresa; ?></td> 
<td><?php echo $empresa->razon_social; ?></td> 
<td><?php echo $empresa->id_poblacion; ?></td> 
<td><?php echo $empresa->direccion; ?></td> 
<td><?php echo $empresa->telefono; ?></td> 
<td><?php echo $empresa->email; ?></td> 
<td><?php echo $empresa->contacto; ?></td> 
<td><?php echo $empresa->cta_bancaria; ?></td> 
<td><?php echo $empresa->observacion; ?></td> 
<td><?php echo $empresa->created_at; ?></td> 
<td><?php echo $empresa->created_by; ?></td> 
<td><?php echo $empresa->aux_estados_id_estado; ?></td> 
<td><?php echo $empresa->estado; ?></td> 
<td><?php echo $empresa->tipo; ?></td> 
<td><?php echo $empresa->poblacion; ?></td> 
<td><?php echo $empresa->provincia; ?></td> 
<td><?php echo $empresa->ccaa; ?></td> 
<td><?php echo $empresa->pais; ?></td> 
<td><?php echo $empresa->cod_poblacion; ?></td> 
<td><?php echo $empresa->cod_provincia; ?></td> 
<td><?php echo $empresa->cod_ccaa; ?></td> 
<td><?php echo $empresa->cod_pais; ?></td> 
<td> 
 <a href='/fac2fast/empresa/edit/<?php echo $empresa->id_empresa; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/fac2fast/empresa/delete/<?php echo $empresa->id_empresa; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>