<?php

namespace App\Dto;

class TurbopropAircraftDto
{
    // Section: Required Specs
    public ?string $registrationNumber = null;
    public ?bool $displayRegistrationNumber = null;
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;

    // Section: Airframe
    public ?float $totalTime = null;
    public ?int $totalLandings = null;
    public ?float $rangeAircraft = null;
    public ?float $maxRampWeight = null;
    public ?float $maxTakeoffWeight = null;
    public ?float $maxLandingWeight = null;
    public ?float $maxZeroFuelWeight = null;
    public ?float $basicEmptyWeight = null;
    public ?float $basicOperatingWeight = null;
    public ?float $usefulLoad = null;
    public ?float $fuelCapacity = null;
    public ?float $fuelCapacityVolume = null;
    public ?bool $logs = null;
    public ?bool $landingGearOverhaul = null;
    public ?int $landingGearCycles = null;
    public ?bool $winglets = null;
    public ?string $partsProgram = null;
    public ?float $partsProgramRate = null;
    public ?string $airframeNotes = null;

    // Section: Engine Program
    public ?string $engineProgram = null;
    public ?float $engineProgramRate = null;
    public ?float $engineProgramCoverage = null;
    public ?string $engineNotes = null;

    // Section: Engine 1
    public ?string $engineMake = null;
    public ?string $engineModel = null;
    public ?string $engineSerialNumber = null;
    public ?float $overhaulTime = null;
    public ?string $overhaulType = null;
    public ?float $timeBetweenOverhaul = null;
    public ?int $engineCycles = null;
    public ?float $hotSectionTime = null;
    public ?string $engine1Notes = null;

    // Section: Engine 2
    public ?string $engineMake2 = null;
    public ?string $engineModel2 = null;
    public ?string $engineSerialNumber2 = null;
    public ?float $overhaulTime2 = null;
    public ?string $overhaulType2 = null;
    public ?float $timeBetweenOverhaul2 = null;
    public ?int $engineCycles2 = null;
    public ?float $hotSectionTime2 = null;
    public ?string $engine2Notes = null;

    // Section: Auxiliary Power Unit (APU)
    public ?bool $auxiliaryPowerUnit = null;
    public ?string $auxiliaryPowerUnitProgram = null;
    public ?float $auxiliaryPowerUnitProgramRate = null;
    public ?string $apuNotes = null;

    // Section: Props
    public ?string $propMake = null;
    public ?string $propModel = null;
    public ?float $propOverhaulTime = null;
    public ?string $propOverhaulType = null;
    public ?string $propMake2 = null;
    public ?string $propModel2 = null;
    public ?float $propOverhaulTime2 = null;
    public ?string $propOverhaulType2 = null;
    public ?int $numBlades = null;
    public ?bool $sweptBladePropellers = null;
    public ?bool $powerPropellers = null;
    public ?string $propsNotes = null;

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
    public ?string $avionicsProgram = null;
    public ?float $avionicsProgramRate = null;
    public ?bool $adsbEquipped = null;
    public ?bool $futureAirNavSys = null;
    public ?bool $wideAreaAugSystem = null;
    public ?bool $localizerPerformanceVG = null;
    public ?bool $syntheticVisionTech = null;
    public ?bool $controllerPilotDataLinkComm = null;
    public ?string $avionicsNotes = null;

    // Section: Additional Equipment
    public ?bool $wifi = null;
    public ?bool $pressurized = null;
    public ?float $oxygenSystem = null;
    public ?bool $knownIce = null;
    public ?bool $inadvertentIceProtection = null;
    public ?bool $floatKit = null;
    public ?bool $includesFloats = null;
    public ?string $floatType = null;
    public ?string $equipmentNotes = null;

    // Section: Exterior
    public ?int $yearPainted = null;
    public ?string $exteriorNotes = null;

    // Section: Interior
    public ?int $yearInterior = null;
    public ?int $seatNumber = null;
    public ?string $interiorConfiguration = null;
    public ?bool $galley = null;
    public ?string $galleyConfiguration = null;
    public ?bool $lavatory = null;
    public ?string $lavatoryConfiguration = null;
    public ?string $interiorNotes = null;

    // Section: Modifications/Conversions
    public ?bool $dualAftBodyStrakes = null;
    public ?bool $wingLockerSystem = null;
    public ?bool $ramAirRecoverySystem = null;
    public ?bool $highFlotationGearDoors = null;
    public ?bool $enhancedPerformanceLeadingEdges = null;
    public ?string $modificationsNotes = null;

    // Section: Inspection Status
    public ?string $inspectionStatus = null;
    public ?bool $airworthy = null;
}