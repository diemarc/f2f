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
  | Class MailTable
  |-----------------------------------------------------------------------------
  |
  | Persistance layer for sys_email
  | @author kerana,
  | @date 07-06-2018 05:05:45,
  |
 */

abstract class MailTable extends \kerana\Ada
{

    protected
    /** @var int(11), $id_email  */
            $_id_email,
            /** @var int(11), $id_mail_account  */
            $_id_mail_account,
            /** @var int(11), $id_contratante  */
            $_id_contratante,
            /** @var int(11), $id_user  */
            $_id_user,
            /** @var TEXT, $destination  */
            $_destination,
            /** @var TEXT, $bcc  */
            $_bcc,
            /** @var varchar(45), $subject  */
            $_subject,
            /** @var text(), $body  */
            $_body,
            /** @var time(tamp), $created_at  */
            $_created_at,
            /** @var int(11), $created_by  */
            $_created_by,
            /** Master query for mail */
            $_query_mail;
    public
    /** @array data matching attributes with table field */
            $data_mail;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_email';
        $this->table_id = 'id_email';

        $this->pks = [
            'id_email' => $this->_id_email,
        ];

        $this->set_id_contratante($_SESSION['f2f_id_contratante']);
        $this->set_id_user($_SESSION['id_user']);

        $this->_query = ' SELECT A.id_email,A.id_mail_account,A.id_contratante,'
                . ' A.id_user,A.subject,A.body,A.created_at,A.created_by,'
                . ' A.destination,A.bcc,B2.account,B2.mail_address'
                . ' FROM sys_email A '
                . ' INNER JOIN user_contratante_mail B ON (B.id_mail_account = A.id_mail_account) '
                . ' INNER JOIN sys_mail_account B2 ON (B2.id_mail_account = B.id_mail_account) '
                . ' INNER JOIN user_contratante B3 ON (B3.id_user = B.id_user) '
                . ' INNER JOIN sys_user B35 ON (B35.id_user = B3.id_user) '
                . ' WHERE A.id_email IS NOT NULL ';
    }

    /*
      |-------------------------------------------------------------------------
      | SELECT-METHODS
      |-------------------------------------------------------------------------
      |
     */

    public function getMail()
    {
        
        $this->_query = $this->_query . ' AND A.id_contratante = :id_contratante ';
        $this->_binds[':id_contratante'] = $this->_id_contratante;
   
        return $this->getRecord();
    }

    
    /**
     * -------------------------------------------------------------------------
     * Get the mail with settings configurations to send
     * -------------------------------------------------------------------------
     * @return type
     */
    public function getMailWithSettings(){
        
        $query = 'SELECT A.id_email,A.id_mail_account,A.id_contratante,A.destination,A.bcc,'
                . ' A.id_user,A.subject,A.body,A.created_at,A.created_by,B2.account,'
                . ' B2.mail_address,B2.mail_username,B2.mail_password,B2.mail_smtp_server,'
                . ' B2.mail_smtp_auth,B2.mail_smtp_port,B2.mail_from_name,'
                . ' CAST(AES_DECRYPT(B2.mail_password,:secret)AS CHAR) AS pass_decrypt'
                . ' FROM sys_email A '
                . ' INNER JOIN user_contratante_mail B ON (B.id_mail_account = A.id_mail_account) '
                . ' INNER JOIN sys_mail_account B2 ON (B2.id_mail_account = B.id_mail_account) '
                . ' WHERE A.id_email = :id_mail'
                . ' AND A.id_contratante = :id_contratante '
                . ' LIMIT 1 ';
        
        $binds = [
            ':id_mail' => $this->get_id_email(),
            ':id_contratante' => $this->get_id_contratante(),
            ':secret' => $this->_config->get('_aeskey_')
        ];
        
        return $this->getQuery('one', $query, $binds);
        
    }
    
    /*
      |-------------------------------------------------------------------------
      | INSERT-UPDATE-METHODS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * -------------------------------------------------------------------------
     * Insert/update new record into sys_email
     * -------------------------------------------------------------------------
     * @return boolean
     */
    public function saveMail()
    {

        $data_insert = [
            'id_mail_account' => $this->_id_mail_account,
            'id_contratante' => $this->_id_contratante,
            'id_user' => $this->_id_user,
            'destination' => $this->_destination,
            'bcc' => $this->_bcc,
            'subject' => $this->_subject,
            'body' => $this->_body,
            'created_at' => $this->_created_at,
            'created_by' => $this->_created_by,
        ];
        parent::save($data_insert, false);
        $this->set_id_email($this->_id_value);
    }

    /*
      |-------------------------------------------------------------------------
      | SETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_email
     * ------------------------------------------------------------------------- 
     * @param int $value the id_email value 
     */
    public function set_id_email($value = "")
    {
        $this->_id_email = \helpers\Validator::valInt('f_id_email', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_mail_account
     * ------------------------------------------------------------------------- 
     * @param int $value the id_mail_account value 
     */
    public function set_id_mail_account($value = "")
    {
        $this->_id_mail_account = \helpers\Validator::valInt('f_id_mail_account', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_contratante
     * ------------------------------------------------------------------------- 
     * @param int $value the id_contratante value 
     */
    public function set_id_contratante($value = "")
    {
        $this->_id_contratante = \helpers\Validator::valInt('f_id_contratante', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for id_user
     * ------------------------------------------------------------------------- 
     * @param int $value the id_user value 
     */
    public function set_id_user($value = "")
    {
        $this->_id_user = \helpers\Validator::valInt('f_id_user', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for subject
     * ------------------------------------------------------------------------- 
     * @param varchar $value the subject value 
     */
    public function set_subject($value = "")
    {
        $this->_subject = \helpers\Validator::valVarchar('f_subject', $value, true);
    }
    /**
     * ------------------------------------------------------------------------- 
     * Setter for destination
     * ------------------------------------------------------------------------- 
     * @param varchar $value the destination value 
     */
    public function set_destination($value = "")
    {
        $this->_destination = \helpers\Validator::valText('f_destination', $value, true);
    }
    /**
     * ------------------------------------------------------------------------- 
     * Setter for bcc
     * ------------------------------------------------------------------------- 
     * @param varchar $value the bcc value 
     */
    public function set_bcc($value = "")
    {
        $this->_bcc = \helpers\Validator::valText('f_bcc', $value, false);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for body
     * ------------------------------------------------------------------------- 
     * @param text $value the body value 
     */
    public function set_body($value = "")
    {
        $this->_body = \helpers\Validator::valText('f_body', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_at
     * ------------------------------------------------------------------------- 
     * @param time $value the created_at value 
     */
    public function set_created_at($value = "")
    {
        $this->_created_at = \helpers\Validator::valTime('f_created_at', $value, true);
    }

    /**
     * ------------------------------------------------------------------------- 
     * Setter for created_by
     * ------------------------------------------------------------------------- 
     * @param int $value the created_by value 
     */
    public function set_created_by($value = "")
    {
        $this->_created_by = \helpers\Validator::valInt('f_created_by', $value, false);
    }

    /*
      |-------------------------------------------------------------------------
      | GETTERS
      |-------------------------------------------------------------------------
      |
     */

    /**
     * ------------------------------------------------------------------------- 
     * Getter for id_email
     * ------------------------------------------------------------------------- 
     * @return int $value  
     */
    public function get_id_email()
    {
        return (isset($this->_id_email)) ? $this->_id_email : null;
    }

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
     * Getter for subject
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_subject()
    {
        return (isset($this->_subject)) ? $this->_subject : null;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Getter for destination
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_detination()
    {
        return (isset($this->_destination)) ? $this->_detination : null;
    }
    /**
     * ------------------------------------------------------------------------- 
     * Getter for bcc
     * ------------------------------------------------------------------------- 
     * @return varchar $value  
     */
    public function get_bcc()
    {
        return (isset($this->_bcc)) ? $this->_bcc : null;
    }

    /**
     * ------------------------------------------------------------------------- 
     * Getter for body
     * ------------------------------------------------------------------------- 
     * @return text $value  
     */
    public function get_body()
    {
        return (isset($this->_body)) ? $this->_body : null;
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
     * @return int $value  
     */
    public function get_created_by()
    {
        return (isset($this->_created_by)) ? $this->_created_by : null;
    }

}
