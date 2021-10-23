<?php

require __DIR__ . '/vendor/autoload.php';

use TvSeries\Controller\SeriesController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function pp($toPrint) {
    print("<pre>".print_r($toPrint,true)."</pre>");
}

$seriesController = new SeriesController();
$series = $seriesController->nextShows();
echo $series;