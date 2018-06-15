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
/*
  |-----------------------------------------------------------------------------
  | Class F2fEnvioController
  |-----------------------------------------------------------------------------
  |
  | envios de mails de f2f, facturas, presupuestos etc.
  | @author kerana,
  | @date 13-06-2018 09:15:49,
  |
 */

class F2fEnvioController extends \kerana\Kerana
{

    protected
    /** @object mail model */
            $_obj_envio_model;

    public function __construct()
    {
        parent::__construct();
        $this->_obj_envio_model = new \application\modules\fac2fast\model\F2fEnvioModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Send the invoice email
     * -------------------------------------------------------------------------
     * @param type $id
     */
    public function sendInvoice($id)
    {
       if($this->_obj_envio_model->sendInvoice($id)){
           \helpers\Redirect::to('/fac2fast/factura/detail/'.$id);
       }
    }

}
