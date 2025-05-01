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

class PistonAgriculturalAircraftFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Required Specs Section
            ->add('RegNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
                'attr' => ['class' => 'required-spec']
            ])

            // General Section
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
                'required' => false
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

            // Airframe Section
            ->add('Airframe', TextareaType::class, [
                'label' => 'Airframe Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Engine Section
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
                'required' => false
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
                'required' => false
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
                'required' => false
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
                'required' => false
            ])
            ->add('Engine', TextareaType::class, [
                'label' => 'Engine Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Props Section
            ->add('Props', TextareaType::class, [
                'label' => 'Prop Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Modifications/Conversions Section
            ->add('Modifications', TextareaType::class, [
                'label' => 'Modifications/Conversions',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Avionics Section
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

            // Additional Equipment Section
            ->add('Equipment', TextareaType::class, [
                'label' => 'Additional Equipment',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Exterior Section
            ->add('Exterior', TextareaType::class, [
                'label' => 'Exterior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])
            ->add('YearPainted', ChoiceType::class, [
                'label' => 'Year Painted',
                'choices' => $this->getYearChoices(),
                'required' => false
            ])

            // Interior Section
            ->add('Interior', TextareaType::class, [
                'label' => 'Interior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])
            ->add('YearInterior', ChoiceType::class, [
                'label' => 'Year Interior',
                'choices' => $this->getYearChoices(),
                'required' => false
            ])

            // Inspection Status Section
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


