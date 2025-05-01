<?php

namespace App\Form;

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

class PistonAmphibiousFloatplanesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Required Specs
        $builder
            ->add('registrationNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
            ]);

        // General Section
        $builder
            ->add('displayRegistrationNumber', CheckboxType::class, [
                'label' => 'Display Registration # with this listing',
                'required' => false,
            ])
            ->add('flightRules', ChoiceType::class, [
                'label' => 'Flight Rules',
                'choices' => [
                    'IFR' => 'IFR',
                    'VFR' => 'VFR',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('locationAirportCode', TextType::class, [
                'label' => 'Based at (e.g., LAX)',
                'required' => false,
            ])
            ->add('displaySerialNumber', CheckboxType::class, [
                'label' => 'Display Serial Number with this listing',
                'required' => false,
            ])
            ->add('totalTime', NumberType::class, [
                'label' => 'Total Time',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('seatNumber', NumberType::class, [
                'label' => 'Number of Seats',
                'required' => false,
                'attr' => ['min' => 0],
            ]);

        // Airframe Section
        $builder
            ->add('airframeNotes', TextareaType::class, [
                'label' => 'Airframe Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Engine 1 Section
        $builder
            ->add('engineMake', TextType::class, [
                'label' => 'Engine 1 Manufacturer',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engineModel', TextType::class, [
                'label' => 'Engine 1 Model',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engineSerialNumber', TextType::class, [
                'label' => 'Engine 1 Serial Number',
                'required' => false,
            ])
            ->add('horsepowerEngine', NumberType::class, [
                'label' => 'Engine 1 Horsepower',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('horsepowerUnit', ChoiceType::class, [
                'label' => 'Horsepower Unit',
                'choices' => [
                    'HP' => 'horsepower',
                    'kW' => 'kilowatt',
                    'W' => 'watt',
                    'Btu/hr' => 'BTU/hour',
                    'mhp' => 'metric horsepower',
                ],
                'required' => false,
                'placeholder' => 'Select unit',
            ])
            ->add('overhaulTime', NumberType::class, [
                'label' => 'Engine 1 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulType', ChoiceType::class, [
                'label' => 'Engine 1 Time Since',
                'choices' => [
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('timeBetweenOverhaul', NumberType::class, [
                'label' => 'Engine 1 TBO',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('timeRemainingToOverhaul', NumberType::class, [
                'label' => 'Engine 1 Time Remaining To Overhaul',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engineCycles', NumberType::class, [
                'label' => 'Engine 1 Cycles',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('turbocharged', ChoiceType::class, [
                'label' => 'Engine 1 Turbocharged',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('turbonormalized', ChoiceType::class, [
                'label' => 'Engine 1 Turbonormalized',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('engineNotes', TextareaType::class, [
                'label' => 'Engine 1 Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Engine 2 Section
        $builder
            ->add('engineMake2', TextType::class, [
                'label' => 'Engine 2 Manufacturer',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engineModel2', TextType::class, [
                'label' => 'Engine 2 Model',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engineSerialNumber2', TextType::class, [
                'label' => 'Engine 2 Serial Number',
                'required' => false,
            ])
            ->add('horsepowerEngine2', NumberType::class, [
                'label' => 'Engine 2 Horsepower',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('horsepowerUnit2', ChoiceType::class, [
                'label' => 'Horsepower Unit',
                'choices' => [
                    'HP' => 'horsepower',
                    'kW' => 'kilowatt',
                    'W' => 'watt',
                    'Btu/hr' => 'BTU/hour',
                    'mhp' => 'metric horsepower',
                ],
                'required' => false,
                'placeholder' => 'Select unit',
            ])
            ->add('overhaulTime2', NumberType::class, [
                'label' => 'Engine 2 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulType2', ChoiceType::class, [
                'label' => 'Engine 2 Time Since',
                'choices' => [
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('timeBetweenOverhaul2', NumberType::class, [
                'label' => 'Engine 2 TBO',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('timeRemainingToOverhaul2', NumberType::class, [
                'label' => 'Engine 2 Time Remaining To Overhaul',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engineCycles2', NumberType::class, [
                'label' => 'Engine 2 Cycles',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('turbocharged2', ChoiceType::class, [
                'label' => 'Engine 2 Turbocharged',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('turbonormalized2', ChoiceType::class, [
                'label' => 'Engine 2 Turbonormalized',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('engine2Notes', TextareaType::class, [
                'label' => 'Engine 2 Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Props Section
        $builder
            ->add('propNotes', TextareaType::class, [
                'label' => 'Prop Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Modifications/Conversions Section
        $builder
            ->add('modificationsNotes', TextareaType::class, [
                'label' => 'Modifications/Conversions',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Avionics Section
        $builder
            ->add('adsbEquipped', ChoiceType::class, [
                'label' => 'ADS-B Equipped',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('avionicsNotes', TextareaType::class, [
                'label' => 'Avionics/Radios',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Additional Equipment Section
        $builder
            ->add('floatType', ChoiceType::class, [
                'label' => 'Float Type',
                'choices' => [
                    'Straight' => 'Straight',
                    'Amphibious' => 'Amphibious',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('includesWheeledLandingGear', ChoiceType::class, [
                'label' => 'Includes Wheeled Landing Gear',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('equipmentNotes', TextareaType::class, [
                'label' => 'Additional Equipment',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Exterior Section
        $builder
            ->add('yearPainted', ChoiceType::class, [
                'label' => 'Year Painted',
                'choices' => array_combine(range(1900, date('Y') + 1), range(1900, date('Y') + 1)),
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('exteriorNotes', TextareaType::class, [
                'label' => 'Exterior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Interior Section
        $builder
            ->add('yearInterior', ChoiceType::class, [
                'label' => 'Year Interior',
                'choices' => array_combine(range(1900, date('Y') + 1), range(1900, date('Y') + 1)),
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('interiorNotes', TextareaType::class, [
                'label' => 'Interior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Inspection Status Section
        $builder
            ->add('inspectionStatus', TextareaType::class, [
                'label' => 'Inspection Status',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AircraftSpecs::class,
        ]);
    }
}

