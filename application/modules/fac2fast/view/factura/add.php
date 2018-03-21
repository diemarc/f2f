<div id="page-wrapper">
    <h2>fac2fast/factura/New record</h2>
    <form action="http://local.factufacil/fac2fast/factura/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
              <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="http://local.factufacil/fac2fast/factura/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
            <label for='f_id_empresa' class='col-sm-2 control-label'>Id_empresa</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_id_empresa" id="f_id_empresa" required> 
                        <option value="">--Select a option --</option><?php foreach ($rsEmpresacontratantes AS $empresacontratante): ?>  
                            <option value="<?php echo $empresacontratante->id_empresa; ?>"> <?php echo $empresacontratante->razon_social_empresa; ?></option> 
                        <?php endforeach; ?>  
                    </select> 

                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_id_contratante' class='col-sm-2 control-label'>Id_contratante</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_id_contratante" id="f_id_contratante" required> 
                        <option value="">--Select a option --</option><?php foreach ($rsEmpresacontratantes AS $empresacontratante): ?>  
                            <option value="<?php echo $empresacontratante->id_contratante; ?>"> <?php echo $empresacontratante->razon_social; ?></option> 
                        <?php endforeach; ?>  
                    </select> 

                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_id_pago' class='col-sm-2 control-label'>Id_pago</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_id_pago" id="f_id_pago" required> 
                        <option value="">--Select a option --</option><?php foreach ($rsFormapagos AS $formapago): ?>  
                            <option value="<?php echo $formapago->id_pago; ?>"> <?php echo $formapago->formapago; ?></option> 
                        <?php endforeach; ?>  
                    </select> 

                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_fecha_factura' class='col-sm-2 control-label'>Fecha_factura</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 

                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_num_factura' class='col-sm-2 control-label'>Num_factura</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_num_factura" name="f_num_factura" class="form-control"  maxlength="10" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_abono' class='col-sm-2 control-label'>Abono</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="radio" id="f_abono" name="f_abono" class="radio_inline" value="1">Yes <input type="radio" id="f_abono" name="f_abono" class="radio_inline" value="0">No
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_id_tipo' class='col-sm-2 control-label'>Id_tipo</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_id_tipo" id="f_id_tipo" required> 
                        <option value="">--Select a option --</option><?php foreach ($rsTipos AS $tipo): ?>  
                            <option value="<?php echo $tipo->id_tipo; ?>"> <?php echo $tipo->tipo; ?></option> 
                        <?php endforeach; ?>  
                    </select> 

                </div> 
            </div> 
        </div> 


    </form>
</div>