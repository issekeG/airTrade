<?php

namespace App\Service;


use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;

class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer){
        $this->mailer = $mailer;
    }

    public function sendConfirmAccountEmail(string $to, string $username, string $confirmationUrl): void{
        $email = (new TemplatedEmail())
            ->from('i.gickelokabi@antalasoft.com')
            ->to($to)
            ->subject('Bienvenue sur notre plateforme !')
            ->htmlTemplate('emails/welcome.html.twig')
            ->context([
                'username' => $username,
                'confirmation_url' => $confirmationUrl,
            ]);

        $this->mailer->send($email);
    }

    public function sendContactNotificationEmail(array $data, string $destinationEmail, string $aircraftTitle, string $subject): void
    {
        $email = (new TemplatedEmail())
            ->from('contact@antalasoft.com') // Expéditeur = celui qui remplit le formulaire
            ->to($destinationEmail) // Le destinataire fixe
            ->subject($subject)
            ->htmlTemplate('emails/contact_notification.html.twig')
            ->context([
                'firstName' => $data['firstName'],
                'content' => $data['content'],
                'aircraftTitle' => $aircraftTitle,
            ]);

        $this->mailer->send($email);
    }


}