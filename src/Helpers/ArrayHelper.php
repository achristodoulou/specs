<?php

namespace Specs\Helpers;

class ArrayHelper
{
    /**
     * Generate all the possible combinations among a set of nested arrays.
     *
     * @param array $data The entrypoint array container.
     * @param array $all The final container (used internally).
     * @param array $group The sub container (used internally).
     * @param null $value
     * @param int $i The key index (used internally).
     * @return array
     */
    public function generate_combinations(array $data, array &$all = array(), array $group = array(), $value = null, $i = 0)
    {
        $keys = array_keys($data);
        if (isset($value) === true) {
            array_push($group, $value);
        }

        if ($i >= count($data)) {
            array_push($all, $group);
        } else {
            $currentKey     = $keys[$i];
            $currentElement = $data[$currentKey];
            foreach ($currentElement as $val) {
                $this->generate_combinations($data, $all, $group, $val, $i + 1);
            }
        }

        return $all;
    }
}