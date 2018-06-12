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

namespace application\modules\configuracion\model\tables;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ServiciotasaTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for f_servicios_tasas
  | @author kerana,
  | @date 19-03-2018 17:34:20,
  |
 */

abstract class ServiciotasaTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_servicio  */
            $_id_servicio,
            /** @var int(11), $id_tasa  */
            $_id_tasa,
            /** Master query for serviciotasa */
            $_query_serviciotasa;
    public
    /** @array data matching attributes with table field */
            $data_serviciotasa;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'f_servicios_tasas';
        $this->table_id = 'id_servicio';

        $this->pks = [
            'id_servicio' => $this->_id_servicio,
            'id_tasa' => $this->_id_tasa,
        ];

        $this->_query = ' SELECT A.id_servicio,A.id_tasa,B.tasa,B.porcentaje,C.id_subclase,C.servicio,C.descripcion,C.precio,C.created_at,C.created_by,C3.subclase,C34.clase'
                . ' FROM f_servicios_tasas A '
                . ' INNER JOIN aux_tasas B ON (B.id_tasa = A.id_tasa) '
                . ' INNER JOIN f_servicios C ON (C.id_servicio = A.id_servicio) '
                . ' INNER JOIN aux_subclases C3 ON (C3.id_subclase = C.id_subclase) '
                . ' INNER JOIN aux_clases C34 ON (C34.id_clases = C3.id_clases) '
                . ' WHERE A.id_servicio IS NOT NULL ';
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
     * Insert/update new record into f_servicios_tasas
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveServiciotasa()
    {

        $data_insert = [
            'id_servicio' => $this->_id_servicio,
            'id_tasa' => $this->_id_tasa,
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
     * Setter for id_servicio
     * ------------------------------------------------------------------------- 
     * @param int $value the id_servicio value 
     */
    public function set_id_servicio($value = "")
    {
        $this->_id_servicio = \helpers\Validator::valInt('f_id_servicio', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_tasa
     * ------------------------------------------------------------------------- 
     * @param int $value the id_tasa value 
     */
    public function set_id_tasa($value = "")
    {
        $this->_id_tasa = \helpers\Validator::valInt('f_id_tasa', $value, TRUE);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_servicio
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_servicio()
    {
        return (isset($this->_id_servicio)) ? $this->_id_servicio : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_tasa
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_tasa()
    {
        return (isset($this->_id_tasa)) ? $this->_id_tasa : null;
    }

}
