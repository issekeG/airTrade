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

class FuelTanksFuelStorageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // General Section
        $builder
            ->add('registrationNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
            ])
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
                'label' => 'Total Time (in hours)',
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

        // Engine Section
        $builder
            ->add('engineNotes', TextareaType::class, [
                'label' => 'Engine Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ])
            ->add('hotSectionTime1', NumberType::class, [
                'label' => 'Hot Section Time Engine 1 (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('hotSectionTime2', NumberType::class, [
                'label' => 'Hot Section Time Engine 2 (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('hotSectionTime3', NumberType::class, [
                'label' => 'Hot Section Time Engine 3 (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('hotSectionTime4', NumberType::class, [
                'label' => 'Hot Section Time Engine 4 (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulTime1', NumberType::class, [
                'label' => 'Engine 1 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulTime2', NumberType::class, [
                'label' => 'Engine 2 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulTime3', NumberType::class, [
                'label' => 'Engine 3 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulTime4', NumberType::class, [
                'label' => 'Engine 4 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('overhaulType1', ChoiceType::class, [
                'label' => 'Engine 1 Time Since',
                'choices' => [
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                    'CZI' => 'CZI',
                ],
                'placeholder' => '------',
                'required' => false,
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
                    'CZI' => 'CZI',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('overhaulType3', ChoiceType::class, [
                'label' => 'Engine 3 Time Since',
                'choices' => [
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                    'CZI' => 'CZI',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('overhaulType4', ChoiceType::class, [
                'label' => 'Engine 4 Time Since',
                'choices' => [
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                    'CZI' => 'CZI',
                ],
                'placeholder' => '------',
                'required' => false,
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
            ->add('avionicsNotes', TextareaType::class, [
                'label' => 'Avionics/Radios',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Additional Equipment Section
        $builder
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

        // Shipping Dimensions Section
        $builder
            ->add('shippingLength', NumberType::class, [
                'label' => 'Shipping Length',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('shippingLengthUnit', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Inch' => 'inch',
                    'Foot' => 'foot',
                    'Yard' => 'yard',
                    'Millimeter' => 'millimeter',
                    'Centimeter' => 'centimeter',
                    'Meter' => 'meter',
                ],
                'attr' => ['class' => 'small-select'],
                'required' => false,
            ])
            ->add('shippingWidth', NumberType::class, [
                'label' => 'Shipping Width',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('shippingWidthUnit', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Inch' => 'inch',
                    'Foot' => 'foot',
                    'Yard' => 'yard',
                    'Millimeter' => 'millimeter',
                    'Centimeter' => 'centimeter',
                    'Meter' => 'meter',
                ],
                'attr' => ['class' => 'small-select'],
                'required' => false,
            ])
            ->add('shippingHeight', NumberType::class, [
                'label' => 'Shipping Height',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('shippingHeightUnit', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Inch' => 'inch',
                    'Foot' => 'foot',
                    'Yard' => 'yard',
                    'Millimeter' => 'millimeter',
                    'Centimeter' => 'centimeter',
                    'Meter' => 'meter',
                ],
                'attr' => ['class' => 'small-select'],
                'required' => false,
            ])
            ->add('shippingWeight', NumberType::class, [
                'label' => 'Shipping Weight',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('shippingWeightUnit', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Pound' => 'pound',
                    'Ton' => 'ton',
                    'Kilogram' => 'kilogram',
                    'Metric Ton' => 'metric ton',
                    'Ounce' => 'ounce',
                ],
                'attr' => ['class' => 'small-select'],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AircraftSpecs::class,
        ]);
    }
}

