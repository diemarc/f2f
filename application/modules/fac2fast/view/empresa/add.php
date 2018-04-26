<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="modal-title text-success" id="myModalLabel">Nuevo cliente</h3>
</div>
<div class="modal-body">
    <form action="<?php echo __URL__; ?>/fac2fast/empresacontratante/save" 
          id="formNewEmpresa" name="formNewEmpresa" method="POST" class="form-horizontal"
          accept-charset="utf-8">
        <input type="hidden"name="f_id_poblacion" id="f_id_poblacion" value="" />
        <?php echo $kerana_token; ?>

        <header class="breadcrumb">
            Datos fiscales
        </header>
        <div class='form-group form-group-sm'> 
            <label for='f_razon_social' class='col-sm-2 control-label'>Raz&oacute;n social</label> 
            <div class='col-sm-8'> 
                <div class='input-group col-sm-12'> 
                    <input type="text" id="f_razon_social" name="f_razon_social" class="form-control"  maxlength="250"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm bg-grey'> 
            <label for='f_empresa' class='col-sm-2 control-label'>Nombre</label> 
            <div class='col-sm-10'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_empresa" name="f_empresa" class="form-control"  maxlength="250"   />
                    <span class="small text-info">(*solo para busquedas, si lo dejas vacio se usa la razon social)</span>
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_cif' class='col-sm-2 control-label'>Cif</label> 
            <div class='col-sm-4'> 
                <div class='input-group col-sm-12'> 
                    <input type="text" id="f_cif" name="f_cif" class="form-control"  maxlength="10" required  />
                </div> 
            </div> 
        </div> 

        <div class='form-group form-group-sm'> 
            <label for='aux_provincia' class='col-sm-2 control-label'>Provincia</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-10'> 
                    <select name="aux_provincia" class="form-control" id="aux_provincia">
                        <?php foreach ($rsProvincias AS $provincia): ?>
                            <option value="<?php echo $provincia->cod_provincia; ?>">
                                <?php echo $provincia->provincia; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div> 
            </div> 
        </div>
        <div class='form-group form-group-sm'> 
            <label for='k_poblacion' class='col-sm-2 control-label'>Localidad</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-12'> 
                    <input type="text" id="k_localidad" name="k_localidad" 
                           class="form-control"  maxlength="45"  onchange="findLocalidad(this.value)"
                           value=""  />
                    <div id="live_search_poblacion" class="hidden">
                        <br/>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title text-blue">Selecciona una localidad</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tbody class="small" id="json_localidades">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_direccion' class='col-sm-2 control-label'>Direcci&oacute;n</label> 
            <div class='col-sm-10'> 
                <div class='input-group col-sm-12'> 
                    <input type="text" id="f_direccion" name="f_direccion" 
                           class="form-control"  maxlength="150"   />
                </div> 
            </div> 
        </div> 
        <header class="breadcrumb">
            Complementarios
        </header>

        <div class='form-group form-group-sm'> 
            <label for='f_telefono' class='col-sm-2 control-label'>Tel&eacute;fono</label> 
            <div class='col-sm-4'> 
                <div class='input-group col-sm-8'> 
                    <input type="tel" id="f_telefono" name="f_telefono" 
                           class="form-control"  maxlength="9"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_email' class='col-sm-2 control-label'>Email</label> 
            <div class='col-sm-8'> 
                <div class='input-group col-sm-8'> 
                    <input type="email" id="f_email" name="f_email" 
                           class="form-control"  maxlength="100"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_contacto' class='col-sm-2 control-label'>Contacto</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="text" id="f_contacto" name="f_contacto" 
                           class="form-control"  maxlength="45"   />
                </div> 
            </div> 
        </div> 
        <div class='form-group form-group-sm'> 
            <label for='f_cta_bancaria' class='col-sm-2 control-label'>N&ordm; cuenta</label> 
            <div class='col-sm-6'> 
                <div class='input-group col-sm-8'> 
                    <input type="number" id="f_cta_bancaria" 
                           name="f_cta_bancaria" class="form-control" maxlength="20"  />
                </div> 
            </div> 
        </div> 
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-success"
            onclick="saveEmpresaFactura()">Crear</button>
</div>
