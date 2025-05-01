<?php
namespace App\Controller;

use App\Form\AircraftStep1Type;
use App\Form\AircraftStep2Type;
use App\Form\AircraftStep3Type;
use App\Form\ImageUploadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Aircraft;
use App\Entity\AircraftImage;
use App\Entity\AirCraftCategory;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\VideoTrimmer;

class AircraftControllerTest extends AbstractController
{

    #[\Symfony\Component\Routing\Attribute\Route('teste/register/step={step}', name: 'aircraft_wizard_form_teste', requirements: ['step' => '\d+'])]
    public function formWizarsd(int $step, Request $request, SessionInterface $session, VideoTrimmer $videoTrimmer, EntityManagerInterface $em): Response
    {
        $aircraft = $session->get('aircraft', new Aircraft());

        $steps = [
            1 => AircraftStep1Type::class,
            2 => AircraftStep2Type::class,
            3 => AircraftStep3Type::class,
            4 => ImageUploadType::class,
        ];

        if (!array_key_exists($step, $steps)) {
            return $this->redirectToRoute('aircraft_wizard_form', ['step' => 1]);
        }


        $form = $this->createForm($steps[$step], ($step === count($steps) ? new AircraftImage() : $aircraft));
        $form->handleRequest($request);
        $trimmedFilename = null;

        if ($form->isSubmitted() && $form->isValid()) {
            if ($step === count($steps)) {
                // Récupérer les fichiers téléchargés
                $uploadedFiles = $form->get('imageFile')->getData();

                // Parcourir chaque fichier et créer une entité AircraftImage
                foreach ($uploadedFiles as $uploadedFile) {
                    $aircraftImage = new AircraftImage();
                    $aircraftImage->setImageFile($uploadedFile); // Utilisez setImageFile pour VichUploader
                    $aircraftImage->setAircraft($aircraft); // Associez l'image à l'avion
                    $em->persist($aircraftImage);
                }

                /** @var UploadedFile $videoFile */
                $videoFile = $form->get('videoFile')->getData();

                if ($videoFile) {
                    $uploadsDir = $this->getParameter('videos_directory');
                    $newFilename = uniqid() . '.' . $videoFile->guessExtension();

                    // Déplacer le fichier vers le répertoire d'uploads
                    $videoFile->move($uploadsDir, $newFilename);

                    $trimmedFilename = 'trimmed_' . $newFilename;
                    $videoTrimmer->trimVideo(
                        $uploadsDir . '/' . $newFilename,
                        $uploadsDir . '/' . $trimmedFilename,
                        45
                    );

                    unlink($uploadsDir . '/' . $newFilename);


                }
            }


            $category = $entity = $form->getData();

            $session->set('aircraft', $aircraft);

            if ($step === count($steps)) {
                $aircraft->setPublishedBy($this->getUser());
                if ($trimmedFilename) {
                    $aircraft->setVideo($trimmedFilename);
                }
                $em->persist($aircraft);
                $em->flush();
                $session->remove('aircraft');

                return $this->redirectToRoute('aircraft_wizard_form_success');
            }

            return $this->redirectToRoute('aircraft_wizard_form', ['step' => $step + 1]);
        }

        return $this->render('aircraft/form_wizard.html.twig', [
            'form' => $form->createView(),
            'step' => $step,
            'totalSteps' => count($steps),
        ]);
    }
}