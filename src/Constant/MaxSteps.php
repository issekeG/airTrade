<?php

namespace App\Constant;

class MaxSteps
{
    public function getMaxSteps(string $category) :int{
        $maxSteps = 0;
        switch ($category) {
            case 'Jet Aircraft':
                $maxSteps = 9;
                break;
            case 'Turboprop Aircraft':
                $maxSteps = 8;
                break;
            case 'Piston Single Aircraft':
                $maxSteps = 6;
                break;
        }

        return $maxSteps;
    }

}