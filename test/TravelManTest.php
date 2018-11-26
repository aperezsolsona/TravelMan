<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:41
 */
namespace TravelMan\Test;

use PHPUnit\Framework\TestCase;
use TravelMan\Algorithm\BranchAndBoundAlgorithm;
use TravelMan\Algorithm\TSPAlgorithm;
use TravelMan\TravelMan;
use TravelMan\DTO\CityDTO;
use TravelMan\IO\CityInputInterface;
use TravelMan\Algorithm\BruteforceAlgorithm;

class TravelManTest extends TestCase
{

    /**
     * This algorithm works for a small amount of cities
     */
    public function testSolveBruteforce(): void
    {
        $beijing = new CityDTO('Beijing',39.93,116.40);
        $tokyo = new CityDTO('Tokyo',35.40,139.45);
        $vladivostok = new CityDTO('Vladivostok',	43.8,	131.54);
        $dakar = new CityDTO('Dakar',	14.40,-17.28);

        $mockCities = array('Beijing' => $beijing, 'Tokyo' => $tokyo, 'Vladivostok' => $vladivostok, 'Dakar' => $dakar);

        $inputstub = $this->createMock(CityInputInterface::class);
        $inputstub->method('getCities')
            ->willReturn($mockCities);

        $algorithm = new BruteforceAlgorithm();
        $travelman = new TravelMan($inputstub, $algorithm);

        $solution = $travelman->solve();
        $this->assertCount(4, $solution);
    }

    /**
     * this test will yield different itineraries for same cities, so we are not testing the outcome, only the returned nodes
     */
    public function testSolveTsp(): void
    {
        $beijing = new CityDTO('Beijing',39.93,116.40);
        $tokyo = new CityDTO('Tokyo',35.40,139.45);
        $vladivostok = new CityDTO('Vladivostok',	43.8,	131.54);
        $dakar = new CityDTO('Dakar',	14.40,-17.28);

        $mockCities = array('Beijing' => $beijing, 'Tokyo' => $tokyo, 'Vladivostok' => $vladivostok, 'Dakar' => $dakar);

        $inputstub = $this->createMock(CityInputInterface::class);
        $inputstub->method('getCities')
            ->willReturn($mockCities);

        $algorithm = new TSPAlgorithm();
        $travelman = new TravelMan($inputstub, $algorithm);

        $solution = $travelman->solve();
        $this->assertCount(4, $solution);
    }

    /**
     * this test works fine
     */
    public function testSolveBnb(): void
    {
        $beijing = new CityDTO('Beijing',39.93,116.40);
        $tokyo = new CityDTO('Tokyo',35.40,139.45);
        $vladivostok = new CityDTO('Vladivostok',	43.8,	131.54);
        $dakar = new CityDTO('Dakar',	14.40,-17.28);

        $mockCities = array('Beijing' => $beijing, 'Tokyo' => $tokyo, 'Vladivostok' => $vladivostok, 'Dakar' => $dakar);

        $inputstub = $this->createMock(CityInputInterface::class);
        $inputstub->method('getCities')
            ->willReturn($mockCities);

        $algorithm = new BranchAndBoundAlgorithm();
        $travelman = new TravelMan($inputstub, $algorithm);

        $solution = $travelman->solve();
        $this->assertCount(4, $solution);
    }
}