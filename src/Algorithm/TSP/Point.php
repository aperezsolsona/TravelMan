<?php
/**
 * Downloaded from
 * https://github.com/wdalmut/tsp-genetic-algorithm
 */
namespace TravelMan\Algorithm\TSP;

class Point
{
    public $latitude;
    public $longitude;

    public function __construct($lat, $lon)
    {
        $this->latitude = $lat;
        $this->longitude = $lon;
    }
}
