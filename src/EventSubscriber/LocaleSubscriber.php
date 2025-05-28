<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class LocaleSubscriber implements EventSubscriberInterface
{
    private string $defaultLocale;
    private RequestStack $requestStack;

    public function __construct(string $defaultLocale, RequestStack $requestStack)
    {
        $this->defaultLocale = $defaultLocale;
        $this->requestStack = $requestStack;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $session = $this->requestStack->getCurrentRequest()?->getSession();

        if (!$session) {
            return;
        }

        if ($locale = $request->get('_locale')) {
            // Si défini manuellement dans l'URL (ex: ?_locale=fr)
            $session->set('_locale', $locale);
        } elseif ($session->has('_locale')) {
            // Si déjà stocké en session
            $locale = $session->get('_locale');
        } else {
            // Sinon, détection à partir du navigateur
            $preferredLanguages = $request->getLanguages(); // Ex: ['fr-FR', 'fr', 'en-US']
            $rawLocale = $preferredLanguages[0] ?? $this->defaultLocale;
            $locale = substr($rawLocale, 0, 2);
            $session->set('_locale', $locale);
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
