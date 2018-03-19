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
                <th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsFacturas AS $factura):?>
<tr> 
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