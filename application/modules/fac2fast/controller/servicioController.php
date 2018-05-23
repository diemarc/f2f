<?php

namespace application\modules\fac2fast\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ServicioController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 16-03-2018 07:25:29,
  |
 */

class ServicioController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected 
            
            /** @object servicio model */
            $_servicio,
            
            /** @object servicio contratante model */
            $_servicio_contratante;

    public function __construct()
    {
        parent::__construct();
        $this->_servicio = New \application\modules\fac2fast\model\ServicioModel();
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
        \kerana\View::$model = $this->_servicio;
        \kerana\View::showView($this->_current_module, 'servicio/index', ['rsServicios' => $this->_servicio->getAll()]);
    }


    
    
    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::$model = $this->_servicio;
        $params = [
            "rsSubclases" => $this->_servicio->objSubclaseModel->getAll(),
        ];
        \kerana\View::showForm($this->_current_module, 'servicio/add', $params, $this->_servicio);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        if($this->_servicio->savePost()){
            return true;
        }
    }
    
    /**
     * -------------------------------------------------------------------------
     * Get Service record in json
     * --------------------------------------------------------------------------
     * @param type $id
     * @return type
     */
    public function getServicioJson($id){
        
        $this->_servicio->_setIdTableValue($id);
        return $this->_servicio->getServicioDetailJson();
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_servicio->_setIdTableValue($id);
        $params['rsServicio'] = $this->_servicio->getRecord();
        \kerana\View::showView($this->_current_module, 'servicio/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_servicio->_setIdTableValue($id);
        \kerana\View::$model = $this->_servicio;
        $params['rs'] = $this->_servicio->getRecord();
        \kerana\View::showForm($this->_current_module, 'servicio/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_servicio->_setIdTableValue($id);
        ($this->_servicio->savePost()) ? \helpers\Redirect::to('/fac2fast/servicio/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_servicio->_setIdTableValue($id);
        ($this->_servicio->delete()) ? \helpers\Redirect::to('/fac2fast/servicio/index') : '';
    }

}
