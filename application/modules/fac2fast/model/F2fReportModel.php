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
class F2fReportModel extends FacturaModel
{

    protected
            
            /** @object, pdf helper instance */
            $_pdf,
            
            /** @var string , name of doc to generate */
            $_factura_name = 'factura_f2f',
            
            /**
             * @var string, the tamplate path
             * all reports templates must be stored in application/templates/reports
             */
            $_factura_template = 'factura/tpl_factura';

    public function __construct()
    {
        parent::__construct();
        $this->_pdf = new \helpers\Pdf();
        $this->_pdf->setTemplate($this->_factura_template);
        $this->_pdf->setName($this->_factura_name);
    }

    
    /**
     * -------------------------------------------------------------------------
     * Set the params, object, rs to use in the invoice template.
     * -------------------------------------------------------------------------
     * @param type $id
     */
    public function parseFactura($id)
    {
        // set the id_factura to generate
        $this->set_id_facturas($id);
        
        // set te params to render in template pdf.
        $this->_pdf->setParams(
                [
                    'titulo' => 'palantir',
                    'id_factura' => $id,
                    'rsFactura' => $this->getRecord()
                    
                    ]
        );
        
        // parse to pdf
        $this->_pdf->parsePdf();
    }

}
