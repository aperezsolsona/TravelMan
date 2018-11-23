<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 12:11
 */
namespace TravelMan\Algorithm;


use TravelMan\Algorithm\BranchAndBound\TspBranchBound;
use TravelMan\DTO\CityDTO;


class BranchAndBoundAlgorithm implements AlgorithmInterface
{
    /** @var CityDTO[] $cities */
    private $cities = null;
    /** @var TspBranchBound $tspbnb */
    private $tspbnb = null;

    /**
     * @param CityDTO[] $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
        try {
            $tspbnb = TspBranchBound::getInstance();
            $this->tspbnb = $tspbnb;

            foreach($cities as $city) {
                $this->tspbnb->addLocation(
                    array(
                        'id'=>$city->getName(),
                        'latitude'=>$city->getLatitude(),
                        'longitude'=>$city->getLongitude()
                    )
                );
            }
        } catch (\Exception $e) {
            echo $e;
            exit;
        }
    }

    /**
     * @return CityDTO[]
     */
    public function getShortestRoute()
    {
        $solution = array();
        try {
            $ans = $this->tspbnb->solve();

            //build list with our own DTO
            $solutionCities = $ans['path'];
            foreach ($solutionCities as $place) {
                $city =  array_values($this->cities)[$place[0]]; //read city object from original city object list
                $solution[$city->getName()] = $city;
            }
            echo "\nTotal cost: " . ceil($ans['cost']) . "Km\n\n";

        } catch (\Exception $e) {
            echo $e;
            exit;
        }

        return $solution;
    }
}