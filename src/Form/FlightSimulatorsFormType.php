<?php

namespace App\Form;

use App\Dto\FlightSimulatorsDto;
use App\Entity\Aircraft;
use App\Entity\AircraftSpecs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightSimulatorsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        switch ($options['step']) {
            case 1:
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
                    ]);
                break;
            case 2:
                $builder
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
            'data_class' => FlightSimulatorsDto::class,
        ]);
        $resolver->setRequired('step');
    }
}


