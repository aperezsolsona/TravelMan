<?php
/**
 * Downloaded from
 * https://github.com/wdalmut/tsp-genetic-algorithm
 */
namespace TravelMan\Algorithm\TSP;

class Place
{
    public $name;
    public $point;

    public function __construct($name, Point $point)
    {
        $this->name = $name;
        $this->point = $point;
    }
}
