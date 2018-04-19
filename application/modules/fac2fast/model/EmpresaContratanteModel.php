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
  | Class EmpresaContratanteModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for EmpresaContratanteTable
  | dvd empresa contratnae
  | @author kerana,
  | @date 19-03-2018 18:21:42,
  |
 */

class EmpresaContratanteModel extends tables\EmpresaContratanteTable
{

    public
    /** @object ContratanteModel  */
            $objContratanteModel,
            /** @object EmpresaModel  */
            $objEmpresaModel;

    public function __construct()
    {
        parent::__construct();
        $this->objContratanteModel = new \application\modules\base\model\ContratanteModel();
        $this->objEmpresaModel = new \application\modules\fac2fast\model\EmpresaModel();
    }

    /*
      |--------------------------------------------------------------------------
      | JSON DATA
      |--------------------------------------------------------------------------
      |
     */

    /**
     * -------------------------------------------------------------------------
     * Find a company
     * -------------------------------------------------------------------------
     * @param type $key_to_search
     */
    public function searchEmpresaJson($key_to_search)
    {
        
        
        $rsEmpresa = $this->findLike('*', [
            'empresa' => \helpers\Validator::valVarchar('k_empresa', $key_to_search)
                ], 'all');

        $empresa_array = [];

        if ($rsEmpresa) {
            $empresa_array['exists'] = true;
            foreach ($rsEmpresa as $empresa) :
                $empresa_array['empresas'][] = $empresa;
            endforeach;
        }else {
            $empresa_array['exists'] = false;
        }
        echo json_encode($empresa_array);
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
        $this->set_fechas();

        return parent::saveEmpresaContratante();
    }

}
