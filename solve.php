<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:32
 */
require __DIR__ . '/vendor/autoload.php';

use TravelMan\TravelMan;
use TravelMan\IO\TabFileCityInput;

$start = microtime(true);
$verbose = false;
if (array_key_exists(1, $argv)) {
    if ($argv[1] == 'verbose') {
        $verbose = true;
    }
}
if ($verbose) print_r("Travelling Salesman Problem: starting\n");

try {
    $tabFileReader = new TabFileCityInput("cities.txt");

    if ($verbose) print_r("Travelling Salesman Problem: opening cities.txt file\n");
    if ($verbose) print_r("Travelling Salesman Problem: calculating the shortest route. This could take some minutes...\n");

    $algorithm = new \TravelMan\Algorithm\BranchAndBoundAlgorithm();
    $travelman = new TravelMan($tabFileReader, $algorithm, $verbose);
    $solution = $travelman->solve();
    $travelman->printResults($solution);

} catch (Exception $e) {
    print_r("Travelling Salesman Problem: " . $e->getMessage() . "\n\n");
}

$time_elapsed_secs = microtime(true) - $start;
if ($verbose) print_r("Travelling Salesman Problem: Time elapsed : $time_elapsed_secs secs\n");