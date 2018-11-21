<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:32
 */

define('__ROOT__', dirname(__FILE__ ). '/src');
require_once(__ROOT__.'/City.php');
require_once(__ROOT__.'/GeoDataSource.php');

require_once(__ROOT__ . '/CityInputInterface.php');
require_once(__ROOT__ . '/TabFileCityInput.php');

require_once(__ROOT__ . '/AlgorithmInterface.php');
require_once(__ROOT__ . '/BruteforceAlgorithm.php');

require_once(__ROOT__ . '/TravelMan.php');



$start = microtime(true);
print_r("Travelling Salesman Problem: starting\n");


try {
    $tabFileReader = new TabFileCityInput("cities.txt");

    print_r("Travelling Salesman Problem: opening cities.txt file\n");
    print_r("Travelling Salesman Problem: calculating the shortest route. This could take some minutes...\n");

    $algorithm = new BruteforceAlgorithm();
    $travelman = new TravelMan($tabFileReader, $algorithm);
    $solution = $travelman->solve();
    $travelman->printResults($solution);

} catch (Exception $e) {
    print_r("Travelling Salesman Problem: " . $e->getMessage() . "\n\n");
}




$time_elapsed_secs = microtime(true) - $start;
print_r("Travelling Salesman Problem: Time elapsed : $time_elapsed_secs secs\n");