<?php

require 'vendor/autoload.php';

//Business Rules

$specs = [
    new \Specs\Specifications\AccountTypeMicro(),
    new \Specs\Specifications\AccountTypeStandard(),
    new \Specs\Specifications\AccountTypeGold()
];

// Visibility

$form = [

    //Countries
    0 => [
        'JP',
        'GR',
        'GB'
    ],

    //Currencies
    1 => [
        'EUR',
        'GBP',
        'JPY',
        'USD'
    ],

    //Account Types
    2 => [
        'Micro',
        'Standard',
        'Gold'
    ]
];

$clientRequest = [
    'country' => 'JP',
    'currency' => 'JPY',
    'accountType' => 'Gold'
];

$availableOptions = [
    'countries' => $form[0], //Values that always must remain the same
    'currencies' => [],
    'accountTypes' => [],
];

$allValuesPossibleCombinations = (new \Specs\Helpers\ArrayHelper())->generate_combinations($form);

foreach ($allValuesPossibleCombinations as $combination) {

    $request = [
        'country' => $combination[0],
        'currency' => $combination[1],
        'accountType' => $combination[2]
    ];

    if(
        $clientRequest['country'] == $request['country'] ||
        $clientRequest['currency'] == $request['currency'] ||
        $clientRequest['accountType'] == $request['accountType']
    ) {
        foreach ($specs as $spec) {
            if ($spec->appliesForSpecification($request) && $spec->isSatisfied($request)) {

                if (!in_array($request['currency'], $availableOptions['currencies']))
                    array_push($availableOptions['currencies'], $request['currency']);

                if (!in_array($request['accountType'], $availableOptions['accountTypes']))
                    array_push($availableOptions['accountTypes'], $request['accountType']);
            }
        }
    }
}

echo "<pre>";
print_r($availableOptions);