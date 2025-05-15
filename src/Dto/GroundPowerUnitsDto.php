<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class GroundPowerUnitsDto
{
    // General Section
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=20)
     */
    public ?string $regNumber = null;

    public ?bool $displayRegNumber = null;

    /**
     * @Assert\Choice({"", "IFR", "VFR"})
     */
    public ?string $flightRules = null;

    /**
     * @Assert\Length(max=10)
     */
    public ?string $locationAirportCode = null;

    public ?bool $displaySerialNumber = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $totalTime = null;

    /**
     * @Assert\PositiveOrZero()
     */
    public ?int $seatNumber = null;

    // Airframe Section
    public ?string $airframe = null;

    // Engine Section
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

    // Props Section
    public ?string $props = null;

    // Modifications Section
    public ?string $modifications = null;

    // Avionics Section
    public ?string $avionics = null;

    // Additional Equipment Section
    public ?string $equipment = null;

    // Exterior Section
    public ?string $exterior = null;

    /**
     * @Assert\Range(min=1900, max=2031)
     */
    public ?int $yearPainted = null;

    // Interior Section
    public ?string $interior = null;

    /**
     * @Assert\Range(min=1900, max=2031)
     */
    public ?int $yearInterior = null;

    // Inspection Status Section
    public ?string $inspection = null;

    // Shipping Dimensions Section
    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingLength = null;

    public ?string $shippingLengthUnit = 'inch';

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingWidth = null;

    public ?string $shippingWidthUnit = 'inch';

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingHeight = null;

    public ?string $shippingHeightUnit = 'inch';

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingWeight = null;

    public ?string $shippingWeightUnit = 'pound';
}