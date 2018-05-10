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
  | Class InformeTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for aux_informes
  | @author kerana,
  | @date 10-05-2018 06:08:22,
  |
 */

abstract class InformeTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_aux_informe  */
            $_id_aux_informe,
            /** @var int(11), $id_estado  */
            $_id_estado,
            /** @var varchar(45), $nombre_informe  */
            $_nombre_informe,
            /** @var varchar(150), $default_template  */
            $_default_template,
            /** @var varchar(45), $modulo_informe  */
            $_modulo_informe,
            /** @var varchar(45), $controller_informe  */
            $_controller_informe,
            /** @var varchar(45), $action_informe  */
            $_action_informe,
            /** Master query for informe */
            $_query_informe;
    public
    /** @array data matching attributes with table field */
            $data_informe;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'aux_informes';
        $this->table_id = 'id_aux_informe';

        $this->pks = [
            'id_aux_informe' => $this->_id_aux_informe,
        ];

        $this->_query = ' SELECT A.id_aux_informe,A.id_estado,A.nombre_informe,'
                . ' A.default_template,A.modulo_informe,A.controller_informe,A.action_informe,B.estado,B.tipo'
                . ' FROM aux_informes A '
                . ' INNER JOIN aux_estados B ON (B.id_estado = A.id_estado) '
                . ' WHERE A.id_aux_informe IS NOT NULL ';
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
     * Insert/update new record into aux_informes
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveInforme()
    {

        $data_insert = [
            'id_estado' => $this->_id_estado,
            'nombre_informe' => $this->_nombre_informe,
            'default_template' => $this->_default_template,
            'modulo_informe' => $this->_modulo_informe,
            'controller_informe' => $this->_controller_informe,
            'action_informe' => $this->_action_informe,
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
     * Setter for id_aux_informe
     * ------------------------------------------------------------------------- 
     * @param int $value the id_aux_informe value 
     */
    public function set_id_aux_informe($value = "")
    {
        $this->_id_aux_informe = \helpers\Validator::valInt('f_id_aux_informe', $value, TRUE);
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
     * Setter for nombre_informe
     * ------------------------------------------------------------------------- 
     * @param varchar $value the nombre_informe value 
     */
    public function set_nombre_informe($value = "")
    {
        $this->_nombre_informe = \helpers\Validator::valVarchar('f_nombre_informe', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for default_template
     * ------------------------------------------------------------------------- 
     * @param varchar $value the default_template value 
     */
    public function set_default_template($value = "")
    {
        $this->_default_template = \helpers\Validator::valVarchar('f_default_template', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for modulo_informe
     * ------------------------------------------------------------------------- 
     * @param varchar $value the modulo_informe value 
     */
    public function set_modulo_informe($value = "")
    {
        $this->_modulo_informe = \helpers\Validator::valVarchar('f_modulo_informe', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for controller_informe
     * ------------------------------------------------------------------------- 
     * @param varchar $value the controller_informe value 
     */
    public function set_controller_informe($value = "")
    {
        $this->_controller_informe = \helpers\Validator::valVarchar('f_controller_informe', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for action_informe
     * ------------------------------------------------------------------------- 
     * @param varchar $value the action_informe value 
     */
    public function set_action_informe($value = "")
    {
        $this->_action_informe = \helpers\Validator::valVarchar('f_action_informe', $value, FALSE);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_aux_informe
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_aux_informe()
    {
        return (isset($this->_id_aux_informe)) ? $this->_id_aux_informe : null;
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
     * Getter for nombre_informe
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_nombre_informe()
    {
        return (isset($this->_nombre_informe)) ? $this->_nombre_informe : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for default_template
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_default_template()
    {
        return (isset($this->_default_template)) ? $this->_default_template : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for modulo_informe
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_modulo_informe()
    {
        return (isset($this->_modulo_informe)) ? $this->_modulo_informe : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for controller_informe
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_controller_informe()
    {
        return (isset($this->_controller_informe)) ? $this->_controller_informe : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for action_informe
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_action_informe()
    {
        return (isset($this->_action_informe)) ? $this->_action_informe : null;
    }

}
