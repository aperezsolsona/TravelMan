<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:32
 */

define('__ROOT__', dirname(__FILE__ ). '/src');
require_once(__ROOT__.'/TabFileReader.php');
require_once(__ROOT__.'/City.php');

$start = microtime(true);

$tabFileReader = new TabFileReader("cities.txt");
$data = $tabFileReader->get();
foreach ($data as $dataRow) {
    $cities[] = new City($dataRow[0],$dataRow[1],$dataRow[2]);
}
print_r($cities);




$time_elapsed_secs = microtime(true) - $start;
print_r("Time elapsed : $time_elapsed_secs secs\n");