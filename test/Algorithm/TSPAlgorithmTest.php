<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:41
 */
namespace TravelMan\Test;

use PHPUnit\Framework\TestCase;
use TravelMan\DTO\CityDTO;
use TravelMan\Algorithm\TSPAlgorithm;


class TSPAlgorithmTest extends TestCase
{

    /**
     * This test won't pass, as
     *      - TSP genetic algorithm just gives an approximate solution, not the optimal
     *      - TSP always yields different results
     *
     *
     * So, only counting results yielded
     *
     */
    public function testGetShortestRoute(): void
    {
        $beijing = new CityDTO('Beijing',39.93,116.40);
        $tokyo = new CityDTO('Tokyo',35.40,139.45);
        $vladivostok = new CityDTO('Vladivostok',	43.8,	131.54);
        $dakar = new CityDTO('Dakar',	14.40,-17.28);

        $cities = array(
            'Beijing' => $beijing,
            'Dakar' => $dakar,
            'Tokyo' => $tokyo,
            'Vladivostok' => $vladivostok
        );

        $algorithm = new TSPAlgorithm();
        $algorithm->setCities($cities);
        $solution = $algorithm->getShortestRoute();
        $this->assertCount(4, $solution);

    }
}