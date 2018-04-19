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
  | Class EmpresaContratanteTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for a_empresa_contratante
  | @author kerana,
  | @date 19-03-2018 18:21:42,
  |
 */

abstract class EmpresaContratanteTable extends \kerana\Ada {

    protected
    /** @var int(11), $id_empresa  */
            $_id_empresa,
            /** @var int(11), $id_contratante  */
            $_id_contratante,
            /** @var varchar(45), $fechas  */
            $_fechas,
            /** Master query for empresacontratante */
            $_query_empresacontratante;
    public
    /** @array data matching attributes with table field */
            $data_empresacontratante;

    public function __construct() {
        parent::__construct();
        $this->table_name = 'a_empresa_contratante';
        $this->table_id = 'id_empresa';

        $this->pks = [
            'id_empresa' => $this->_id_empresa,
            'id_contratante' => $this->_id_contratante,
        ];

        $this->_query = ' SELECT A.id_empresa,A.id_contratante,A.fechas,B.contratante,'
                . ' B.cif,B.razon_social,B.id_poblacion,B.direccion,B.telefono,B.email,B.contacto,'
                . ' B.cta_bancaria,B.path_logo,B.observacion,B.created_at,B.created_by,'
                . ' B.aux_estados_id_estado,B3.poblacion,B3.provincia,B3.ccaa,'
                . ' B3.pais,B3.cod_poblacion,B3.cod_provincia,B3.cod_ccaa,B3.cod_pais,'
                . ' C.cif AS cif_empresa,C.empresa,C.razon_social AS razon_social_empresa,'
                . ' C.id_poblacion AS id_poblacion_empresa,'
                . ' C.direccion AS direccion_empresa,C.telefono AS telefono_empresa,'
                . ' C.email AS email_empresa,'
                . ' C.contacto AS contacto_empresa,'
                . ' C.cta_bancaria AS cta_bancaria_empresa,'
                . ' C.observacion AS observacion_empresa,C.aux_estados_id_estado AS id_estado_empresa,'
                . ' C4.poblacion AS poblacion_empresa,C4.provincia AS provincia_empresa,'
                . ' C4.ccaa AS ccaa_empresa,'
                . ' C4.pais AS pais_empresa,C4.cod_poblacion AS cod_poblacion_empresa,'
                . ' C4.cod_provincia AS cod_provincia_empresa,'
                . ' C4.cod_ccaa AS cod_ccaa_empresa,C4.cod_pais AS cod_pais_empresa'
                . ' FROM a_empresa_contratante A '
                . ' INNER JOIN a_contratantes B ON (B.id_contratante = A.id_contratante) '
               // . ' INNER JOIN aux_estados B2 ON (B2.id_estado = B.aux_estados_id_estado) '
                . ' INNER JOIN aux_poblaciones B3 ON (B3.id_poblacion = B.id_poblacion) '
                . ' INNER JOIN a_empresas C ON (C.id_empresa = A.id_empresa) '
                //. ' INNER JOIN aux_estados C3 ON (C3.id_estado = C.aux_estados_id_estado) '
                . ' INNER JOIN aux_poblaciones C4 ON (C4.id_poblacion = C.id_poblacion) '
                . ' WHERE A.id_empresa IS NOT NULL'
                . ' AND A.id_contratante = '.$_SESSION['f2f_id_contratante'];
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
     * Insert/update new record into a_empresa_contratante
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveEmpresaContratante() {

        $data_insert = [
            'id_empresa' => $this->_id_empresa,
            'id_contratante' => $this->_id_contratante,
            'fechas' => $this->_fechas,
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
     * Setter for id_empresa
     * ------------------------------------------------------------------------- 
     * @param int $value the id_empresa value 
     */
    public function set_id_empresa($value = "") {
        $this->_id_empresa = \helpers\Validator::valInt('f_id_empresa', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_contratante
     * ------------------------------------------------------------------------- 
     * @param int $value the id_contratante value 
     */
    public function set_id_contratante($value = "") {
        $this->_id_contratante = \helpers\Validator::valInt('f_id_contratante', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for fechas
     * ------------------------------------------------------------------------- 
     * @param varchar $value the fechas value 
     */
    public function set_fechas($value = "") {
        $this->_fechas = \helpers\Validator::valVarchar('f_fechas', $value, FALSE);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_empresa
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_empresa() {
        return (isset($this->_id_empresa)) ? $this->_id_empresa : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_contratante
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_contratante() {
        return (isset($this->_id_contratante)) ? $this->_id_contratante : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for fechas
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_fechas() {
        return (isset($this->_fechas)) ? $this->_fechas : null;
    }

}
