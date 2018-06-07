<?php

namespace application\modules\configuracion\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class MailController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 07-06-2018 05:05:46,
  |
 */

class MailController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected $_mail;

    public function __construct()
    {
        parent::__construct();
        $this->_mail = New \application\modules\configuracion\model\MailModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index()
    {

        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_mail;
        \kerana\View::showView($this->_current_module, 'mail/index', ['rsMails' => $this->_mail->getAll()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::$model = $this->_mail;
        $params = [
            "rsMailusercontratantes" => $this->_mail->objMailUserContratanteModel->getAll(),
            "rsMailusercontratantes" => $this->_mail->objMailUserContratanteModel->getAll(),
            "rsMailusercontratantes" => $this->_mail->objMailUserContratanteModel->getAll(),
        ];
        \kerana\View::showForm($this->_current_module, 'mail/add', $params, $this->_mail);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        ($this->_mail->savePost()) ? \helpers\Redirect::to('/configuracion/mail/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_mail->_setIdTableValue($id);
        $params['rsMail'] = $this->_mail->getRecord();
        \kerana\View::showView($this->_current_module, 'mail/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_mail->_setIdTableValue($id);
        \kerana\View::$model = $this->_mail;
        $params['rs'] = $this->_mail->getRecord();
        \kerana\View::showForm($this->_current_module, 'mail/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_mail->_setIdTableValue($id);
        ($this->_mail->savePost()) ? \helpers\Redirect::to('/configuracion/mail/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_mail->_setIdTableValue($id);
        ($this->_mail->delete()) ? \helpers\Redirect::to('/configuracion/mail/index') : '';
    }

    
    /**
     * -------------------------------------------------------------------------
     * Send a testing mail 
     * -------------------------------------------------------------------------
     */
    public function sendTestMail($id_mail_account){
        
        $this->_mail->set_id_mail_account($id_mail_account);
        return $this->_mail->processTestMail();
        
    }
    
    
}
