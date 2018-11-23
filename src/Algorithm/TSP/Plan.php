<?php
/**
 * Downloaded from
 * https://github.com/wdalmut/tsp-genetic-algorithm
 */
namespace TravelMan\Algorithm\TSP;

class Plan
{
    public $places;

    public function __construct()
    {
        $this->places = [];
    }

    public function addPlace(Place $place)
    {
        $this->places[] = $place;
    }

    public function getPlaces()
    {
        return $this->places;
    }
}

