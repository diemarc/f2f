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
  | Class EmpresaTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for a_empresas
  | @author kerana,
  | @date 19-03-2018 17:47:07,
  |
 */

abstract class EmpresaTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_empresa  */
            $_id_empresa,
            /** @var varchar(10), $cif  */
            $_cif,
            /** @var varchar(45), $empresa  */
            $_empresa,
            /** @var varchar(250), $razon_social  */
            $_razon_social,
            /** @var int(11), $id_poblacion  */
            $_id_poblacion,
            /** @var varchar(150), $direccion  */
            $_direccion,
            /** @var varchar(15), $telefono  */
            $_telefono,
            /** @var varchar(45), $email  */
            $_email,
            /** @var varchar(45), $contacto  */
            $_contacto,
            /** @var int(20), $cta_bancaria  */
            $_cta_bancaria,
            /** @var varchar(150), $observacion  */
            $_observacion,
            /** @var time(tamp), $created_at  */
            $_created_at,
            /** @var varchar(45), $created_by  */
            $_created_by,
            /** @var int(11), $aux_estados_id_estado  */
            $_aux_estados_id_estado,
            /** Master query for empresa */
            $_query_empresa;
    public
    /** @array data matching attributes with table field */
            $data_empresa;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'a_empresas';
        $this->table_id = 'id_empresa';

        $this->pks = [
            'id_empresa' => $this->_id_empresa,
        ];

        $this->_query = ' SELECT A.id_empresa,A.cif,A.empresa,A.razon_social,'
                . ' A.id_poblacion,A.direccion,A.telefono,A.email,A.contacto,'
                . ' A.cta_bancaria,A.observacion,A.created_at,'
                . ' A.created_by,A.aux_estados_id_estado,'
                . ' B.estado,B.tipo,C.poblacion,C.provincia,C.ccaa,'
                . ' C.pais,C.cod_poblacion,C.cod_provincia,C.cod_ccaa,C.cod_pais'
                . ' FROM a_empresas A '
                . ' INNER JOIN aux_estados B ON (B.id_estado = A.aux_estados_id_estado) '
                . ' INNER JOIN aux_poblaciones C ON (C.id_poblacion = A.id_poblacion) '
                . ' WHERE A.id_empresa IS NOT NULL ';
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
     * Insert/update new record into a_empresas
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveEmpresa()
    {

        $data_insert = [
            'cif' => $this->_cif,
            'empresa' => $this->_empresa,
            'razon_social' => $this->_razon_social,
            'id_poblacion' => $this->_id_poblacion,
            'direccion' => $this->_direccion,
            'telefono' => $this->_telefono,
            'email' => $this->_email,
            'contacto' => $this->_contacto,
            'cta_bancaria' => $this->_cta_bancaria,
            'observacion' => $this->_observacion,
            'created_at' => $this->_created_at,
            'created_by' => $this->_created_by,
            'aux_estados_id_estado' => $this->_aux_estados_id_estado,
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
    public function set_id_empresa($value = "")
    {
        $this->_id_empresa = \helpers\Validator::valInt('f_id_empresa', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for cif
     * ------------------------------------------------------------------------- 
     * @param varchar $value the cif value 
     */
    public function set_cif($value = "")
    {
        $this->_cif = \helpers\Validator::valVarchar('f_cif', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for empresa
     * ------------------------------------------------------------------------- 
     * @param varchar $value the empresa value 
     */
    public function set_empresa($value = "")
    {
        $this->_empresa = \helpers\Validator::valVarchar('f_empresa', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for razon_social
     * ------------------------------------------------------------------------- 
     * @param varchar $value the razon_social value 
     */
    public function set_razon_social($value = "")
    {
        $this->_razon_social = \helpers\Validator::valVarchar('f_razon_social', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_poblacion
     * ------------------------------------------------------------------------- 
     * @param int $value the id_poblacion value 
     */
    public function set_id_poblacion($value = "")
    {
        $this->_id_poblacion = \helpers\Validator::valInt('f_id_poblacion', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for direccion
     * ------------------------------------------------------------------------- 
     * @param varchar $value the direccion value 
     */
    public function set_direccion($value = "")
    {
        $this->_direccion = \helpers\Validator::valVarchar('f_direccion', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for telefono
     * ------------------------------------------------------------------------- 
     * @param varchar $value the telefono value 
     */
    public function set_telefono($value = "")
    {
        $this->_telefono = \helpers\Validator::valVarchar('f_telefono', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for email
     * ------------------------------------------------------------------------- 
     * @param varchar $value the email value 
     */
    public function set_email($value = "")
    {
        $this->_email = \helpers\Validator::valVarchar('f_email', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for contacto
     * ------------------------------------------------------------------------- 
     * @param varchar $value the contacto value 
     */
    public function set_contacto($value = "")
    {
        $this->_contacto = \helpers\Validator::valVarchar('f_contacto', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for cta_bancaria
     * ------------------------------------------------------------------------- 
     * @param int $value the cta_bancaria value 
     */
    public function set_cta_bancaria($value = "")
    {
        $this->_cta_bancaria = \helpers\Validator::valInt('f_cta_bancaria', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for observacion
     * ------------------------------------------------------------------------- 
     * @param varchar $value the observacion value 
     */
    public function set_observacion($value = "")
    {
        $this->_observacion = \helpers\Validator::valVarchar('f_observacion', $value, FALSE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_at
     * ------------------------------------------------------------------------- 
     * @param time $value the created_at value 
     */
    public function set_created_at($value = "")
    {
        $this->_created_at = \helpers\Validator::valTime('f_created_at', $value, FALSE);
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

    /**
     * ------------------------------------------------------------------------- 
     * Setter for aux_estados_id_estado
     * ------------------------------------------------------------------------- 
     * @param int $value the aux_estados_id_estado value 
     */
    public function set_aux_estados_id_estado($value = "")
    {
        $this->_aux_estados_id_estado = \helpers\Validator::valInt('f_aux_estados_id_estado', $value, TRUE);
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
    public function get_id_empresa()
    {
        return (isset($this->_id_empresa)) ? $this->_id_empresa : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for cif
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_cif()
    {
        return (isset($this->_cif)) ? $this->_cif : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for empresa
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_empresa()
    {
        return (isset($this->_empresa)) ? $this->_empresa : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for razon_social
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_razon_social()
    {
        return (isset($this->_razon_social)) ? $this->_razon_social : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_poblacion
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_poblacion()
    {
        return (isset($this->_id_poblacion)) ? $this->_id_poblacion : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for direccion
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_direccion()
    {
        return (isset($this->_direccion)) ? $this->_direccion : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for telefono
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_telefono()
    {
        return (isset($this->_telefono)) ? $this->_telefono : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for email
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_email()
    {
        return (isset($this->_email)) ? $this->_email : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for contacto
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_contacto()
    {
        return (isset($this->_contacto)) ? $this->_contacto : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for cta_bancaria
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_cta_bancaria()
    {
        return (isset($this->_cta_bancaria)) ? $this->_cta_bancaria : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for observacion
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_observacion()
    {
        return (isset($this->_observacion)) ? $this->_observacion : null;
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

    /**
     * ------------------------------------------------------------------------- 
     * Getter for aux_estados_id_estado
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_aux_estados_id_estado()
    {
        return (isset($this->_aux_estados_id_estado)) ? $this->_aux_estados_id_estado : null;
    }

}
