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
  | Class FacturaestadoTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for f_facturas_estados
  | @author kerana,
  | @date 20-03-2018 07:54:39,
  |
 */

abstract class FacturaestadoTable extends \kerana\Ada {

    protected
    /** @var int(11), $id_facturas  */ 
$_id_facturas, 
/** @var int(11), $id_estado  */ 
$_id_estado, 
/** @var time(tamp), $created_at  */ 
$_created_at, 
/** @var varchar(45), $created_by  */ 
$_created_by,
            
            /** Master query for facturaestado */
            $_query_facturaestado;
    
    

    public 
            /** @array data matching attributes with table field */
            $data_facturaestado;
    
     public function __construct()
    {
        parent::__construct();
        $this->table_name = 'f_facturas_estados';
        $this->table_id = 'id_facturas';
        
        $this->pks = [
          'id_facturas'=> $this->_id_facturas,
'id_estado'=> $this->_id_estado,
  
        ];
        
        $this->_query = ' SELECT A.id_facturas,A.id_estado,A.created_at,A.created_by,B.estado AS estado_factura,B.tipo,'
                . ' C.id_pago,C.fecha_factura,C.num_factura,C.abono,'
                . ' C.id_tipo,C.created_at AS created_at_factura,C.created_by AS created_by_factura,'
                . ' C3.fechas,'
                . ' C34.contratante,C34.cif AS cif_contratante,'
                . ' C34.razon_social AS razon_social_contratante,C34.id_poblacion AS id_poblacion_contratante,'
                . ' C34.direccion AS direccion_contratante,C34.telefono AS telefono_contratante,'
                . ' C34.email AS email_contratante,C34.contacto AS contacto_contratante,'
                . ' C34.cta_bancaria AS cta_bancaria_contratante ,C34.path_logo,'
                . ' C34.observacion As observacion_contratante,'
                . ' C34.created_at AS created_at_contratante,C34.created_by AS created_by_contratante,'
                . ' C34.aux_estados_id_estado AS aux_estado_id_estado_contratante,'
                . ' C345.estado AS estado_contratante,C345.tipo AS tipo_contratante,'
                . ' C346.poblacion AS poblacion_contratante,C346.provincia AS provincia_contratante,'
                . ' C346.ccaa AS ccaa_contratante,C346.pais AS pais_contratante,'
                . ' C346.cod_poblacion AS Cod_poblacion_contratante,'
                . ' C346.cod_provincia AS Cod_provincia_contratante,'
                . ' C346.cod_ccaa AS Cod_ccaa_contratante,C346.cod_pais AS Cod_pais_contratante,'
                . ' C35.cif,C35.empresa,C35.razon_social,C35.id_poblacion,'
                . ' C35.direccion,C35.telefono,C35.email,C35.contacto,'
                . ' C35.cta_bancaria,C35.observacion,C35.created_at AS created_at_empresa,'
                . ' C35.created_by AS created_by_empresa,C35.aux_estados_id_estado,'
                . ' C356.estado,C356.tipo AS tipo_empresa,'
                . ' C357.poblacion,C357.provincia,C357.ccaa,C357.pais,'
                . ' C357.cod_poblacion,C357.cod_provincia,C357.cod_ccaa,C357.cod_pais,'
                . ' C4.formapago,'
                . ' C5.tipo AS tipo_tipo' 
.' FROM f_facturas_estados A '
 .' INNER JOIN aux_estados B ON (B.id_estado = A.id_estado) ' 

 .' INNER JOIN f_facturas C ON (C.id_facturas = A.id_facturas) ' 
.' INNER JOIN a_empresa_contratante C3 ON (C3.id_empresa = C.id_empresa) ' 
.' INNER JOIN a_contratantes C34 ON (C34.id_contratante = C3.id_contratante) ' 
.' INNER JOIN aux_estados C345 ON (C345.id_estado = C34.aux_estados_id_estado) ' 
.' INNER JOIN aux_poblaciones C346 ON (C346.id_poblacion = C34.id_poblacion) ' 
.' INNER JOIN a_empresas C35 ON (C35.id_empresa = C3.id_empresa) ' 
.' INNER JOIN aux_estados C356 ON (C356.id_estado = C35.aux_estados_id_estado) ' 
.' INNER JOIN aux_poblaciones C357 ON (C357.id_poblacion = C35.id_poblacion) ' 
.' INNER JOIN f_formas_pago C4 ON (C4.id_pago = C.id_pago) ' 
.' INNER JOIN f_tipo C5 ON (C5.id_tipo = C.id_tipo) ' 

 .' WHERE A.id_facturas IS NOT NULL ';  
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
     * Insert/update new record into f_facturas_estados
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveFacturaestado(){
        
        $data_insert =  [
            'id_facturas' =>$this->_id_facturas,
'id_estado' =>$this->_id_estado,
'created_at' =>$this->_created_at,
'created_by' =>$this->_created_by,
  
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
* Setter for id_facturas
* ------------------------------------------------------------------------- 
* @param int $value the id_facturas value 
*/ 
 public function set_id_facturas($value = ""){ 
 $this->_id_facturas= \helpers\Validator::valInt('f_id_facturas',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for id_estado
* ------------------------------------------------------------------------- 
* @param int $value the id_estado value 
*/ 
 public function set_id_estado($value = ""){ 
 $this->_id_estado= \helpers\Validator::valInt('f_id_estado',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for created_at
* ------------------------------------------------------------------------- 
* @param time $value the created_at value 
*/ 
 public function set_created_at($value = ""){ 
 $this->_created_at= \helpers\Validator::valTime('f_created_at',$value,FALSE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for created_by
* ------------------------------------------------------------------------- 
* @param varchar $value the created_by value 
*/ 
 public function set_created_by($value = ""){ 
 $this->_created_by= \helpers\Validator::valVarchar('f_created_by',$value,FALSE);
}

    
    
 
 /*
  |-------------------------------------------------------------------------
  | GETTERS
  |-------------------------------------------------------------------------
  | 
 */
 /** 
* ------------------------------------------------------------------------- 
* Getter for id_facturas
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_id_facturas(){ 
 return (isset($this->_id_facturas)) ? $this->_id_facturas: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for id_estado
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_id_estado(){ 
 return (isset($this->_id_estado)) ? $this->_id_estado: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for created_at
* ------------------------------------------------------------------------- 
* @return time $value  
*/ 
 public function get_created_at(){ 
 return (isset($this->_created_at)) ? $this->_created_at: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for created_by
* ------------------------------------------------------------------------- 
* @return varchar $value  
*/ 
 public function get_created_by(){ 
 return (isset($this->_created_by)) ? $this->_created_by: null;
}

}