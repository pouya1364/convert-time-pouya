<?php

namespace App\Validator;

use Symfony\Component\HttpFoundation\Request;

class DateValidator
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getDateTime(): \DateTime
    {
        
        if (!$dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $this->request->request->get('datetime'))) {
            throw new \InvalidArgumentException('Given Date Time is not valid!');
        }

        return $dateTime;
    }
}