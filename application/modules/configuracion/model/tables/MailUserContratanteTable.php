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
  | Class MailUserContratanteTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for user_contratante_mail
  | @author kerana,
  | @date 24-05-2018 04:23:02,
  |
 */

abstract class MailUserContratanteTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_mail_account  */
            $_id_mail_account,
            /** @var int(11), $id_user  */
            $_id_user,
            /** @var int(11), $id_contratante  */
            $_id_contratante,
            /** Master query for mailusercontratante */
            $_query_mailusercontratante;
    public
    /** @array data matching attributes with table field */
            $data_mailusercontratante;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_contratante_mail';
        $this->table_id = 'id_mail_account';

        $this->pks = [
            'id_mail_account' => $this->_id_mail_account,
            'id_user' => $this->_id_user,
            'id_contratante' => $this->_id_contratante,
        ];

        
        $this->_id_contratante = $_SESSION['f2f_id_contratante'];
        
        $this->_query = ' SELECT A.id_mail_account,A.id_user,A.id_contratante,B.account,'
                . ' B.mail_address,B.mail_username,B.mail_password,B.mail_smtp_server,'
                . ' B.mail_smtp_auth,B.mail_smtp_port,B.mail_from_name,'
                . ' D.username, D.name,D.lastname '
                . ' FROM user_contratante_mail A '
                . ' INNER JOIN sys_mail_account B ON (B.id_mail_account = A.id_mail_account) '
                . ' INNER JOIN user_contratante C ON (C.id_user = A.id_user AND A.id_contratante = C.id_contratante)'
                . ' INNER JOIN sys_user D ON (A.id_user = D.id_user) '
                . ' WHERE A.id_mail_account IS NOT NULL '
                . ' AND A.id_contratante = :id_contratante ';
        
         $this->_binds[':id_contratante'] = $this->_id_contratante;


        
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
     * Insert/update new record into user_contratante_mail
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveMailUserContratante()
    {

        $data_insert = [
            'id_mail_account' => $this->_id_mail_account,
            'id_user' => $this->_id_user,
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
     * Setter for id_mail_account
     * ------------------------------------------------------------------------- 
     * @param int $value the id_mail_account value 
     */
    public function set_id_mail_account($value = "")
    {
        $this->_id_mail_account = \helpers\Validator::valInt('f_id_mail_account', $value, TRUE);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_user
     * ------------------------------------------------------------------------- 
     * @param int $value the id_user value 
     */
    public function set_id_user($value = "")
    {
        $this->_id_user = \helpers\Validator::valInt('f_id_user', $value, TRUE);
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
     * Getter for id_contratante
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_contratante()
    {
        return (isset($this->_id_contratante)) ? $this->_id_contratante : null;
    }

}
