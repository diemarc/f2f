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
  | Class ServicioContratanteModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for ServicioContratanteTable
  | Servicios contratantes, los servicios predeterminados que tiene un contratante a la hora de facturar.
  | @author kerana,
  | @date 04-05-2018 06:25:44,
  |
 */

class ServicioContratanteModel extends tables\ServicioContratanteTable
{

    public
    /** @object ContratanteModel  */
            $objContratanteModel,
            /** @object ServicioModel  */
            $objServicioModel;

    public function __construct()
    {
        parent::__construct();
        $this->objContratanteModel = new \application\modules\base\model\ContratanteModel();
        $this->objServicioModel = new \application\modules\fac2fast\model\ServicioModel();
        $this->set_id_contratante($_SESSION['f2f_id_contratante']);
           
        
    }

//    /**
//     * -------------------------------------------------------------------------
//     * Get contratante services in json format
//     * -------------------------------------------------------------------------
//     */
//    public function getContratanteServicesJson(){
//        
//        return $this->getQueryInJson();
//        
//    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_id_servicio();
        $this->set_id_contratante();

        return parent::saveServicioContratante();
    }

    /**
     * -------------------------------------------------------------------------
     * Process the new service for a contratante
     * -------------------------------------------------------------------------
     */
    public function processNewServiceContratante(){
        
        // first create new service
        $this->objServicioModel->savePost();
        
        $this->set_id_servicio($this->objServicioModel->_id_value);
        $this->set_id_contratante($_SESSION['f2f_id_contratante']);
        $this->set_is_default();
        return parent::saveServicioContratante();
        
    }
    
    
    
}
