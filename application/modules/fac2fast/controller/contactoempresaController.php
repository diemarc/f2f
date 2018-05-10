<?php

namespace application\modules\fac2fast\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ContactoempresaController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 10-05-2018 06:10:39,
  |
 */

class ContactoempresaController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_contactoempresa;

     public function __construct()
    {
        parent::__construct();
         $this->_contactoempresa= New \application\modules\fac2fast\model\ContactoEmpresaModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_contactoempresa;
        \kerana\View::showView($this->_current_module, 'contactoempresa/index', 
                ['rsContactoempresas' => $this->_contactoempresa->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_contactoempresa;
        $params = [
 "rsContactos"=> $this->_contactoempresa->objContactoModel->getAll(), 

 "rsEmpresacontratantes"=> $this->_contactoempresa->objEmpresaContratanteModel->getAll(), 

 "rsEmpresacontratantes"=> $this->_contactoempresa->objEmpresaContratanteModel->getAll(), 
];
        \kerana\View::showForm($this->_current_module,'contactoempresa/add',$params,$this->_contactoempresa);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_contactoempresa->savePost()) ? \helpers\Redirect::to('/fac2fast/contactoempresa/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_contactoempresa->_setIdTableValue($id);
        $params['rsContactoempresa'] = $this->_contactoempresa->getRecord();
        \kerana\View::showView($this->_current_module,'contactoempresa/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_contactoempresa->_setIdTableValue($id);
         \kerana\View::$model = $this->_contactoempresa;
        $params['rs'] = $this->_contactoempresa->getRecord();
        \kerana\View::showForm($this->_current_module,'contactoempresa/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_contactoempresa->_setIdTableValue($id);
        ($this->_contactoempresa->savePost()) ? \helpers\Redirect::to('/fac2fast/contactoempresa/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_contactoempresa->_setIdTableValue($id);
        ($this->_contactoempresa->delete()) ? \helpers\Redirect::to('/fac2fast/contactoempresa/index') : '';
    }

}