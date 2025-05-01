<?php

namespace App\Form;

use App\Entity\Aircraft;
use App\Entity\AirCraftCategory;
use App\Entity\AircraftManufacturer;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AircraftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => AircraftCategory::class,
                'mapped' => false,
                'placeholder' => 'Choisissez la catégorie du aircraft',

            ])
            ->add('aircraftManufacturer', EntityType::class, [
                'class' => AircraftManufacturer::class,
                'mapped' => false,
                'placeholder' => 'Choisissez le constructeur',
            ])
            ->add('model')
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'ckeditor'],
                'required' => false

            ])
            ->add('yearOfManufacture', ChoiceType::class, [
                'choices' => array_combine(
                    range(date('Y'), 1950),
                    range(date('Y'), 1950)
                ),
                'placeholder' => "Choisissez l'année de construction",
            ])
            ->add('price')
            ->add('totalHours')
            ->add('status',ChoiceType::class, [
                'choices'  => [
                    'Nouveau' => 'new',
                    'Utilisé' => 'used',
                    'Réparé' => 'repaired',
                    'Endommagé' => 'damaged',
                    'Récupéré' => 'salvaged',
                ],
                'expanded' => false,
                'multiple' => false,
                'attr' => ['class' => 'form-select'], // Ajoute une classe Bootstrap
                'label' => 'Statut',
                'placeholder' => 'Sélectionnez un statut', // Optionnel
            ])
            ->add('registrationCountry', CountryType::class, [
                'attr' => ['class' => 'form-select'],
                'placeholder' => 'Sélectionnez un pays',
            ])
            ->add('serviceEntryDate')
            ->add('serialNumber')
            ->add('usageType')
            ->add('country', CountryType::class, [
                'attr' => ['class' => 'form-select'],
                'placeholder' => 'Sélectionnez un pays',
            ])
            ->add('city')
            ->add('usageType')


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Aircraft::class,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'aircraft_new',

        ]);
    }
}
