<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="modal-title text-primary" id="myModalLabel">Nuevo servicio</h3>
</div>
<div class="modal-body">
    <form action="<?php echo __URL__; ?>/fac2fast/serviciocontratante/save" 
          id="formNewService" name="formNewService" method="POST" class="form-horizontal"
          accept-charset="utf-8">
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
            <div class='col-sm-4'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" step="0.01" id="f_precio" name="f_precio" class="form-control"  maxlength="10,2" required  />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_iva_servicio' class='col-sm-2 control-label'>IVA</label> 
            <div class='col-sm-4'> 
                <div class='input-group col-sm-8'> 
                    <select class="form-control" name="f_iva_servicio" id="f_iva_servicio">
                        <?php foreach ($rsIvas AS $iva): ?>
                            <option value="<?php echo $iva->porcentaje; ?>"><?php echo $iva->porcentaje; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_retencion_servicio' class='col-sm-2 control-label'>Retenci&oacute;n</label> 
            <div class='col-sm-4'> 
                <div class='input-group col-sm-8'> 

                    <select class="form-control" name="f_retencion_servicio" id="f_retencion_servicio">
                        <?php foreach ($rsRetenciones AS $ret): ?>
                            <option value="<?php echo $ret->porcentaje; ?>"><?php echo $ret->porcentaje; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div> 
            </div> 
        </div>

        <div class='form-group form-group-sm'> 
            <label for='f_is_default' class='col-sm-2 control-label'>Favorito?</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="radio" id="f_is_default" name="f_is_default" 
                           class="radio_inline" value="1">Si 
                    <input type="radio" id="f_is_default" name="f_is_default" 
                           class="radio_inline" value="0" checked>No
                </div> 
            </div> 
        </div> 
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type=button" class="btn btn-primary" onclick="saveNewServiceContratante()"
            >Crear</button>


</div>
