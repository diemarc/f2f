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
  | Class FacturaServicioTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for f_facturas_servicios
  | @author kerana,
  | @date 20-03-2018 06:56:06,
  |
 */

abstract class FacturaServicioTable extends \kerana\Ada
{

    protected
    /** @var int(11), $facturas_id_facturas  */
            $_facturas_id_facturas,
            /** @var int(11), $f_servicios_id_servicio  */
            $_f_servicios_id_servicio,
            /** @var decimal(9,2), $cantidad  */
            $_cantidad,
            /** @var decimal(9,2), $precio  */
            $_precio,
            /** @var decimal(9,2), $iva  */
            $_iva,
            /** @var decimal(9,2), $retencion  */
            $_retencion,
            /** @var decimal(9,2), $total  */
            $_total,
            /** @var varchar, $personalizacion del servicio  */
            $_personalizacion,
            /** Master query for facturaservicio */
            $_query_facturaservicio;
    public
    /** @array data matching attributes with table field */
            $data_facturaservicio;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'f_facturas_servicios';
        $this->table_id = 'facturas_id_facturas';

        $this->pks = [
            'facturas_id_facturas' => $this->_facturas_id_facturas,
            'f_servicios_id_servicio' => $this->_f_servicios_id_servicio,
        ];

        $this->_query = ' SELECT A.facturas_id_facturas,A.f_servicios_id_servicio,A.cantidad,A.precio,'
                . ' A.iva, A.retencion,A.total,A.personalizacion_servicio,'
                . ' B.id_pago,B.fecha_factura,B.num_factura,B.abono,B.id_tipo,B.created_at AS created_at_B,'
                . ' B.created_by As created_by_B,'
                . ' C.id_subclase,C.servicio,C.descripcion,C.precio AS precio_generico'
                . ' FROM f_facturas_servicios A '
                . ' INNER JOIN f_facturas B ON (B.id_facturas = A.facturas_id_facturas) '
                . ' INNER JOIN f_servicios C ON (C.id_servicio = A.f_servicios_id_servicio) '
                . ' WHERE A.facturas_id_facturas IS NOT NULL ';
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
     * Insert/update new record into f_facturas_servicios
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveFacturaServicio()
    {

        $data_insert = [
            'facturas_id_facturas' => $this->_facturas_id_facturas,
            'f_servicios_id_servicio' => $this->_f_servicios_id_servicio,
            'cantidad' => $this->_cantidad,
            'precio' => $this->_precio,
            'retencion' => $this->_retencion,
            'iva' => $this->_iva,
            'personalizacion_servicio' => $this->_personalizacion,
            'total' => $this->_total
        ];
        parent::save($data_insert,false);
    }

    /*
      |-------------------------------------------------------------------------
      | SETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Setter for facturas_id_facturas
     * ------------------------------------------------------------------------- 
     * @param int $value the facturas_id_facturas value 
     */
    public function set_facturas_id_facturas($value = "")
    {
        $this->_facturas_id_facturas = \helpers\Validator::valInt('f_facturas_id_facturas', $value, true);
        $this->_id_value = $this->_facturas_id_facturas;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for f_servicios_id_servicio
     * ------------------------------------------------------------------------- 
     * @param int $value the f_servicios_id_servicio value 
     */
    public function set_f_servicios_id_servicio($value = "")
    {
        $this->_f_servicios_id_servicio = \helpers\Validator::valInt('f_f_servicios_id_servicio', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for cantidad
     * ------------------------------------------------------------------------- 
     * @param decimal $value the cantidad value 
     */
    public function set_cantidad($value = "")
    {
        $this->_cantidad = \helpers\Validator::valDecimal('f_cantidad', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for precio
     * ------------------------------------------------------------------------- 
     * @param decimal $value the precio value 
     */
    public function set_precio($value = "")
    {
        $this->_precio = \helpers\Validator::valDecimal('f_precio', $value, true);
    }
    /**
     * ------------------------------------------------------------------------- 
     * Setter for iva
     * ------------------------------------------------------------------------- 
     * @param decimal $value the iva value 
     */
    public function set_iva($value = "")
    {
        $this->_iva = \helpers\Validator::valDecimal('f_iva', $value, false);
    }
    /**
     * ------------------------------------------------------------------------- 
     * Setter for retencion
     * ------------------------------------------------------------------------- 
     * @param decimal $value the retencion value 
     */
    public function set_retencion($value = "")
    {
        $this->_retencion = \helpers\Validator::valDecimal('f_retencion', $value, false);
    }
    /**
     * ------------------------------------------------------------------------- 
     * Setter for total
     * ------------------------------------------------------------------------- 
     * @param decimal $value the total value 
     * ((precio * cantidad) + iva)- retencion ; en la retencion pongo mas
     *  porque en la tabla esta como valor negativo - * - = +
     */
    public function set_total($value = "")
    {
        $this->_total = (($this->_precio * $this->_cantidad) + $this->_iva) + $this->_retencion;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Setter for personalizacion
     * ------------------------------------------------------------------------- 
     * @param decimal $value the personalizacion value 
     */
    public function set_personalizacion($value = "")
    {
        $this->_personalizacion = \helpers\Validator::valVarchar('f_personalizacion', $value, false);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for facturas_id_facturas
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_facturas_id_facturas()
    {
        return (isset($this->_facturas_id_facturas)) ? $this->_facturas_id_facturas : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for f_servicios_id_servicio
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_f_servicios_id_servicio()
    {
        return (isset($this->_f_servicios_id_servicio)) ? $this->_f_servicios_id_servicio : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for cantidad
     * ------------------------------------------------------------------------- 
     * @return decimal $value  
     */
    public function get_cantidad()
    {
        return (isset($this->_cantidad)) ? $this->_cantidad : 0;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for precio
     * ------------------------------------------------------------------------- 
     * @return decimal $value  
     */
    public function get_precio()
    {
        return (isset($this->_precio)) ? $this->_precio : 0.0;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Getter for iva
     * ------------------------------------------------------------------------- 
     * @return decimal $value  
     */
    public function get_iva()
    {
        return (isset($this->_iva)) ? $this->_iva : 0.0;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Getter for retencion
     * ------------------------------------------------------------------------- 
     * @return decimal $value  
     */
    public function get_retencion()
    {
        return (isset($this->_retencion)) ? $this->_retencion : 0.0;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Getter for total
     * ------------------------------------------------------------------------- 
     * @return decimal $value  
     */
    public function get_total()
    {
        return (isset($this->_total)) ? $this->_total : 0.0;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Getter for personalizacion
     * ------------------------------------------------------------------------- 
     * @return decimal $value  
     */
    public function get_personalizacion()
    {
        return (isset($this->_personalizacion)) ? $this->_personalizacion : 0.0;
    }

}
