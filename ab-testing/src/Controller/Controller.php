<?php
namespace AbTesting\Controller;

class Controller {
    protected string $route;

    function __construct() {
        $this->processRoute();
    }

    private function processRoute() {
        $route = $_SERVER['REQUEST_URI'];

        if(!isset($route)) {
            return;
        }
        
        $folderStructureArr = explode('/', $route);
        $route = end($folderStructureArr);
        $this->route = $route;
    }
}