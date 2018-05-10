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
  | Class ContactoEmpresaTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for a_contactos_empresa_contratante
  | @author kerana,
  | @date 10-05-2018 06:10:39,
  |
 */

abstract class ContactoEmpresaTable extends \kerana\Ada {

    protected
    /** @var int(11), $id_contacto  */ 
$_id_contacto, 
/** @var int(11), $id_empresa  */ 
$_id_empresa, 
/** @var int(11), $id_contratante  */ 
$_id_contratante,
            
            /** Master query for contactoempresa */
            $_query_contactoempresa;
    
    

    public 
            /** @array data matching attributes with table field */
            $data_contactoempresa;
    
     public function __construct()
    {
        parent::__construct();
        $this->table_name = 'a_contactos_empresa_contratante';
        $this->table_id = 'id_contacto';
        
        $this->pks = [
          'id_contacto'=> $this->_id_contacto,
'id_empresa'=> $this->_id_empresa,
'id_contratante'=> $this->_id_contratante,
  
        ];
        
        $this->_query = ' SELECT A.id_contacto,A.id_empresa,A.id_contratante,B.nombre,B.apellido1,B.apellido2,B.movil,B.telefono,B.email,C.fechas,C3.contratante,C3.cif,C3.razon_social,C3.id_poblacion,C3.direccion,C3.telefono,C3.email,C3.contacto,C3.cta_bancaria,C3.path_logo,C3.observacion,C3.created_at,C3.created_by,C3.aux_estados_id_estado,C34.estado,C34.tipo,C35.poblacion,C35.provincia,C35.ccaa,C35.pais,C35.cod_poblacion,C35.cod_provincia,C35.cod_ccaa,C35.cod_pais,C4.cif,C4.empresa,C4.razon_social,C4.id_poblacion,C4.direccion,C4.telefono,C4.email,C4.contacto,C4.cta_bancaria,C4.observacion,C4.created_at,C4.created_by,C4.aux_estados_id_estado,C45.estado,C45.tipo,C46.poblacion,C46.provincia,C46.ccaa,C46.pais,C46.cod_poblacion,C46.cod_provincia,C46.cod_ccaa,C46.cod_pais' 
.' FROM a_contactos_empresa_contratante A '
 .' INNER JOIN a_contactos B ON (B.id_contacto = A.id_contacto) ' 

 .' INNER JOIN a_empresa_contratante C ON (C.id_empresa = A.id_empresa) ' 
.' INNER JOIN a_contratantes C3 ON (C3.id_contratante = C.id_contratante) ' 
.' INNER JOIN aux_estados C34 ON (C34.id_estado = C3.aux_estados_id_estado) ' 
.' INNER JOIN aux_poblaciones C35 ON (C35.id_poblacion = C3.id_poblacion) ' 
.' INNER JOIN a_empresas C4 ON (C4.id_empresa = C.id_empresa) ' 
.' INNER JOIN aux_estados C45 ON (C45.id_estado = C4.aux_estados_id_estado) ' 
.' INNER JOIN aux_poblaciones C46 ON (C46.id_poblacion = C4.id_poblacion) ' 

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
     * Insert/update new record into a_contactos_empresa_contratante
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveContactoEmpresa(){
        
        $data_insert =  [
            'id_contacto' =>$this->_id_contacto,
'id_empresa' =>$this->_id_empresa,
'id_contratante' =>$this->_id_contratante,
  
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
* Setter for id_empresa
* ------------------------------------------------------------------------- 
* @param int $value the id_empresa value 
*/ 
 public function set_id_empresa($value = ""){ 
 $this->_id_empresa= \helpers\Validator::valInt('f_id_empresa',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for id_contratante
* ------------------------------------------------------------------------- 
* @param int $value the id_contratante value 
*/ 
 public function set_id_contratante($value = ""){ 
 $this->_id_contratante= \helpers\Validator::valInt('f_id_contratante',$value,TRUE);
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
* Getter for id_empresa
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_id_empresa(){ 
 return (isset($this->_id_empresa)) ? $this->_id_empresa: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for id_contratante
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_id_contratante(){ 
 return (isset($this->_id_contratante)) ? $this->_id_contratante: null;
}

}