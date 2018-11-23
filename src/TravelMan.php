<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 16:47
 */

namespace TravelMan;

use TravelMan\Algorithm\AlgorithmInterface;
use TravelMan\DTO\CityDTO;
use TravelMan\IO\CityInputInterface;

class TravelMan
{
    private $inputInterface;
    private $algorithmInterface;
    private $verbose = false;

    /**
     * TravelMan constructor.
     * @param CityInputInterface $inputInterface
     * @param AlgorithmInterface $algorithmInterface
     * @param bool $verbose
     */
    public function __construct($inputInterface, $algorithmInterface, $verbose = false)
    {
        $this->inputInterface = $inputInterface;
        $this->algorithmInterface = $algorithmInterface;
        $this->verbose = $verbose;
    }

    /**
     * @return CityDTO[]
     */
    public function solve() {
        $cities = $this->inputInterface->getCities();
        $this->algorithmInterface->setCities($cities);
        $shortestPath = $this->algorithmInterface->getShortestRoute();
        return $shortestPath;
    }

    /**
     * @param CityDTO[] $shortestPath
     */
    public function printResults($shortestPath)
    {
        if ($this->verbose) print_r("Travelling Salesman Problem: \n");
        foreach($shortestPath as $city) {
            print_r($city->getName()."\n");
        }
    }
}