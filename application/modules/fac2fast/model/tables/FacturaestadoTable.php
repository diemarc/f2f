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

abstract class FacturaestadoTable extends \kerana\Ada
{

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
            'id_facturas' => $this->_id_facturas,
            'id_estado' => $this->_id_estado,
        ];

        $this->_query = ' SELECT A.id_facturas,A.id_estado,A.created_at,A.created_by'
                . ' FROM f_facturas_estados A '
                . ' WHERE A.id_facturas IS NOT NULL ';
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
    public function saveFacturaestado()
    {

        $data_insert = [
            'id_facturas' => $this->_id_facturas,
            'id_estado' => $this->_id_estado,
            'created_at' => $this->_created_at,
            'created_by' => $this->_created_by,
        ];
        return parent::save($data_insert,false);
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
    public function set_id_facturas($value = "")
    {
        $this->_id_facturas = \helpers\Validator::valInt('f_id_facturas', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_estado
     * ------------------------------------------------------------------------- 
     * @param int $value the id_estado value 
     */
    public function set_id_estado($value = "")
    {
        $this->_id_estado = \helpers\Validator::valInt('f_id_estado', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_at
     * ------------------------------------------------------------------------- 
     * @param time $value the created_at value 
     */
    public function set_created_at($value = "")
    {
        $this->_created_at = \helpers\Validator::valDateTime('f_created_at', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_by
     * ------------------------------------------------------------------------- 
     * @param varchar $value the created_by value 
     */
    public function set_created_by($value = "")
    {
        $this->_created_by = \helpers\Validator::valVarchar('f_created_by', $value, FALSE);
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
    public function get_id_facturas()
    {
        return (isset($this->_id_facturas)) ? $this->_id_facturas : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_estado
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_estado()
    {
        return (isset($this->_id_estado)) ? $this->_id_estado : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for created_at
     * ------------------------------------------------------------------------- 
     * @return time $value  
     */
    public function get_created_at()
    {
        return (isset($this->_created_at)) ? $this->_created_at : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for created_by
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_created_by()
    {
        return (isset($this->_created_by)) ? $this->_created_by : null;
    }

}
