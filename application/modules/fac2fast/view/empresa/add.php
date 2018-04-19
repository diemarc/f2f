<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="modal-title" id="myModalLabel">Nuevo cliente</h3>
</div>
<div class="modal-body">
    <form action="http://local.factufacil/fac2fast/empresa/save" 
          id="formKerana" name="formKerana" method="POST" class="form-horizontal"
          accept-charset="utf-8">
              <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            <a href="http://local.factufacil/fac2fast/empresa/index" 
               class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </header>

        <div class='form-group form-group-sm'> 
            <label for='f_cif' class='col-sm-2 control-label'>Cif</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_cif" name="f_cif" class="form-control"  maxlength="10" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_empresa' class='col-sm-2 control-label'>Empresa</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_empresa" name="f_empresa" class="form-control"  maxlength="45"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_razon_social' class='col-sm-2 control-label'>Razon_social</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_razon_social" name="f_razon_social" class="form-control"  maxlength="250"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_direccion' class='col-sm-2 control-label'>Direccion</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_direccion" name="f_direccion" class="form-control"  maxlength="150"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_telefono' class='col-sm-2 control-label'>Telefono</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="tel" id="f_telefono" name="f_telefono" class="form-control"  maxlength="15"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_email' class='col-sm-2 control-label'>Email</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="email" id="f_email" name="f_email" class="form-control"  maxlength="45"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_contacto' class='col-sm-2 control-label'>Contacto</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_contacto" name="f_contacto" class="form-control"  maxlength="45"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_cta_bancaria' class='col-sm-2 control-label'>Cta_bancaria</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" id="f_cta_bancaria" name="f_cta_bancaria" class="form-control" maxlength="20"  />
                </div> 
            </div> 
        </div> 

    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Submit</button>
</div>
