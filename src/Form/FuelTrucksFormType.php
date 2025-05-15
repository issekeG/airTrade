<?php

namespace App\Form;

use App\Dto\FuelTrucksDto;
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

class FuelTrucksFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Génère les années de 1900 à l'année actuelle + 10
        $currentYear = (int)date('Y');
        $years = [];
        for ($i = $currentYear + 10; $i >= 1900; $i--) {
            $years[$i] = $i;
        }
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('regNumber', TextType::class, [
                        'label' => 'regNumber',
                        'required' => true,
                        'attr' => ['class' => 'required-spec']
                    ])

                    // Section General
                    ->add('displayRegNumber', CheckboxType::class, [
                        'label' => 'displayRegNumber',
                        'required' => false,
                        'label_attr' => ['style' => 'float: right;']
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'flightRules',
                        'choices' => [
                            '------' => '',
                            'IFR' => 'IFR',
                            'VFR' => 'VFR'
                        ],
                        'required' => false
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'locationAirportCode',
                        'required' => false
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'displaySerialNumber',
                        'required' => false,
                        'label_attr' => ['style' => 'float: right;']
                    ])
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ]);
                break;
            case 2:
                $builder
                    ->add('airframe', TextareaType::class, [
                        'label' => 'airframe',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])

                    // Section Engine
                    ->add('hotSectionTime', NumberType::class, [
                        'label' => 'hotSectionTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('hotSectionTime2', NumberType::class, [
                        'label' => 'hotSectionTime2',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('hotSectionTime3', NumberType::class, [
                        'label' => 'hotSectionTime3',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('hotSectionTime4', NumberType::class, [
                        'label' => 'hotSectionTime4',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('overhaulTime', NumberType::class, [
                        'label' => 'overhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('overhaulType', ChoiceType::class, [
                        'label' => 'overhaulType',
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
                    ->add('overhaulTime2', NumberType::class, [
                        'label' => 'overhaulTime2',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('overhaulType2', ChoiceType::class, [
                        'label' => 'overhaulType2',
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
                    ]);
                break;
            case 3:
                $builder
                    ->add('overhaulTime3', NumberType::class, [
                        'label' => 'overhaulTime3',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('overhaulType3', ChoiceType::class, [
                        'label' => 'overhaulType3',
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
                    ->add('overhaulTime4', NumberType::class, [
                        'label' => 'overhaulTime4',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('overhaulType4', ChoiceType::class, [
                        'label' => 'overhaulType4',
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
                    ->add('engine', TextareaType::class, [
                        'label' => 'engine',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('props', TextareaType::class, [
                        'label' => 'props',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])

                    // Section Modifications
                    ->add('modifications', TextareaType::class, [
                        'label' => 'modifications',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 4:
                $builder
                    ->add('adsbEquipped', ChoiceType::class, [
                        'label' => 'adsbEquipped',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0'
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false
                    ])
                    ->add('avionics', TextareaType::class, [
                        'label' => 'avionics',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])

                    // Section Additional Equipment
                    ->add('equipment', TextareaType::class, [
                        'label' => 'equipment',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])

                    // Section Exterior
                    ->add('exterior', TextareaType::class, [
                        'label' => 'exterior',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => $years,
                        'required' => false
                    ])

                    // Section Interior
                    ->add('interior', TextareaType::class, [
                        'label' => 'interior',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => $years,
                        'required' => false
                    ]);
                break;
            case 5:
                $builder
                    ->add('inspection', TextareaType::class, [
                        'label' => 'inspection',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])

                    // Section Shipping Dimensions
                    ->add('shippingLength', NumberType::class, [
                        'label' => 'shippingLength',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('shippingWidth', NumberType::class, [
                        'label' => 'shippingWidth',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('shippingHeight', NumberType::class, [
                        'label' => 'shippingHeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('shippingWeight', NumberType::class, [
                        'label' => 'shippingWeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ]);
                break;
        }

        }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FuelTrucksDto::class,
        ]);
        $resolver->setRequired('step');
    }
}

