<div id="page-wrapper">
    <h2>fac2fast/facturaservicio/index</h2>
    <header class="breadcrumb">
        <a href="http://local.factufacil/fac2fast/facturaservicio/add" 
           class="btn btn-success">Add new</a>
    </header>
    <section id='results' class='table-responsive'>
      <table class="table table-bordered table-condensed table-hover">
        <thead class='bg-warning'>
            <tr>
                <th>facturas_id_facturas</th> 
<th>f_servicios_id_servicio</th> 
<th>cantidad</th> 
<th>precio</th> 
<th>id_pago</th> 
<th>fecha_factura</th> 
<th>num_factura</th> 
<th>abono</th> 
<th>id_tipo</th> 
<th>created_at_B</th> 
<th>created_by_B</th> 
<th>fechas</th> 
<th>contratante</th> 
<th>cif_contratante</th> 
<th>razon_social_contratante</th> 
<th>id_poblacion_contratante</th> 
<th>direccion_contratante</th> 
<th>telelefono_contratante</th> 
<th>email_contratante</th> 
<th>contacto_contratante</th> 
<th>cta_bancaria_contratante</th> 
<th>path_logo</th> 
<th>observacion_contratante</th> 
<th>created_at_contratante</th> 
<th>creataed_by_contratante</th> 
<th>id_estado_contratante</th> 
<th>estado_contratante</th> 
<th>tipo_contratante</th> 
<th>poblacion_contratante</th> 
<th>provincia_contratante</th> 
<th>ccaa_contratante</th> 
<th>pais_contratante</th> 
<th>cod_pobalcion_contratante</th> 
<th>cod_provincia_contratante</th> 
<th>cod_ccaa_contratante</th> 
<th>cod_pais_contratante</th> 
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
<th>tipo_empresa</th> 
<th>poblacion</th> 
<th>provincia</th> 
<th>ccaa</th> 
<th>pais</th> 
<th>cod_poblacion</th> 
<th>cod_provincia</th> 
<th>cod_ccaa</th> 
<th>cod_pais</th> 
<th>formapago</th> 
<th>tipo</th> 
<th>id_subclase</th> 
<th>servicio</th> 
<th>descripcion</th> 
<th>precio_generico</th> 
<th>created_as_servicio</th> 
<th>created_by_servicio</th> 
<th>subclase</th> 
<th>clase</th> 
<th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsFacturaservicios AS $facturaservicio):?>
<tr> 
<td><?php echo $facturaservicio->facturas_id_facturas; ?></td> 
<td><?php echo $facturaservicio->f_servicios_id_servicio; ?></td> 
<td><?php echo $facturaservicio->cantidad; ?></td> 
<td><?php echo $facturaservicio->precio; ?></td> 
<td><?php echo $facturaservicio->id_pago; ?></td> 
<td><?php echo $facturaservicio->fecha_factura; ?></td> 
<td><?php echo $facturaservicio->num_factura; ?></td> 
<td><?php echo $facturaservicio->abono; ?></td> 
<td><?php echo $facturaservicio->id_tipo; ?></td> 
<td><?php echo $facturaservicio->created_at_B; ?></td> 
<td><?php echo $facturaservicio->created_by_B; ?></td> 
<td><?php echo $facturaservicio->fechas; ?></td> 
<td><?php echo $facturaservicio->contratante; ?></td> 
<td><?php echo $facturaservicio->cif_contratante; ?></td> 
<td><?php echo $facturaservicio->razon_social_contratante; ?></td> 
<td><?php echo $facturaservicio->id_poblacion_contratante; ?></td> 
<td><?php echo $facturaservicio->direccion_contratante; ?></td> 
<td><?php echo $facturaservicio->telelefono_contratante; ?></td> 
<td><?php echo $facturaservicio->email_contratante; ?></td> 
<td><?php echo $facturaservicio->contacto_contratante; ?></td> 
<td><?php echo $facturaservicio->cta_bancaria_contratante; ?></td> 
<td><?php echo $facturaservicio->path_logo; ?></td> 
<td><?php echo $facturaservicio->observacion_contratante; ?></td> 
<td><?php echo $facturaservicio->created_at_contratante; ?></td> 
<td><?php echo $facturaservicio->creataed_by_contratante; ?></td> 
<td><?php echo $facturaservicio->id_estado_contratante; ?></td> 
<td><?php echo $facturaservicio->estado_contratante; ?></td> 
<td><?php echo $facturaservicio->tipo_contratante; ?></td> 
<td><?php echo $facturaservicio->poblacion_contratante; ?></td> 
<td><?php echo $facturaservicio->provincia_contratante; ?></td> 
<td><?php echo $facturaservicio->ccaa_contratante; ?></td> 
<td><?php echo $facturaservicio->pais_contratante; ?></td> 
<td><?php echo $facturaservicio->cod_pobalcion_contratante; ?></td> 
<td><?php echo $facturaservicio->cod_provincia_contratante; ?></td> 
<td><?php echo $facturaservicio->cod_ccaa_contratante; ?></td> 
<td><?php echo $facturaservicio->cod_pais_contratante; ?></td> 
<td><?php echo $facturaservicio->cif; ?></td> 
<td><?php echo $facturaservicio->empresa; ?></td> 
<td><?php echo $facturaservicio->razon_social; ?></td> 
<td><?php echo $facturaservicio->id_poblacion; ?></td> 
<td><?php echo $facturaservicio->direccion; ?></td> 
<td><?php echo $facturaservicio->telefono; ?></td> 
<td><?php echo $facturaservicio->email; ?></td> 
<td><?php echo $facturaservicio->contacto; ?></td> 
<td><?php echo $facturaservicio->cta_bancaria; ?></td> 
<td><?php echo $facturaservicio->observacion; ?></td> 
<td><?php echo $facturaservicio->created_at; ?></td> 
<td><?php echo $facturaservicio->created_by; ?></td> 
<td><?php echo $facturaservicio->aux_estados_id_estado; ?></td> 
<td><?php echo $facturaservicio->estado; ?></td> 
<td><?php echo $facturaservicio->tipo_empresa; ?></td> 
<td><?php echo $facturaservicio->poblacion; ?></td> 
<td><?php echo $facturaservicio->provincia; ?></td> 
<td><?php echo $facturaservicio->ccaa; ?></td> 
<td><?php echo $facturaservicio->pais; ?></td> 
<td><?php echo $facturaservicio->cod_poblacion; ?></td> 
<td><?php echo $facturaservicio->cod_provincia; ?></td> 
<td><?php echo $facturaservicio->cod_ccaa; ?></td> 
<td><?php echo $facturaservicio->cod_pais; ?></td> 
<td><?php echo $facturaservicio->formapago; ?></td> 
<td><?php echo $facturaservicio->tipo; ?></td> 
<td><?php echo $facturaservicio->id_subclase; ?></td> 
<td><?php echo $facturaservicio->servicio; ?></td> 
<td><?php echo $facturaservicio->descripcion; ?></td> 
<td><?php echo $facturaservicio->precio_generico; ?></td> 
<td><?php echo $facturaservicio->created_as_servicio; ?></td> 
<td><?php echo $facturaservicio->created_by_servicio; ?></td> 
<td><?php echo $facturaservicio->subclase; ?></td> 
<td><?php echo $facturaservicio->clase; ?></td> 
<td> 
 <a href='/fac2fast/facturaservicio/edit/<?php echo $facturaservicio->facturas_id_facturas; ?>' 
 class='btn btn-default btn-xs' title='Edit'>
<i class='fa fa-edit'></i>
</a> 
<a href='/fac2fast/facturaservicio/delete/<?php echo $facturaservicio->facturas_id_facturas; ?>' 
 class='btn btn-danger btn-xs' title='Delete'>
<i class='fa fa-trash'></i></a> 
 </td> 
</tr> 
<?php endforeach;?>
        </tbody>
      </table>
    </section>
</div>