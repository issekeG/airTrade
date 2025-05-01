<?php

namespace App\Dto;

class JetAircraftDto
{
    // Required Specs
    public ?string $regNumber = null;
    public ?int $totalTime = null;
    public ?string $engineProgram = null;

    // General
    public ?bool $displayRegNumber = null;
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;

    // Airframe
    public ?int $totalLandings = null;
    public ?int $rangeAircraft = null;
    public ?int $maxRampWeight = null;
    public ?int $maxTakeoffWeight = null;
    public ?int $maxLandingWeight = null;
    public ?int $maxPayLoad = null;
    public ?int $maxZeroFuelWeight = null;
    public ?int $basicEmptyWeight = null;
    public ?int $basicOperatingWeight = null;
    public ?int $fuelCapacity = null;
    public ?bool $landingGearOverhaul = null;
    public ?int $landingGearCycles = null;
    public ?bool $winglets = null;
    public ?string $maintenanceTracking = null;
    public ?string $partsProgram = null;
    public ?float $partsProgramRate = null;
    public ?string $airframe = null;

    // Engine Program
    public ?float $engineProgramRate = null;
    public ?float $engineProgramCoverage = null;
    public ?string $engine = null;

    // Engine 1
    public ?string $engineMake = null;
    public ?string $engineModel = null;
    public ?string $engineSerialNum = null;
    public ?int $overhaulTime = null;
    public ?string $overhaulType = null;
    public ?int $timeBetweenOverhaul = null;
    public ?int $engineCycles = null;
    public ?int $hotSectionTime = null;
    public ?bool $onCondition = null;
    public ?string $engine1Notes = null;

    // Engine 2
    public ?string $engineMake2 = null;
    public ?string $engineModel2 = null;
    public ?string $engineSerialNum2 = null;
    public ?int $overhaulTime2 = null;
    public ?string $overhaulType2 = null;
    public ?int $timeBetweenOverhaul2 = null;
    public ?int $engineCycles2 = null;
    public ?int $hotSectionTime2 = null;
    public ?bool $onCondition2 = null;
    public ?string $engine2Notes = null;

    // Engine 3
    public ?string $engineMake3 = null;
    public ?string $engineModel3 = null;
    public ?string $engineSerialNum3 = null;
    public ?int $overhaulTime3 = null;
    public ?string $overhaulType3 = null;
    public ?int $timeBetweenOverhaul3 = null;
    public ?int $engineCycles3 = null;
    public ?int $hotSectionTime3 = null;
    public ?bool $onCondition3 = null;
    public ?string $engine3Notes = null;

    // Engine 4
    public ?string $engineMake4 = null;
    public ?string $engineModel4 = null;
    public ?string $engineSerialNum4 = null;
    public ?int $overhaulTime4 = null;
    public ?string $overhaulType4 = null;
    public ?int $timeBetweenOverhaul4 = null;
    public ?int $engineCycles4 = null;
    public ?int $hotSectionTime4 = null;
    public ?bool $onCondition4 = null;
    public ?string $engine4Notes = null;

    // Auxiliary Power Unit
    public ?bool $auxiliaryPowerUnit = null;
    public ?int $auxiliaryPowerUnitTime = null;
    public ?string $auxiliaryPowerUnitProgram = null;
    public ?float $auxiliaryPowerUnitProgramRate = null;
    public ?string $apuNotes = null;

    // Avionics
    public ?string $flightDeckManufacturer = null;
    public ?string $flightDeckModel = null;
    public ?string $primaryFlightDisplay1Manufacturer = null;
    public ?string $primaryFlightDisplay1Model = null;
    public ?string $primaryFlightDisplay2Manufacturer = null;
    public ?string $primaryFlightDisplay2Model = null;
    public ?string $multiFunctionDisplay1Manufacturer = null;
    public ?string $multiFunctionDisplay1Model = null;
    public ?string $multiFunctionDisplay2Manufacturer = null;
    public ?string $multiFunctionDisplay2Model = null;
    public ?string $gps1Manufacturer = null;
    public ?string $gps1Model = null;
    public ?string $gps2Manufacturer = null;
    public ?string $gps2Model = null;
    public ?string $transponder1Manufacturer = null;
    public ?string $transponder1Model = null;
    public ?string $transponder2Manufacturer = null;
    public ?string $transponder2Model = null;
    public ?string $autopilotManufacturer = null;
    public ?string $autopilotModel = null;
    public ?string $avionicsProgram = null;
    public ?float $avionicsProgramRate = null;
    public ?bool $adsbEquipped = null;
    public ?bool $futureAirNavSys = null;
    public ?bool $wideAreaAugSystem = null;
    public ?bool $localizerPerformanceVG = null;
    public ?bool $requiredNavPerformance = null;
    public ?bool $syntheticVisionTech = null;
    public ?bool $controllerPilotDataLinkComm = null;
    public ?bool $enhancedVisionSystem = null;
    public ?string $avionics = null;

    // Additional Equipment
    public ?bool $wifi = null;
    public ?string $equipment = null;

    // Exterior
    public ?int $yearPainted = null;
    public ?string $exterior = null;

    // Interior
    public ?int $yearInterior = null;
    public ?int $seatNumber = null;
    public ?bool $galley = null;
    public ?string $galleyConfiguration = null;
    public ?bool $crewRest = null;
    public ?string $crewRestConfiguration = null;
    public ?bool $lavatory = null;
    public ?string $lavatoryConfiguration = null;
    public ?string $interior = null;

    // Modifications/Conversions
    public ?string $modifications = null;

    // Inspection Status
    public ?string $inspection = null;
    public ?bool $airworthy = null;
}