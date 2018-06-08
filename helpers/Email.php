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

namespace helpers;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');

namespace helpers;

/**
 * -----------------------------------------------------------------------------
 * Mail
 * ------------------------------------------------------------------------------
 * @author diemarc
 */
class Email
{

    private

    /** @object, instance of mail model */
            $_object_mail_resource,
            /** @object, instance of phpmailer */
            $_phpmailer,
            /** @var mixed, resultset for a datamail */
            $_email_data,
            /** @var */
            /** @object , log model */
            $_mail_log;

    public function __construct(\kerana\Ada $mail)
    {
        $this->_phpmailer = new \PHPMailer\PHPMailer\PHPMailer();
        $this->_object_mail_resource = $mail;
        $this->_email_data = $this->_object_mail_resource->getMailWithSettings();
        $this->_setupMail();
        $this->_setAddress();
    }

    /**
     * -------------------------------------------------------------------------
     * Send a email
     * -------------------------------------------------------------------------
     */
    public function send()
    {
        $this->_phpmailer->send();
    }

    /**
     * -------------------------------------------------------------------------
     * Setup email settings to send emails
     * -------------------------------------------------------------------------
     */
    private function _setupMail()
    {

        $this->_phpmailer->SMTPDebug = 3;
        $this->_phpmailer->isSMTP();
        $this->_phpmailer->Host = $this->_email_data->mail_smtp_server;
        $this->_phpmailer->SMTPAuth = $this->_email_data->mail_smtp_auth;
        $this->_phpmailer->Username = $this->_email_data->mail_username;
        $this->_phpmailer->Password = $this->_email_data->pass_decrypt;
        $this->_phpmailer->Port = $this->_email_data->mail_smtp_port;
        $this->_phpmailer->isHTML(true);
        $this->_phpmailer->From = $this->_email_data->mail_address;
        $this->_phpmailer->FromName = 'f2f Team';
        $this->_phpmailer->Body = $this->_email_data->body;
        $this->_phpmailer->Subject = $this->_email_data->subject;
    }

    /**
     * -------------------------------------------------------------------------
     * Set destinations
     * -------------------------------------------------------------------------
     */
    private function _setAddress()
    {

        $address = explode(';', $this->_email_data->destination);
        $bccs = explode(';', $this->_email_data->bcc);

        // add address
        foreach ($address AS $to):
            $this->_phpmailer->addAddress($to);
        endforeach;

        // add bccs
        if (!empty($bccs)) {
            foreach ($bccs AS $bcc):
                $this->_phpmailer->addBCC($bcc);
            endforeach;
        }
    }

}
