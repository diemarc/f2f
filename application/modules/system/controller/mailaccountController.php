<?php

namespace application\modules\system\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class MailaccountController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 24-05-2018 04:20:55,
  |
 */

class MailaccountController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_mailaccount;

     public function __construct()
    {
        parent::__construct();
         $this->_mailaccount= New \application\modules\system\model\MailAccountModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_mailaccount;
        \kerana\View::showView($this->_current_module, 'mailaccount/index', 
                ['rsMailaccounts' => $this->_mailaccount->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_mailaccount;
        $params = [];
        \kerana\View::showForm($this->_current_module,'mailaccount/add',$params,$this->_mailaccount);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_mailaccount->savePost()) ? \helpers\Redirect::to('/system/mailaccount/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_mailaccount->_setIdTableValue($id);
        $params['rsMailaccount'] = $this->_mailaccount->getRecord();
        \kerana\View::showView($this->_current_module,'mailaccount/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_mailaccount->_setIdTableValue($id);
         \kerana\View::$model = $this->_mailaccount;
        $params['rs'] = $this->_mailaccount->getRecord();
        \kerana\View::showForm($this->_current_module,'mailaccount/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_mailaccount->_setIdTableValue($id);
        ($this->_mailaccount->savePost()) ? \helpers\Redirect::to('/system/mailaccount/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_mailaccount->_setIdTableValue($id);
        ($this->_mailaccount->delete()) ? \helpers\Redirect::to('/system/mailaccount/index') : '';
    }

}