<?php

namespace App\Dto;

class TugsTowBarsDto
{
    // Section: General
    private ?bool $displayRegNumber = null;
    private ?string $regNumber = null;
    private ?string $flightRules = null;
    private ?string $locationAirportCode = null;
    private ?bool $displaySerialNumber = null;
    private ?float $totalTime = null;
    private ?int $seatNumber = null;

    // Section: Airframe
    private ?string $airframe = null;

    // Section: Engine
    private ?string $engine = null;
    private ?float $hotSectionTime = null;
    private ?float $hotSectionTime2 = null;
    private ?float $hotSectionTime3 = null;
    private ?float $hotSectionTime4 = null;
    private ?float $overhaulTime = null;
    private ?float $overhaulTime2 = null;
    private ?float $overhaulTime3 = null;
    private ?float $overhaulTime4 = null;
    private ?string $overhaulType = null;
    private ?string $overhaulType2 = null;
    private ?string $overhaulType3 = null;
    private ?string $overhaulType4 = null;

    // Section: Props
    private ?string $props = null;

    // Section: Modifications/Conversions
    private ?string $modifications = null;

    // Section: Avionics
    private ?string $avionics = null;

    // Section: Additional Equipment
    private ?string $equipment = null;

    // Section: Exterior
    private ?string $exterior = null;
    private ?string $yearPainted = null;

    // Section: Interior
    private ?string $interior = null;
    private ?string $yearInterior = null;

    // Section: Inspection Status
    private ?string $inspection = null;

    // Section: Shipping Dimensions
    private ?float $shippingLength = null;
    private ?string $shippingLengthUnit = 'inch';
    private ?float $shippingWidth = null;
    private ?string $shippingWidthUnit = 'inch';
    private ?float $shippingHeight = null;
    private ?string $shippingHeightUnit = 'inch';
    private ?float $shippingWeight = null;
    private ?string $shippingWeightUnit = 'pound';

    // Getters and Setters...

    public function getDisplayRegNumber(): ?bool
    {
        return $this->displayRegNumber;
    }

    public function setDisplayRegNumber(?bool $displayRegNumber): self
    {
        $this->displayRegNumber = $displayRegNumber;
        return $this;
    }

    public function getRegNumber(): ?string
    {
        return $this->regNumber;
    }

    public function setRegNumber(?string $regNumber): self
    {
        $this->regNumber = $regNumber;
        return $this;
    }

    // [Continuer avec tous les autres getters/setters...]
    // Pour des raisons de concision, je montre seulement quelques exemples

    public function getFlightRules(): ?string
    {
        return $this->flightRules;
    }

    public function setFlightRules(?string $flightRules): self
    {
        $this->flightRules = $flightRules;
        return $this;
    }

    public function getLocationAirportCode(): ?string
    {
        return $this->locationAirportCode;
    }

    public function setLocationAirportCode(?string $locationAirportCode): self
    {
        $this->locationAirportCode = $locationAirportCode;
        return $this;
    }

    // ... [Tous les autres getters/setters]
}