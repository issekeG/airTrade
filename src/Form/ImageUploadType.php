<?php

namespace App\Form;

use App\Entity\Aircraft;
use App\Entity\AirCraftImage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageUploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label' => 'Télécharger des photos',
                'multiple' => true,
                'required' => true,
                'mapped' => false,
                'constraints' => [
                    new All([
                        new File([
                            'maxSize' => '40M',
                            'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG ou GIF)',
                        ])
                    ])
                ],
                'attr' => ['class' => 'filepond'],
            ])

// Pour videoFile (single video)
            ->add('videoFile', FileType::class, [
                'label' => 'Télécharger la video',
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '50M',
                        'mimeTypes' => [
                            'video/mp4',
                            'video/avi',
                            'video/quicktime',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une vidéo valide (MP4, AVI ou MOV)',
                    ])
                ],
                'attr' => ['class' => 'filepond'],
            ])

// Pour documents (multiple PDF)
            ->add('documents', FileType::class, [
                'label' => 'Télécharger les documents',
                'multiple' => true,
                'required' => true,
                'mapped' => false,
                'constraints' => [
                    new All([
                        new File([
                            'maxSize' => '50M',
                            'mimeTypes' => [
                                'application/pdf',
                            ],
                            'mimeTypesMessage' => 'Veuillez uploader un fichier PDF valide',
                        ])
                    ])
                ],
                'attr' => ['class' => 'filepond'],
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AirCraftImage::class,
        ]);
    }
}


