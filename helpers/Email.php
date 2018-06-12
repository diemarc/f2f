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
            /** @array mail attachments */
            $_attachments = [],
            /** @object , log model */
            $_sys_log,
            $_log_message,
            $_log_successful;

    public function __construct(\kerana\Ada $mail)
    {
        // create a new phpmailer object
        $this->_phpmailer = new \PHPMailer\PHPMailer\PHPMailer();

        // create a new object mail,and get data
        $this->_object_mail_resource = $mail;
        $this->_email_data = $this->_object_mail_resource->getMailWithSettings();

        // object syslog
        $this->_sys_log = new \application\modules\system\model\SyslogModel();

        // set the mail stuff,settings,mails,addres,etc
        $this->_setupMail();
    }

    /**
     * -------------------------------------------------------------------------
     * Send a email
     * -------------------------------------------------------------------------
     */
    public function send()
    {

        $this->_checkAndAddAttachments();
        if ($this->_phpmailer->send()) {
            $this->_log_successful = '1'; // successfully
            $this->_log_message = 'Mail ' . $this->_email_data->id_email . ' sended ';
            $this->_registerLogMail();
        } else {
            $this->_log_successful = '2'; //error 
            $this->_log_message = 'Mail ' . $this->_email_data->id_email . ' failed to send with response "' . $this->_phpmailer->ErrorInfo . ' "';
            $this->_registerLogMail();
        }
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
        $this->_phpmailer->SMTPSecure = $this->_email_data->mail_smtp_secure;
        $this->_phpmailer->Port = $this->_email_data->mail_smtp_port;
        $this->_phpmailer->isHTML(true);
        $this->_phpmailer->From = $this->_email_data->mail_address;
        $this->_phpmailer->FromName = $this->_email_data->mail_from_name;
        $this->_phpmailer->Body = $this->_email_data->body;
        $this->_phpmailer->Subject = $this->_email_data->subject;
        $this->_setAddress();
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
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                \kerana\Exceptions::showError('Mailing', $to . ' is not a valid email...');
            } else {
                $this->_phpmailer->addAddress($to);
            }

        endforeach;

        // add bccs
        if (!empty($bccs)) {
            foreach ($bccs AS $bcc):
                if (!filter_var($bcc, FILTER_VALIDATE_EMAIL)) {
                    \kerana\Exceptions::showError('Mailing', $bcc . ' is not a valid email...');
                } else {
                    $this->_phpmailer->addBCC($bcc);
                }

            endforeach;
        }
    }

    /**
     * -------------------------------------------------------------------------
     * Check And set the availables attachments
     * -------------------------------------------------------------------------
     */
    private function _checkAndAddAttachments()
    {
        if (count($this->_attachments) > 0) {
            foreach ($this->_attachments AS $attach):
                $this->_phpmailer->addAttachment(__DOCUMENTROOT__ . '/../data/' . $attach);
            endforeach;
        }

    }

    /**
     * -------------------------------------------------------------------------
     * Add attachments
     * -------------------------------------------------------------------------
     */
    public function setAttachment($file)
    {
        $attachment = realpath(__DOCUMENTROOT__ . '/../data/' . $file);
        if (!empty($attachment)) {
            array_push($this->_attachments, $file);
        }
    }

    /**
     * -------------------------------------------------------------------------
     * Add entry to log system
     * -------------------------------------------------------------------------
     */
    private function _registerLogMail()
    {
        $this->_sys_log->set_log_type('email');
        $this->_sys_log->set_message_log($this->_log_message);
        $this->_sys_log->set_sw_successful($this->_log_successful);
        $this->_sys_log->saveSyslog();
    }

}
