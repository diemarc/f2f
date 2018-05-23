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
  | Class ServicioModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for ServicioTable
  | dvd3
  | @author kerana,
  | @date 16-03-2018 07:25:28,
  |
 */

class ServicioModel extends tables\ServicioTable
{

    public
    /** @object SubclaseModel  */
            $objSubclaseModel,
            /** @object taxs */
            $objTaxs;

    public function __construct()
    {
        parent::__construct();
        $this->objSubclaseModel = new \application\modules\base\model\SubclaseModel();
        $this->objTaxs = new \application\modules\base\model\TaxaModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_id_subclase();
        $this->set_servicio();
        $this->set_descripcion();
        $this->set_precio();
        $this->set_iva_servicio();
        $this->set_retencion_servicio();
        $this->set_created_at();
        $this->set_created_by();

        return parent::saveServicio();
    }

    /**
     * -------------------------------------------------------------------------
     * Get service and taxs related in json 
     * -------------------------------------------------------------------------
     */
    public function getServicioDetailJson()
    {
        $json_response = [];

        $rsService = $this->getRecord(false);
        if ($rsService) {

            // get all iva
            $rsIvas = $this->objTaxs->find('*', ['id_clases' => 2], 'all');
            
            // get all retentions
            $rsRetenciones = $this->objTaxs->find('*', ['id_clases' => 3], 'all');

            $json_response['exists'] = true;
            $json_response['record'] = $rsService;
            
            // collect the iva data
            foreach ($rsIvas AS $ivas):
                $json_response['ivas'][] = $ivas;
            endforeach;
           
            // collect the retention data
            foreach ($rsRetenciones AS $retencion):
                $json_response['retenciones'][] = $retencion;
            endforeach;
            
            
        } else {
            $json_response['exists'] = false;
        }

        echo json_encode($json_response);
    }

}
