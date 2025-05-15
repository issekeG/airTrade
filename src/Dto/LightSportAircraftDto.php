<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class LightSportAircraftDto
{
    // Required Specs section
    /**
     * @Assert\NotBlank()
     */
    public ?string $regNumber = null;

    // General section
    public ?bool $displayRegNumber = false;

    /**
     * @Assert\Choice({"", "IFR", "VFR"})
     */
    public ?string $flightRules = null;

    public ?string $locationAirportCode = null;

    public ?bool $displaySerialNumber = false;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $totalTime = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?int $seatNumber = null;

    // Airframe section
    public ?string $airframe = null;

    // Engine section
    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $hotSectionTime = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $hotSectionTime2 = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $hotSectionTime3 = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $hotSectionTime4 = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $overhaulTime = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $overhaulTime2 = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $overhaulTime3 = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $overhaulTime4 = null;

    /**
     * @Assert\Choice({"", "SCMOH", "SFOH", "SFRM", "SMOH", "SNEW", "SOH", "STOH", "CZI"})
     */
    public ?string $overhaulType = null;

    /**
     * @Assert\Choice({"", "SCMOH", "SFOH", "SFRM", "SMOH", "SNEW", "SOH", "STOH", "CZI"})
     */
    public ?string $overhaulType2 = null;

    /**
     * @Assert\Choice({"", "SCMOH", "SFOH", "SFRM", "SMOH", "SNEW", "SOH", "STOH", "CZI"})
     */
    public ?string $overhaulType3 = null;

    /**
     * @Assert\Choice({"", "SCMOH", "SFOH", "SFRM", "SMOH", "SNEW", "SOH", "STOH", "CZI"})
     */
    public ?string $overhaulType4 = null;

    public ?string $engine = null;

    // Props section
    public ?string $props = null;

    // Modifications/Conversions section
    public ?string $modifications = null;

    // Avionics section
    /**
     * @Assert\Choice({"0", "1"})
     */
    public ?string $adsbEquipped = null;

    public ?string $avionics = null;

    // Additional Equipment section
    public ?string $equipment = null;

    // Exterior section
    public ?string $exterior = null;

    /**
     * @Assert\Range(min=1900, max=2031)
     */
    public ?int $yearPainted = null;

    // Interior section
    public ?string $interior = null;

    /**
     * @Assert\Range(min=1900, max=2031)
     */
    public ?int $yearInterior = null;

    // Inspection Status section
    public ?string $inspection = null;
}