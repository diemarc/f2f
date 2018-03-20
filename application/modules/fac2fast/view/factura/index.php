<div id="page-wrapper">
    <h2>fac2fast/factura/index</h2>
    <header class="breadcrumb">
        <a href="http://local.factufacil/fac2fast/factura/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>id_facturas</th> 
<th>id_empresa</th> 
<th>id_contratante</th> 
<th>id_pago</th> 
<th>fecha_factura</th> 
<th>num_factura</th> 
<th>abono</th> 
<th>id_tipo</th> 
<th>created_at</th> 
<th>created_by</th> 
<th>fechas</th> 
<th>contratante</th> 
<th>cif_contratante</th> 
<th>razon_social_contratante</th> 
<th>id_poblacion_contratante</th> 
<th>direccion_contratante</th> 
<th>telefono_contratante</th> 
<th>email_contratante</th> 
<th>contacto_contratante</th> 
<th>cta_bancaria_contratante</th> 
<th>path_logo</th> 
<th>observacion_contratante</th> 
<th>created_at_contratante</th> 
<th>create_by_contratante</th> 
<th>id_estado_contratante</th> 
<th>estado_contratante</th> 
<th>tipo_estado_contratante</th> 
<th>poblacion_contratante</th> 
<th>provincia_contratante</th> 
<th>ccaa_contrante</th> 
<th>pais_contratante</th> 
<th>cod_poblacion_contratante</th> 
<th>cod_provincia_contratante</th> 
<th>cod_ccaa_contratante</th> 
<th>Cod_pail_contratante</th> 
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
<th>created_at_empresa</th> 
<th>create_by_empresa</th> 
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
<th>formapago</th> 
<th>tipo_factura</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsFacturas AS $factura):?>
<tr> 
<td><?php echo $factura->id_facturas; ?></td> 
<td><?php echo $factura->id_empresa; ?></td> 
<td><?php echo $factura->id_contratante; ?></td> 
<td><?php echo $factura->id_pago; ?></td> 
<td><?php echo $factura->fecha_factura; ?></td> 
<td><?php echo $factura->num_factura; ?></td> 
<td><?php echo $factura->abono; ?></td> 
<td><?php echo $factura->id_tipo; ?></td> 
<td><?php echo $factura->created_at; ?></td> 
<td><?php echo $factura->created_by; ?></td> 
<td><?php echo $factura->fechas; ?></td> 
<td><?php echo $factura->contratante; ?></td> 
<td><?php echo $factura->cif_contratante; ?></td> 
<td><?php echo $factura->razon_social_contratante; ?></td> 
<td><?php echo $factura->id_poblacion_contratante; ?></td> 
<td><?php echo $factura->direccion_contratante; ?></td> 
<td><?php echo $factura->telefono_contratante; ?></td> 
<td><?php echo $factura->email_contratante; ?></td> 
<td><?php echo $factura->contacto_contratante; ?></td> 
<td><?php echo $factura->cta_bancaria_contratante; ?></td> 
<td><?php echo $factura->path_logo; ?></td> 
<td><?php echo $factura->observacion_contratante; ?></td> 
<td><?php echo $factura->created_at_contratante; ?></td> 
<td><?php echo $factura->create_by_contratante; ?></td> 
<td><?php echo $factura->id_estado_contratante; ?></td> 
<td><?php echo $factura->estado_contratante; ?></td> 
<td><?php echo $factura->tipo_estado_contratante; ?></td> 
<td><?php echo $factura->poblacion_contratante; ?></td> 
<td><?php echo $factura->provincia_contratante; ?></td> 
<td><?php echo $factura->ccaa_contrante; ?></td> 
<td><?php echo $factura->pais_contratante; ?></td> 
<td><?php echo $factura->cod_poblacion_contratante; ?></td> 
<td><?php echo $factura->cod_provincia_contratante; ?></td> 
<td><?php echo $factura->cod_ccaa_contratante; ?></td> 
<td><?php echo $factura->Cod_pail_contratante; ?></td> 
<td><?php echo $factura->cif; ?></td> 
<td><?php echo $factura->empresa; ?></td> 
<td><?php echo $factura->razon_social; ?></td> 
<td><?php echo $factura->id_poblacion; ?></td> 
<td><?php echo $factura->direccion; ?></td> 
<td><?php echo $factura->telefono; ?></td> 
<td><?php echo $factura->email; ?></td> 
<td><?php echo $factura->contacto; ?></td> 
<td><?php echo $factura->cta_bancaria; ?></td> 
<td><?php echo $factura->observacion; ?></td> 
<td><?php echo $factura->created_at_empresa; ?></td> 
<td><?php echo $factura->create_by_empresa; ?></td> 
<td><?php echo $factura->aux_estados_id_estado; ?></td> 
<td><?php echo $factura->estado; ?></td> 
<td><?php echo $factura->tipo; ?></td> 
<td><?php echo $factura->poblacion; ?></td> 
<td><?php echo $factura->provincia; ?></td> 
<td><?php echo $factura->ccaa; ?></td> 
<td><?php echo $factura->pais; ?></td> 
<td><?php echo $factura->cod_poblacion; ?></td> 
<td><?php echo $factura->cod_provincia; ?></td> 
<td><?php echo $factura->cod_ccaa; ?></td> 
<td><?php echo $factura->cod_pais; ?></td> 
<td><?php echo $factura->formapago; ?></td> 
<td><?php echo $factura->tipo_factura; ?></td> 
<td> 
 <a href='/fac2fast/factura/edit/<?php echo $factura->id_facturas; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/fac2fast/factura/delete/<?php echo $factura->id_facturas; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>