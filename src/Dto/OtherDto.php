<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class OtherDto
{
    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingLength = null;

    /**
     * @Assert\Choice({"inch", "foot", "yard", "millimeter", "centimeter", "meter"})
     */
    public ?string $shippingLengthUnit = 'inch';

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingWidth = null;

    /**
     * @Assert\Choice({"inch", "foot", "yard", "millimeter", "centimeter", "meter"})
     */
    public ?string $shippingWidthUnit = 'inch';

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingHeight = null;

    /**
     * @Assert\Choice({"inch", "foot", "yard", "millimeter", "centimeter", "meter"})
     */
    public ?string $shippingHeightUnit = 'inch';

    /**
     * @Assert\PositiveOrZero()
     */
    public ?float $shippingWeight = null;

    /**
     * @Assert\Choice({"pound", "ton", "kilogram", "metric ton", "ounce"})
     */
    public ?string $shippingWeightUnit = 'pound';
}