<div id="page-wrapper">
    <h2>configuracion/informecontratante/New record</h2>
    <form action="https://local.factufacil/configuracion/informecontratante/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
                  <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="https://local.factufacil/configuracion/informecontratante/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
<label for='f_id_aux_informe' class='col-sm-2 control-label'>Id_aux_informe</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_id_aux_informe" id="f_id_aux_informe" required> 
 <option value="">--Select a option --</option><?php foreach($rsInformes AS $informe): ?>  
  <option value="<?php echo $informe->id_aux_informe;?>"> <?php echo $informe->informe; ?></option> 
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
<label for='f_template_contratante_informe' class='col-sm-2 control-label'>Template_contratante_informe</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<input type="text" id="f_template_contratante_informe" name="f_template_contratante_informe" class="form-control"  maxlength="100"   />
 </div> 
 </div> 
</div> 


    </form>
</div>