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
use TravelMan\Algorithm\DijkstraAlgorithm;

class DijkstraAlgorithmTest extends TestCase
{

    /**
     * !!!!!!!!!!!!!!!!!!!
     *
     * This test wont pass, as Dijkstra algorithm does not visit all nodes
     */
    public function testGetShortestRoute(): void
    {
        $beijing = new CityDTO('Beijing',39.93,116.40);
        $tokyo = new CityDTO('Tokyo',35.40,139.45);
        $vladivostok = new CityDTO('Vladivostok',	43.8,	131.54);
        $dakar = new CityDTO('Dakar',	14.40,-17.28);

        $cities = array('Beijing' => $beijing, 'Tokyo' => $tokyo, 'Vladivostok' => $vladivostok, 'Dakar' => $dakar);

        $algorithm = new DijkstraAlgorithm();
        $algorithm->setCities($cities);
        $solution = $algorithm->getShortestRoute();
        $this->assertCount(4, $solution);
        $city1 = array_values($solution)[0];
        $city2 = array_values($solution)[1];
        $city3 = array_values($solution)[2];
        $city4 = array_values($solution)[3];
        $this->assertEquals('Beijing', $city1->getName());
        $this->assertEquals('Vladivostok', $city2->getName());
        $this->assertEquals('Tokyo', $city3->getName());
        $this->assertEquals('Dakar', $city4->getName());
    }
}