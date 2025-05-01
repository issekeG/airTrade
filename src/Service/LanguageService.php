<?php
namespace App\Service;

class LanguageService
{
    public function getAvailableLanguages(): array
    {
        return [
            'en' => ['label' => 'English', 'icon' => 'flag-icon-gb'],
            'fr' => ['label' => 'Français', 'icon' => 'flag-icon-fr'],
            'es' => ['label' => 'Español', 'icon' => 'flag-icon-es'],
            'de' => ['label' => 'Deutsch', 'icon' => 'flag-icon-de'],
        ];
    }
}
