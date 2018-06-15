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

namespace application\modules\fac2fast\model;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class F2fEnvioModel
  |-----------------------------------------------------------------------------
  | Buisiness logic (rules) for F2fEnvioTable
  | Handler for mailing stuf for f2f
  | @author kerana,
  | @date 15-06-2018 06:58:23,
  |
 */

class F2fEnvioModel extends F2fReportModel
{

    protected

    /** @object mail model */
            $_obj_mail_model,
            /** @object factuas estados model */
            $_obj_factura_estado;

    public function __construct()
    {
        parent::__construct();
        $this->_obj_mail_model = new \application\modules\configuracion\model\MailModel();
        $this->_obj_factura_estado = new \application\modules\fac2fast\model\FacturaestadoModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Send the invoice email
     * -------------------------------------------------------------------------
     * @param type $id
     */
    public function sendInvoice($id)
    {
        // parse invoice in pdf
        $this->parseFactura($id, 'F');

        // create a mail entry
        $this->_obj_mail_model->set_id_mail_account(12);
        $this->_obj_mail_model->set_subject('Factura ' . $this->data_invoice['rsFactura']->num_factura . ' emitida');
        $this->_obj_mail_model->set_body('Estimado cliente <br>,f2F le envia esta factura <br> Un saludo <hr> ' . $this->data_invoice['rsFactura']->razon_social);
        $this->_obj_mail_model->set_destination($this->data_invoice['rsFactura']->email);
        $this->_obj_mail_model->saveMail();

        // send this mail
        $email = new \helpers\Email($this->_obj_mail_model);
        $email->setAttachment($this->data_invoice['rsFactura']->num_factura . '.pdf');
        if ($email->send()) {

            // log the new status
            $this->_obj_factura_estado->set_id_facturas($id);
            $this->_obj_factura_estado->set_id_estado(3); // enviado
            $this->_obj_factura_estado->set_created_by($_SESSION['id_user']);
            $this->_obj_factura_estado->saveFacturaestado();
            return true;
        }
    }

}
