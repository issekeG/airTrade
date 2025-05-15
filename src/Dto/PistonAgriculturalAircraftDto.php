<?php

namespace App\Dto;

class PistonAgriculturalAircraftDto
{
    // Required Specs Section
    public ?string $regNumber = null;
    public ?bool $displayRegNumber = null;

    // General Section
    public ?string $flightRules = null;
    public ?string $locationAirportCode = null;
    public ?bool $displaySerialNumber = null;
    public ?float $totalTime = null;
    public ?int $seatNumber = null;

    // Airframe Section
    public ?string $airframe = null;

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
    public ?string $engine = null;

    // Props Section
    public ?string $props = null;

    // Modifications/Conversions Section
    public ?string $modifications = null;

    // Avionics Section
    public ?bool $adsbEquipped = null;
    public ?string $avionics = null;

    // Additional Equipment Section
    public ?string $equipment = null;

    // Exterior Section
    public ?string $exterior = null;
    public ?string $yearPainted = null;

    // Interior Section
    public ?string $interior = null;
    public ?string $yearInterior = null;

    // Inspection Status Section
    public ?string $inspection = null;
}
