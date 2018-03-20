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

namespace application\modules\base\model;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class PoblacionModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for PoblacionTable
  |
  | @author kerana,
  | @date 09-03-2018 06:03:24,
  |
 */

class PoblacionModel extends tables\PoblacionTable
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
      |--------------------------------------------------------------------------
      | JSON DATAS
      |--------------------------------------------------------------------------
     */

    /**
     * -------------------------------------------------------------------------
     * Search poblacion 
     * -------------------------------------------------------------------------
     * @param type $keysearch
     */
    public function searchPoblacionJson($keysearch)
    {
        $key_to_search = \helpers\Validator::valVarchar('k_poblacion', $keysearch);
        $rsPoblacion = $this->findLike('*', ['poblacion' => $key_to_search], 'all');
        if ($rsPoblacion) {
            $poblacion_array = [];
            foreach ($rsPoblacion AS $poblacion):
                $poblacion_array['poblaciones'][] = $poblacion;
            endforeach;
            echo json_encode($poblacion_array);
        }
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_poblacion();
        $this->set_provincia();
        $this->set_ccaa();
        $this->set_cod_provincia();
        $this->set_cod_ccaa();

        return parent::savePoblacion();
    }

}
