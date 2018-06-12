<?php

namespace application\modules\system\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class SyslogController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 12-06-2018 05:57:48,
  |
 */

class SyslogController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected $_syslog;

    public function __construct()
    {
        parent::__construct();
        $this->_syslog = New \application\modules\system\model\SyslogModel();
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
        \kerana\View::$model = $this->_syslog;
        \kerana\View::showView($this->_current_module, 'syslog/index', ['rsSyslogs' => $this->_syslog->getAll()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::$model = $this->_syslog;
        $params = [];
        \kerana\View::showForm($this->_current_module, 'syslog/add', $params, $this->_syslog);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        ($this->_syslog->savePost()) ? \helpers\Redirect::to('/system/syslog/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_syslog->_setIdTableValue($id);
        $params['rsSyslog'] = $this->_syslog->getRecord();
        \kerana\View::showView($this->_current_module, 'syslog/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_syslog->_setIdTableValue($id);
        \kerana\View::$model = $this->_syslog;
        $params['rs'] = $this->_syslog->getRecord();
        \kerana\View::showForm($this->_current_module, 'syslog/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_syslog->_setIdTableValue($id);
        ($this->_syslog->savePost()) ? \helpers\Redirect::to('/system/syslog/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_syslog->_setIdTableValue($id);
        ($this->_syslog->delete()) ? \helpers\Redirect::to('/system/syslog/index') : '';
    }

}
