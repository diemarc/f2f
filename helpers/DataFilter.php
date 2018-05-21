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

namespace helpers;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');

use helpers\Request AS Request;

/**
 * -----------------------------------------------------------------------------
 * DataFilter
 * ------------------------------------------------------------------------------
 * @author diemarc
 */
class DataFilter
{

    protected
            
            /** @object model, for build a filter */
            $_object_model,
            
            /** @array params to use to filter data*/
            $_array_params = [];

    public function __construct(\kerana\Ada $objectModel)
    {
        $this->_object_model = $objectModel;
    }
    
 
    public function setParamsFilter($array_params){
        
        foreach($array_params AS $param_name => $default_value):
            
            
            
            
        endforeach;
        
        
    }
    
    

}
