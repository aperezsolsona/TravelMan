<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:41
 */
namespace TravelMan;

use TravelMan\DTO\CityDTO;

class TabFileCityInput implements CityInputInterface
{
    private $fp;
    private $delimiter;
    private $length;

    /**
     * TabFileCityInput constructor.
     *
     * @param string $file_name
     * @param string $delimiter
     * @param int $length
     * @throws \Exception
     */
    public function __construct($file_name, $delimiter="\t", $length=8000)
    {
        ini_set('auto_detect_line_endings',TRUE); //mac line issues
        if (!file_exists($file_name)) {
            throw new \Exception("File not found");
        }
        $this->fp = fopen($file_name, "r");
        $this->delimiter = $delimiter;
        $this->length = $length;
    }

    /**
     *
     */
    public function __destruct()
    {
        if ($this->fp) {
            fclose($this->fp);
        }
        ini_set('auto_detect_line_endings',FALSE); //mac line issues
    }

    /**
     * Reads the file and returns an associative array
     * @return array
     */
    private function fileToArray()
    {
        $data = array();
        while (($row = fgetcsv($this->fp, $this->length, $this->delimiter)) !== FALSE)
        {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * @return CityDTO[]
     * @throws \Exception
     */
    public function getCities()
    {

        $data = $this->fileToArray();
        $cities = array();
        foreach ($data as $dataRow) {
            if (
                count($dataRow) != 3 ||
                !is_string($dataRow[0]) ||
                !is_float((float) $dataRow[1]) ||
                !is_float((float) $dataRow[2])
            ) {
                throw new \Exception('Badly formatted file');
            }
            $cities[$dataRow[0]] = new CityDTO($dataRow[0],$dataRow[1],$dataRow[2]);
        }
        return $cities;
    }
}