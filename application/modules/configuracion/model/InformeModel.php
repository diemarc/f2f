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

namespace application\modules\configuracion\model;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class InformeModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for InformeTable
  | Maneja los informes&#13;&#10;que puede emitir F2f, &#13;&#10;c/id_informe va asociado a contratantes
  | @author kerana,
  | @date 10-05-2018 06:08:22,
  |
 */

class InformeModel extends tables\InformeTable
{

    public
    /** @object EstadoModel  */
            $objEstadoModel;

    public function __construct()
    {
        parent::__construct();
        $this->objEstadoModel = new \application\modules\base\model\EstadoModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_id_estado();
        $this->set_nombre_informe();
        $this->set_default_template();
        $this->set_modulo_informe();
        $this->set_controller_informe();
        $this->set_action_informe();

        return parent::saveInforme();
    }

}
