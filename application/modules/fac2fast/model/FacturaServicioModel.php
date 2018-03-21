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
  | Class FacturaServicioModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for FacturaServicioTable 
  | dvd fact_serv f2f
  | @author kerana,
  | @date 20-03-2018 06:56:06,
  |
 */

class FacturaServicioModel extends tables\FacturaServicioTable {

    public 
 /** @object FacturaModel  */ 
 $objFacturaModel,
/** @object ServicioModel  */ 
 $objServicioModel;
    
     public function __construct()
    {
        parent::__construct();
         $this->objFacturaModel= new \application\modules\fac2fast\model\FacturaModel(); 
 $this->objServicioModel= new \application\modules\fac2fast\model\ServicioModel(); 

        
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost(){
        $this->set_facturas_id_facturas();
$this->set_f_servicios_id_servicio();
$this->set_cantidad();
$this->set_precio();

        return parent::saveFacturaServicio();
    }
    
    

}