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

namespace application\modules\fac2fast\model\tables;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ContactoTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for a_contactos
  | @author kerana,
  | @date 10-05-2018 06:09:55,
  |
 */

abstract class ContactoTable extends \kerana\Ada {

    protected
    /** @var int(11), $id_contacto  */ 
$_id_contacto, 
/** @var varchar(45), $nombre  */ 
$_nombre, 
/** @var varchar(45), $apellido1  */ 
$_apellido1, 
/** @var varchar(45), $apellido2  */ 
$_apellido2, 
/** @var varchar(45), $movil  */ 
$_movil, 
/** @var varchar(45), $telefono  */ 
$_telefono, 
/** @var varchar(45), $email  */ 
$_email,
            
            /** Master query for contacto */
            $_query_contacto;
    
    

    public 
            /** @array data matching attributes with table field */
            $data_contacto;
    
     public function __construct()
    {
        parent::__construct();
        $this->table_name = 'a_contactos';
        $this->table_id = 'id_contacto';
        
        $this->pks = [
          'id_contacto'=> $this->_id_contacto,
  
        ];
        
        $this->_query = ' SELECT A.id_contacto,A.nombre,A.apellido1,A.apellido2,A.movil,A.telefono,A.email' 
.' FROM a_contactos A '
 .' WHERE A.id_contacto IS NOT NULL ';  
    }

    
    /*
      |-------------------------------------------------------------------------
      | SELECT-METHODS
      |-------------------------------------------------------------------------
      |
     */

    
    
    /*
     |-------------------------------------------------------------------------
     | INSERT-UPDATE-METHODS
     |-------------------------------------------------------------------------
     |
    */


    /**
     * -------------------------------------------------------------------------
     * Insert/update new record into a_contactos
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveContacto(){
        
        $data_insert =  [
            'nombre' =>$this->_nombre,
'apellido1' =>$this->_apellido1,
'apellido2' =>$this->_apellido2,
'movil' =>$this->_movil,
'telefono' =>$this->_telefono,
'email' =>$this->_email,
  
        ];
          return parent::save($data_insert);
        
    }
    
    
    
    
 /*
  |-------------------------------------------------------------------------
  | SETTERS
  |-------------------------------------------------------------------------
  | 
 */

 /** 
* ------------------------------------------------------------------------- 
* Setter for id_contacto
* ------------------------------------------------------------------------- 
* @param int $value the id_contacto value 
*/ 
 public function set_id_contacto($value = ""){ 
 $this->_id_contacto= \helpers\Validator::valInt('f_id_contacto',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for nombre
* ------------------------------------------------------------------------- 
* @param varchar $value the nombre value 
*/ 
 public function set_nombre($value = ""){ 
 $this->_nombre= \helpers\Validator::valVarchar('f_nombre',$value,FALSE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for apellido1
* ------------------------------------------------------------------------- 
* @param varchar $value the apellido1 value 
*/ 
 public function set_apellido1($value = ""){ 
 $this->_apellido1= \helpers\Validator::valVarchar('f_apellido1',$value,FALSE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for apellido2
* ------------------------------------------------------------------------- 
* @param varchar $value the apellido2 value 
*/ 
 public function set_apellido2($value = ""){ 
 $this->_apellido2= \helpers\Validator::valVarchar('f_apellido2',$value,FALSE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for movil
* ------------------------------------------------------------------------- 
* @param varchar $value the movil value 
*/ 
 public function set_movil($value = ""){ 
 $this->_movil= \helpers\Validator::valVarchar('f_movil',$value,FALSE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for telefono
* ------------------------------------------------------------------------- 
* @param varchar $value the telefono value 
*/ 
 public function set_telefono($value = ""){ 
 $this->_telefono= \helpers\Validator::valVarchar('f_telefono',$value,FALSE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for email
* ------------------------------------------------------------------------- 
* @param varchar $value the email value 
*/ 
 public function set_email($value = ""){ 
 $this->_email= \helpers\Validator::valVarchar('f_email',$value,FALSE);
}

    
    
 
 /*
  |-------------------------------------------------------------------------
  | GETTERS
  |-------------------------------------------------------------------------
  | 
 */
 /** 
* ------------------------------------------------------------------------- 
* Getter for id_contacto
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_id_contacto(){ 
 return (isset($this->_id_contacto)) ? $this->_id_contacto: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for nombre
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_nombre(){ 
 return (isset($this->_nombre)) ? $this->_nombre: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for apellido1
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_apellido1(){ 
 return (isset($this->_apellido1)) ? $this->_apellido1: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for apellido2
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_apellido2(){ 
 return (isset($this->_apellido2)) ? $this->_apellido2: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for movil
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_movil(){ 
 return (isset($this->_movil)) ? $this->_movil: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for telefono
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_telefono(){ 
 return (isset($this->_telefono)) ? $this->_telefono: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for email
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_email(){ 
 return (isset($this->_email)) ? $this->_email: null;
}

}