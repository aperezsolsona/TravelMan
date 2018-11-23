<?php
/**
 * This class was downloaded from
 * http://www.srimax.com/index.php/travelling-salesman-problem-using-branch-bound-approach-php/
 */

namespace TravelMan\Algorithm\BranchAndBound;

class TspLocation
{
    public $latitude;
    public $longitude;
    public $id;

    public function __construct($latitude, $longitude, $id = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->id = $id;
    }

    public static function getInstance($location)
    {
        $location = (array) $location;
        if (empty($location['latitude']) || empty($location['longitude']))
        {
            throw new \RuntimeException('TspLocation::getInstance could not load location');
        }

        // Instantiate the TspLocation.
        $id = isset($location['id']) ? $location['id'] : null;
        $tspLocation = new TspLocation($location['latitude'], $location['longitude'], $id);

        return $tspLocation;
    }

    public static function distance($lat1, $lon1, $lat2, $lon2)
    {
        if ($lat1 == $lat2 && $lon1 == $lon2) return 0;
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return ($miles * 1.609344);
    }
}