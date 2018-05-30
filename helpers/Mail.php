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

/**
 * -----------------------------------------------------------------------------
 * Mail helper for kerana
 * ------------------------------------------------------------------------------
 * @author diemarc
 */
class Mail
{

    private

    /** @object, instancia de phpmailer */
            $_phpmailer,
            /** @object, instancia del modelo de cuentas de correo */
            $_cuenta,
            /** @object, instancia del modelo de registros de logs */
            $_log_mail;
    public

    /** @var int, id de la cuenta que va aneivar */
            $mailman_id_cuenta,
            /** @var mixed, direccion desde donde se envia el mail */
            $mailman_cuenta,
            /** @var mixed, configuracion host de la cuenta */
            $mailman_host,
            /** @var mixed, nombre de la campaña */
            $mailman_from_name,
            /** @var int, puerto que usa la cuenta */
            $mailman_port,
            /** @boolean , si necesita autentificacion el smtp */
            $mailman_smtp_auth = true,
            /** @var mixed, usuario de la cuenta de mail */
            $mailman_username,
            /** @password , pass de la cuenta */
            $mailman_password,
            /** @mixed , si la cuenta necesita tls */
            $mailman_smtp_secure,
            /** @mixed , asunto del correo */
            $mailman_subject,
            /** @var mixed , body del correo */
            $mailman_body,
            /** @var mixed, direccion de destino */
            $mailman_address,
            /** @var int, id de la campaña */
            $mailman_id_campania,
            /** @var int, id de la direccion de destino */
            $mailman_id_destino;

    public function __construct()
    {
        $this->_phpmailer = new \PHPMailer\PHPMailer\PHPMailer();
        $this->_cuenta = new \application\modules\system\model\CuentasMailModel();
        $this->_log_mail = new \application\modules\marketing\model\CampaniaMailLogModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Inicia, configura mailman.
     * -------------------------------------------------------------------------
     */
    public function init($id_cuenta)
    {
        $this->mailman_id_cuenta = $id_cuenta;
        $this->setupMailMan();
        $this->_setupPhpMailer();
        $this->_setupLogParameters();
     
    }

    /**
     * -------------------------------------------------------------------------
     * Inicia los parametros para los registros de log de envios
     * -------------------------------------------------------------------------
     */
    private function _setupLogParameters()
    {
       $this->_log_mail->id_cuenta_mail = $this->mailman_id_cuenta;
       $this->_log_mail->id_campania = $this->mailman_id_campania;
        
    }

    /**
     * -------------------------------------------------------------------------
     * Setea que cuenta envia el correo
     * -------------------------------------------------------------------------
     * @param type $id_cuenta
     */
    protected function _setMailMan()
    {

        $this->_cuenta->_setIdTableValue($this->mailman_id_cuenta);
    }

    /**
     * -------------------------------------------------------------------------
     * Seta la direccion de envio solo si es una direccion valida, sino
     * lo descarta poniendo un estado 2, al destino de la campania
     * -------------------------------------------------------------------------
     * @param type $address
     */
    public function setAddress($address)
    {

        // establecemos el id_mail_destino
        $this->_log_mail->id_destino = $this->mailman_id_destino;
        
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            
            // descartamos el mail
            $this->_log_mail->string_log = 'Descartado mail invalido';
            $this->_log_mail->registerLogMail(2);
        } else {
            $this->mailman_address = $address;
            $this->_phpmailer->addAddress($address);
        }
    }

    /**
     * -------------------------------------------------------------------------
     * Setea los valores iniciales para que funcione el envio
     * -------------------------------------------------------------------------
     */
    protected function setupMailMan()
    {

        $this->_setMailMan();
        $confCuenta = $this->_cuenta->getConfCuenta();

        $this->mailman_cuenta = $confCuenta->direccion;
        $this->mailman_host = $confCuenta->servidor_saliente;
        $this->mailman_port = $confCuenta->smtp_port;
        $this->mailman_smtp_auth = $confCuenta->smtp_auth;
        $this->mailman_username = $confCuenta->usuario;
        $this->mailman_password = $confCuenta->pass_decrypt;
    }

    /**
     * -------------------------------------------------------------------------
     * Setea los valores a phpMailer
     * -------------------------------------------------------------------------
     */
    private function _setupPhpMailer()
    {

        $this->_phpmailer->SMTPDebug = 3;
        $this->_phpmailer->isSMTP();
        $this->_phpmailer->Host = $this->mailman_host;
        $this->_phpmailer->SMTPAuth = $this->mailman_smtp_auth;
        $this->_phpmailer->Username = $this->mailman_username;
        $this->_phpmailer->Password = $this->mailman_password;
        $this->_phpmailer->Port = $this->mailman_port;
        $this->_phpmailer->isHTML(true);
        $this->_phpmailer->From = $this->mailman_cuenta;
        $this->_phpmailer->FromName = $this->mailman_from_name;
        $this->_phpmailer->Body = $this->mailman_body;
        $this->_phpmailer->Subject = $this->mailman_subject;
    }

    
    /**
     * -------------------------------------------------------------------------
     * Envia un mail
     * -------------------------------------------------------------------------
     */
    public function sendMail()
    {
        
        // si algo falla registramos el error
        if (!$this->_phpmailer->send()) {
            $this->_log_mail->string_log = $this->_phpmailer->ErrorInfo;
            $this->_log_mail->registerLogMail(3);
            
        } else {
            // registramos el envio correo de mail
            $this->_log_mail->string_log = 'Enviado correctamente';
            $this->_log_mail->registerLogMail(1);
        }
    }

}
