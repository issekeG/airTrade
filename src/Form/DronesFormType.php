<?php

namespace App\Form;

use App\Dto\DroneDto;
use App\Entity\Aircraft;
use App\Entity\AircraftSpecs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DronesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('droneType', ChoiceType::class, [
                        'label' => 'droneType',
                        'choices' => [
                            'Recreational' => 'Recreational',
                            'Professional' => 'Professional',
                            'Commercial' => 'Commercial',
                            'Agricultural' => 'Agricultural',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('operatingLength', NumberType::class, [
                        'label' => 'operatingLength',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('operatingLengthUnit', ChoiceType::class, [
                        'label' => 'operatingLengthUnit',
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
                    ->add('operatingWidth', NumberType::class, [
                        'label' => 'operatingWidth',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('operatingWidthUnit', ChoiceType::class, [
                        'label' => 'operatingWidthUnit',
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
                    ->add('operatingHeight', NumberType::class, [
                        'label' => 'operatingHeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('operatingHeightUnit', ChoiceType::class, [
                        'label' => 'operatingHeightUnit',
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
                    ->add('operatingWeight', NumberType::class, [
                        'label' => 'operatingWeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input'],
                    ])
                    ->add('operatingWeightUnit', ChoiceType::class, [
                        'label' => 'operatingWeightUnit',
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
            case 2:
                $builder
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
                    ])
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
            'data_class' => DroneDto::class,
        ]);
        $resolver->setRequired('step');
    }
}


