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

/**
 * -----------------------------------------------------------------------------
 * F2fReportModel
 * ------------------------------------------------------------------------------
 * @author diemarc
 */
class F2fReportModel extends FacturaServicioModel
{

    public
            /** @rs data invoice to parse */
            $data_invoice;
    
    protected

    /** @object, pdf helper instance */
            $_pdf,
            /** @object informe contratante */
            $_objInformeContratante;

    public function __construct()
    {
        parent::__construct();
        $this->_pdf = new \helpers\Pdf();

    }

    /**
     * -------------------------------------------------------------------------
     * Set the params, object, rs to use in the invoice template.
     * -------------------------------------------------------------------------
     * @param type $id
     */
    public function parseFactura($id,$mode = 'D')
    {
        $this->setIdFactura($id);

        // get the factura details 
        $this->data_invoice = $this->getFacturaDetails();
        
        $this->_pdf->setTemplate($this->data_invoice['rsFactura']->template_to_use);
        $this->_pdf->setName($this->data_invoice['rsFactura']->num_factura);
        $this->_pdf->setMode($mode);
        $this->_pdf->setParams($this->data_invoice);
        $this->_pdf->parsePdf();
    }

}
