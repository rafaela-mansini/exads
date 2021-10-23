<?php

require __DIR__ . '/vendor/autoload.php';

use AbTesting\Controller\DesignController;

$controller = new DesignController();
$design = $controller->getDesign();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);
echo $twig->render($design['page'], ['design' => $design]);

function pp($toPrint) {
    print("<pre>".print_r($toPrint,true)."</pre>");
}