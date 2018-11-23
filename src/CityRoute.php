<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 11:13
 */

class CityRoute
{
    private $city_1;
    private $city_2;
    private $distance;

    /**
     * CityRoute constructor.
     * @param $city_1
     * @param $city_2
     * @param $distance
     */
    function __construct($city_1, $city_2, $distance)
    {
        $this->city_1 = $city_1;
        $this->city_2 = $city_2;
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getCity1()
    {
        return $this->city_1;
    }

    /**
     * @return mixed
     */
    public function getCity2()
    {
        return $this->city_2;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

}