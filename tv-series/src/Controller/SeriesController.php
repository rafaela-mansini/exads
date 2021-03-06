<?php
namespace TvSeries\Controller;

use TvSeries\Model\Serie;

class SeriesController {

    public function nextShows() {
        $serie = new Serie();
        if (isset($_POST['dateTime'])) {
            $dateTime = new \DateTime($_POST['dateTime']);
            $serie->setDateTime($dateTime);
        }
        if (isset($_POST['title'])) {
            $serie->setTitle($_POST['title']);
        }
        $nextShows = $serie->nextShows($dateTime);
        return json_encode($nextShows);
    }

}