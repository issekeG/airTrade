<?php

namespace App\Service;

use App\Dto\JetAircraftDto;
use App\Form\JetAircraftFormType;
use App\Form\PistonSingleAircraftFormType;
use App\Form\TurbopropAircraftFormType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FormTypeService
{

    public function resolveFormType(string $category): string
    {
        return match ($category) {
            'Jet Aircraft' => JetAircraftFormType::class,
            'Turboprop Aircraft' => TurbopropAircraftFormType::class,
            'Piston Single Aircraft' => PistonSingleAircraftFormType::class,
        };
    }

}