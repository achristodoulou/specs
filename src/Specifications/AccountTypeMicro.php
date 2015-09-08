<?php

namespace Specs\Specifications;

use Specs\Specifications;

class AccountTypeMicro implements Specifications
{
    /**
     * @param array $params
     * @return bool
     */
    public function isSatisfied(array $params)
    {
        return ($params['currency'] == 'EUR');
    }

    /**
     * @param array $params
     * @return bool
     */
    public function appliesForSpecification(array $params)
    {
        return ($params['accountType'] == 'Micro');
    }
}