<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 12:11
 */
namespace TravelMan;

use TravelMan\DTO\CityDTO;

interface CityInputInterface
{
    /**
     * @return CityDTO[]
     */
    public function getCities();
}