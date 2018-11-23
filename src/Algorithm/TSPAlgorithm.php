<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 12:11
 */
namespace TravelMan\Algorithm;

use TravelMan\Algorithm\TSP\Plan;
use TravelMan\Algorithm\TSP\Point;
use TravelMan\Algorithm\TSP\Place;
use TravelMan\Algorithm\TSP\Life;
use TravelMan\DTO\CityDTO;


class TSPAlgorithm implements AlgorithmInterface
{
    /** @var CityDTO[] $cities */
    private $cities = null;
    private $plan = null;

    /**
     * @param CityDTO[] $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
        $plan = new Plan();

        foreach($cities as $city) {
            $plan->addPlace(
                new Place(
                    $city->getName(),
                    new Point(
                        $city->getLatitude(),
                        $city->getLongitude()
                    )
                )
            );
        }
        $this->plan = $plan;
    }

    /**
     * @return CityDTO[]
     */
    public function getShortestRoute()
    {
        $life = new Life();
        $roadmap = $life->getShortestPath($this->plan);
        $cities=array();
        echo "Distance: {$roadmap->distance()}" . PHP_EOL . PHP_EOL;
        foreach ($roadmap->places as $place) {

            $cities[$place->name] = $this->cities[$place->name];
        }
        return $cities;
    }
}