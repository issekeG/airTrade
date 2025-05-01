<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class LocaleSubscriber implements EventSubscriberInterface
{
    private string $defaultLocale = 'fr';
    private RequestStack $requestStack;

    public function __construct(string $defaultLocale, RequestStack $requestStack)
    {
        $this->defaultLocale = $defaultLocale;
        $this->requestStack = $requestStack;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        // Accède à la session via RequestStack
        $session = $this->requestStack->getCurrentRequest()->getSession();

        if (!$session) {
            return;
        }

        // Vérifie si _locale est dans la requête (GET/POST)
        if ($locale = $request->get('_locale')) {
            $session->set('_locale', $locale);
        } else {
            // Sinon on utilise celui stocké en session ou la locale par défaut
            $locale = $session->get('_locale', $this->defaultLocale);
        }

        $request->setLocale($locale);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 20]],
        ];
    }
}
