<?php

namespace App\Service;

use App\Dto\DeIceEquipmentDto;
use App\Dto\DroneDto;
use App\Dto\ExperimentalHomebuiltAircraftDto;
use App\Dto\FlightSimulatorsDto;
use App\Dto\FuelTanksFuelStorageDto;
use App\Dto\FuelTrucksDto;
use App\Dto\GroundPowerUnitsDto;
use App\Dto\HangarsDto;
use App\Dto\JetAircraftDto;
use App\Dto\LightSportAircraftDto;
use App\Dto\OtherDto;
use App\Dto\PistonAgriculturalAircraftDto;
use App\Dto\PistonAmphibiousFloatplanesDto;
use App\Dto\PistonHelicoptersDto;
use App\Dto\PistonMilitaryAircraftDto;
use App\Dto\PistonSingleAircraftDto;
use App\Dto\PistonTwinAircraftDto;
use App\Dto\RunwaySweepersBroomsDto;
use App\Dto\TugsTowBarsDto;
use App\Dto\TurbineAgriculturalAircraftDto;
use App\Dto\TurbineAmphibiousFloatplanesDto;
use App\Dto\TurbineHelicoptersDto;
use App\Dto\TurbineMilitaryAircraftDto;
use App\Dto\TurbopropAircraftDto;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DtoService
{
    public function getDtoByCategory(string $category, SessionInterface $session)
    {
        return match ($category) {
            'Jet Aircraft' => $session->get('form_data', new JetAircraftDto()),
            'Turboprop Aircraft' => $session->get('form_data', new TurbopropAircraftDto()),
            'Piston Single Aircraft' => $session->get('form_data', new PistonSingleAircraftDto()),
            'Piston Twin Aircraft' => $session->get('form_data', new PistonTwinAircraftDto()),
            'Light Sport Aircraft' => $session->get('form_data', new LightSportAircraftDto()),
            'Experimental homebuilt aircraft' => $session->get('form_data', new ExperimentalHomebuiltAircraftDto()),
            'Piston agricultural aircraft' => $session->get('form_data', new PistonAgriculturalAircraftDto()),
            'Piston amphibious flatplanes' => $session->get('form_data', new PistonAmphibiousFloatplanesDto()),
            'Piston helicopters' => $session->get('form_data', new PistonHelicoptersDto()),
            'Piston military aircraft' => $session->get('form_data', new PistonMilitaryAircraftDto()),
            'Turbine agricultural aircraft' => $session->get('form_data',new TurbineAgriculturalAircraftDto()),
            'Turbine helicopters' => $session->get('form_data', new TurbineHelicoptersDto()),
            'Turbine military aircraft' => $session->get('form_data', new TurbineMilitaryAircraftDto()),
            'Turbune amphibious floatplane' => $session->get('form_data', new TurbineAmphibiousFloatplanesDto()),
            'De-Ice Equipment' => $session->get('form_data', new DeIceEquipmentDto()),
            'Flight Simulators' => $session->get('form_data', new FlightSimulatorsDto()),
            'Fuel Tanks / Fuel Storage' => $session->get('form_data', new FuelTanksFuelStorageDto()),
            'Fuel Trucks' => $session->get('form_data', new FuelTrucksDto()),
            'Ground Power Units' => $session->get('form_data', new GroundPowerUnitsDto()),
            'Hangars' => $session->get('form_data', new HangarsDto()),
            'Runway Sweepers - Brooms' => $session->get('form_data', new RunwaySweepersBroomsDto()),
            'Tugs - Tow Bars' => $session->get('form_data', new TugsTowBarsDto()),
            'Drones' => $session->get('form_data', new DroneDto()),
            'Other' => $session->get('form_data', new OtherDto())

        };
    }

}


