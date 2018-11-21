<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 12:11
 */

interface AlgorithmInterface
{
    /**
     * @param City[] $cities
     */
    public function setCities($cities);

    /**
     * @return City[]
     */
    public function getShortestRoute();
}