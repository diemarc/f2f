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
                <th>Options</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach($rsEmpresas AS $empresa):?>
<tr> 
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