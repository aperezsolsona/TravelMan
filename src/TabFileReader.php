<?php
/**
 * Created by PhpStorm.
 * User: slimbook
 * Date: 20/11/18
 * Time: 9:41
 */

class TabFileReader
{
    private $fp;
    private $delimiter;
    private $length;

    /**
     * TabFileReader constructor.
     * @param $file_name
     * @param string $delimiter
     * @param int $length
     */
    function __construct($file_name, $delimiter="\t", $length=8000)
    {
        ini_set('auto_detect_line_endings',TRUE); //mac line issues
        $this->fp = fopen($file_name, "r");
        $this->delimiter = $delimiter;
        $this->length = $length;
    }

    /**
     *
     */
    function __destruct()
    {
        if ($this->fp) {
            fclose($this->fp);
        }
        ini_set('auto_detect_line_endings',FALSE); //mac line issues
    }

    /**
     * @param int $max_lines
     * @return array
     */
    function get($max_lines=0)
    {
        //if $max_lines is set to 0, then get all the data
        $data = array();

        if ($max_lines > 0) {
            $line_count = 0;
        } else {
            $line_count = -1; // so loop limit is ignored
        }

        while ($line_count < $max_lines && ($row = fgetcsv($this->fp, $this->length, $this->delimiter)) !== FALSE)
        {
            $data[] = $row;
            if ($max_lines > 0) {
                $line_count++;
            }
        }
        return $data;
    }
}