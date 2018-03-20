<div id="page-wrapper">
    <h2>fac2fast/facturaservicio/New record</h2>
    <form action="http://local.factufacil/fac2fast/facturaservicio/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
                  <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="http://local.factufacil/fac2fast/facturaservicio/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
<label for='f_facturas_id_facturas' class='col-sm-2 control-label'>Facturas_id_facturas</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_facturas_id_facturas" id="f_facturas_id_facturas" required> 
 <option value="">--Select a option --</option><?php foreach($rsFacturas AS $factura): ?>  
  <option value="<?php echo $factura->id_facturas;?>"> <?php echo $factura->id_facturas; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_f_servicios_id_servicio' class='col-sm-2 control-label'>F_servicios_id_servicio</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_f_servicios_id_servicio" id="f_f_servicios_id_servicio" required> 
 <option value="">--Select a option --</option><?php foreach($rsServicios AS $servicio): ?>  
  <option value="<?php echo $servicio->id_servicio;?>"> <?php echo $servicio->servicio; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_cantidad' class='col-sm-2 control-label'>Cantidad</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="number" step="0.01" id="f_cantidad" name="f_cantidad" class="form-control"  maxlength="9,2" required  />
 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_precio' class='col-sm-2 control-label'>Precio</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="number" step="0.01" id="f_precio" name="f_precio" class="form-control"  maxlength="9,2" required  />
 </div> 
 </div> 
</div> 


    </form>
</div>