<?php

namespace App\Dto;

class PistonAmphibiousFloatplanesDto
{
    // Required Specs
    public ?string $registrationNumber = null;

    // General Section
    public ?bool $displayRegistrationNumber = null;
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;
    public ?float $totalTime = null;
    public ?int $seatNumber = null;

    // Airframe Section
    public ?string $airframeNotes = null;

    // Engine 1 Section
    public ?string $engineMake = null;
    public ?string $engineModel = null;
    public ?string $engineSerialNumber = null;
    public ?float $horsepowerEngine = null;
    public ?string $horsepowerUnit = null;
    public ?float $overhaulTime = null;
    public ?string $overhaulType = null;
    public ?float $timeBetweenOverhaul = null;
    public ?float $timeRemainingToOverhaul = null;
    public ?int $engineCycles = null;
    public ?bool $turbocharged = null;
    public ?bool $turbonormalized = null;
    public ?string $engineNotes = null;

    // Engine 2 Section
    public ?string $engineMake2 = null;
    public ?string $engineModel2 = null;
    public ?string $engineSerialNumber2 = null;
    public ?float $horsepowerEngine2 = null;
    public ?string $horsepowerUnit2 = null;
    public ?float $overhaulTime2 = null;
    public ?string $overhaulType2 = null;
    public ?float $timeBetweenOverhaul2 = null;
    public ?float $timeRemainingToOverhaul2 = null;
    public ?int $engineCycles2 = null;
    public ?bool $turbocharged2 = null;
    public ?bool $turbonormalized2 = null;
    public ?string $engine2Notes = null;

    // Props Section
    public ?string $propNotes = null;

    // Modifications/Conversions Section
    public ?string $modificationsNotes = null;

    // Avionics Section
    public ?bool $adsbEquipped = null;
    public ?string $avionicsNotes = null;

    // Additional Equipment Section
    public ?string $floatType = null;
    public ?bool $includesWheeledLandingGear = null;
    public ?string $equipmentNotes = null;

    // Exterior Section
    public ?int $yearPainted = null;
    public ?string $exteriorNotes = null;

    // Interior Section
    public ?int $yearInterior = null;
    public ?string $interiorNotes = null;

    // Inspection Status Section
    public ?string $inspectionStatus = null;
}
