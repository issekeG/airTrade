<?php

namespace App\Form;

use App\Dto\PistonAmphibiousFloatplanesDto;
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
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('registrationNumber', TextType::class, [
                        'label' => 'registrationNumber',
                        'required' => true,
                    ])
                    ->add('displayRegistrationNumber', CheckboxType::class, [
                        'label' => 'displayRegistrationNumber',
                        'required' => false,
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'flightRules',
                        'choices' => [
                            'IFR' => 'IFR',
                            'VFR' => 'VFR',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'locationAirportCode',
                        'required' => false,
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'displaySerialNumber',
                        'required' => false,
                    ])
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ]);
                break;
            case 2:
                $builder
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'airframeNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('engineMake', TextType::class, [
                        'label' => 'engineMake',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engineModel', TextType::class, [
                        'label' => 'engineModel',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engineSerialNumber', TextType::class, [
                        'label' => 'engineSerialNumber',
                        'required' => false,
                    ])
                    ->add('horsepowerEngine', NumberType::class, [
                        'label' => 'horsepowerEngine',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('horsepowerUnit', ChoiceType::class, [
                        'label' => 'horsepowerUnit',
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
                        'label' => 'overhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('overhaulType', ChoiceType::class, [
                        'label' => 'overhaulType',
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
                        'label' => 'timeBetweenOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('timeRemainingToOverhaul', NumberType::class, [
                        'label' => 'timeRemainingToOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engineCycles', NumberType::class, [
                        'label' => 'engineCycles',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('turbocharged', ChoiceType::class, [
                        'label' => 'turbocharged',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('turbonormalized', ChoiceType::class, [
                        'label' => 'turbonormalized',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('engineNotes', TextareaType::class, [
                        'label' => 'engineNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 3:
                $builder
                    ->add('engineMake2', TextType::class, [
                        'label' => 'engineMake2',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engineModel2', TextType::class, [
                        'label' => 'engineModel2',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engineSerialNumber2', TextType::class, [
                        'label' => 'engineSerialNumber2',
                        'required' => false,
                    ])
                    ->add('horsepowerEngine2', NumberType::class, [
                        'label' => 'horsepowerEngine2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('horsepowerUnit2', ChoiceType::class, [
                        'label' => 'horsepowerUnit2',
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
                        'label' => 'overhaulTime2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('overhaulType2', ChoiceType::class, [
                        'label' => 'overhaulType2',
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
                        'label' => 'timeBetweenOverhaul2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('timeRemainingToOverhaul2', NumberType::class, [
                        'label' => 'timeRemainingToOverhaul2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engineCycles2', NumberType::class, [
                        'label' => 'engineCycles2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ]);
                break;
            case 4:
                $builder
                    ->add('turbocharged2', ChoiceType::class, [
                        'label' => 'turbocharged2',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('turbonormalized2', ChoiceType::class, [
                        'label' => 'turbonormalized2',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('engine2Notes', TextareaType::class, [
                        'label' => 'engine2Notes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('propNotes', TextareaType::class, [
                        'label' => 'propNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('modificationsNotes', TextareaType::class, [
                        'label' => 'modificationsNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('adsbEquipped', ChoiceType::class, [
                        'label' => 'adsbEquipped',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('avionicsNotes', TextareaType::class, [
                        'label' => 'avionicsNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('floatType', ChoiceType::class, [
                        'label' => 'floatType',
                        'choices' => [
                            'Straight' => 'Straight',
                            'Amphibious' => 'Amphibious',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('includesWheeledLandingGear', ChoiceType::class, [
                        'label' => 'includesWheeledLandingGear',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('equipmentNotes', TextareaType::class, [
                        'label' => 'equipmentNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 5:
                $builder
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => array_combine(range(1900, date('Y') + 1), range(1900, date('Y') + 1)),
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('exteriorNotes', TextareaType::class, [
                        'label' => 'exteriorNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => array_combine(range(1900, date('Y') + 1), range(1900, date('Y') + 1)),
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('interiorNotes', TextareaType::class, [
                        'label' => 'interiorNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('inspectionStatus', TextareaType::class, [
                        'label' => 'inspectionStatus',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PistonAmphibiousFloatplanesDto::class,
        ]);
        $resolver->setRequired('step');


    }
}

