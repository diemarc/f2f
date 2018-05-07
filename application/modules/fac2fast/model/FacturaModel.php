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
  | Class FacturaModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for FacturaTable
  | dvd facturas
  | @author kerana,
  | @date 19-03-2018 18:31:06,
  |
 */

class FacturaModel extends tables\FacturaTable
{

    public

    /** @object EmpresaContratanteModel  */
            $objEmpresaContratanteModel,
            /** @object FormaPagoModel  */
            $objFormaPagoModel,
            /** @object TipoModel  */
            $objTipoModel;

    public function __construct()
    {
        parent::__construct();
        $this->objEmpresaContratanteModel = new \application\modules\fac2fast\model\EmpresaContratanteModel();
        $this->objFormaPagoModel = new \application\modules\base\model\FormaPagoModel();
        $this->objTipoModel = new \application\modules\base\model\TipoModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {

        $this->set_id_empresa();
        $this->set_id_contratante();
       $this->set_id_tipo();
        $this->set_id_pago();
        $this->set_fecha_factura();
        $this->set_num_factura();
        $this->set_abono();
        $this->set_created_at();
        $this->set_created_by();

        return parent::saveFactura();
    }

    /**
     * -------------------------------------------------------------------------
     * Process the factura creation with services
     * -------------------------------------------------------------------------
     */
    public function saveFactura()
    {
        // first save factura
        $this->savePost();

        $conceptos = filter_input(INPUT_POST, 'f_concepto', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $cantidad = filter_input(INPUT_POST, 'f_concepto_cantidad', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $precio = filter_input(INPUT_POST, 'f_concepto_precio', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        foreach ($conceptos as $k => $v):
            // create new object to save services 
            $objServiciosFactura = new \application\modules\fac2fast\model\FacturaServicioModel();
            $objServiciosFactura->set_facturas_id_facturas($this->_id_value);

            $objServiciosFactura->set_f_servicios_id_servicio($k);
            $objServiciosFactura->set_cantidad($cantidad[$k]);
            $objServiciosFactura->set_precio($precio[$k]);
            $objServiciosFactura->saveFacturaServicio();

        endforeach;
    }

}
