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
  | Class ContactoModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for ContactoTable 
  | contactos de f2f
  | @author kerana,
  | @date 10-05-2018 06:09:55,
  |
 */

class ContactoModel extends tables\ContactoTable {

    
    
     public function __construct()
    {
        parent::__construct();
        
        
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost(){
        $this->set_nombre();
$this->set_apellido1();
$this->set_apellido2();
$this->set_movil();
$this->set_telefono();
$this->set_email();

        return parent::saveContacto();
    }
    
    

}