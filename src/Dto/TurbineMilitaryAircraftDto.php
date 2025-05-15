<?php

namespace App\Dto;

class TurbineMilitaryAircraftDto
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

    // Engine Section
    public ?float $hotSectionTime = null;
    public ?float $hotSectionTime2 = null;
    public ?float $hotSectionTime3 = null;
    public ?float $hotSectionTime4 = null;
    public ?float $overhaulTime = null;
    public ?float $overhaulTime2 = null;
    public ?float $overhaulTime3 = null;
    public ?float $overhaulTime4 = null;
    public ?string $overhaulType = null;
    public ?string $overhaulType2 = null;
    public ?string $overhaulType3 = null;
    public ?string $overhaulType4 = null;
    public ?string $engineNotes = null;

    // Props Section
    public ?string $propNotes = null;

    // Modifications/Conversions Section
    public ?string $modificationsNotes = null;

    // Avionics Section
    public ?bool $adsbEquipped = null;
    public ?string $avionicsNotes = null;

    // Additional Equipment Section
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