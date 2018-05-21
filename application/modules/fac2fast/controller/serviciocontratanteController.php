<?php

namespace application\modules\fac2fast\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ServiciocontratanteController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 04-05-2018 06:25:44,
  |
 */

class ServiciocontratanteController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected $_serviciocontratante;

    public function __construct()
    {
        parent::__construct();
        $this->_serviciocontratante = New \application\modules\fac2fast\model\ServicioContratanteModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Get services in json notation
     * -------------------------------------------------------------------------
     */
    public function getContratanteServicesJson()
    {
        return $this->_serviciocontratante->getAllInJson();
    }

    /**
     * -------------------------------------------------------------------------
     * Load panel to select services
     * -------------------------------------------------------------------------
     */
    public function loadContratanteServices()
    {
        \kerana\View::showView($this->_current_module, 'servicio/contratante_services');
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
        \kerana\View::$model = $this->_serviciocontratante;
        \kerana\View::showView($this->_current_module, 'serviciocontratante/index', ['rsServiciocontratantes' => $this->_serviciocontratante->getAll()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::$model = $this->_serviciocontratante;
        $params = [
            "rsContratantes" => $this->_serviciocontratante->objContratanteModel->getAll(),
            "rsServicios" => $this->_serviciocontratante->objServicioModel->getAll(),
        ];
        \kerana\View::showForm($this->_current_module, 'serviciocontratante/add', $params, $this->_serviciocontratante);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        return ($this->_serviciocontratante->processNewServiceContratante()) ? true : false;
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_serviciocontratante->_setIdTableValue($id);
        $params['rsServiciocontratante'] = $this->_serviciocontratante->getRecord();
        \kerana\View::showView($this->_current_module, 'serviciocontratante/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_serviciocontratante->_setIdTableValue($id);
        \kerana\View::$model = $this->_serviciocontratante;
        $params['rs'] = $this->_serviciocontratante->getRecord();
        \kerana\View::showForm($this->_current_module, 'serviciocontratante/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_serviciocontratante->_setIdTableValue($id);
        ($this->_serviciocontratante->savePost()) ? \helpers\Redirect::to('/fac2fast/serviciocontratante/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_serviciocontratante->_setIdTableValue($id);
        ($this->_serviciocontratante->delete()) ? \helpers\Redirect::to('/fac2fast/serviciocontratante/index') : '';
    }

}
