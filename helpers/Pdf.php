<?php

/*
 * This file is part of keranaProject
 * Copyright (C) 2017-2018  diemarc  diemarc@protonmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace helpers;

defined('__APPFOLDER__') OR exit('Direct access to this file is forbidden, siya');


/**
 * -----------------------------------------------------------------------------
 * Pdf Class helper
 * @author diemarc.- <diemarc@protonmail.com>
 * @date 24/04/2018
 * -----------------------------------------------------------------------------
 * Simple api to access and parse html/php code to pdf, using 
 * html2pdf interface.
 * -----------------------------------------------------------------------------
 * Usage:
 * 
 * $pdf = new \helpers\Pdf();
        $pdf->setTemplate('factura');
        $pdf->setName('factura_test');
        $pdf->setParams(
                ['titulo' => 'mocos']
        );
        $pdf->parsePdf();
 * 
 */

class Pdf
{

    protected
    /** @object html2pdf */
            $_html2pdf,
            /** @var string, template html to write in pdf */
            $_template_pdf,
            /** @var string, F=save to file, D=Download */
            $_mode = 'D',
            /** @var string, name of doc to save */
            $_doc_name,
            /** @var string, path of doc to save */
            $_doc_path,
            /** @var array, associative array to use en pdf template */
            $_vars,
            /** @var string, paper size */
            $_paper_size = 'A4',
            /** @var string, mode to display 'Portrait' */
            $_display = 'P',
            
            /** @object, object determine the paths of templates */
            $_objOrigin;

    public function __construct()
    {
        
    }
  

    /**
     * -------------------------------------------------------------------------
     * Set the tamplate html to parse to PDF
     * -------------------------------------------------------------------------
     * @param type $template
     */
    public function setTemplate($template)
    {
       
        $tmp_path = realpath(__APPFOLDER__ . 'templates/reports/' . $template . '.php');

        if (empty($tmp_path)) {
            \kerana\Exceptions::showError('PedeEFE error', 'The template <b><u>'
                    . $template . '</u></b> doesn`t exists or is misspelled <br> path= <b>'
                    . __APPFOLDER__ . 'templates/reports/' . $template . '.php' . '</b>, fixit !!');
        } else {
            $this->_template_pdf = $tmp_path;
        }
    }

    /**
     * -------------------------------------------------------------------------
     * Set the name
     * -------------------------------------------------------------------------
     * @param type $name
     */
    public function setName($name)
    {
        if (!empty($name)) {
            $this->_doc_name = \helpers\Validator::valVarchar($name) . '.pdf';
        } else {
            $this->_doc_name = $this->_template_pdf . '.pdf';
        }
    }


    /**
     * -------------------------------------------------------------------------
     * Set params
     * -------------------------------------------------------------------------
     * @param type $params
     */
    public function setParams($params)
    {
        if (is_array($params)) {
            $this->_vars = $params;
        } else {
            \kerana\Exceptions::showError('pedeEFE error', 'Params is not received');
        }
    }

    /**
     * -------------------------------------------------------------------------
     * Parse the content in pdf
     * -------------------------------------------------------------------------
     */
    public function parsePdf()
    {
        try {
            foreach ($this->_vars as $key => $valor) {
                $$key = $valor;
            }
            ob_start();
            include($this->_template_pdf);
            $content = ob_get_clean();

            $this->_html2pdf = new \Spipu\Html2Pdf\Html2Pdf($this->_display, $this->_paper_size, 'es');
            $this->_html2pdf->writeHTML($content);
            $this->_html2pdf->output($this->_doc_name);
        } catch (\Spipu\Html2Pdf\Exception\Html2PdfException $e) {
            $this->_html2pdf->clean();
            \kerana\Exceptions::ShowException('pedeEFE error', $e);
        }
    }

}
