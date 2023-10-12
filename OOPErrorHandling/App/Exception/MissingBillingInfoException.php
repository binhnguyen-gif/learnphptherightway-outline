<?php

namespace App\Exception;

class MissingBillingInfoException extends \Exception
{

    /**
     * MissingBillingInfoException constructor.
     *
     * @param  string  $string
     */
    public function __construct(string $string)
    {
    }
}