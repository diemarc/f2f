<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="modal-title text-success" id="myModalLabel">Nuevo servicio</h3>
</div>
<div class="modal-body">
    <form action="<?php echo __URL__; ?>/fac2fast/empresacontratante/save" 
          id="formNewEmpresa" name="formNewEmpresa" method="POST" class="form-horizontal"
          accept-charset="utf-8">
        <input type="hidden"name="f_id_poblacion" id="f_id_poblacion" value="" />
        <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            Datos principales
        </header>

        <div class='form-group form-group-sm'> 
            <label for='f_servicio' class='col-sm-2 control-label'>Servicio</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-12'> 
                    <input type="text" id="f_servicio" name="f_servicio" class="form-control"  maxlength="45"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_descripcion' class='col-sm-2 control-label'>Descripcion</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-12'> 
                    <textarea id="f_descripcion" name="f_descripcion" class="form-control"></textarea>
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_precio' class='col-sm-2 control-label'>Precio</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" step="0.01" id="f_precio" name="f_precio" class="form-control"  maxlength="10,2" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_iva' class='col-sm-2 control-label'>IVA</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" step="0.01" id="f_iva" name="f_iva" class="form-control"  maxlength="10,2" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_iva' class='col-sm-2 control-label'>Retenci&oacute;n</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" step="0.01" id="f_retencion" name="f_retencion" class="form-control"  maxlength="10,2" required  />
                </div> 
            </div> 
        </div> 

    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary"
            onclick="save()">Crear</button>
</div>
