<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 16:47
 */

class TravelMan
{
    private $inputInterface;
    private $algorithmInterface;

    /**
     * TravelMan constructor.
     * @param CityInputInterface $inputInterface
     * @param AlgorithmInterface $algorithmInterface
     */
    public function __construct($inputInterface, $algorithmInterface)
    {
        $this->inputInterface = $inputInterface;
        $this->algorithmInterface = $algorithmInterface;
    }

    /**
     * @return City[]
     */
    public function solve() {
        $cities = $this->inputInterface->getCities();
        $this->algorithmInterface->setCities($cities);
        $shortestPath = $this->algorithmInterface->getShortestRoute();
        return $shortestPath;
    }

    /**
     * @param City[] $shortestPath
     */
    public function printResults($shortestPath)
    {
        print_r("Travelling Salesman Problem: \n");
        foreach($shortestPath as $city) {
            print_r($city->getName()."\n");
        }
    }
}