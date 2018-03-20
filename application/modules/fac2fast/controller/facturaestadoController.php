<?php

namespace application\modules\fac2fast\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class FacturaestadoController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 20-03-2018 07:54:39,
  |
 */

class FacturaestadoController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_facturaestado;

     public function __construct()
    {
        parent::__construct();
         $this->_facturaestado= New \application\modules\fac2fast\model\FacturaestadoModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_facturaestado;
        \kerana\View::showView($this->_current_module, 'facturaestado/index', 
                ['rsFacturaestados' => $this->_facturaestado->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_facturaestado;
        $params = [
 "rsFacturas"=> $this->_facturaestado->objFacturaModel->getAll(), 

 "rsEstados"=> $this->_facturaestado->objEstadoModel->getAll(), 
];
        \kerana\View::showForm($this->_current_module,'facturaestado/add',$params,$this->_facturaestado);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_facturaestado->savePost()) ? \helpers\Redirect::to('/fac2fast/facturaestado/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_facturaestado->_setIdTableValue($id);
        $params['rsFacturaestado'] = $this->_facturaestado->getRecord();
        \kerana\View::showView($this->_current_module,'facturaestado/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_facturaestado->_setIdTableValue($id);
         \kerana\View::$model = $this->_facturaestado;
        $params['rs'] = $this->_facturaestado->getRecord();
        \kerana\View::showForm($this->_current_module,'facturaestado/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_facturaestado->_setIdTableValue($id);
        ($this->_facturaestado->savePost()) ? \helpers\Redirect::to('/fac2fast/facturaestado/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_facturaestado->_setIdTableValue($id);
        ($this->_facturaestado->delete()) ? \helpers\Redirect::to('/fac2fast/facturaestado/index') : '';
    }

}