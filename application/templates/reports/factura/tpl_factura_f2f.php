
<style type="text/css">
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

    /*    .footer-top{
            background-color:transparent;
    }
     
    .footer-container #footer h4{
            color:red!important;
    }*/

</style>
<page backtop="35mm" backbottom="2mm" backleft="20mm" backright="10mm" style="font-size: 13px"
      footer="date;time;page">
    <page_header>
        <table class="table1" width="" align="left">
            <tr>
                <td style="width: 20%; color: #444444;">
                    <img style="width: 100%;" src="<?php echo __URL__ . '/data/logos/seva/ipr_small.jpg'; ?>"
                         alt="Logo"><br>
                    <!--path_logp-->
                </td>

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
        </tr>
        <tr>
            <td>Factura</td>
            <td><strong><?php echo $rsFactura->num_factura; ?></strong></td>
        </tr>
    </table>
    <h5>Descripci&oacute;n del servicio</h5><hr/>

    <table class="box-body box-profile">
        <thead>
            <tr class="">
                <th style="">Servicio</th>
                <th style="">Precio</th>
                <th style="">Cantidad</th><!--
                <th style="">IVA</th>
                <th style="">Retenci&oacute;n</th>-->
                <th style="">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rsFacturasServicios AS $servicio): ?>
                <tr class="">
                    <td style="">
                        <?php echo $servicio->servicio; ?>
                    </td>
                    <td style="">
                        <?php echo number_format(($servicio->precio), 2, ',', ' '); ?>&euro;
                    </td>
                    <td style="">
                        <?php echo number_format(($servicio->cantidad), 2, ',', ' '); ?>
                    </td><!--
                    <td style="">
                    <?php echo $servicio->iva; ?>
                    </td>
                    <td style="">
                    <?php echo $servicio->retencion; ?>
                    </td>-->
                    <td style="">
                        <?php echo number_format((($servicio->precio) * ($servicio->cantidad)), 2, ',', ' '); ?>&euro;
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>  


    </table>


    <br/><br/>
    <table cellspacing="0" cellpadding="0" border="0" width="80%">
        <tr>
            <td><strong>IMPORTE: </strong></td>
            <td><?php echo number_format(($total), 2, ',', ' '); ?>&euro;
            </td>
        </tr>
    </table>
    <table class="bordered" style="width:95%">
        <tr>
            <td class="title" style="width:20%">Base imponible</td>
            <td class="value" style="width:75%">
                <strong><?php echo number_format($base, 2, ',', ' '); ?>&euro;</strong>
            </td>
        </tr>
        <tr>
            <!--            /**esta sumando los ivas
                         es decir 0.21-0.21  *//-->
            <td class="title">% IVA</td>
            <td class="value"><strong><?php echo "$iva"; ?></strong></td>

        </tr>
        <tr>
            <td class="title">Cuota</td>
            <td class="value"><?php echo "$iva*$base"; ?></td>
        </tr>
        <tr>
            <td  class="title" >TOTAL</td>
            <td  class="value"><strong><?php echo 'total'; ?>&euro</strong></td>
        </tr>
    </table>
    <p><strong>Forma de pago por: </strong><?php echo "medio_pago"; ?><br/>
        <strong>N&ordm; de cuenta: <?php echo "banco_cuenta"; ?></strong></p>
    <div align="center" style="margin-top:5px">

        sello

    </div>
   

</page>