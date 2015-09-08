<?php

namespace Specs\Specifications;

use Specs\Specifications;

class AccountTypeStandard implements Specifications
{
    /**
     * @param array $params
     * @return bool
     */
    public function isSatisfied(array $params)
    {
        return ($params['currency'] == 'GBP' && $params['country'] != 'JP');
    }

    /**
     * @param array $params
     * @return bool
     */
    public function appliesForSpecification(array $params)
    {
        return ($params['accountType'] == 'Standard');
    }
}