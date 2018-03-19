<div id="page-wrapper">
    <h2>configuracion/serviciotasa/New record</h2>
    <form action="http://local.factufacil/configuracion/serviciotasa/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
              <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="http://local.factufacil/configuracion/serviciotasa/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
            <label for='f_id_servicio' class='col-sm-2 control-label'>Id_servicio</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_id_servicio" id="f_id_servicio" required> 
                        <option value="">--Select a option --</option><?php foreach ($rsServicios AS $servicio): ?>  
                            <option value="<?php echo $servicio->id_servicio; ?>"> <?php echo $servicio->servicio; ?></option> 
                        <?php endforeach; ?>  
                    </select> 

                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_id_tasa' class='col-sm-2 control-label'>Id_tasa</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_id_tasa" id="f_id_tasa" required> 
                        <option value="">--Select a option --</option><?php foreach ($rsTaxas AS $taxa): ?>  
                            <option value="<?php echo $taxa->id_tasa; ?>"> <?php echo $taxa->tasa; ?></option> 
                        <?php endforeach; ?>  
                    </select> 

                </div> 
            </div> 
        </div> 


    </form>
</div>