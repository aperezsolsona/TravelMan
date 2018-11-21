<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:41
 */

define('__SRCROOT__', dirname(dirname(__FILE__ )). '/src');
require_once(__SRCROOT__ . '/CityInputInterface.php');
require_once(__SRCROOT__ . '/TravelMan.php');
require_once(__SRCROOT__ . '/City.php');
require_once(__SRCROOT__ . '/AlgorithmInterface.php');
require_once(__SRCROOT__ . '/BruteforceAlgorithm.php');


use PHPUnit\Framework\TestCase;


class TravelManTest extends TestCase
{

    /**
     *
     */
    public function testSolveBruteforce(): void
    {
        $beijing = new City('Beijing',39.93,116.40);
        $tokyo = new City('Tokyo',35.40,139.45);
        $vladivostok = new City('Vladivostok',	43.8,	131.54);
        $dakar = new City('Dakar',	14.40,-17.28);

        $mockCities = array('Beijing' => $beijing, 'Tokyo' => $tokyo, 'Vladivostok' => $vladivostok, 'Dakar' => $dakar);

        $inputstub = $this->createMock(CityInputInterface::class);
        $inputstub->method('getCities')
            ->willReturn($mockCities);

        $algorithm = new BruteforceAlgorithm();
        $travelman = new TravelMan($inputstub, $algorithm);

        $solution = $travelman->solve();
        $this->assertCount(4, $solution);
    }
}