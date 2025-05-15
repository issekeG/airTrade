<?php

namespace App\Form;

use App\Entity\AirCraftCategory;
use App\Entity\AircraftManufacturer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MainSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('aircraftCategory', EntityType::class, [
                'class' => AirCraftCategory::class,
                'choice_label' => 'name',
                'required' => false,
                'placeholder' => 'Toutes catégories',
                'label' => false,
                'attr' => [
                    'class' => 'form-select aviation-select select2',
                    'aria-label' => 'Catégorie d\'avion',
                    'id' => 'category',
                ],
            ])
            ->add('aircraftManufacturer', EntityType::class, [
                'class' => AircraftManufacturer::class,
                'choice_label' => 'name',
                'required' => false,
                'placeholder' => 'Tous constructeurs',
                'label' => false,
                'attr' => [
                    'class' => 'form-select aviation-select select2',
                    'aria-label' => 'Constructeur',
                    'id' => 'manufacturer',
                ],
            ])
            ->add('model', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'class' => 'form-control aviation-input',
                    'placeholder' => 'Modèle (ex: Baron, ...)',
                    'aria-label' => 'Modèle d\'avion',
                    'id' => 'model',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
            'method' => 'GET',
        ]);
    }
}
