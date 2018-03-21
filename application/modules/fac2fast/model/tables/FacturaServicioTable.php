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
  | Class FacturaServicioTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for f_facturas_servicios
  | @author kerana,
  | @date 20-03-2018 06:56:06,
  |
 */

abstract class FacturaServicioTable extends \kerana\Ada {

    protected
    /** @var int(11), $facturas_id_facturas  */ 
$_facturas_id_facturas, 
/** @var int(11), $f_servicios_id_servicio  */ 
$_f_servicios_id_servicio, 
/** @var decimal(9,2), $cantidad  */ 
$_cantidad, 
/** @var decimal(9,2), $precio  */ 
$_precio,
            
            /** Master query for facturaservicio */
            $_query_facturaservicio;
    
    

    public 
            /** @array data matching attributes with table field */
            $data_facturaservicio;
    
     public function __construct()
    {
        parent::__construct();
        $this->table_name = 'f_facturas_servicios';
        $this->table_id = 'facturas_id_facturas';
        
        $this->pks = [
          'facturas_id_facturas'=> $this->_facturas_id_facturas,
'f_servicios_id_servicio'=> $this->_f_servicios_id_servicio,
  
        ];
        
        $this->_query = ' SELECT A.facturas_id_facturas,A.f_servicios_id_servicio,A.cantidad,A.precio,'
                . ' B.id_pago,B.fecha_factura,B.num_factura,B.abono,B.id_tipo,B.created_at AS created_at_B,B.created_by As created_by_B,'
                . ' B2.fechas,'
                . ' B23.contratante,B23.cif AS cif_contratante,B23.razon_social AS razon_social_contratante,'
                . ' B23.id_poblacion AS id_poblacion_contratante,B23.direccion AS direccion_contratante,'
                . ' B23.telefono AS telelefono_contratante,'
                . ' B23.email AS email_contratante,B23.contacto AS contacto_contratante,'
                . ' B23.cta_bancaria AS cta_bancaria_contratante,B23.path_logo,'
                . ' B23.observacion AS observacion_contratante,B23.created_at  AS created_at_contratante,'
                . ' B23.created_by AS creataed_by_contratante,B23.aux_estados_id_estado AS id_estado_contratante,'
                . ' B234.estado AS estado_contratante,B234.tipo AS tipo_contratante,'
                . ' B235.poblacion AS poblacion_contratante,B235.provincia AS provincia_contratante,'
                . ' B235.ccaa AS ccaa_contratante,B235.pais AS pais_contratante,'
                . ' B235.cod_poblacion AS cod_pobalcion_contratante,B235.cod_provincia AS cod_provincia_contratante,'
                . ' B235.cod_ccaa AS cod_ccaa_contratante,B235.cod_pais AS cod_pais_contratante,'
                . ' B24.cif,B24.empresa,B24.razon_social,B24.id_poblacion,B24.direccion,B24.telefono,'
                . ' B24.email,B24.contacto,B24.cta_bancaria,B24.observacion,B24.created_at,B24.created_by,B24.aux_estados_id_estado,'
                . ' B245.estado,B245.tipo AS tipo_empresa,'
                . ' B246.poblacion,B246.provincia,B246.ccaa,B246.pais,B246.cod_poblacion,B246.cod_provincia,B246.cod_ccaa,B246.cod_pais,'
                . ' B3.formapago,'
                . ' B4.tipo,'
                . ' C.id_subclase,C.servicio,C.descripcion,C.precio AS precio_generico,'
                . ' C.created_at AS created_as_servicio,C.created_by AS created_by_servicio,'
                . ' C3.subclase,'
                . ' C34.clase' 
.' FROM f_facturas_servicios A '
 .' INNER JOIN f_facturas B ON (B.id_facturas = A.facturas_id_facturas) ' 
.' INNER JOIN a_empresa_contratante B2 ON (B2.id_empresa = B.id_empresa) ' 
.' INNER JOIN a_contratantes B23 ON (B23.id_contratante = B2.id_contratante) ' 
.' INNER JOIN aux_estados B234 ON (B234.id_estado = B23.aux_estados_id_estado) ' 
.' INNER JOIN aux_poblaciones B235 ON (B235.id_poblacion = B23.id_poblacion) ' 
.' INNER JOIN a_empresas B24 ON (B24.id_empresa = B2.id_empresa) ' 
.' INNER JOIN aux_estados B245 ON (B245.id_estado = B24.aux_estados_id_estado) ' 
.' INNER JOIN aux_poblaciones B246 ON (B246.id_poblacion = B24.id_poblacion) ' 
.' INNER JOIN f_formas_pago B3 ON (B3.id_pago = B.id_pago) ' 
.' INNER JOIN f_tipo B4 ON (B4.id_tipo = B.id_tipo) ' 

 .' INNER JOIN f_servicios C ON (C.id_servicio = A.f_servicios_id_servicio) ' 
.' INNER JOIN aux_subclases C3 ON (C3.id_subclase = C.id_subclase) ' 
.' INNER JOIN aux_clases C34 ON (C34.id_clases = C3.id_clases) ' 

 .' WHERE A.facturas_id_facturas IS NOT NULL ';  
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
     * Insert/update new record into f_facturas_servicios
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveFacturaServicio(){
        
        $data_insert =  [
            'facturas_id_facturas' =>$this->_facturas_id_facturas,
'f_servicios_id_servicio' =>$this->_f_servicios_id_servicio,
'cantidad' =>$this->_cantidad,
'precio' =>$this->_precio,
  
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
* Setter for facturas_id_facturas
* ------------------------------------------------------------------------- 
* @param int $value the facturas_id_facturas value 
*/ 
 public function set_facturas_id_facturas($value = ""){ 
 $this->_facturas_id_facturas= \helpers\Validator::valInt('f_facturas_id_facturas',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for f_servicios_id_servicio
* ------------------------------------------------------------------------- 
* @param int $value the f_servicios_id_servicio value 
*/ 
 public function set_f_servicios_id_servicio($value = ""){ 
 $this->_f_servicios_id_servicio= \helpers\Validator::valInt('f_f_servicios_id_servicio',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for cantidad
* ------------------------------------------------------------------------- 
* @param decimal $value the cantidad value 
*/ 
 public function set_cantidad($value = ""){ 
 $this->_cantidad= \helpers\Validator::valDecimal('f_cantidad',$value,TRUE);
}
/** 
* ------------------------------------------------------------------------- 
* Setter for precio
* ------------------------------------------------------------------------- 
* @param decimal $value the precio value 
*/ 
 public function set_precio($value = ""){ 
 $this->_precio= \helpers\Validator::valDecimal('f_precio',$value,TRUE);
}

    
    
 
 /*
  |-------------------------------------------------------------------------
  | GETTERS
  |-------------------------------------------------------------------------
  | 
 */
 /** 
* ------------------------------------------------------------------------- 
* Getter for facturas_id_facturas
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_facturas_id_facturas(){ 
 return (isset($this->_facturas_id_facturas)) ? $this->_facturas_id_facturas: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for f_servicios_id_servicio
* ------------------------------------------------------------------------- 
* @return int $value  
*/ 
 public function get_f_servicios_id_servicio(){ 
 return (isset($this->_f_servicios_id_servicio)) ? $this->_f_servicios_id_servicio: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for cantidad
* ------------------------------------------------------------------------- 
* @return decimal $value  
*/ 
 public function get_cantidad(){ 
 return (isset($this->_cantidad)) ? $this->_cantidad: null;
}
/** 
* ------------------------------------------------------------------------- 
* Getter for precio
* ------------------------------------------------------------------------- 
* @return decimal $value  
*/ 
 public function get_precio(){ 
 return (isset($this->_precio)) ? $this->_precio: null;
}

}