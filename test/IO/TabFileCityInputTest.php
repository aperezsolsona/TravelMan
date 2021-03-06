<?php
namespace TravelMan\Test;

use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\vfsStream;
use TravelMan\DTO\CityDTO;
use TravelMan\IO\TabFileCityInput;


class TabFileCityInputTest extends TestCase
{

    /**
     *
     * Setting up a virtual filesystem for testing purposes with vfsStream library
     *
     *
     */
    public function setUp()
    {
        // define a virtual file system
        $directory = [
                'validcities.txt' =>
                    "Beijing\t12\t14\nDakar\t12\t14\nBarcelona\t12\t14\nTokyo\t12\t14\n",

                'invalidcities.txt' =>
                    "Beijing 12\t14\n
                    444\tTokyo"
        ];
        $this->file_system = vfsStream::setup('root', 444, $directory);
    }

    /**
     * @expectedException \Exception
     */
    public function testFileNotFoundExceptionIsThrownWhenNoFile()
    {
        //the file does not exist -> Exception thrown
        $filereader = new TabFileCityInput($this->file_system->url() . 'no-file.txt');
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidTabFile()
    {
        // the file contains badly formatted tab content -> Exception
        $filereader = new TabFileCityInput($this->file_system->url() . '/invalidcities.txt');
        $cities = $filereader->getCities();
    }


    /**
     * the file contains well formatted tab content -> process
     * @throws \Exception
     */
    public function testHasKeyInFile()
    {
        $filereader = new TabFileCityInput($this->file_system->url() . '/validcities.txt');
        $cities = $filereader->getCities();
        $this->assertArrayHasKey('Beijing', $cities);
        $this->assertArrayHasKey('Dakar', $cities);
        $this->assertArrayHasKey('Barcelona', $cities);
        $this->assertArrayHasKey('Tokyo', $cities);
        $this->assertInstanceOf(CityDTO::class, $cities['Beijing']);
        $city = $cities['Beijing'];
        $this->assertEquals('Beijing', $city->getName());
        $this->assertEquals(12, $city->getLatitude());
        $this->assertEquals(14, $city->getLongitude());
    }
}