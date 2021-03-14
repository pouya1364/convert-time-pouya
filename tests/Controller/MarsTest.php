<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;

class DefaultControllerTest extends TestCase
{
    public function test1()
    {
        $puzzleSolver = new PuzzleSolver();
        $bid = new Bid();
        $bid->setMin(2);
        $bid->setMax(1);
        $puzzleSolver->solve($bid);
        $solution = $bid->getSolution();
        $this->assertIsNumeric($solution);
        $this->assertEquals($solution, 0);
    }
    public function test2()
    {
        $puzzleSolver = new PuzzleSolver();
        $bid = new Bid();
        $bid->setMin(1);
        $bid->setMax(5);
        $puzzleSolver->solve($bid);
        $solution = $bid->getSolution();
        $this->assertIsNumeric($solution);
        $this->assertEquals($solution, 365);
    }
    public function test3()
    {
        $puzzleSolver = new PuzzleSolver();
        $bid = new Bid();
        $bid->setMin(2);
        $bid->setMax(8);
        $puzzleSolver->solve($bid);
        $solution = $bid->getSolution();
        $this->assertIsNumeric($solution);
        $this->assertEquals($solution, 553);
        
    }
    public function test4()
    {
        $puzzleSolver = new PuzzleSolver();
        $bid = new Bid();
        $bid->setMin(8);
        $bid->setMax(10);
        $puzzleSolver->solve($bid);
        $solution = $bid->getSolution();
        $this->assertIsNumeric($solution);
        $this->assertEquals($solution, 273);
    }
    public function test5()
    {
        $puzzleSolver = new PuzzleSolver();
        $bid = new Bid();
        $bid->setMin(20);
        $bid->setMax(23);
        $puzzleSolver->solve($bid);
        $solution = $bid->getSolution();
        $this->assertIsNumeric($solution);
        $this->assertEquals($solution, 514);
    }
}
