<?php

namespace App\Constant;

class MaxSteps
{
    private const STEPS = [
        'Jet Aircraft' => 9,
        'Turboprop Aircraft' => 8,
        'Piston Single Aircraft' => 6,
        'Piston Twin Aircraft' => 11,
        'Light Sport Aircraft' => 5,
        'Experimental homebuilt aircraft' => 5,
        'Piston agricultural aircraft' => 5,
        'Piston amphibious flatplanes' => 6,
        'Piston helicopters' => 9,
        'Piston military aircraft' => 5,
        'Turbine agricultural aircraft' => 5,
        'Turbine helicopters' => 10,
        'Turbine military aircraft' => 6,
        'Turbune amphibious floatplane' => 6,
        'De-Ice Equipment' => 7,
        'Flight Simulators' => 3,
        'Fuel Tanks / Fuel Storage' => 6,
        'Fuel Trucks' => 6,
        'Ground Power Units' => 6,
        'Hangars' => 5,
        'Runway Sweepers - Brooms' => 11,
        'Tugs - Tow Bars' => 4,
        'Drones' => 3,
        'Other' => 2,
    ];

    public function getMaxSteps(string $category): int
    {
        return self::STEPS[$category] ?? 0;
    }
}
