<?php

namespace Specs;

interface Specifications
{
    /**
     * @param array $params
     * @return bool
     */
    public function isSatisfied(array $params);

    /**
     * Check if it applies
     *
     * @param array $params
     * @return bool
     */
    public function appliesForSpecification(array $params);
}