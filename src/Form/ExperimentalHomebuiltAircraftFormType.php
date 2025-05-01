<?php

namespace App\Form;

use App\Dto\PistonSingleAircraftDto;
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

class ExperimentalHomebuiltAircraftFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        // Génère les années de 1900 à l'année actuelle + 10
        $currentYear = (int)date('Y');
        $years = [];
        for ($i = $currentYear + 10; $i >= 1900; $i--) {
            $years[$i] = $i;
        }

        $builder
            // Section Required Specs
            ->add('RegNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
                'attr' => ['class' => 'required-spec']
            ])

            // Section General
            ->add('DisplayRegNumber', CheckboxType::class, [
                'label' => 'Display Registration # with this listing',
                'required' => false,
                'label_attr' => ['style' => 'float: right;']
            ])
            ->add('FlightRules', ChoiceType::class, [
                'label' => 'FlightRules',
                'choices' => [
                    '------' => '',
                    'IFR' => 'IFR',
                    'VFR' => 'VFR'
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('LocationAirportCode', TextType::class, [
                'label' => 'Based at (LAX)',
                'required' => false
            ])
            ->add('DisplaySerialNumber', CheckboxType::class, [
                'label' => 'Display Serial Number with this listing',
                'required' => false,
                'label_attr' => ['style' => 'float: right;']
            ])
            ->add('TotalTime', NumberType::class, [
                'label' => 'Total Time',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('SeatNumber', NumberType::class, [
                'label' => 'Number of Seats',
                'required' => false,
                'attr' => ['min' => 0]
            ])

            // Section Airframe
            ->add('Airframe', TextareaType::class, [
                'label' => 'Airframe Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section Engine
            ->add('HotSectionTime', NumberType::class, [
                'label' => 'Engine 1 Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('HotSectionTime2', NumberType::class, [
                'label' => 'Engine 2 Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('HotSectionTime3', NumberType::class, [
                'label' => 'Engine 3 Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('HotSectionTime4', NumberType::class, [
                'label' => 'Engine 4 Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('OverhaulTime', NumberType::class, [
                'label' => 'Engine 1 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('OverhaulTime2', NumberType::class, [
                'label' => 'Engine 2 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('OverhaulTime3', NumberType::class, [
                'label' => 'Engine 3 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('OverhaulTime4', NumberType::class, [
                'label' => 'Engine 4 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('OverhaulType', ChoiceType::class, [
                'label' => 'Engine 1 Overhaul Type',
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
            ])
            ->add('OverhaulType2', ChoiceType::class, [
                'label' => 'Engine 2 Overhaul Type',
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
            ])
            ->add('OverhaulType3', ChoiceType::class, [
                'label' => 'Engine 3 Overhaul Type',
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
            ])
            ->add('OverhaulType4', ChoiceType::class, [
                'label' => 'Engine 4 Overhaul Type',
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
            ])
            ->add('Engine', TextareaType::class, [
                'label' => 'Engine Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section Props
            ->add('Props', TextareaType::class, [
                'label' => 'Prop Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section Modifications/Conversions
            ->add('Modifications', TextareaType::class, [
                'label' => 'Modifications/Conversions',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section Avionics
            ->add('ADSBEquipped', ChoiceType::class, [
                'label' => 'ADS-B Equipped',
                'choices' => [
                    'Yes' => '1',
                    'No' => '0'
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false
            ])
            ->add('Avionics', TextareaType::class, [
                'label' => 'Avionics/Radios',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section Additional Equipment
            ->add('Equipment', TextareaType::class, [
                'label' => 'Additional Equipment',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section Exterior
            ->add('Exterior', TextareaType::class, [
                'label' => 'Exterior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])
            ->add('YearPainted', ChoiceType::class, [
                'label' => 'Year Painted',
                'choices' => $years,
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])

            // Section Interior
            ->add('Interior', TextareaType::class, [
                'label' => 'Interior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])
            ->add('YearInterior', ChoiceType::class, [
                'label' => 'Year Interior',
                'choices' => $years,
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])

            // Section Inspection Status
            ->add('Inspection', TextareaType::class, [
                'label' => 'Inspection Status',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PistonSingleAircraftDto::class,
        ]);
        $resolver->setRequired('step');

    }

    private function getYearChoices(): array
    {
        $years = range(2024, 1900);
        return array_combine($years, $years);
    }
}

