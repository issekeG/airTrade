<?php

namespace App\Dto;

class FuelTrucksDto
{
    // Required Specs
    public ?string $regNumber = null;

    // General Section
    public ?bool $displayRegNumber = null;
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

    // Modifications Section
    public ?string $modifications = null;

    // Avionics Section
    public ?string $adsbEquipped = null;
    public ?string $avionics = null;

    // Additional Equipment Section
    public ?string $equipment = null;

    // Exterior Section
    public ?string $exterior = null;
    public ?int $yearPainted = null;

    // Interior Section
    public ?string $interior = null;
    public ?int $yearInterior = null;

    // Inspection Status Section
    public ?string $inspection = null;

    // Shipping Dimensions Section
    public ?float $shippingLength = null;
    public ?float $shippingWidth = null;
    public ?float $shippingHeight = null;
    public ?float $shippingWeight = null;
}