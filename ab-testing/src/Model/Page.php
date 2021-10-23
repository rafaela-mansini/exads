<?php
namespace AbTesting\Model;

class Page {

    protected $template = '/index.html';

    public function __construct(array $template) {
        $templateFolder = __DIR__ . '/templates/' . $template['name'];
        $templateFolder = str_replace('src/Model/', '', $templateFolder);
        if (is_dir($templateFolder)) {
            $this->template =  $template['name'] . '/index.html';
        }
    }

    public function getPage() {
        return $this->template;
    }

}