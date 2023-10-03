<?php

namespace App\DocBlock;

class Transaction
{
    private $customer;
    private $amount;
    /**
     * @param  Customer  $customer
     * @param  float|int  $amount
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     *
     * @return bool
     */
    public function process(Customer $customer, float|int $amount): bool
    {
//        process transaction

//        if failed, return false

//        otherwise return true
        return true;
    }
}
