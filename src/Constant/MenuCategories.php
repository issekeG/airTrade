<?php

namespace App\Constant;

class MenuCategories
{
    public $menusCategories = [
    ['slug' => 'jet-aircraft', 'name' => 'Jet Aircraft', 'image' => 'jet_aircraft_edit.png'],
    ['slug' => 'turboprop-aircraft', 'name' => 'Turboprop Aircraft', 'image' => 'turboprop_aircraft_edit.png'],
    ['slug' => 'piston-single-aircraft', 'name' => 'Piston Single Aircraft', 'image' => 'piston_single_aircraft_edit.png'],
    ['slug' => 'piston-twin-aircraft', 'name' => 'Piston Twin Aircraft', 'image' => 'piston_twin_aircraft_edit.png'],
    ['slug' => 'light-sport-aircraft', 'name' => 'Light Sport Aircraft', 'image' => 'light_sport_aircraft_edit.png'],
    ['slug' => 'experimental-homebuilt-aircraft', 'name' => 'Experimental Homebuilt Aircraft', 'image' => 'experimental_homebuilt_aircraft_edit.png'],
    ['slug' => 'piston-agricultural-aircraft', 'name' => 'Piston Agricultural Aircraft', 'image' => 'piston_agricultural_aircraft_edit.png'],
    ['slug' => 'turbine-agricultural-aircraft', 'name' => 'Turbine Agricultural Aircraft', 'image' => 'turbine_agricultural_aircraft_edit.png'],
    ['slug' => 'piston-military-aircraft', 'name' => 'Piston Military Aircraft', 'image' => 'piston_military_aircraft_edit.png'],
    ['slug' => 'turbine-military-aircraft', 'name' => 'Turbine Military Aircraft', 'image' => 'turbine_military_aircraft_edit.png'],
    ['slug' => 'piston-amphibious-floatplanes', 'name' => 'Piston Amphibious Floatplanes', 'image' => 'piston_amphibious_floatplanes_edit.png'],
    ['slug' => 'turbine-amphibious-floatplanes', 'name' => 'Turbine Amphibious Floatplanes', 'image' => 'turbine_amphibious_floatplanes_edit.png'],
    ['slug' => 'piston-helicopters', 'name' => 'Piston Helicopters', 'image' => 'piston_helicopters_edit.png'],
    ['slug' => 'turbine-helicopters', 'name' => 'Turbine Helicopters', 'image' => 'turbine_helicopters_edit.png'],
    ];

    public function getMenusCategories(): array
    {
        return $this->menusCategories;
    }

}