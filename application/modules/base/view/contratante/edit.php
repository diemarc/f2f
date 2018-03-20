<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $rsContratante->contratante; ?>
            <small>aqu&iacute; puedes editar todo lo referente a tu empresa</small>
        </h1>

    </section> 
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-blue"><?php echo $rsContratante->razon_social; ?></h3>

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Editar los datos de mi empresa</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form action="<?php echo __URL__.'/base/contratante/update/'.$rs->id_contratante; ?>" 
                                  id="formKerana" name="formKerana" method="POST" class="form-horizontal"
                                  accept-charset="utf-8">
                                      <?php echo $kerana_token; ?>
                                <div class="box-body">
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_contratante' class='col-sm-2 control-label'>Nombre  corto</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-2'> 
                                                <input type="text" id="f_contratante" name="f_contratante" class="form-control"  maxlength="45" required value="<?php echo $rsContratante->contratante; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_cif' class='col-sm-2 control-label'>Cif</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-3'> 
                                                <input type="text" id="f_cif" name="f_cif" 
                                                       class="form-control"  maxlength="9" required value="<?php echo $rsContratante->cif; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_razon_social' class='col-sm-2 control-label'>Razon social</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-10'> 
                                                <input type="text" id="f_razon_social" name="f_razon_social" class="form-control"  maxlength="250"  value="<?php echo $rsContratante->razon_social; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_direccion' class='col-sm-2 control-label'>Direccion</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-12'> 
                                                <input type="text" id="f_direccion" name="f_direccion" class="form-control"  maxlength="45"  value="<?php echo $rsContratante->direccion; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_telefono' class='col-sm-2 control-label'>Tel&eacute;fono</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-4'> 
                                                <input type="tel" id="f_telefono" name="f_telefono" class="form-control"  maxlength="15"  value="<?php echo $rsContratante->telefono; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_email' class='col-sm-2 control-label'>Email</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-8'> 
                                                <input type="email" id="f_email" name="f_email" class="form-control"  maxlength="45"  value="<?php echo $rsContratante->email; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_contacto' class='col-sm-2 control-label'>Contacto</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-8'> 
                                                <input type="text" id="f_contacto" name="f_contacto" class="form-control"  maxlength="45"  value="<?php echo $rsContratante->contacto; ?>"  />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_cta_bancaria' class='col-sm-2 control-label'>Cta bancaria</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-8'> 
                                                <input type="number" id="f_cta_bancaria" name="f_cta_bancaria" class="form-control" maxlength="20"  value="<?php echo $rsContratante->cta_bancaria; ?>" />
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class='form-group form-group-sm'> 
                                        <label for='f_observacion' class='col-sm-2 control-label'>Observacion</label> 
                                        <div class='col-sm-6'> 
                                            <div class='input-group col-sm-8'> 
                                                <textarea name="f_observacion" id="f_observacion" class="form-control"><?php echo $rsContratante->observacion; ?></textarea>

                                            </div> 
                                        </div> 
                                    </div> 
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">Actualizar datos</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        dere
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>
