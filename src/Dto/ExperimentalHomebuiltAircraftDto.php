<?php

namespace App\Dto;

class ExperimentalHomebuiltAircraftDto
{
    // Required Specs
    public ?string $regNumber = null;

    // General
    public ?bool $displayRegNumber = null;
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;
    public ?float $totalTime = null;
    public ?int $seatNumber = null;

    // Airframe
    public ?string $airframe = null;

    // Engine
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
    public ?string $engine = null;

    // Props
    public ?string $props = null;

    // Modifications/Conversions
    public ?string $modifications = null;

    // Avionics
    public ?string $adsbEquipped = null;
    public ?string $avionics = null;

    // Additional Equipment
    public ?string $equipment = null;

    // Exterior
    public ?string $exterior = null;
    public ?int $yearPainted = null;

    // Interior
    public ?string $interior = null;
    public ?int $yearInterior = null;

    // Inspection Status
    public ?string $inspection = null;
}