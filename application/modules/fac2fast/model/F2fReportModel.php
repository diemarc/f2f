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

    protected

    /** @object, pdf helper instance */
            $_pdf,
            /** @var string , name of doc to generate */
            $_factura_name = 'factura_f2f',
            /**
             * @var string, the tamplate path
             * all reports templates must be stored in application/templates/reports
             */
            $_factura_template = 'factura/tpl_factura_f2f';

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
        $this->setIdFactura($id);

        // get the factura details 
        $params_to_pdf = $this->getFacturaDetails();
        
        // example to pass another param to PDF helper
        $params_to_pdf['titulo'] = "otro contenido";
        
        // set te params to render in template pdf.
        $this->_pdf->setParams($params_to_pdf);

        // parse to pdf
        $this->_pdf->parsePdf();
    }

}
