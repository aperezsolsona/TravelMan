<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 12:11
 */
namespace TravelMan\Algorithm;

use TravelMan\DTO\CityDTO;

interface AlgorithmInterface
{
    /**
     * @param CityDTO[] $cities
     */
    public function setCities($cities);

    /**
     * @return CityDTO[]
     */
    public function getShortestRoute();
}