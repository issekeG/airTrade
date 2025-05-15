<?php

namespace App\Form;

use App\Dto\OtherDto;
use App\Entity\Aircraft;
use App\Entity\AircraftSpecs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OtherFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('shippingLength', NumberType::class, [
                        'label' => 'shippingLength',
                        'required' => false,
                        'attr' => [
                            'min' => 0,
                            'class' => 'small-input',
                            'placeholder' => ''
                        ]
                    ])
                    ->add('shippingLengthUnit', ChoiceType::class, [
                        'label' => 'shippingLengthUnit',
                        'choices' => [
                            'in' => 'inch',
                            'ft' => 'foot',
                            'yd' => 'yard',
                            'mm' => 'millimeter',
                            'cm' => 'centimeter',
                            'm' => 'meter'
                        ],
                        'attr' => ['class' => 'small-select'],
                        'label_attr' => ['style' => 'margin-left: 2%;']
                    ])
                    ->add('shippingWidth', NumberType::class, [
                        'label' => 'shippingWidth',
                        'required' => false,
                        'attr' => [
                            'min' => 0,
                            'class' => 'small-input',
                            'placeholder' => ''
                        ]
                    ])
                    ->add('shippingWidthUnit', ChoiceType::class, [
                        'label' => 'shippingWidthUnit',
                        'choices' => [
                            'in' => 'inch',
                            'ft' => 'foot',
                            'yd' => 'yard',
                            'mm' => 'millimeter',
                            'cm' => 'centimeter',
                            'm' => 'meter'
                        ],
                        'attr' => ['class' => 'small-select'],
                        'label_attr' => ['style' => 'margin-left: 2%;']
                    ])
                    ->add('shippingHeight', NumberType::class, [
                        'label' => 'shippingHeight',
                        'required' => false,
                        'attr' => [
                            'min' => 0,
                            'class' => 'small-input',
                            'placeholder' => ''
                        ]
                    ])
                    ->add('shippingHeightUnit', ChoiceType::class, [
                        'label' => false,
                        'choices' => [
                            'in' => 'inch',
                            'ft' => 'foot',
                            'yd' => 'yard',
                            'mm' => 'millimeter',
                            'cm' => 'centimeter',
                            'm' => 'meter'
                        ],
                        'attr' => ['class' => 'small-select'],
                        'label_attr' => ['style' => 'margin-left: 2%;']
                    ])
                    ->add('shippingWeight', NumberType::class, [
                        'label' => 'shippingWeight',
                        'required' => false,
                        'attr' => [
                            'min' => 0,
                            'class' => 'small-input',
                            'placeholder' => ''
                        ]
                    ])
                    ->add('shippingWeightUnit', ChoiceType::class, [
                        'label' => false,
                        'choices' => [
                            'lb' => 'pound',
                            'ton' => 'ton',
                            'kg' => 'kilogram',
                            't' => 'metric ton',
                            'oz' => 'ounce'
                        ],
                        'attr' => ['class' => 'small-select'],
                        'label_attr' => ['style' => 'margin-left: 2%;']
                    ]);

             }
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OtherDto::class,
        ]);
        $resolver->setRequired('step');
    }
}

