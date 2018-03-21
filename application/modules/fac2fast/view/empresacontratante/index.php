<div id="page-wrapper">
    <h2>fac2fast/empresacontratante/index</h2>
    <header class="breadcrumb">
        <a href="http://local.factufacil/fac2fast/empresacontratante/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>id_empresa</th> 
<th>id_contratante</th> 
<th>fechas</th> 
<th>contratante</th> 
<th>cif</th> 
<th>razon_social</th> 
<th>id_poblacion</th> 
<th>direccion</th> 
<th>telefono</th> 
<th>email</th> 
<th>contacto</th> 
<th>cta_bancaria</th> 
<th>path_logo</th> 
<th>observacion</th> 
<th>created_at</th> 
<th>created_by</th> 
<th>aux_estados_id_estado</th> 
<th>poblacion</th> 
<th>provincia</th> 
<th>ccaa</th> 
<th>pais</th> 
<th>cod_poblacion</th> 
<th>cod_provincia</th> 
<th>cod_ccaa</th> 
<th>cod_pais</th> 
<th>cif_empresa</th> 
<th>empresa</th> 
<th>razon_social_empresa</th> 
<th>id_poblacion_empresa</th> 
<th>direccion_empresa</th> 
<th>telefono_empresa</th> 
<th>email_empresa</th> 
<th>contacto_empresa</th> 
<th>cta_bancaria_empresa</th> 
<th>observacion_empresa</th> 
<th>id_estado_empresa</th> 
<th>poblacion_empresa</th> 
<th>provincia_empresa</th> 
<th>ccaa_empresa</th> 
<th>pais_empresa</th> 
<th>cod_poblacion_empresa</th> 
<th>cod_provincia_empresa</th> 
<th>cod_ccaa_empresa</th> 
<th>cod_pais_empresa</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsEmpresacontratantes AS $empresacontratante):?>
<tr> 
<td><?php echo $empresacontratante->id_empresa; ?></td> 
<td><?php echo $empresacontratante->id_contratante; ?></td> 
<td><?php echo $empresacontratante->fechas; ?></td> 
<td><?php echo $empresacontratante->contratante; ?></td> 
<td><?php echo $empresacontratante->cif; ?></td> 
<td><?php echo $empresacontratante->razon_social; ?></td> 
<td><?php echo $empresacontratante->id_poblacion; ?></td> 
<td><?php echo $empresacontratante->direccion; ?></td> 
<td><?php echo $empresacontratante->telefono; ?></td> 
<td><?php echo $empresacontratante->email; ?></td> 
<td><?php echo $empresacontratante->contacto; ?></td> 
<td><?php echo $empresacontratante->cta_bancaria; ?></td> 
<td><?php echo $empresacontratante->path_logo; ?></td> 
<td><?php echo $empresacontratante->observacion; ?></td> 
<td><?php echo $empresacontratante->created_at; ?></td> 
<td><?php echo $empresacontratante->created_by; ?></td> 
<td><?php echo $empresacontratante->aux_estados_id_estado; ?></td> 
<td><?php echo $empresacontratante->poblacion; ?></td> 
<td><?php echo $empresacontratante->provincia; ?></td> 
<td><?php echo $empresacontratante->ccaa; ?></td> 
<td><?php echo $empresacontratante->pais; ?></td> 
<td><?php echo $empresacontratante->cod_poblacion; ?></td> 
<td><?php echo $empresacontratante->cod_provincia; ?></td> 
<td><?php echo $empresacontratante->cod_ccaa; ?></td> 
<td><?php echo $empresacontratante->cod_pais; ?></td> 
<td><?php echo $empresacontratante->cif_empresa; ?></td> 
<td><?php echo $empresacontratante->empresa; ?></td> 
<td><?php echo $empresacontratante->razon_social_empresa; ?></td> 
<td><?php echo $empresacontratante->id_poblacion_empresa; ?></td> 
<td><?php echo $empresacontratante->direccion_empresa; ?></td> 
<td><?php echo $empresacontratante->telefono_empresa; ?></td> 
<td><?php echo $empresacontratante->email_empresa; ?></td> 
<td><?php echo $empresacontratante->contacto_empresa; ?></td> 
<td><?php echo $empresacontratante->cta_bancaria_empresa; ?></td> 
<td><?php echo $empresacontratante->observacion_empresa; ?></td> 
<td><?php echo $empresacontratante->id_estado_empresa; ?></td> 
<td><?php echo $empresacontratante->poblacion_empresa; ?></td> 
<td><?php echo $empresacontratante->provincia_empresa; ?></td> 
<td><?php echo $empresacontratante->ccaa_empresa; ?></td> 
<td><?php echo $empresacontratante->pais_empresa; ?></td> 
<td><?php echo $empresacontratante->cod_poblacion_empresa; ?></td> 
<td><?php echo $empresacontratante->cod_provincia_empresa; ?></td> 
<td><?php echo $empresacontratante->cod_ccaa_empresa; ?></td> 
<td><?php echo $empresacontratante->cod_pais_empresa; ?></td> 
<td> 
 <a href='/fac2fast/empresacontratante/edit/<?php echo $empresacontratante->id_empresa; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/fac2fast/empresacontratante/delete/<?php echo $empresacontratante->id_empresa; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>