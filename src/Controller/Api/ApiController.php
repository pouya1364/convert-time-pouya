<?php
namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Validator\DateValidator;
use App\Converter\MarsConverter;

class ApiController
{
  
    public function convert(Request $request): JsonResponse
    {
        $response = new JsonResponse();

        try {
            $reader = new DateValidator($request);
            $converter = new MarsConverter($reader->getDateTime());

            $response->setData([
                'status' => 200,
                'message' => 'success',
                'data' => [
                    'mars_sol_date' => $converter->getMarsSolDate(),
                    'martian_coordinated_time' => $converter->getMartianCoordinatedTime(),
                ],
            ]);
        } catch (\Exception $e) {
            $response->setData([
                'status' => 400,
                'message' => $e->getMessage(),
            ]);
        }

        return $response;
    }
}

