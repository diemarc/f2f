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

namespace application\modules\fac2fast\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');

/**
 * -----------------------------------------------------------------------------
 * f2fInformesController 
 * ------------------------------------------------------------------------------
 * @author diemarc
 */
class F2fInformesController extends \kerana\Kerana
{

    protected

    /** @object, f2f report model */
            $_obj_report_model;

    public function __construct()
    {
        parent::__construct();
        $this->_obj_report_model = new \application\modules\fac2fast\model\F2fReportModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Parse params to generate a invoice pdf output
     * -------------------------------------------------------------------------
     * @param int $id , 
     * @return avoid
     */
    public function generar($id)
    {
        $this->_obj_report_model->parseFactura($id);
    }

    

}
