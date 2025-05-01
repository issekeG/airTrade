<?php

namespace App\Form;

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
        // Category Specific Section
        $builder
            ->add('droneType', ChoiceType::class, [
                'label' => 'Drone Type',
                'choices' => [
                    'Recreational' => 'Recreational',
                    'Professional' => 'Professional',
                    'Commercial' => 'Commercial',
                    'Agricultural' => 'Agricultural',
                ],
                'placeholder' => '------',
                'required' => false,
            ]);

        // Weights & Dimensions Section
        $builder
            ->add('operatingLength', NumberType::class, [
                'label' => 'Operating Length',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('operatingLengthUnit', ChoiceType::class, [
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
            ->add('operatingWidth', NumberType::class, [
                'label' => 'Operating Width',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('operatingWidthUnit', ChoiceType::class, [
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
            ->add('operatingHeight', NumberType::class, [
                'label' => 'Operating Height',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('operatingHeightUnit', ChoiceType::class, [
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
            ->add('operatingWeight', NumberType::class, [
                'label' => 'Operating Weight',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input'],
            ])
            ->add('operatingWeightUnit', ChoiceType::class, [
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


