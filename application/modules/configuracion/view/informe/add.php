<div id="page-wrapper">
    <h2>configuracion/informe/New record</h2>
    <form action="https://local.factufacil/configuracion/informe/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
                  <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="https://local.factufacil/configuracion/informe/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
<label for='f_id_estado' class='col-sm-2 control-label'>Id_estado</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_id_estado" id="f_id_estado" required> 
 <option value="">--Select a option --</option><?php foreach($rsEstados AS $estado): ?>  
  <option value="<?php echo $estado->id_estado;?>"> <?php echo $estado->estado; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_nombre_informe' class='col-sm-2 control-label'>Nombre_informe</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_nombre_informe" name="f_nombre_informe" class="form-control"  maxlength="45" required  />
 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_default_template' class='col-sm-2 control-label'>Default_template</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_default_template" name="f_default_template" class="form-control"  maxlength="150" required  />
 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_modulo_informe' class='col-sm-2 control-label'>Modulo_informe</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_modulo_informe" name="f_modulo_informe" class="form-control"  maxlength="45"   />
 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_controller_informe' class='col-sm-2 control-label'>Controller_informe</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_controller_informe" name="f_controller_informe" class="form-control"  maxlength="45"   />
 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_action_informe' class='col-sm-2 control-label'>Action_informe</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_action_informe" name="f_action_informe" class="form-control"  maxlength="45"   />
 </div> 
 </div> 
</div> 


    </form>
</div>