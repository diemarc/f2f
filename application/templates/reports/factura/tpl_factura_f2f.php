
<style type="text/css">
    <!--
    .table1 {
        padding-top:5px;

    }

    .table1 th {
        font-family:Arial, Helvetica, sans-serif;

    }
    .dataClient {
        margin-top: 150px;
        width: 100%;
        padding:5px;
    }
    p{
        font-size:13px;
    }

    hr{
        border:1px solid #ccc;
    }

    .title{
        background-color: #ccc;
        padding:3px;
        width:100px;
        font-size: 12px;
        border-bottom: 1px solid #666;
    }

    .value{
        border-bottom: 1px dotted #ccc;
        padding:3px;
        font-size: 13px;
    }

    .bordered{
        border:1px solid #ccc;
        padding:3px;
    }

    table.page_footer {
        width: 100%;
        border: none;
        border-top: solid 1px #ccc;
        padding: 2px;
        font-size: 8px;
    }

    .texto-vertical-2 {
        writing-mode: vertical-lr;
        transform: rotate(180deg);
    }
-->
</style>
<page backtop="35mm" backbottom="2mm" backleft="20mm" backright="10mm" style="font-size: 13px"
      footer="date;time;page">
    <page_header>
        <table class="table1" width="" align="left">
            <tr>


                <td width="90%"><p>
                        <strong><?php echo $rsFactura->razon_social_contratante ?>o</strong>.<br />
                        NIF:<?php echo $rsFactura->cif_contratante ?> <br />
                        <?php echo $rsFactura->direccion_contratante; ?> <br />
                        <?php echo $rsFactura->poblacion_contratante; ?> <br />
                        <?php echo $rsFactura->provincia_contratante; ?> <br />
                        Tel: <?php echo $rsFactura->telefono_contratante; ?><br />
                        Email: <?php echo $rsFactura->email_contratante; ?><br/>
                    </p>

                </td>
                <td style="width: 20%; color: #444444;">
                    <img style="width: 100%;" src="<?php echo __URL__ . '/data/logos/' . $rsFactura->path_logo; ?>"
                         alt="Logo"><br>
                    <!--path_logp-->
                </td>
            </tr>
        </table>
        <hr/>
    </page_header>
    <h4>Datos de cliente</h4>
    <table cellspacing="0" cellpadding="0" class="bordered" style="width: 95%">
        <tr>
            <td class="title" style="width:20%">Empresa</td>
            <td class="value" style="width:75%"><?php echo $rsFactura->razon_social; ?></td>
        </tr>
        <tr>
            <td class="title">Cif</td>
            <td class="value"><?php echo $rsFactura->cif; ?></td>
        </tr>
        <tr>
            <td class="title">Domicilio</td>
            <td class="value"><?php echo $rsFactura->direccion; ?></td>
        </tr>
        <tr>
            <td class="title">Localidad</td>
            <td class="value"><?php echo $rsFactura->poblacion; ?></td>
        </tr>
        <tr>
            <td class="title">Provincia</td>
            <td class="value"><?php echo $rsFactura->provincia; ?></td>
        </tr>
        <tr>
            <td class="title">C.Postal</td>
            <td class="value"><?php echo "codpostal"; ?></td>
        </tr>
        <tr>
            <td class="title">Tel&eacute;fono</td>
            <td class="value"><?php echo $rsFactura->telefono; ?></td>
        </tr>
    </table>
    <br/><br/>
    <table cellspacing="0" cellpadding="0" border="0" width="80%">
        <tr>

            <td>Fecha de factura:</td>
            <td><strong><?php echo $rsFactura->fecha_factura; ?></strong></td>
            <!--<td><strong><?php echo date_format($rsFactura->fecha_factura, 'd/m/Y H:i:s'); ?></strong></td>-->
        </tr>
        <tr>
            <td>Factura</td>
            <td><strong><?php echo $rsFactura->num_factura; ?></strong></td>
        </tr>
    </table>
    <h5>Descripci&oacute;n del servicio</h5><hr/>

    <table style="width:95%">
        <thead>
            <tr>
                <th style="width:20%">Servicio</th>
                <th style="width:35%">Especificaciones</th>
                <th style="text-align: right;width:15%">Precio</th>
                <th style="text-align: right;width:10%">Cantidad</th>
                <th style="text-align: right;width:15%">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rsFacturasServicios AS $servicio): ?>
                <tr class="">
                    <td style="text-align: left;width:20%">
                        <?php echo $servicio->servicio; ?>
                    </td>
                    <td  class="value" style="text-align: left;width:30%">
                        <?php echo $servicio->personalizacion_servicio; ?>
                    </td>
                    <td style="text-align: right;width:15%">
                        <?php echo number_format(($servicio->precio), 2, ',', ' '); ?>&euro;
                    </td>
                    <td style="text-align: right;width:10%">
                        <?php echo number_format(($servicio->cantidad), 2, ',', ' '); ?>
                    </td>

                    <td style="text-align: right; width: 15%">
                        <?php echo number_format((($servicio->precio)*($servicio->cantidad)), 2, ',', ' '); ?>&euro;
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>  


    </table>


    <br/><br/>
    <table cellspacing="0" cellpadding="0" border="0" width="80%">
        <tr>
            <td style="text-align: right"><strong>Total Factura: </strong></td>
            <td style="text-align: right"><?php echo number_format(($total), 2, ',', ' '); ?>&euro;</td>
        </tr>
    </table>

    <table class="bordered" style="width:95%">

        <thead>
            <tr>
                <td class="title" style="width:25%; text-align: center">Bases</td>
                <td class="title" style="width:10%; text-align: center">IVA</td>
                <td class="title" style="width:25%; text-align: center">Cuota</td>
                <td class="title" style="width:10%; text-align: center">Retención</td>
                <td class="title" style="width:25%; text-align: center">Cuota</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rsImpuestos AS $impuesto): ?>
                <tr>
                    <td style="text-align: right"><?php echo number_format(($impuesto->bases), 2, ',', '.'); ?>&euro;</td>
                    <td style="text-align: right"><?php echo number_format(($impuesto->iva_por), 0) . ' %'; ?></td> 
                    <td style="text-align: right"><?php echo number_format(($impuesto->cuota), 2, ',', '.'); ?>&euro;</td> 
                    <td style="text-align: right"><?php echo number_format(($impuesto->retencion_por), 0) . ' %'; ?></td> 
                    <td style="text-align: right"><?php echo number_format(($impuesto->retencion), 2, ',', '.'); ?>&euro;</td> 
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
    
    <table>
        <?php foreach ($rsFacturasServicios AS $servicio): ?>
            <tr>
                <td style="width:95%; text-align: left"><?php
                    if ($servicio->iva == '0') {

                        echo "La partida ".$servicio->servicio." está exenta de IVA (artículo 20) - Ley 37/1992.";
                    }?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>





    <p>
        <strong>Forma de pago por: </strong><?php echo $rsFactura->formapago; ?>
        <br/>
        <strong> 
            <?php
            if ($rsFactura->id_pago == '2') {

                echo "N&ordm; de cuenta:" . $rsFactura->cta_bancaria_contratante;
            } elseif ($rsFactura->id_pago == '3') {

                echo "N&ordm; de cuenta:" . $rsFactura->cta_bancaria;
            }
            ?>
        </strong>
    </p>

    <div align="center" style="margin-top:5px">

        sello

    </div>
    <page_footer >
        <div>
            <p >
                <?php echo $rsFactura->mercantil; ?>
            </p>
        </div>
    </page_footer>

   
    
</page>