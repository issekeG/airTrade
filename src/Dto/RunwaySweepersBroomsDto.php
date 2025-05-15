<?php

namespace App\Dto;

class RunwaySweepersBroomsDto
{
    private ?float $shippingLength = null;
    private ?string $shippingLengthUnit = 'inch';
    private ?float $shippingWidth = null;
    private ?string $shippingWidthUnit = 'inch';
    private ?float $shippingHeight = null;
    private ?string $shippingHeightUnit = 'inch';
    private ?float $shippingWeight = null;
    private ?string $shippingWeightUnit = 'pound';

    // Getters and Setters
    public function getShippingLength(): ?float
    {
        return $this->shippingLength;
    }

    public function setShippingLength(?float $shippingLength): self
    {
        $this->shippingLength = $shippingLength;
        return $this;
    }

    public function getShippingLengthUnit(): ?string
    {
        return $this->shippingLengthUnit;
    }

    public function setShippingLengthUnit(?string $shippingLengthUnit): self
    {
        $this->shippingLengthUnit = $shippingLengthUnit;
        return $this;
    }

    public function getShippingWidth(): ?float
    {
        return $this->shippingWidth;
    }

    public function setShippingWidth(?float $shippingWidth): self
    {
        $this->shippingWidth = $shippingWidth;
        return $this;
    }

    public function getShippingWidthUnit(): ?string
    {
        return $this->shippingWidthUnit;
    }

    public function setShippingWidthUnit(?string $shippingWidthUnit): self
    {
        $this->shippingWidthUnit = $shippingWidthUnit;
        return $this;
    }

    public function getShippingHeight(): ?float
    {
        return $this->shippingHeight;
    }

    public function setShippingHeight(?float $shippingHeight): self
    {
        $this->shippingHeight = $shippingHeight;
        return $this;
    }

    public function getShippingHeightUnit(): ?string
    {
        return $this->shippingHeightUnit;
    }

    public function setShippingHeightUnit(?string $shippingHeightUnit): self
    {
        $this->shippingHeightUnit = $shippingHeightUnit;
        return $this;
    }

    public function getShippingWeight(): ?float
    {
        return $this->shippingWeight;
    }

    public function setShippingWeight(?float $shippingWeight): self
    {
        $this->shippingWeight = $shippingWeight;
        return $this;
    }

    public function getShippingWeightUnit(): ?string
    {
        return $this->shippingWeightUnit;
    }

    public function setShippingWeightUnit(?string $shippingWeightUnit): self
    {
        $this->shippingWeightUnit = $shippingWeightUnit;
        return $this;
    }
}