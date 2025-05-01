<?php

namespace App\Dto;

class PistonSingleAircraftDto {
    // Section 1: Required Specs
    public ?string $regNumber = null;
    public ?bool $displayRegNumber = null;
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;

    // Section 2: Airframe
    public ?float $totalTime = null;
    public ?float $rangeAircraft = null;
    public ?float $maxTakeoffWeight = null;
    public ?float $basicEmptyWeight = null;
    public ?float $usefulLoad = null;
    public ?bool $shortTakeOffLanding = null;
    public ?float $fuelCapacityVolume = null;
    public ?bool $auxiliaryFuelTank = null;
    public ?bool $logs = null;
    public ?bool $speedbrakes = null;
    public ?bool $spoilers = null;
    public ?string $airframeNotes = null;

    // Section 3: Engine
    public ?string $engineMake = null;
    public ?string $engineModel = null;
    public ?string $engineSerialNum = null;
    public ?float $horsepowerEngine = null;
    public ?float $overhaulTime = null;
    public ?string $overhaulType = null;
    public ?float $timeBetweenOverhaul = null;
    public ?bool $aftermarketEngineSTC = null;
    public ?int $yearOverhauled = null;
    public ?float $timeRemainingToOverhaul = null;
    public ?int $engineCycles = null;
    public ?bool $turbo = null;
    public ?bool $turboNormalized = null;
    public ?string $engineNotes = null;

    // Section 4: Props
    public ?string $propMake = null;
    public ?string $propModel = null;
    public ?float $propOverhaulTime = null;
    public ?string $propOverhaulType = null;
    public ?int $numBlades = null;
    public ?string $bladeComposition = null;
    public ?bool $sweptBladePropellers = null;
    public ?string $propsNotes = null;

    // Section 5: Modifications/Conversions
    public ?bool $vortexGenerators = null;
    public ?string $modificationsNotes = null;

    // Section 6: Avionics
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

    // Section 7: Additional Equipment
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

    // Section 8: Exterior
    public ?int $yearPainted = null;
    public ?string $exteriorNotes = null;

    // Section 9: Interior
    public ?int $yearInterior = null;
    public ?int $seatNumber = null;
    public ?string $interiorConfiguration = null;
    public ?string $interiorNotes = null;

    // Section 10: Inspection Status
    public ?string $inspectionStatus = null;
    public ?bool $airworthy = null;
}