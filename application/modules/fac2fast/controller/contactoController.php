<?php

namespace application\modules\fac2fast\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ContactoController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 10-05-2018 06:09:56,
  |
 */

class ContactoController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_contacto;

     public function __construct()
    {
        parent::__construct();
         $this->_contacto= New \application\modules\fac2fast\model\ContactoModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_contacto;
        \kerana\View::showView($this->_current_module, 'contacto/index', 
                ['rsContactos' => $this->_contacto->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_contacto;
        $params = [];
        \kerana\View::showForm($this->_current_module,'contacto/add',$params,$this->_contacto);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_contacto->savePost()) ? \helpers\Redirect::to('/fac2fast/contacto/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_contacto->_setIdTableValue($id);
        $params['rsContacto'] = $this->_contacto->getRecord();
        \kerana\View::showView($this->_current_module,'contacto/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_contacto->_setIdTableValue($id);
         \kerana\View::$model = $this->_contacto;
        $params['rs'] = $this->_contacto->getRecord();
        \kerana\View::showForm($this->_current_module,'contacto/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_contacto->_setIdTableValue($id);
        ($this->_contacto->savePost()) ? \helpers\Redirect::to('/fac2fast/contacto/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_contacto->_setIdTableValue($id);
        ($this->_contacto->delete()) ? \helpers\Redirect::to('/fac2fast/contacto/index') : '';
    }

}