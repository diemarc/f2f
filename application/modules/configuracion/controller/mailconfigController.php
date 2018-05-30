<?php

namespace application\modules\configuracion\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class MailusercontratanteController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 24-05-2018 04:23:02,
  |
 */

class MailconfigController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected $_mailusercontratante;

    public function __construct()
    {
        parent::__construct();
        $this->_mailusercontratante = New \application\modules\configuracion\model\MailUserContratanteModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index()
    {

        \kerana\View::showView($this->_current_module, 'mailusercontratante/index', ['rsMailusercontratantes' => $this->_mailusercontratante->getMailsContratante()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::showForm($this->_current_module, 'mailusercontratante/add', []);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        ($this->_mailusercontratante->savePost()) ? \helpers\Redirect::to('/configuracion/mailconfig/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_mailusercontratante->_setIdTableValue($id);
        $params['rsMailusercontratante'] = $this->_mailusercontratante->getRecord();
        \kerana\View::showView($this->_current_module, 'mailusercontratante/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_mailusercontratante->_setIdTableValue($id);
        \kerana\View::$model = $this->_mailusercontratante;
        $params['rs'] = $this->_mailusercontratante->getRecord();
        \kerana\View::showForm($this->_current_module, 'mailusercontratante/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_mailusercontratante->_setIdTableValue($id);
        ($this->_mailusercontratante->savePost()) ? \helpers\Redirect::to('/configuracion/mailusercontratante/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_mailusercontratante->_setIdTableValue($id);
        ($this->_mailusercontratante->delete()) ? \helpers\Redirect::to('/configuracion/mailusercontratante/index') : '';
    }

}
