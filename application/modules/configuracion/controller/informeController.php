<?php

namespace application\modules\configuracion\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class InformeController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 10-05-2018 06:08:23,
  |
 */

class InformeController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_informe;

     public function __construct()
    {
        parent::__construct();
         $this->_informe= New \application\modules\configuracion\model\InformeModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_informe;
        \kerana\View::showView($this->_current_module, 'informe/index', 
                ['rsInformes' => $this->_informe->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_informe;
        $params = [
 "rsEstados"=> $this->_informe->objEstadoModel->getAll(), 
];
        \kerana\View::showForm($this->_current_module,'informe/add',$params,$this->_informe);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_informe->savePost()) ? \helpers\Redirect::to('/configuracion/informe/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_informe->_setIdTableValue($id);
        $params['rsInforme'] = $this->_informe->getRecord();
        \kerana\View::showView($this->_current_module,'informe/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_informe->_setIdTableValue($id);
         \kerana\View::$model = $this->_informe;
        $params['rs'] = $this->_informe->getRecord();
        \kerana\View::showForm($this->_current_module,'informe/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_informe->_setIdTableValue($id);
        ($this->_informe->savePost()) ? \helpers\Redirect::to('/configuracion/informe/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_informe->_setIdTableValue($id);
        ($this->_informe->delete()) ? \helpers\Redirect::to('/configuracion/informe/index') : '';
    }

}