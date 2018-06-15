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
  | Class FacturaestadoModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for FacturaestadoTable
  | dvd f2f fraStado
  | @author kerana,
  | @date 20-03-2018 07:54:39,
  |
 */

class FacturaestadoModel extends tables\FacturaestadoTable
{

    public
    /** @object FacturaModel  */
            $objFacturaModel,
            /** @object EstadoModel  */
            $objEstadoModel;

    public function __construct()
    {
        parent::__construct();
        $this->objFacturaModel = new \application\modules\fac2fast\model\FacturaModel();
        $this->objEstadoModel = new \application\modules\base\model\EstadoModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_id_facturas();
        $this->set_id_estado();
        $this->set_created_at();
        $this->set_created_by();

        return parent::saveFacturaestado();
    }

}
