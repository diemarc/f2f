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

namespace application\modules\system\model\tables;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class SyslogTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for sys_log
  | @author kerana,
  | @date 12-06-2018 05:57:48,
  |
 */

abstract class SyslogTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_sys_log  */
            $_id_sys_log,
            /** @var varchar(45), $log_type  */
            $_log_type,
            /** @var text(), $message_log  */
            $_message_log,
            /** @var time(tamp), $log_time  */
            $_log_time,
            /** @var int(11), $id_user  */
            $_id_user,
            /** @var tinyint(1), $sw_successful  */
            $_sw_successful,
            /** Master query for syslog */
            $_query_syslog;
    public
    /** @array data matching attributes with table field */
            $data_syslog;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_log';
        $this->table_id = 'id_sys_log';

        $this->pks = [
            'id_sys_log' => $this->_id_sys_log,
        ];

        $this->_query = ' SELECT A.id_sys_log,A.log_type,A.message_log,A.log_time,'
                . ' A.id_user,A.sw_successful'
                . ' FROM sys_log A '
                . ' WHERE A.id_sys_log IS NOT NULL ';
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
     * Insert/update new record into sys_log
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveSyslog()
    {

        $data_insert = [
            'log_type' => $this->_log_type,
            'message_log' => $this->_message_log,
            'log_time' => $this->_log_time,
            'id_user' => $_SESSION['id_user'],
            'sw_successful' => $this->_sw_successful,
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
     * Setter for id_sys_log
     * ------------------------------------------------------------------------- 
     * @param int $value the id_sys_log value 
     */
    public function set_id_sys_log($value = "")
    {
        $this->_id_sys_log = \helpers\Validator::valInt('f_id_sys_log', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for log_type
     * ------------------------------------------------------------------------- 
     * @param varchar $value the log_type value 
     */
    public function set_log_type($value = "")
    {
        $this->_log_type = \helpers\Validator::valVarchar('f_log_type', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for message_log
     * ------------------------------------------------------------------------- 
     * @param text $value the message_log value 
     */
    public function set_message_log($value = "")
    {
        $this->_message_log = \helpers\Validator::valText('f_message_log', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for log_time
     * ------------------------------------------------------------------------- 
     * @param time $value the log_time value 
     */
    public function set_log_time($value = "")
    {
        $this->_log_time = \helpers\Validator::valTime('f_log_time', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_user
     * ------------------------------------------------------------------------- 
     * @param int $value the id_user value 
     */
    public function set_id_user()
    {
        $this->_id_user = \helpers\Validator::valInt('f_id_user', $_SESSION['id_user'], true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for sw_successful
     * ------------------------------------------------------------------------- 
     * @param tinyint $value the sw_successful value 
     */
    public function set_sw_successful($value = "")
    {
        $this->_sw_successful = \helpers\Validator::valText('f_sw_successful', $value, false);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_sys_log
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_sys_log()
    {
        return (isset($this->_id_sys_log)) ? $this->_id_sys_log : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for log_type
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_log_type()
    {
        return (isset($this->_log_type)) ? $this->_log_type : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for message_log
     * ------------------------------------------------------------------------- 
     * @return text $value  
     */
    public function get_message_log()
    {
        return (isset($this->_message_log)) ? $this->_message_log : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for log_time
     * ------------------------------------------------------------------------- 
     * @return time $value  
     */
    public function get_log_time()
    {
        return (isset($this->_log_time)) ? $this->_log_time : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_user
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_user()
    {
        return (isset($this->_id_user)) ? $this->_id_user : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for sw_successful
     * ------------------------------------------------------------------------- 
     * @return tinyint $value  
     */
    public function get_sw_successful()
    {
        return (isset($this->_sw_successful)) ? $this->_sw_successful : null;
    }

}
