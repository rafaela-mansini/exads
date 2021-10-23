<?php
namespace AbTesting\Controller;

use AbTesting\Model\Design;

class DesignController extends Controller {
    public function getDesign(){
        try {
            
            $design = new Design($this->route);
            $design->constructDesign();
            return $design->getTemplate();

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
    
}