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

namespace application\modules\system\model;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class MailAccountModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for MailAccountTable
  | model to set mail settings
  | @author kerana,
  | @date 24-05-2018 04:20:55,
  |
 */

class MailAccountModel extends tables\MailAccountTable
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function saveNewAccount()
    {
        $this->set_account();
        $this->set_mail_address();
        $this->set_mail_username();
        $this->set_mail_password();
        $this->set_mail_smtp_server();
        $this->set_mail_smtp_auth();
        $this->set_mail_smtp_port();
        $this->set_mail_from_name();

        return parent::saveMailAccount();
    }

}
