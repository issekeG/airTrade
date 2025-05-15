<?php

namespace App\Dto;

class PistonTwinAircraftDto
{
    // Section: Required Specs
    public ?string $registrationNumber = null;
    public ?bool $displayRegistrationNumber = null;
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;

    // Section: Airframe
    public ?float $totalTime = null;
    public ?float $rangeAircraft = null;
    public ?float $maxTakeoffWeight = null;
    public ?float $basicEmptyWeight = null;
    public ?float $usefulLoad = null;
    public ?float $fuelCapacityVolume = null;
    public ?bool $shortTakeOffLanding = null;
    public ?bool $auxiliaryFuelTank = null;
    public ?bool $logs = null;
    public ?bool $winglets = null;
    public ?bool $speedbrakes = null;
    public ?bool $spoilers = null;
    public ?string $airframeNotes = null;

    // Section: Engine 1
    public ?string $engine1Make = null;
    public ?string $engine1Model = null;
    public ?string $engine1SerialNumber = null;
    public ?float $engine1Horsepower = null;
    public ?float $engine1OverhaulTime = null;
    public ?string $engine1OverhaulType = null;
    public ?float $engine1TimeBetweenOverhaul = null;
    public ?bool $engine1AftermarketSTC = null;
    public ?string $engine1YearOverhauled = null;
    public ?float $engine1TimeRemainingToOverhaul = null;
    public ?int $engine1Cycles = null;
    public ?bool $engine1Turbocharged = null;
    public ?bool $engine1Turbonormalized = null;
    public ?string $engine1Notes = null;

    // Section: Engine 2
    public ?string $engine2Make = null;
    public ?string $engine2Model = null;
    public ?string $engine2SerialNumber = null;
    public ?float $engine2Horsepower = null;
    public ?float $engine2OverhaulTime = null;
    public ?string $engine2OverhaulType = null;
    public ?float $engine2TimeBetweenOverhaul = null;
    public ?bool $engine2AftermarketSTC = null;
    public ?string $engine2YearOverhauled = null;
    public ?float $engine2TimeRemainingToOverhaul = null;
    public ?int $engine2Cycles = null;
    public ?bool $engine2Turbocharged = null;
    public ?bool $engine2Turbonormalized = null;
    public ?string $engine2Notes = null;

    // Section: Props
    public ?string $prop1Make = null;
    public ?string $prop1Model = null;
    public ?float $prop1OverhaulTime = null;
    public ?string $prop1OverhaulType = null;
    public ?string $prop2Make = null;
    public ?string $prop2Model = null;
    public ?float $prop2OverhaulTime = null;
    public ?string $prop2OverhaulType = null;
    public ?int $numBlades = null;
    public ?string $bladeComposition = null;
    public ?bool $sweptBladePropellers = null;
    public ?bool $propsSync = null;
    public ?string $propsNotes = null;

    // Section: Modifications/Conversions
    public ?bool $dualAftBodyStrakes = null;
    public ?bool $vortexGenerators = null;
    public ?string $modifications = null;

    // Section: Avionics
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
    public ?bool $adsbEquipped = null;
    public ?bool $wideAreaAugSystem = null;
    public ?bool $localizerPerformanceVG = null;
    public ?bool $syntheticVisionTech = null;
    public ?bool $enhancedVisionSystem = null;
    public ?bool $yawDamper = null;
    public ?bool $activeTraffic = null;
    public ?bool $terrainWarningSystem = null;
    public ?bool $engineMonitor = null;
    public ?string $avionicsNotes = null;

    // Section: Additional Equipment
    public ?bool $wifi = null;
    public ?bool $pressurized = null;
    public ?bool $oxygenSystem = null;
    public ?bool $knownIce = null;
    public ?bool $inadvertentIceProtection = null;
    public ?bool $airConditioning = null;
    public ?bool $floatKit = null;
    public ?bool $includesFloats = null;
    public ?string $floatType = null;
    public ?string $equipmentNotes = null;

    // Section: Exterior
    public ?string $yearPainted = null;
    public ?string $exteriorNotes = null;

    // Section: Interior
    public ?string $yearInterior = null;
    public ?int $seatNumber = null;
    public ?bool $lavatory = null;
    public ?string $interiorConfiguration = null;
    public ?string $interiorNotes = null;

    // Section: Inspection Status
    public ?string $inspectionStatus = null;
    public ?bool $airworthy = null;
}
