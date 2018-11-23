<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 12:11
 */
namespace TravelMan\Algorithm;

use TravelMan\DTO\CityDTO;

class DijkstraAlgorithm implements AlgorithmInterface
{

    private $graph = null;
    private $cities = null;


    function Dijkstra(array $graph, string $source, string $target):array{
        $dist = [];
        $pred = [];
        $Queue = new \SplPriorityQueue();

        foreach ($graph as $v => $adj) {
            $dist[$v] = PHP_INT_MAX;
            $pred[$v] = null;
            $Queue->insert($v, min($adj));
        }

        $dist[$source] = 0;

        while (!$Queue->isEmpty()) {
            $u = $Queue->extract();
            if (!empty($graph[$u])) {
                foreach ($graph[$u] as $v => $cost) {
                    if ($dist[$u] + $cost < $dist[$v]) {
                        $dist[$v] = $dist[$u] + $cost;
                        $pred[$v] = $u;
                    }
                }
            }
        }

        $S = new \SplStack();
        $u = $target;
        $distance = 0;

        while (isset($pred[$u]) && $pred[$u]) {
            $S->push($u);
            $distance += $graph[$u][$pred[$u]];
            $u = $pred[$u];
        }

        if ($S->isEmpty()) {
            return ["distance" => 0, "path" => $S];
        } else {
            $S->push($source);
            return ["distance" => $distance, "path" => $S];
        }
    }






    /**
     * @param CityDTO[] $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;

        $graph = array();
        $destinations = $cities;
        foreach($cities as $city) {

            $distanceArray = array();
            foreach($destinations as $destination) {
                if ($city->getName() != $destination->getName()) {
                    //todo: optimize duplicated distance calculus with preloaded array
                    $distanceArray[$destination->getName()] = $this->distance(
                        $city->getLatitude(),
                        $city->getLongitude(),
                        $destination->getLatitude(),
                        $destination->getLongitude()
                    );
                }
            }
            $graph[$city->getName()] = $distanceArray;
        }

        $this->graph = $graph;
    }

    /**
     * @return CityDTO[]
     */
    public function getShortestRoute()
    {
        //implement source target...
        $source = "Beijing";
        $target = "Dakar";

        $result = $this->Dijkstra($this->graph, $source, $target);
        $path = $result['path'];
        $distance = $result['distance'];

        echo "Distance from $source to $target is $distance] \n";
        $solution = array();
        while (!$path->isEmpty()) {
            $cityName = $path->pop();
            $solution[$cityName] = $this->cities[$cityName];
        }
        return $solution;
    }


    // work out the distance between 2 longitude and latitude pairs
    private function distance($lat1, $lon1, $lat2, $lon2)
    {
        if ($lat1 == $lat2 && $lon1 == $lon2) {
            return 0;
        }
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return $miles * 1.609344; //KM

    }
}