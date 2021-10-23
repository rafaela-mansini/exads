<?php
namespace TvSeries\Model;

use TvSeries\Tools\Connection;
use \DateTime;

class Serie {

    private DateTime $dateTime;
    private array $daysOfWeek = [
        'Sunday', 'Monday' , 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];
    private string $weekDay;
    private string $atualTime;
    private string $numberWeekDay;

    public function nextShows() {
        try {
            $this->formatDataToSearch();
            $result = $this->executeQuery();
            return $result;
        } catch (\Exception $e) {
            die("CONNECTION ERROR: " . $e->getMessage());
        }
    }

    private function formatDataToSearch() {
        if (!isset($this->dateTime)) {
            $this->dateTime = new DateTime();
        }

        $this->numberWeekDay = $this->dateTime->format('w');
        $this->weekDay = $this->daysOfWeek[$this->numberWeekDay];
        $this->atualTime = $this->dateTime->format('H:i:s');
        $this->daysOfWeek = $this->formatDaysOfWeekToStartiWithWeekDay();
    }

    private function formatDaysOfWeekToStartiWithWeekDay() {
        $newDaysOfWeek = [];

        for ($i = $this->numberWeekDay; $i <= 6; $i++) {
            $newDaysOfWeek[] = $this->daysOfWeek[$i];
        }
        for ($i=0; $i < $this->numberWeekDay; $i++) {
            $newDaysOfWeek[] = $this->daysOfWeek[$i];
        }

        return $newDaysOfWeek;
    }

    private function executeQuery() {
        $orderBy = '\'' . implode("','", $this->daysOfWeek) . '\'';
        $query = 'SELECT * FROM tv_series_intervals';
        $query .= ' INNER JOIN tv_series ON id_tv_series = id';
        $query .= ' ORDER BY field(week_day, ' . $orderBy .'), show_time';
        $stmt = Connection::prepare($query);
        $stmt->execute();

        $series = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $this->firstNextSerie($series);
    }

    /**
     * This function will get the next available tv show, prevent cases when the day of week it's the same but the time it's already passed.
     */
    private function firstNextSerie($series) {
        foreach($series as $serie) {
            if($serie->week_day !== $this->daysOfWeek[0]) {
                return $serie;
                break;
            }
            
            if($serie->show_time >= $this->atualTime) {
                return $serie;
                break;
            }
        }
    }

    public function setDateTime(DateTime $dateTime) {
        $this->dateTime = $dateTime;
    }
    
}