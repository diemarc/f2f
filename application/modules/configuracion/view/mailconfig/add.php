<div id="page-wrapper">
    <h2>configuracion/mailconfig/New record</h2>
    <form action="https://local.factufacil/configuracion/mailconfig/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
                  <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="https://local.factufacil/configuracion/mailconfig/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
<label for='f_id_mail_account' class='col-sm-2 control-label'>Id_mail_account</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_id_mail_account" id="f_id_mail_account" required> 
 <option value="">--Select a option --</option><?php foreach($rsMailaccounts AS $mailaccount): ?>  
  <option value="<?php echo $mailaccount->id_mail_account;?>"> <?php echo $mailaccount->mailaccount; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 
<div class='form-group form-group-sm'> 
<label for='f_id_user' class='col-sm-2 control-label'>Id_user</label> 
<div class='col-sm-6'> 
 <div class='input-group col-sm-8'> 
<select class="form-control" name="f_id_user" id="f_id_user" required> 
 <option value="">--Select a option --</option><?php foreach($rsUsercontratantes AS $usercontratante): ?>  
  <option value="<?php echo $usercontratante->id_user;?>"> <?php echo $usercontratante->usercontratante; ?></option> 
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
 <option value="">--Select a option --</option><?php foreach($rsUsercontratantes AS $usercontratante): ?>  
  <option value="<?php echo $usercontratante->id_contratante;?>"> <?php echo $usercontratante->usercontratante; ?></option> 
<?php endforeach;?>  
</select> 

 </div> 
 </div> 
</div> 


    </form>
</div>