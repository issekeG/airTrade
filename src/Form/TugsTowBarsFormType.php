<?php

namespace App\Form;

use App\Dto\TugsTowBarsDto;
use App\Entity\Aircraft;
use App\Entity\AircraftSpecs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TugsTowBarsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('displayRegNumber', CheckboxType::class, [
                        'label' => 'Display Registration # with this listing',
                        'required' => false,
                        'label_attr' => ['class' => 'simple-specs-label', 'style' => 'float: right;']
                    ])
                    ->add('regNumber', TextType::class, [
                        'label' => 'Registration #',
                        'required' => true,
                        'attr' => ['class' => 'required-spec']
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'FlightRules',
                        'choices' => [
                            '------' => '',
                            'IFR' => 'IFR',
                            'VFR' => 'VFR'
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'Based at (LAX)',
                        'required' => false,
                        'attr' => ['placeholder' => 'e.g. LAX']
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'Display Serial Number with this listing',
                        'required' => false,
                        'label_attr' => ['class' => 'simple-specs-label', 'style' => 'float: right;']
                    ])
                    ->add('totalTime', NumberType::class, [
                        'label' => 'Total Time',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'Number of Seats',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ]);
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;

        }
        // Section: General


        // Section: Airframe
        $builder
            ->add('airframe', TextareaType::class, [
            'label' => 'Airframe Notes',
            'required' => false,
            'attr' => ['class' => 'large-text-field']
        ])
            ->add('engine', TextareaType::class, [
                'label' => 'Engine Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])
            ->add('hotSectionTime', NumberType::class, [
                'label' => 'Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            // [Ajouter tous les autres champs Engine...]
            ->add('overhaulType', ChoiceType::class, [
                'label' => 'Overhaul',
                'choices' => [
                    '------' => '',
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                    'CZI' => 'CZI'
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ]);

        // [Ajouter les autres sections de la même manière...]

        // Section: Shipping Dimensions
        $builder
            ->add('shippingLength', NumberType::class, [
                'label' => 'Shipping Length',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('shippingLengthUnit', ChoiceType::class, [
                'choices' => [
                    'inches' => 'inch',
                    'feet' => 'foot',
                    'yards' => 'yard',
                    'millimeters' => 'millimeter',
                    'centimeters' => 'centimeter',
                    'meters' => 'meter'
                ],
                'attr' => ['class' => 'small-select']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TugsTowBarsDto::class,
        ]);
        $resolver->setRequired('step');
    }
}

