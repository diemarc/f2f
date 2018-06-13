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
  | Class MailModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for MailTable
  |
  | @author kerana,
  | @date 07-06-2018 05:05:45,
  |
 */

class MailModel extends tables\MailTable
{

    public
    /** @object MailUserContratanteModel  */
            $objMailUserContratanteModel;

    public function __construct()
    {
        parent::__construct();
        //$this->objMailUserContratanteModel = new \application\modules\configuracion\model\MailUserContratanteModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Save post data
     * -------------------------------------------------------------------------
     */
    public function savePost()
    {
        $this->set_id_mail_account();
        $this->set_id_contratante();
        $this->set_id_user();
        $this->set_subject();
        $this->set_body();
        $this->set_created_at();
        $this->set_created_by();

        return parent::saveMail();
    }

    /**
     * -------------------------------------------------------------------------
     * Create and send a test mail
     * -------------------------------------------------------------------------
     */
    public function processTestMail()
    {

        // first create a entry in mail table
        $this->set_subject('f2F config test');
        $this->set_body('just testing!');
        //$this->set_destination('diemarc.os@gmail.com;dgarcia@iprprevencion.es');
        $this->set_destination('sys@iprprevencion.es');

        parent::saveMail();

        // send this email
        $email = new \helpers\Email($this);
        $email->setAttachment('add.pdf');
        // $email->setAttachments('add3.pdf');
        //$email->send();
    }

}
