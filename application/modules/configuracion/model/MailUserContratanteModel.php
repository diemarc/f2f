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

namespace application\modules\configuracion\model;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class MailUserContratanteModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for MailUserContratanteTable
  | link table for mail account and user contratante table.
  | @author kerana,
  | @date 24-05-2018 04:23:02,
  |
 */

class MailUserContratanteModel extends tables\MailUserContratanteTable
{

    public
    /** @object MailAccountModel  */
            $objMailAccountModel,
            /** @object UserContratanteModel  */
            $objUserContratanteModel;

    public function __construct()
    {
        parent::__construct();
        $this->objMailAccountModel = new \application\modules\system\model\MailAccountModel();
    }

   
    
    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        
        // first save the new account
        $this->objMailAccountModel->saveNewAccount();
        $this->set_id_mail_account($this->objMailAccountModel->get_id_mail_account());
        $this->set_id_user($_SESSION['id_user']);

        return parent::saveMailUserContratante();
    }

}
