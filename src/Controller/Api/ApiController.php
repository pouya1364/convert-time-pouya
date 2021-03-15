<?php
namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Validator\DateValidator;
use App\Converter\MarsConverter;

/**
 * API controller to create end points
 */
class ApiController
{
    private const HTTP_OK = 200;
    private const HTTP_ERR = 400;

    /**
     * Recieve API requests /api/convert and return propper response
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function convertApi(Request $request): JsonResponse
    {
        $response = new JsonResponse();

        try {
            
            $reader = new DateValidator($request); // Validate date and time
            $converter = new MarsConverter($reader->getDateTime()); //convert

            $response->setData([
                'status' => self::HTTP_OK,
                'message' => 'success',
                'data' => [
                    'mars_sol_date' => $converter->getMarsSolDate(),
                    'martian_coordinated_time' => $converter->getMartianCoordinatedTime(),
                ],
            ]);
        } catch (\Exception $e) { //errors
            $response->setData([
                'status' => self::HTTP_ERR,
                'message' => $e->getMessage(),
            ]);

            throw $e;
            
        } finally {
            return $response;
        }

    }
}

