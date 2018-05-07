<?php

namespace application\modules\fac2fast\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class FacturaController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 19-03-2018 18:31:06,
  |
 */

class FacturaController extends \kerana\Kerana implements \kerana\KeranaInterface {

    protected $_factura;

    public function __construct() {
        parent::__construct();
        $this->_factura = New \application\modules\fac2fast\model\FacturaModel();
    }

    /**
     * -------------------------------------------------------------------------
     * Show all 
     * -------------------------------------------------------------------------
     */
    public function index() {

        // only necesary for a view creator, remove it  after index files is
        // created
        \kerana\View::$model = $this->_factura;
        \kerana\View::showView($this->_current_module, 'factura/index', ['rsFacturas' => $this->_factura->getAll()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new factura
     * -------------------------------------------------------------------------
     */
    public function add() {
        
        // get all default services 
        $obj_model_services = new \application\modules\fac2fast\model\ServicioContratanteModel();
        $obj_tasas = new \application\modules\base\model\TaxaModel();
        
        $params = [
            'rsFormapagos' => $this->_factura->objFormaPagoModel->getAll(),
            'rsServicios' => $obj_model_services->getAll(),
            'rsIva' => $obj_tasas->find('*',['tasa'=>'IVA'],'all'),
            'rsIrpf' => $obj_tasas->find('*',['tasa'=>'IRPF'],'all')
            
        ];
        \kerana\View::showForm($this->_current_module, 'factura/add', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save() {
        ($this->_factura->saveFactura()) ? \helpers\Redirect::to('/fac2fast/factura/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id) {

        $this->_factura->_setIdTableValue($id);
        $params['rsFactura'] = $this->_factura->getRecord();
        \kerana\View::showView($this->_current_module, 'factura/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id) {
        $this->_factura->_setIdTableValue($id);
        \kerana\View::$model = $this->_factura;
        $params['rs'] = $this->_factura->getRecord();
        \kerana\View::showForm($this->_current_module, 'factura/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id) {
        $this->_factura->_setIdTableValue($id);
        ($this->_factura->savePost()) ? \helpers\Redirect::to('/fac2fast/factura/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id) {
        $this->_factura->_setIdTableValue($id);
        ($this->_factura->delete()) ? \helpers\Redirect::to('/fac2fast/factura/index') : '';
    }

}
