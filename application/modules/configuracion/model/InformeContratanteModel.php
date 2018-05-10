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
  | Class InformeContratanteModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for InformeContratanteTable
  | asociacion de informes y contratantes
  | @author kerana,
  | @date 10-05-2018 06:09:23,
  |
 */

class InformeContratanteModel extends tables\InformeContratanteTable
{

    public
    /** @object InformeModel  */
            $objInformeModel,
            /** @object ContratanteModel  */
            $objContratanteModel,
            /** @object EstadoModel  */
            $objEstadoModel;

    public function __construct()
    {
        parent::__construct();
        $this->objInformeModel = new \application\modules\configuracion\model\InformeModel();
        $this->objContratanteModel = new \application\modules\base\model\ContratanteModel();
        $this->objEstadoModel = new \application\modules\base\model\EstadoModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_id_aux_informe();
        $this->set_id_contratante();
        $this->set_id_estado();
        $this->set_template_contratante_informe();

        return parent::saveInformeContratante();
    }

}
