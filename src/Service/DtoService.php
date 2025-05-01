<?php

namespace App\Service;

use App\Dto\JetAircraftDto;
use App\Dto\PistonSingleAircraftDto;
use App\Dto\TurbopropAircraftDto;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DtoService
{


    public function getDtoByCategory(string $category, SessionInterface $session)
    {
        return match ($category) {
            'Jet Aircraft' => $session->get('form_data', new JetAircraftDto()),
            'Turboprop Aircraft' => $session->get('form_data', new TurbopropAircraftDto()),
            'Piston Single Aircraft' => $session->get('form_data', new PistonSingleAircraftDto()),
        };
    }

}


