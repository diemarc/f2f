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
  | Class MailAccountTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for sys_mail_account
  | @author kerana,
  | @date 24-05-2018 04:20:55,
  |
 */

abstract class MailAccountTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_mail_account  */
            $_id_mail_account,
            /** @var varchar(45), $account  */
            $_account,
            /** @var varchar(150), $mail_address  */
            $_mail_address,
            /** @var varchar(150), $mail_username  */
            $_mail_username,
            /** @var blob(), $mail_password  */
            $_mail_password,
            /** @var varchar(150), $mail_smtp_server  */
            $_mail_smtp_server,
            /** @var tinyint(1), $mail_smtp_auth  */
            $_mail_smtp_auth,
            /** @var int(2), $mail_smtp_port  */
            $_mail_smtp_port,
            /** Master query for mailaccount */
            $_query_mailaccount;
    public
    /** @array data matching attributes with table field */
            $data_mailaccount;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_mail_account';
        $this->table_id = 'id_mail_account';

        $this->pks = [
            'id_mail_account' => $this->_id_mail_account,
        ];

        $this->_query = ' SELECT A.id_mail_account,A.account,A.mail_address,'
                . ' A.mail_username,A.mail_password,A.mail_smtp_server,A.mail_smtp_auth,'
                . ' A.mail_smtp_port'
                . ' FROM sys_mail_account A '
                . ' WHERE A.id_mail_account IS NOT NULL ';
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
     * Insert/update new record into sys_mail_account
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveMailAccount()
    {
        
        $this->_query = 'INSERT INTO '.$this->table_name.' '
                . '('
                . ' account,mail_address,mail_username, mail_password,mail_smtp_server,'
                . ' mail_smtp_auth,mail_smtp_port'
                . ')'
                . ' VALUES '
                 . '('
                . ' :account,:mail_address,:mail_username, AES_ENCRYPT(:password,:aes_key),'
                . ' :mail_smtp_server,'
                . ' :mail_smtp_auth,:mail_smtp_port'
                . ')';
        
        $this->_binds = [
            ':account' => $this->_account,
            ':mail_address' => $this->_mail_address,
            ':mail_username' => $this->_mail_username,
            ':mail_smtp_server' => $this->_mail_smtp_server,
            ':mail_smtp_auth' => 1,
            ':mail_smtp_port' => $this->_mail_smtp_port,
            ':password' => $this->_mail_password,
            ':aes_key' => $this->_config->get('_aeskey_')
        ];
        
        if(parent::runQuery()){
            $this->set_id_mail_account($this->_db->lastInsertId());
        }
    }

    /*
      |-------------------------------------------------------------------------
      | SETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_mail_account
     * ------------------------------------------------------------------------- 
     * @param int $value the id_mail_account value 
     */
    public function set_id_mail_account($value = "")
    {
        $this->_id_mail_account = \helpers\Validator::valInt('f_id_mail_account', $value, true);
        $this->_id_value = $this->_id_mail_account;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for account
     * ------------------------------------------------------------------------- 
     * @param varchar $value the account value 
     */
    public function set_account($value = "")
    {
        $this->_account = \helpers\Validator::valVarchar('f_account', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for mail_address
     * ------------------------------------------------------------------------- 
     * @param varchar $value the mail_address value 
     */
    public function set_mail_address($value = "")
    {
        $this->_mail_address = \helpers\Validator::valVarchar('f_mail_address', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for mail_username
     * ------------------------------------------------------------------------- 
     * @param varchar $value the mail_username value 
     */
    public function set_mail_username($value = "")
    {
        $this->_mail_username = \helpers\Validator::valVarchar('f_mail_username', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for mail_password
     * ------------------------------------------------------------------------- 
     * @param blob $value the mail_password value 
     */
    public function set_mail_password($value = "")
    {
        $this->_mail_password = \helpers\Validator::valVarchar('f_mail_password', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for mail_smtp_server
     * ------------------------------------------------------------------------- 
     * @param varchar $value the mail_smtp_server value 
     */
    public function set_mail_smtp_server($value = "")
    {
        $this->_mail_smtp_server = \helpers\Validator::valVarchar('f_mail_smtp_server', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for mail_smtp_auth
     * ------------------------------------------------------------------------- 
     * @param tinyint $value the mail_smtp_auth value 
     */
    public function set_mail_smtp_auth($value = "")
    {
        $this->_mail_smtp_auth = \helpers\Validator::valTinyint('f_mail_smtp_auth', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for mail_smtp_port
     * ------------------------------------------------------------------------- 
     * @param int $value the mail_smtp_port value 
     */
    public function set_mail_smtp_port($value = "")
    {
        $this->_mail_smtp_port = \helpers\Validator::valInt('f_mail_smtp_port', $value, true);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_mail_account
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_mail_account()
    {
        return (isset($this->_id_mail_account)) ? $this->_id_mail_account : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for account
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_account()
    {
        return (isset($this->_account)) ? $this->_account : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for mail_address
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_mail_address()
    {
        return (isset($this->_mail_address)) ? $this->_mail_address : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for mail_username
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_mail_username()
    {
        return (isset($this->_mail_username)) ? $this->_mail_username : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for mail_password
     * ------------------------------------------------------------------------- 
     * @return blob $value  
     */
    public function get_mail_password()
    {
        return (isset($this->_mail_password)) ? $this->_mail_password : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for mail_smtp_server
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_mail_smtp_server()
    {
        return (isset($this->_mail_smtp_server)) ? $this->_mail_smtp_server : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for mail_smtp_auth
     * ------------------------------------------------------------------------- 
     * @return tinyint $value  
     */
    public function get_mail_smtp_auth()
    {
        return (isset($this->_mail_smtp_auth)) ? $this->_mail_smtp_auth : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for mail_smtp_port
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_mail_smtp_port()
    {
        return (isset($this->_mail_smtp_port)) ? $this->_mail_smtp_port : null;
    }

}
