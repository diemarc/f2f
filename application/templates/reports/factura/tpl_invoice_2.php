
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

</style>
<page backtop="35mm" backbottom="2mm" backleft="20mm" backright="10mm" style="font-size: 13px"
      footer="date;time;page">
    <page_header>
        <table class="table1" width="" align="left">
            <tr>
                <td width="20%"></td>

                <td width="90%"><p>
                        <strong>Jos&eacute; Gonz&aacute;lez Polonio</strong>.<br />
                        NIF:<?php "nifcontrante" ?> <br />
                        <?php echo "domicilio_cont"; ?> <br />
                        Tel: <?php echo "telefono_cont"; ?> Fax: <?php echo "fax_cont"; ?> <br />
                        Email: <?php echo "email_cont"; ?><br/>
                        <?php echo "web_cont"; ?></p>				 
                </td>
            </tr>
        </table>
        <hr/>
    </page_header>
    <h4>Datos de cliente</h4>
    <table cellspacing="0" cellpadding="0" class="bordered" style="width: 95%">
        <tr>
            <td class="title" style="width:20%">Empresa</td>
            <td class="value" style="width:75%"><?php echo "razon_social"; ?></td>
        </tr>
        <tr>
            <td class="title">Cif</td>
            <td class="value"><?php echo "cif"; ?></td>
        </tr>
        <tr>
            <td class="title">Domicilio</td>
            <td class="value"><?php echo "direccion"; ?></td>
        </tr>
        <tr>
            <td class="title">Localidad</td>
            <td class="value"><?php echo "localidad"; ?></td>
        </tr>
        <tr>
            <td class="title">Provincia</td>
            <td class="value"><?php echo "provincia"; ?></td>
        </tr>
        <tr>
            <td class="title">C.Postal</td>
            <td class="value"><?php echo "codpostal"; ?></td>
        </tr>
        <tr>
            <td class="title">Tel&eacute;fono</td>
            <td class="value"><?php echo "tel_e"; ?></td>
        </tr>
    </table>
    <br/><br/>
    <table cellspacing="0" cellpadding="0" border="0" width="80%">
        <tr>
            <td>Fecha de factura:</td>
            <td><strong>fecha _factuyra</strong></td>
        </tr>
        <tr>
            <td>Factura</td>
            <td><strong><?php echo "id_factura"; ?></strong></td>
        </tr>
    </table>
    <h5>Descripci&oacute;n del servicio</h5><hr/>

    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <thead>
            <tr>
                <th style="width: 12%">Produit</th>
                <th style="width: 52%">Désignation</th>
                <th style="width: 13%">Prix Unitaire</th>
                <th style="width: 10%">Calid&aacute;d</th>
                <th style="width: 13%">Prix Net</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nb = rand(5, 11);
            $produits = array();
            $total = 0;
            for ($k = 0; $k < $nb; $k++) {
                $num = rand(100000, 999999);
                $nom = "le produit n°" . rand(1, 100);
                $qua = rand(1, 20);
                $prix = rand(100, 9999) / 100.;
                $total+= $prix * $qua;
                $produits[] = array($num, $nom, $qua, $prix, rand(0, $qua));
                ?>

                <tr style="background-color: #fff">
                    <td style="width: 12%; text-align: left ;border: solid 1px"><?php echo $num; ?></td>
                    <td style="width: 52%; text-align: left;border: solid 1px"><?php echo $nom; ?></td>
                    <td style="width: 13%; text-align: right;border: solid 1px"><?php echo number_format($prix, 2, ',', ' '); ?> &euro;</td>
                    <td style="width: 10%;border: solid 1px"><?php echo $qua; ?></td>
                    <td style="width: 13%; text-align: right;border: solid 1px"><?php echo number_format($prix * $qua, 2, ',', ' '); ?> &euro;</td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>


    <br/><br/>
    <table cellspacing="0" cellpadding="0" border="0" width="80%">
        <tr>
            <td><strong>IMPORTE: </strong></td>
            <td><?php echo "total"; ?> &euro;
            </td>
        </tr>
    </table>
    <table class="bordered" style="width:95%">
        <tr>
            <td class="title" style="width:20%">Base imponible</td>
            <td class="value" style="width:75%">
                <strong><?php echo "base"; ?></strong>
            </td>
        </tr>
        <tr>
            <td class="title">%IVA</td>
            <td class="value"><strong><?php echo "iva"; ?></strong></td>
        </tr>
        <tr>
            <td class="title">Cuota</td>
            <td class="value"><?php echo "cuopta"; ?></td>
        </tr>
        <tr>
            <td  class="title" >TOTAL</td>
            <td  class="value"><strong><?php echo "total"; ?></strong></td>
        </tr>
    </table>
    <p><strong>Forma de pago por: </strong><?php echo "medio_pago"; ?><br/>
        <strong>N&ordm; de cuenta: <?php echo "banco_cuenta"; ?></strong></p>
    <div align="center" style="margin-top:5px">

        sello

    </div>


</page>