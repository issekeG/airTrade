<?php

namespace App\Service;

use App\Dto\ExperimentalHomebuiltAircraftDto;
use App\Form\DeIceEquipmentFormType;
use App\Form\DronesFormType;
use App\Form\FlightSimulatorsFormType;
use App\Form\FuelTanksFuelStorageFormType;
use App\Form\FuelTrucksFormType;
use App\Form\GroundPowerUnitsFormType;
use App\Form\HangarsFormType;
use App\Form\JetAircraftFormType;
use App\Form\LightSportAircraftFormType;
use App\Form\OtherFormType;
use App\Form\PistonAgriculturalAircraftFormType;
use App\Form\PistonAmphibiousFloatplanesFormType;
use App\Form\PistonHelicoptersFormType;
use App\Form\PistonMilitaryAircraftFormType;
use App\Form\PistonSingleAircraftFormType;
use App\Form\PistonTwinAircraftFormType;
use App\Form\RunwaySweepersBroomsFormType;
use App\Form\TugsTowBarsFormType;
use App\Form\TurbineAgriculturalAircraftFormType;
use App\Form\TurbineAmphibiousFloatplanesFormType;
use App\Form\TurbineHelicoptersFormType;
use App\Form\TurbineMilitaryAircraftFormType;
use App\Form\TurbopropAircraftFormType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FormTypeService
{

    public function resolveFormType(string $category): string
    {
        return match ($category) {
            'Jet Aircraft' => JetAircraftFormType::class,
            'Turboprop Aircraft' => TurbopropAircraftFormType::class,
            'Piston Single Aircraft' => PistonSingleAircraftFormType::class,
            'Piston Twin Aircraft' => PistonTwinAircraftFormType::class,
            'Light Sport Aircraft' => LightSportAircraftFormType::class,
            'Experimental homebuilt aircraft' => ExperimentalHomebuiltAircraftDto::class,
            'Piston agricultural aircraft' => PistonAgriculturalAircraftFormType::class,
            'Piston amphibious flatplanes' => PistonAmphibiousFloatplanesFormType::class,
            'Piston helicopters' => PistonHelicoptersFormType::class,
            'Piston military aircraft' => PistonMilitaryAircraftFormType::class,
            'Turbine agricultural aircraft' => TurbineAgriculturalAircraftFormType::class,
            'Turbine helicopters' => TurbineHelicoptersFormType::class,
            'Turbine military aircraft' => TurbineMilitaryAircraftFormType::class,
            'Turbune amphibious floatplane' => TurbineAmphibiousFloatplanesFormType::class,
            'De-Ice Equipment' => DeIceEquipmentFormType::class,
            'Flight Simulators' => FlightSimulatorsFormType::class,
            'Fuel Tanks / Fuel Storage' => FuelTanksFuelStorageFormType::class,
            'Fuel Trucks' => FuelTrucksFormType::class,
            'Ground Power Units' => GroundPowerUnitsFormType::class,
            'Hangars' => HangarsFormType::class,
            'Runway Sweepers - Brooms' => RunwaySweepersBroomsFormType::class,
            'Tugs - Tow Bars' => TugsTowBarsFormType::class,
            'Drones' => DronesFormType::class,
            'Other' => OtherFormType::class
        };
    }

}