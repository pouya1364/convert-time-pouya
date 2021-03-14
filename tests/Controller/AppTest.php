<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

use App\Validator\DateValidator;
use App\Converter\MarsConverter;


class DefaultMarsConverterTest extends TestCase
{

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
        $this->assertEquals($marsSolDate, 52289.25109857464);
        $this->assertEquals($martianTime, '06:01:34');
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
        $this->assertEquals($marsSolDate, 39696.652815764945);
        $this->assertEquals($martianTime, '15:40:03');
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
        $this->assertEquals($marsSolDate, 38036.493754347255);
        $this->assertEquals($martianTime, '11:51:00');
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
        $this->assertEquals($marsSolDate, 87873.9388497378);
        $this->assertEquals($martianTime, '22:31:56');
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
        $this->assertEquals($marsSolDate, 135649.37732651317);
        $this->assertEquals($martianTime, '09:03:21');
    }
}