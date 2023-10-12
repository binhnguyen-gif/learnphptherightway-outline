<?php

use App\Exception\MissingBillingInfoException;

class Invoice {
    public function __construct(public Customer $customer)
    {
    }

    public function process(float $amount) {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Invalid invoice amont');
        }

        if (empty($this->customer->getBillingInfo())) {
            throw new MissingBillingInfoException('Missing billing infformation');
        }

        echo 'Processing$' . $amount . ' invoice - ';

        sleep(1);

        echo 'OK' . PHP_EOL;
    }
}
