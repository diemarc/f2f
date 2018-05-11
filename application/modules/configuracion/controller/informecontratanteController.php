<?php

namespace application\modules\configuracion\controller;
defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class InformecontratanteController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 10-05-2018 06:09:24,
  |
 */

class InformecontratanteController extends \kerana\Kerana implements \kerana\KeranaInterface {

    
    protected $_informecontratante;

     public function __construct()
    {
        parent::__construct();
         $this->_informecontratante= New \application\modules\configuracion\model\InformeContratanteModel();
        
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index(){
        
        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_informecontratante;
        \kerana\View::showView($this->_current_module, 'informecontratante/index', 
                ['rsInformecontratantes' => $this->_informecontratante->getAll()]);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    
    public function add(){
         \kerana\View::$model = $this->_informecontratante;
        $params = [
 "rsInformes"=> $this->_informecontratante->objInformeModel->getAll(), 

 "rsContratantes"=> $this->_informecontratante->objContratanteModel->getAll(), 

 "rsEstados"=> $this->_informecontratante->objEstadoModel->getAll(), 
];
        \kerana\View::showForm($this->_current_module,'informecontratante/add',$params,$this->_informecontratante);
    }
    
     /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    
    public function save(){
        ($this->_informecontratante->savePost()) ? \helpers\Redirect::to('/configuracion/informecontratante/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function detail($id){
        
        $this->_informecontratante->_setIdTableValue($id);
        $params['rsInformecontratante'] = $this->_informecontratante->getRecord();
        \kerana\View::showView($this->_current_module,'informecontratante/detail',$params);
        
    }
    
    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function edit($id){
        $this->_informecontratante->_setIdTableValue($id);
         \kerana\View::$model = $this->_informecontratante;
        $params['rs'] = $this->_informecontratante->getRecord();
        \kerana\View::showForm($this->_current_module,'informecontratante/edit',$params);
    }
    
    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function update($id){
        $this->_informecontratante->_setIdTableValue($id);
        ($this->_informecontratante->savePost()) ? \helpers\Redirect::to('/configuracion/informecontratante/index') : '';
    }
    
    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    
    public function delete($id){
        $this->_informecontratante->_setIdTableValue($id);
        ($this->_informecontratante->delete()) ? \helpers\Redirect::to('/configuracion/informecontratante/index') : '';
    }

}