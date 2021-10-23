<?php
namespace AbTesting\Model;

use Exads\ABTestData;

class Design {

    private int $designID;
    private array $template;
    private string $promotion;
    private array $designs;

    public function __construct(int $designID) {
        $this->designID = $designID;
    }

    public function constructDesign() {
        $this->getABTestData();
        $this->constructComponentDesign();
        $this->getPage();
    }

    private function getABTestData() {
        $abTest = new ABTestData($this->designID);
        $this->promotion = $abTest->getPromotionName();
        $this->designs = $abTest->getAllDesigns();
    }

    private function constructComponentDesign() {
        $designs['name'] = $this->promotion;
        $designs['components'] = array_map(function($item) {
            $arr = [
                'template' => $this->promotion . '/'.$this->getSlug($item['designName']),
                'component' => $item['designName'],
                'size' => $item['splitPercent']
            ];
            return $arr;
        }, $this->designs);

        $this->template = $designs;
    }

    private function getSlug($name) {
        $name = strtolower($name);
        return str_replace(' ', '-', $name);

    }

    private function getPage() {
        $page = new Page($this->template);
        $this->template['page'] = $page->getPage();
    }

    public function getTemplate() {
        return $this->template;
    }
}