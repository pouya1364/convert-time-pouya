<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

use App\Validator\DateValidator;
use App\Converter\MarsConverter;

/**
 * This set of test run application and check return type and values
 */
class AppTest extends TestCase
{

    public function setUp() :void
    {
        date_default_timezone_set('Europe/London');
    }

    public function test1()
    {

       

        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => '2021-02-03 14:00:12']
        );

        $reader = new DateValidator($request);
        $converter = new MarsConverter($reader->getDateTime());
        $marsSolDate = $converter->getMarsSolDate();
        $martianTime = $converter->getMartianCoordinatedTime();

        $this->assertIsNumeric($marsSolDate);
        $this->assertIsString($martianTime);
        $this->assertEquals($marsSolDate, 52289.575513339696);
        $this->assertEquals($martianTime, '13:48:44');
    }

    public function test2()
    {
        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => '1985-09-01 19:10:25']
        );

        $reader = new DateValidator($request);
        $converter = new MarsConverter($reader->getDateTime());
        $marsSolDate = $converter->getMarsSolDate();
        $martianTime = $converter->getMartianCoordinatedTime();
       
        $this->assertIsNumeric($marsSolDate);
        $this->assertIsString($martianTime);
        $this->assertEquals($marsSolDate, 39696.93667868449);
        $this->assertEquals($martianTime, '22:28:49');
    }

    public function test3()
    {
        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => '1980-12-30 23:59:59']
        );

        $reader = new DateValidator($request);
        $converter = new MarsConverter($reader->getDateTime());
        $marsSolDate = $converter->getMarsSolDate();
        $martianTime = $converter->getMartianCoordinatedTime();
       
        $this->assertIsNumeric($marsSolDate);
        $this->assertIsString($martianTime);
        $this->assertEquals($marsSolDate, 38036.81816911277);
        $this->assertEquals($martianTime, '19:38:09');
    }

    public function test4()
    {
        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => '2121-03-14 12:55:55']
        );

        $reader = new DateValidator($request);
        $converter = new MarsConverter($reader->getDateTime());
        $marsSolDate = $converter->getMarsSolDate();
        $martianTime = $converter->getMartianCoordinatedTime();
       
        $this->assertIsNumeric($marsSolDate);
        $this->assertIsString($martianTime);
        $this->assertEquals($marsSolDate, 87874.26326450285);
        $this->assertEquals($martianTime, '06:19:06');
    }

    public function test5()
    {
        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => '2255-08-08 09:12:50']
        );

        $reader = new DateValidator($request);
        $converter = new MarsConverter($reader->getDateTime());
        $marsSolDate = $converter->getMarsSolDate();
        $martianTime = $converter->getMartianCoordinatedTime();
       
        $this->assertIsNumeric($marsSolDate);
        $this->assertIsString($martianTime);
        $this->assertEquals($marsSolDate, 135649.7017412787);
        $this->assertEquals($martianTime, '16:50:30');
    }
}