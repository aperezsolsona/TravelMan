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
use TravelMan\Algorithm\BranchAndBoundAlgorithm;


class BranchAndBoundAlgorithmTest extends TestCase
{

    /**
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

        $algorithm = new BranchAndBoundAlgorithm();
        $algorithm->setCities($cities);
        $solution = $algorithm->getShortestRoute();
        $this->assertCount(4, $solution);
        $city1 = array_values($solution)[0];
        $city2 = array_values($solution)[1];
        $city3 = array_values($solution)[2];
        $city4 = array_values($solution)[3];

        //solution should be Beijing - Dakar - Vladivostok - Tokyo
        $this->assertEquals('Beijing', $city1->getName());
        $this->assertEquals('Dakar', $city2->getName());
        $this->assertEquals('Vladivostok', $city3->getName());
        $this->assertEquals('Tokyo', $city4->getName());
    }
}