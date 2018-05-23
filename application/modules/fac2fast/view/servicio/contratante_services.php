<script>

    $(document).ready(function () {

        loadListServices();

// search html data
        $("#filter_search_service").keyup(function () {
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
            <h1 class="box-title text-primary">Mis servicios</h1>

            <div class="box-tools pull-right">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <div class="box-header">
            <div class="well">
                <div class='form-group form-group-sm'> 
                    <div class='col-sm-8'> 
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </div>
                            <input type="text" class="form-control input-sm" 
                                   id="filter_search_service" 
                                   name="filter_search_service"
                                   aria-describedby="inputSuccess3Status"
                                   value="" placeholder="Busca un servicio, o crea uno nuevo"/>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary btn-sm"
                                data-toggle="modal" 
                                data-remote="<?php echo __URL__ . '/fac2fast/servicio/add'; ?>" 
                                data-target="#myModel"
                                ><i class="fa fa-plus"></i> Nuevo</button>
                    </div>
                </div> 
            </div> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body no-padding">

                    <div style="height: 500px">
                        <table class="table_services table table-condensed table-hover">
                            <thead>
                                <tr class="bg-aqua-gradient">
                                    <th style="width: 10px">#</th>
                                    <th>Servicio</th>
                                    <th>Desc</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody id="div_services_list">

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
</div>