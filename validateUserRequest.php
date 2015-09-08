<?php

require 'vendor/autoload.php';

//Business Rules

$specs = [
    new \Specs\Specifications\AccountTypeMicro(),
    new \Specs\Specifications\AccountTypeStandard(),
    new \Specs\Specifications\AccountTypeGold()
];

// 1. Validations

$request = [
    'country' => 'JP',
    'currency' => 'JPY',
    'accountType' => 'Micro'
];

foreach($specs as $spec)
{
    if($spec->appliesForSpecification($request) && !$spec->isSatisfied($request))
        throw new Exception('I am not satisfied! Reason ' . get_class($spec));
}