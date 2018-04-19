<?php

namespace application\modules\fac2fast\controller;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');
/*
  |-----------------------------------------------------------------------------
  | Class EmpresacontratanteController
  |-----------------------------------------------------------------------------
  |
  | Controller created automatically  from model
  | @author kerana,
  | @date 19-03-2018 18:21:42,
  |
 */

class EmpresacontratanteController extends \kerana\Kerana implements \kerana\KeranaInterface
{

    protected $_empresacontratante;

    public function __construct()
    {
        parent::__construct();
        $this->_empresacontratante = New \application\modules\fac2fast\model\EmpresaContratanteModel();
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
        \kerana\View::$model = $this->_empresacontratante;
        \kerana\View::showView($this->_current_module, 'empresacontratante/index', ['rsEmpresacontratantes' => $this->_empresacontratante->getAll()]);
    }

    /**
     * -------------------------------------------------------------------------
     * Add new
     * -------------------------------------------------------------------------
     */
    public function add()
    {
        \kerana\View::$model = $this->_empresacontratante;
        $params = [
            "rsContratantes" => $this->_empresacontratante->objContratanteModel->getAll(),
            "rsEmpresas" => $this->_empresacontratante->objEmpresaModel->getAll(),
        ];
        \kerana\View::showForm($this->_current_module, 'empresacontratante/add', $params, $this->_empresacontratante);
    }

    /**
     * -------------------------------------------------------------------------
     * Save new record
     * -------------------------------------------------------------------------
     */
    public function save()
    {
        ($this->_empresacontratante->savePost()) ? \helpers\Redirect::to('/fac2fast/empresacontratante/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Show one record detail
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function detail($id)
    {

        $this->_empresacontratante->_setIdTableValue($id);
        $params['rsEmpresacontratante'] = $this->_empresacontratante->getRecord();
        \kerana\View::showView($this->_current_module, 'empresacontratante/detail', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Edit one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function edit($id)
    {
        $this->_empresacontratante->_setIdTableValue($id);
        \kerana\View::$model = $this->_empresacontratante;
        $params['rs'] = $this->_empresacontratante->getRecord();
        \kerana\View::showForm($this->_current_module, 'empresacontratante/edit', $params);
    }

    /**
     * -------------------------------------------------------------------------
     * Update one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function update($id)
    {
        $this->_empresacontratante->_setIdTableValue($id);
        ($this->_empresacontratante->savePost()) ? \helpers\Redirect::to('/fac2fast/empresacontratante/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Delete one record
     * -------------------------------------------------------------------------
     * @param int $id
     */
    public function delete($id)
    {
        $this->_empresacontratante->_setIdTableValue($id);
        ($this->_empresacontratante->delete()) ? \helpers\Redirect::to('/fac2fast/empresacontratante/index') : '';
    }

    /**
     * -------------------------------------------------------------------------
     * Find a company associated with a id_contratante
     * -------------------------------------------------------------------------
     * @return type
     */
    public function findEmpresaContratante($key){
        return $this->_empresacontratante->searchEmpresaJson($key);
    }
    
}
