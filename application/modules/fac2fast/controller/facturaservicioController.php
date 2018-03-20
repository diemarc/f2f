<?php

namespace application\modules\fac2fast\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class FacturaservicioController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 20-03-2018 06:56:06,
  |
 */

class FacturaservicioController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_facturaservicio;

     public function __construct()
    {
        parent::__construct();
         $this->_facturaservicio= New \application\modules\fac2fast\model\FacturaServicioModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_facturaservicio;
        \kerana\View::showView($this->_current_module, 'facturaservicio/index', 
                ['rsFacturaservicios' => $this->_facturaservicio->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_facturaservicio;
        $params = [
 "rsFacturas"=> $this->_facturaservicio->objFacturaModel->getAll(), 

 "rsServicios"=> $this->_facturaservicio->objServicioModel->getAll(), 
];
        \kerana\View::showForm($this->_current_module,'facturaservicio/add',$params,$this->_facturaservicio);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_facturaservicio->savePost()) ? \helpers\Redirect::to('/fac2fast/facturaservicio/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_facturaservicio->_setIdTableValue($id);
        $params['rsFacturaservicio'] = $this->_facturaservicio->getRecord();
        \kerana\View::showView($this->_current_module,'facturaservicio/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_facturaservicio->_setIdTableValue($id);
         \kerana\View::$model = $this->_facturaservicio;
        $params['rs'] = $this->_facturaservicio->getRecord();
        \kerana\View::showForm($this->_current_module,'facturaservicio/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_facturaservicio->_setIdTableValue($id);
        ($this->_facturaservicio->savePost()) ? \helpers\Redirect::to('/fac2fast/facturaservicio/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_facturaservicio->_setIdTableValue($id);
        ($this->_facturaservicio->delete()) ? \helpers\Redirect::to('/fac2fast/facturaservicio/index') : '';
    }

}