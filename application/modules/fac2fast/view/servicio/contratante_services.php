<script>

    $(document).ready(function () {

        loadListServices();

// search html data
        $("#filter_buscar_agrupacion").keyup(function () {
            var filter = $(this).val();

            $("table.table_services > tbody > tr").each(function () {

                // si la lista no existe el string a mostrar, ocultamos las filas
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide();

                    // Si coincide mostramos el tr
                } else {
                    $(this).show();

                }
            });

        });

    });

</script>

<div class="box box-primary direct-chat direct-chat-primary">
    <div class="modal-header">
        <div class="box-header with-border">
            <h2 class="box-title text-primary">Mis servicios</h2>

            <div class="box-tools pull-right">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"
                                    data-toggle="modal" 
                                    data-remote="<?php echo __URL__ . '/fac2fast/servicio/add'; ?>" 
                                    data-target="#myModel"
                                    ><i class="fa fa-plus"></i> Nuevo</button>

                        </div>

                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <input type="text" class="form-control input-sm" 
                           id="filter_buscar_agrupacion" 
                           name="filter_buscar_agrupacion"
                           aria-describedby="inputSuccess3Status"
                           value="">
                    <span class="fa fa-search form-control-feedback" aria-hidden="true"></span>
                    <span id="inputSuccess3Status" class="sr-only">(success)</span>  
                    <table class="table_services table table-condensed table-hover">
                        <thead>
                            <tr class="bg-aqua-gradient">
                                <th style="width: 10px">#</th>
                                <th>Servicio</th>
                                <th>Desc</th>
                                <th>PrecioBase</th>
                                <th>Iva</th>
                                <th>Retenci&oacute;n</th>
                                <th style="width: 40px"></th>
                            </tr>
                        </thead>
                        <tbody id="div_services_list">

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
</div>