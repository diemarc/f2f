<?php

namespace application\modules\fac2fast\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class EmpresaController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 19-03-2018 17:47:07,
  |
 */

class EmpresaController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_empresa;

     public function __construct()
    {
        parent::__construct();
         $this->_empresa= New \application\modules\fac2fast\model\EmpresaModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_empresa;
        \kerana\View::showView($this->_current_module, 'empresa/index', 
                ['rsEmpresas' => $this->_empresa->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_empresa;
        $params = [
 "rsEstados"=> $this->_empresa->objEstadoModel->getAll(), 

 "rsPoblacions"=> $this->_empresa->objPoblacionModel->getAll(), 
];
        \kerana\View::showForm($this->_current_module,'empresa/add',$params,$this->_empresa);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_empresa->savePost()) ? \helpers\Redirect::to('/fac2fast/empresa/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_empresa->_setIdTableValue($id);
        $params['rsEmpresa'] = $this->_empresa->getRecord();
        \kerana\View::showView($this->_current_module,'empresa/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_empresa->_setIdTableValue($id);
         \kerana\View::$model = $this->_empresa;
        $params['rs'] = $this->_empresa->getRecord();
        \kerana\View::showForm($this->_current_module,'empresa/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_empresa->_setIdTableValue($id);
        ($this->_empresa->savePost()) ? \helpers\Redirect::to('/fac2fast/empresa/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_empresa->_setIdTableValue($id);
        ($this->_empresa->delete()) ? \helpers\Redirect::to('/fac2fast/empresa/index') : '';
    }

}