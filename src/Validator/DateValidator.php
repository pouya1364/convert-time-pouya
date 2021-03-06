<?php

namespace App\Validator;

use Symfony\Component\HttpFoundation\Request;
/**
 *Validate date format
 */
class DateValidator
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Check date and time in this format Y-m-d H:i:s
     *
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        
        if (!$dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $this->request->request->get('datetime'))) {
            throw new \InvalidArgumentException('Given date and time is not valid! Please use this format: YYYY-MM-DD H24:Mi:SS');
        }

        return $dateTime;
    }
}