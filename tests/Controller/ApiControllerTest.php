<?php

namespace App\Controller\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Test API functionality and result
 */
class ApiControllerTest extends TestCase
{
    public function setUp() :void
    {
        date_default_timezone_set('Europe/London');
    }

    public function testApiSuccess()
    {
        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => '2021-02-03 14:00:12']
        );

        $response = $request->request->get('datetime');
        $this->assertEquals( $response, '2021-02-03 14:00:12');
    }

}
