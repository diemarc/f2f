<div id="page-wrapper">
    <h2>fac2fast/empresacontratante/New record</h2>
    <form action="http://local.factufacil/fac2fast/empresacontratante/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
                  <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="http://local.factufacil/fac2fast/empresacontratante/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
<label for='f_id_empresa' class='col-sm-2 control-label'>Id_empresa</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_id_empresa" id="f_id_empresa" required> 
 <option value="">--Select a option --</option><?php foreach($rsEmpresas AS $empresa): ?>  
  <option value="<?php echo $empresa->id_empresa;?>"> <?php echo $empresa->empresa; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_id_contratante' class='col-sm-2 control-label'>Id_contratante</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_id_contratante" id="f_id_contratante" required> 
 <option value="">--Select a option --</option><?php foreach($rsContratantes AS $contratante): ?>  
  <option value="<?php echo $contratante->id_contratante;?>"> <?php echo $contratante->contratante; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_fechas' class='col-sm-2 control-label'>Fechas</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_fechas" name="f_fechas" class="form-control"  maxlength="45"   />
 </div> 
 </div> 
</div> 


    </form>
</div>