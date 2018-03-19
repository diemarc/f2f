<?php

namespace application\modules\configuracion\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class ServiciotasaController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 19-03-2018 17:34:20,
  |
 */

class ServiciotasaController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected $_serviciotasa;

    public function __construct()
    {
        parent::__construct();
        $this->_serviciotasa = New \application\modules\configuracion\model\ServiciotasaModel();
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
        \kerana\View::$model = $this->_serviciotasa;
        \kerana\View::showView($this->_current_module, 'serviciotasa/index', ['rsServiciotasas' => $this->_serviciotasa->getAll()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::$model = $this->_serviciotasa;
        $params = [
            "rsServicios" => $this->_serviciotasa->objServicioModel->getAll(),
            "rsTaxas" => $this->_serviciotasa->objTaxaModel->getAll(),
        ];
        \kerana\View::showForm($this->_current_module, 'serviciotasa/add', $params, $this->_serviciotasa);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        ($this->_serviciotasa->savePost()) ? \helpers\Redirect::to('/configuracion/serviciotasa/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_serviciotasa->_setIdTableValue($id);
        $params['rsServiciotasa'] = $this->_serviciotasa->getRecord();
        \kerana\View::showView($this->_current_module, 'serviciotasa/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_serviciotasa->_setIdTableValue($id);
        \kerana\View::$model = $this->_serviciotasa;
        $params['rs'] = $this->_serviciotasa->getRecord();
        \kerana\View::showForm($this->_current_module, 'serviciotasa/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_serviciotasa->_setIdTableValue($id);
        ($this->_serviciotasa->savePost()) ? \helpers\Redirect::to('/configuracion/serviciotasa/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_serviciotasa->_setIdTableValue($id);
        ($this->_serviciotasa->delete()) ? \helpers\Redirect::to('/configuracion/serviciotasa/index') : '';
    }

}
