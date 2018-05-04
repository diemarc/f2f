<?php

/*
 * This file is part of keranaProject
 * Copyright (C) 2017-2018  diemarc  diemarc@protonmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace application\modules\fac2fast\model\tables;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class FacturaTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for f_facturas
  | @author kerana,
  | @date 19-03-2018 18:31:06,
  |
 */

abstract class FacturaTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_facturas  */
            $_id_facturas,
            /** @var int(11), $id_empresa  */
            $_id_empresa,
            /** @var int(11), $id_contratante  */
            $_id_contratante,
            /** @var int(11), $id_pago  */
            $_id_pago,
            /** @var datetime(), $fecha_factura  */
            $_fecha_factura,
            /** @var varchar(10), $num_factura  */
            $_num_factura,
            /** @var tinyint(1), $abono  */
            $_abono,
            /** @var int(11), $id_tipo  */
            $_id_tipo,
            /** @var time(tamp), $created_at  */
            $_created_at,
            /** @var varchar(45), $created_by  */
            $_created_by,
            /** Master query for factura */
            $_query_factura;
    public
    /** @array data matching attributes with table field */
            $data_factura;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'f_facturas';
        $this->table_id = 'id_facturas';

        $this->pks = [
            'id_facturas' => $this->_id_facturas,
            'id_empresa' => $this->_id_empresa,
            'id_contratante' => $this->_id_contratante,
        ];

        $this->_query = ' SELECT A.id_facturas,A.id_empresa,A.id_contratante,'
                . ' A.id_pago,A.fecha_factura,'
                . ' A.num_factura,A.abono,A.id_tipo,A.created_at,A.created_by,'
                . ' B.fechas,B2.contratante,B2.cif AS cif_contratante,'
                . ' B2.razon_social AS razon_social_contratante,'
                . ' B2.id_poblacion AS id_poblacion_contratante,'
                . ' B2.direccion AS direccion_contratante,B2.telefono AS telefono_contratante,'
                . ' B2.email AS email_contratante,B2.contacto AS contacto_contratante,'
                . ' B2.cta_bancaria AS cta_bancaria_contratante,'
                . ' B2.path_logo,B2.observacion AS observacion_contratante,'
                . ' B2.created_at AS created_at_contratante,B2.created_by AS create_by_contratante,'
                . ' B2.aux_estados_id_estado AS id_estado_contratante,'
                . ' B24.poblacion AS poblacion_contratante,'
                . ' B24.provincia AS provincia_contratante,B24.ccaa AS ccaa_contrante,B24.pais as pais_contratante,'
                . ' B24.cod_poblacion AS cod_poblacion_contratante ,B24.cod_provincia AS cod_provincia_contratante,'
                . ' B24.cod_ccaa AS cod_ccaa_contratante,B24.cod_pais AS Cod_pail_contratante,'
                . ' B3.cif,B3.empresa,B3.razon_social,'
                . ' B3.id_poblacion,B3.direccion,'
                . ' B3.telefono,B3.email,B3.contacto,B3.cta_bancaria,B3.observacion,'
                . ' B3.created_at AS created_at_empresa, '
                . ' B3.created_by AS create_by_empresa,'
                . ' B35.poblacion,B35.provincia,B35.ccaa,B35.pais,'
                . ' B35.cod_poblacion,B35.cod_provincia,B35.cod_ccaa,B35.cod_pais,C.formapago,D.tipo AS tipo_factura'
                . ' FROM f_facturas A '
                . ' INNER JOIN a_empresa_contratante B ON (B.id_empresa = A.id_empresa) '
                . ' INNER JOIN a_contratantes B2 ON (B2.id_contratante = B.id_contratante) '
                . ' INNER JOIN aux_poblaciones B24 ON (B24.id_poblacion = B2.id_poblacion) '
                . ' INNER JOIN a_empresas B3 ON (B3.id_empresa = B.id_empresa) '
                . ' INNER JOIN aux_poblaciones B35 ON (B35.id_poblacion = B3.id_poblacion) '
                . ' INNER JOIN f_formas_pago C ON (C.id_pago = A.id_pago) '
                . ' INNER JOIN f_tipo D ON (D.id_tipo = A.id_tipo) '
                . ' WHERE A.id_facturas IS NOT NULL ';
    }

    /*
      |-------------------------------------------------------------------------
      | SELECT-METHODS
      |-------------------------------------------------------------------------
      |
     */



    /*
      |-------------------------------------------------------------------------
      | INSERT-UPDATE-METHODS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * -------------------------------------------------------------------------
     * Insert/update new record into f_facturas
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveFactura()
    {

        $data_insert = [
            'id_empresa' => $this->_id_empresa,
            'id_contratante' => $this->_id_contratante,
            'id_pago' => $this->_id_pago,
            'fecha_factura' => $this->_fecha_factura,
            'num_factura' => $this->_num_factura,
            'abono' => $this->_abono,
            'id_tipo' => $this->_id_tipo,
            'created_at' => $this->_created_at,
            'created_by' => $this->_created_by,
        ];
        return parent::save($data_insert);
    }

    /*
      |-------------------------------------------------------------------------
      | SETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_facturas
     * ------------------------------------------------------------------------- 
     * @param int $value the id_facturas value 
     */
    public function set_id_facturas($value = "")
    {
        $this->_id_facturas = \helpers\Validator::valInt('f_id_facturas', $value, true);
        $this->_id_value = $this->_id_facturas;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_empresa
     * ------------------------------------------------------------------------- 
     * @param int $value the id_empresa value 
     */
    public function set_id_empresa($value = "")
    {
        $this->_id_empresa = \helpers\Validator::valInt('f_id_empresa', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_contratante
     * ------------------------------------------------------------------------- 
     * @param int $value the id_contratante value 
     */
    public function set_id_contratante($value = "")
    {
        $this->_id_contratante = \helpers\Validator::valInt('f_id_contratante', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_pago
     * ------------------------------------------------------------------------- 
     * @param int $value the id_pago value 
     */
    public function set_id_pago($value = "")
    {
        $this->_id_pago = \helpers\Validator::valInt('f_id_pago', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for fecha_factura
     * ------------------------------------------------------------------------- 
     * @param datetime $value the fecha_factura value 
     */
    public function set_fecha_factura($value = "")
    {
        $this->_fecha_factura = \helpers\Validator::valDatetime('f_fecha_factura', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for num_factura
     * ------------------------------------------------------------------------- 
     * @param varchar $value the num_factura value 
     */
    public function set_num_factura($value = "")
    {
        $this->_num_factura = \helpers\Validator::valVarchar('f_num_factura', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for abono
     * ------------------------------------------------------------------------- 
     * @param tinyint $value the abono value 
     */
    public function set_abono($value = "")
    {
        $this->_abono = \helpers\Validator::valTinyint('f_abono', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_tipo
     * ------------------------------------------------------------------------- 
     * @param int $value the id_tipo value 
     */
    public function set_id_tipo($value = "")
    {
        $this->_id_tipo = \helpers\Validator::valInt('f_id_tipo', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_at
     * ------------------------------------------------------------------------- 
     * @param time $value the created_at value 
     */
    public function set_created_at($value = "")
    {
        $this->_created_at = \helpers\Validator::valTime('f_created_at', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_by
     * ------------------------------------------------------------------------- 
     * @param varchar $value the created_by value 
     */
    public function set_created_by($value = "")
    {
        $this->_created_by = \helpers\Validator::valVarchar('f_created_by', $value, false);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_facturas
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_facturas()
    {
        return (isset($this->_id_facturas)) ? $this->_id_facturas : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_empresa
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_empresa()
    {
        return (isset($this->_id_empresa)) ? $this->_id_empresa : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_contratante
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_contratante()
    {
        return (isset($this->_id_contratante)) ? $this->_id_contratante : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_pago
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_pago()
    {
        return (isset($this->_id_pago)) ? $this->_id_pago : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for fecha_factura
     * ------------------------------------------------------------------------- 
     * @return datetime $value  
     */
    public function get_fecha_factura()
    {
        return (isset($this->_fecha_factura)) ? $this->_fecha_factura : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for num_factura
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_num_factura()
    {
        return (isset($this->_num_factura)) ? $this->_num_factura : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for abono
     * ------------------------------------------------------------------------- 
     * @return tinyint $value  
     */
    public function get_abono()
    {
        return (isset($this->_abono)) ? $this->_abono : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_tipo
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_tipo()
    {
        return (isset($this->_id_tipo)) ? $this->_id_tipo : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for created_at
     * ------------------------------------------------------------------------- 
     * @return time $value  
     */
    public function get_created_at()
    {
        return (isset($this->_created_at)) ? $this->_created_at : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for created_by
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_created_by()
    {
        return (isset($this->_created_by)) ? $this->_created_by : null;
    }

}
