<?php ?>



<div title="header">
    <p align="center" style="margin-bottom: 0cm; line-height: 100%">
        <?php echo '[nombre_contratante] '; ?> </p>
    <p align="center" style="margin-bottom: 0cm; line-height: 100%">C/
        <?php echo '[direccion_contratante] '; ?></p>
    <p align="center" style="margin-bottom: 1.13cm; line-height: 100%">
        <font size="1" style="font-size: 6pt">
        <?php echo '[direccion_contratante] '; ?></p></p>
</font></p>
</div>

<p class="western" style="margin-bottom: 0cm; line-height: 100%"><font face="Arial, sans-serif"><b>DATOS
        DEL CLIENTE: </b></font>
</p>
<p class="western" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<table width="248" cellpadding="4" cellspacing="0">
    <col width="238">
    <tr>
        <td width="238" height="50" valign="top" style="border: 1px solid #000000; padding: 0cm 0.12cm">
            <p class="western" style="margin-bottom: 0cm"><b><?php echo '[nombre_empresa] '; ?></p></b></p>
            <p class="western" style="margin-bottom: 0cm"><b><?php echo '[direccion_empresa] '; ?></p></b></p>
            <p class="western"style="margin-bottom: 0cm"><b><?php echo '[cif_empresa] '; ?></p></b></p>
        </td>
    </tr>
</table>

<p class="western" style="margin-bottom: 0cm; line-height: 100%">
    <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt"><b>Nº
        FACTURA: <?php echo '[num_fra] '; ?></b></font></font></p>

<p class="western" style="margin-bottom: 0cm; line-height: 100%">
    <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt"><b>FECHA:
        <?php echo '[fecha_factura] '; ?></b></font></font></p>

<p class="western" style="margin-bottom: 0cm; line-height: 100%">
    <font face="Arial, sans-serif"><font size="2" style="font-size: 9pt"><b>DESCRIPCIÓN:</b></font></font></p>

<table width="491" cellpadding="4" cellspacing="0">
    <col width="54">
    <col width="295">
    <col width="117">
    <tr valign="top">
        <td width="54" height="20" style="border-top: 1px solid #000000;
            border-bottom: 1px solid #000000; border-left: 1px solid #000000;
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">
            
            <p class="western" align="center"><font face="Arial, sans-serif"><b>CANTIDAD</b></font></p>
        </td>
        <td width="295" style="border-top: 1px solid #000000; 
            border-bottom: 1px solid #000000; border-left: 1px solid #000000; 
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">
            
            <p class="western" align="center"><font face="Arial, sans-serif"><b>DESCRIPCIÓN</b></font></p>
        </td>
        <td width="117" style="border: 1px solid #000000; padding: 0cm 0.12cm">
            
            <p class="western" align="center"><font face="Arial, sans-serif"><b>EUROS</b></font></p>
        </td>
    </tr>
    <tr valign="top">
        <td width="54" height="234" style="border-top: 1px solid #000000; 
            border-bottom: 1px solid #000000; border-left: 1px solid #000000; 
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">

            <?php
//            foreach $servicios['servicios']);
//            endforeach;    
            ?>


        </td>

        <td width="117" style="border: 1px solid #000000; padding: 0cm 0.12cm">
            
            <p class="western" align="center" style="margin-bottom: 0cm">
                <font size="3" style="font-size: 13pt"><b><?php echo '[importe]'; ?></b></font></p>
        </td>
    </tr>
</table>

<table width="491" cellpadding="4" cellspacing="0">
    <col width="98">
    <col width="73">
    <col width="58">
    <col width="95">
    <col width="124">
    <tr valign="top">
        <td width="98" style="border-top: 1px solid #000000; border-bottom:
            1px solid #000000; border-left: 1px solid #000000; 
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font face="Arial, sans-serif">
                <b>IMPORTE</b></font></p>
        </td>
        <td width="73" style="border-top: 1px solid #000000; 
            border-bottom: 1px solid #000000; border-left: 1px solid #000000; 
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font face="Arial, sans-serif">
                <b>BASE</b></font></p>
        </td>
        <td width="58" style="border-top: 1px solid #000000; 
            border-bottom: 1px solid #000000; border-left: 1px solid #000000; 
            border-right: none; padding-top: 0cm; padding-bottom: 0cm;
            padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font face="Arial, sans-serif"><b>
                    %
                    IVA</b></font></p>
        </td>
        <td width="95" style="border-top: 1px solid #000000;
            border-bottom: 1px solid #000000; border-left: 1px solid #000000; 
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font face="Arial, sans-serif">
                <b>CUOTA</b></font></p>
        </td>
        <td width="124" style="border: 1px solid #000000; padding: 0cm 0.12cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font face="Arial, sans-serif"><b>TOTAL
                    FACTURA</b></font></p>
        </td>
    </tr>
    <tr valign="top">
        <td width="98" height="13" style="border-top: 1px solid #000000;
            border-bottom: 1px solid #000000; border-left: 1px solid #000000;
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm">
                <font size="3" style="font-size: 13pt"><b>833,14</b></font></p>
            <p class="western" align="center"><br/>

            </p>
        </td>
        <td width="73" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0cm; padding-bottom: 0cm; padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center"><font size="3" style="font-size: 13pt"><b>833,14</b></font></p>
        </td>
        <td width="58" style="border-top: 1px solid #000000; 
            border-bottom: 1px solid #000000; border-left: 1px solid #000000;
            border-right: none; padding-top: 0cm; padding-bottom: 0cm;
            padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font size="3" style="font-size: 13pt">0</font></p>
        </td>
        <td width="95" style="border-top: 1px solid #000000; 
            border-bottom: 1px solid #000000; border-left: 1px solid #000000;
            border-right: none; padding-top: 0cm; padding-bottom: 0cm; 
            padding-left: 0.12cm; padding-right: 0cm">
            <p class="western" align="center" style="margin-bottom: 0cm"><br/>

            </p>
            <p class="western" align="center"><font size="3" style="font-size: 13pt">0</font></p>
        </td>
        <td width="124" style="border: 1px solid #000000; padding: 0cm 0.12cm">
            <p class="western" align="center"><font size="3" style="font-size: 13pt"><b>833,14
                    €</b></font></p>
        </td>
    </tr>
</table>
<p style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
    FORMA DE  PAGO:</p>
<table width="218" cellpadding="4" cellspacing="0">
    <col width="208">
    <tr>
        <td width="208" valign="top" style="border: 1px solid #000000; padding: 0cm 0.12cm">
            <p class="western" align="justify" style="margin-bottom: 0cm">
                <font face="Arial, sans-serif"><font size="1" style="font-size: 8pt"><?php echo '[formadepago]';?></font></font></p>
            <p class="western" align="justify"><font face="Arial, sans-serif">
                <font size="1" style="font-size: 8pt"><?php echo '[num_cuenta]';?></font></font></p>
        </td>
    </tr>
</table>

