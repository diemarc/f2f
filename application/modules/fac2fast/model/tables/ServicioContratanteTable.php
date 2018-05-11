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
  | Class ServicioContratanteTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for f_servicios_contratantes
  | @author kerana,
  | @date 04-05-2018 06:25:44,
  |
 */

abstract class ServicioContratanteTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_servicio  */
            $_id_servicio,
            /** @var int(11), $id_contratante  */
            $_id_contratante,
            /** Master query for serviciocontratante */
            $_query_serviciocontratante;
    public
    /** @array data matching attributes with table field */
            $data_serviciocontratante;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'f_servicios_contratantes';
        $this->table_id = 'id_contratante';

        $this->pks = [
            'id_servicio' => $this->_id_servicio,
            'id_contratante' => $this->_id_contratante,
        ];

        $this->_query = ' SELECT A.id_servicio,A.id_contratante,'
                . ' C.id_subclase,C.servicio,C.descripcion,C.precio,C.created_at,'
                . ' C.created_by,C3.subclase,C34.clase'
                . ' FROM f_servicios_contratantes A '
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
     * Insert/update new record into f_servicios_contratantes
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveServicioContratante()
    {

        $data_insert = [
            'id_servicio' => $this->_id_servicio,
            'id_contratante' => $this->_id_contratante,
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
     * Setter for id_contratante
     * ------------------------------------------------------------------------- 
     * @param int $value the id_contratante value 
     */
    public function set_id_contratante($value = "")
    {
        $this->_id_contratante = \helpers\Validator::valInt('f_id_contratante', $value, TRUE);
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
     * Getter for id_contratante
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_contratante()
    {
        return (isset($this->_id_contratante)) ? $this->_id_contratante : null;
    }

}
