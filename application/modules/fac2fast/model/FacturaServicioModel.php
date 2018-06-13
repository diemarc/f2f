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

namespace application\modules\fac2fast\model;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class FacturaServicioModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for FacturaServicioTable
  | dvd fact_serv f2f
  | @author kerana,
  | @date 20-03-2018 06:56:06,
  |
 */

class FacturaServicioModel extends tables\FacturaServicioTable {

    public
    /** @object FacturaModel  */
            $objFacturaModel,
            /** @object ServicioModel  */
            $objServicioModel;

    public function __construct() {
        parent::__construct();
        $this->objFacturaModel = new \application\modules\fac2fast\model\FacturaModel();
        $this->objServicioModel = new \application\modules\fac2fast\model\ServicioModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Set facturas
     * -------------------------------------------------------------------------
     * @param type $id
     */
    public function setIdFactura($id = '') {
        $this->set_facturas_id_facturas($id);
        $this->objFacturaModel->set_id_facturas($id);
    }

    /**
     * -------------------------------------------------------------------------
     * Get the factura details
     * -------------------------------------------------------------------------
     * @return array
     */
    public function getFacturaDetails() {

        // get facturas servicios
        $rsServiciosFacturados = $this->getRecord(false, 'all');

        // extract total column from a object, is a fancy way to use in array_sum
        // similar to array_sum(key_column()) but in a object :)
        $totales = array_map(function($e) {
            return $e->total;
        }, $rsServiciosFacturados);

        // precio
        $precio = array_map(function($e) {
            return $e->precio;
        }, $rsServiciosFacturados);
        // cantidad
        $cantidad = array_map(function($e) {
            return $e->cantidad;
        }, $rsServiciosFacturados);
        // bases
        $bases = array_map(function($e) {
            return $e->precio * $e->cantidad;
        }, $rsServiciosFacturados);

        // retenciones
        $retenciones = array_map(function($e) {
            return $e->retencion;
        }, $rsServiciosFacturados);
        // retenciones
        $iva = array_map(function($e) {
            return $e->iva;
        }, $rsServiciosFacturados);

        return [
            'rsFactura' => $this->objFacturaModel->getRecord(),
            'rsFacturasServicios' => $rsServiciosFacturados,
            'total' => array_sum($totales), // now sum the total column
            'base' => array_sum($bases), // now sum the total column
            'retencion' => array_sum($retenciones), // now sum the total column
            'iva' => array_unique($iva), // now distinc values of array
            'rsImpuestos' => $this->getImpuestosFactura(),
        ];
        
        
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost() {
        $this->set_facturas_id_facturas();
        $this->set_f_servicios_id_servicio();
        $this->set_cantidad();
        $this->set_precio();
        $this->set_iva();
        $this->set_retencion();
        $this->set_total();
        $this->set_personalizacion();

        return parent::saveFacturaServicio();
    }

    public function getImpuestosFactura() {
        
        $this->queryImpuestosFactura();
        return $this->getAll();
        
    }

}
