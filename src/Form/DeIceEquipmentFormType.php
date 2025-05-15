<?php

namespace App\Form;

use App\Dto\DeIceEquipmentDto;
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

class DeIceEquipmentFormType extends AbstractType
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
                    ->add('engineNotes', TextareaType::class, [
                        'label' => 'engineNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('hotSectionTime1', NumberType::class, [
                        'label' => 'hotSectionTime1',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('hotSectionTime2', NumberType::class, [
                        'label' => 'hotSectionTime2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('hotSectionTime3', NumberType::class, [
                        'label' => 'hotSectionTime3',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('hotSectionTime4', NumberType::class, [
                        'label' => 'hotSectionTime4',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('overhaulTime1', NumberType::class, [
                        'label' => 'overhaulTime1',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('overhaulTime2', NumberType::class, [
                        'label' => 'overhaulTime2',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ]);
                break;
            case 3:
                $builder
                    ->add('overhaulTime3', NumberType::class, [
                        'label' => 'overhaulTime3',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('overhaulTime4', NumberType::class, [
                        'label' => 'overhaulTime4',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('overhaulType1', ChoiceType::class, [
                        'label' => 'overhaulType1',
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
                        'label' => 'overhaulType2',
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
                        'label' => 'overhaulType3',
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
                        'label' => 'overhaulType4',
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
                break;
            case 4:
                $builder
                    ->add('avionicsNotes', TextareaType::class, [
                        'label' => 'avionicsNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('equipmentNotes', TextareaType::class, [
                        'label' => 'equipmentNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
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
            case 5:
                $builder
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'airframeNotes',
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
                    ->add('shippingLength', NumberType::class, [
                        'label' => 'shippingLength',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('shippingLengthUnit', ChoiceType::class, [
                        'label' => 'shippingLengthUnit',
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
                        'label' => 'shippingWidth',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ]);
                break;
            case 6:
                $builder
                    ->add('shippingWidthUnit', ChoiceType::class, [
                        'label' => 'shippingWidthUnit',
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
                        'label' => 'shippingHeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('shippingHeightUnit', ChoiceType::class, [
                        'label' => 'shippingHeightUnit',
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
                        'label' => 'shippingWeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('shippingWeightUnit', ChoiceType::class, [
                        'label' => 'shippingWeightUnit',
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
                break;
        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DeIceEquipmentDto::class,
        ]);
        $resolver->setRequired('step');
    }
}

