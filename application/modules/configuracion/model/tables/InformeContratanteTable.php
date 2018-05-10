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
  | Class InformeContratanteTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for aux_informes_contratantes
  | @author kerana,
  | @date 10-05-2018 06:09:23,
  |
 */

abstract class InformeContratanteTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_aux_informe  */
            $_id_aux_informe,
            /** @var int(11), $id_contratante  */
            $_id_contratante,
            /** @var int(11), $id_estado  */
            $_id_estado,
            /** @var varchar(100), $template_contratante_informe  */
            $_template_contratante_informe,
            /** Master query for informecontratante */
            $_query_informecontratante;
    public
    /** @array data matching attributes with table field */
            $data_informecontratante;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'aux_informes_contratantes';
        $this->table_id = 'id_aux_informe';

        $this->pks = [
            'id_aux_informe' => $this->_id_aux_informe,
            'id_contratante' => $this->_id_contratante,
        ];

        $this->_query = ' SELECT A.id_aux_informe,A.id_contratante,A.id_estado,'
                . ' A.template_contratante_informe,'
                . ' C.nombre_informe,C.default_template,C.modulo_informe,'
                . ' C.controller_informe,C.action_informe,'
                . ' D.contratante,D.cif'
                . ' FROM aux_informes_contratantes A '
                . ' INNER JOIN aux_estados B ON (B.id_estado = A.id_estado) '
                . ' INNER JOIN aux_informes C ON (C.id_aux_informe = A.id_aux_informe) '
                . ' INNER JOIN a_contratantes D ON (D.id_contratante = A.id_contratante) '
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
     * Insert/update new record into aux_informes_contratantes
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveInformeContratante()
    {

        $data_insert = [
            'id_aux_informe' => $this->_id_aux_informe,
            'id_contratante' => $this->_id_contratante,
            'id_estado' => $this->_id_estado,
            'template_contratante_informe' => $this->_template_contratante_informe,
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
     * Setter for id_contratante
     * ------------------------------------------------------------------------- 
     * @param int $value the id_contratante value 
     */
    public function set_id_contratante($value = "")
    {
        $this->_id_contratante = \helpers\Validator::valInt('f_id_contratante', $value, TRUE);
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
     * Setter for template_contratante_informe
     * ------------------------------------------------------------------------- 
     * @param varchar $value the template_contratante_informe value 
     */
    public function set_template_contratante_informe($value = "")
    {
        $this->_template_contratante_informe = \helpers\Validator::valVarchar('f_template_contratante_informe', $value, FALSE);
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
     * Getter for id_contratante
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_contratante()
    {
        return (isset($this->_id_contratante)) ? $this->_id_contratante : null;
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
     * Getter for template_contratante_informe
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_template_contratante_informe()
    {
        return (isset($this->_template_contratante_informe)) ? $this->_template_contratante_informe : null;
    }

}
