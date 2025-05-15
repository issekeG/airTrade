<?php

namespace App\Form;

use App\Dto\TurbineHelicoptersDto;
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

class TurbineHelicoptersFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Required Specs
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
                    ]);

                break;
            case 2:
                $builder
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('rangeAircraft', NumberType::class, [
                        'label' => 'rangeAircraft',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('rangeUnit', ChoiceType::class, [
                        'label' => 'rangeUnit',
                        'choices' => [
                            'Nautical Miles' => 'nautical miles',
                        ],
                        'required' => false,
                    ])
                    ->add('maxTakeoffWeight', NumberType::class, [
                        'label' => 'maxTakeoffWeight',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('maxTakeoffWeightUnit', ChoiceType::class, [
                        'label' => 'maxTakeoffWeightUnit',
                        'choices' => [
                            'Pound' => 'pound',
                            'Ton' => 'ton',
                            'Kilogram' => 'kilogram',
                            'Metric Ton' => 'metric ton',
                            'Ounce' => 'ounce',
                        ],
                        'required' => false,
                    ])
                    ->add('basicEmptyWeight', NumberType::class, [
                        'label' => 'basicEmptyWeight',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('basicEmptyWeightUnit', ChoiceType::class, [
                        'label' => 'basicEmptyWeightUnit',
                        'choices' => [
                            'Pound' => 'pound',
                            'Ton' => 'ton',
                            'Kilogram' => 'kilogram',
                            'Metric Ton' => 'metric ton',
                            'Ounce' => 'ounce',
                        ],
                        'required' => false,
                    ])
                    ->add('usefulLoad', NumberType::class, [
                        'label' => 'usefulLoad',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('usefulLoadUnit', ChoiceType::class, [
                        'label' => 'usefulLoadUnit',
                        'choices' => [
                            'Pound' => 'pound',
                            'Ton' => 'ton',
                            'Kilogram' => 'kilogram',
                            'Metric Ton' => 'metric ton',
                            'Ounce' => 'ounce',
                        ],
                        'required' => false,
                    ])
                    ->add('cruiseSpeed', NumberType::class, [
                        'label' => 'cruiseSpeed',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ]);
                break;
            case 3:
                $builder
                    ->add('cruiseSpeedUnit', ChoiceType::class, [
                        'label' => 'cruiseSpeedUnit',
                        'choices' => [
                            'Miles/Hour' => 'miles/hour',
                            'Kilometers/Hour' => 'kilometers/hour',
                            'Knots' => 'knots',
                        ],
                        'required' => false,
                    ])
                    ->add('hoverCeilingIge', NumberType::class, [
                        'label' => 'hoverCeilingIge',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('hoverCeilingIgeUnit', ChoiceType::class, [
                        'label' => 'hoverCeilingIgeUnit',
                        'choices' => [
                            'Inch' => 'inch',
                            'Foot' => 'foot',
                            'Yard' => 'yard',
                            'Millimeter' => 'millimeter',
                            'Centimeter' => 'centimeter',
                            'Meter' => 'meter',
                        ],
                        'required' => false,
                    ])
                    ->add('hoverCeilingIgeInches', NumberType::class, [
                        'label' => 'hoverCeilingIgeInches',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('hoverCeilingOge', NumberType::class, [
                        'label' => 'hoverCeilingOge',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('hoverCeilingOgeUnit', ChoiceType::class, [
                        'label' => 'hoverCeilingOgeUnit',
                        'choices' => [
                            'Inch' => 'inch',
                            'Foot' => 'foot',
                            'Yard' => 'yard',
                            'Millimeter' => 'millimeter',
                            'Centimeter' => 'centimeter',
                            'Meter' => 'meter',
                        ],
                        'required' => false,
                    ])
                    ->add('hoverCeilingOgeInches', NumberType::class, [
                        'label' => 'hoverCeilingOgeInches',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('fuelCapacityVolume', NumberType::class, [
                        'label' => 'fuelCapacityVolume',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('fuelCapacityUnit', ChoiceType::class, [
                        'label' => 'fuelCapacityUnit',
                        'choices' => [
                            'Quart' => 'quart',
                            'Gallon' => 'gallon',
                            'Milliliter' => 'mililiter',
                            'Centiliter' => 'centiliter',
                            'Liter' => 'liter',
                        ],
                        'required' => false,
                    ])
                    ->add('auxiliaryFuelTank', ChoiceType::class, [
                        'label' => 'auxiliaryFuelTank',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('crashResistantFuelSystem', ChoiceType::class, [
                        'label' => 'crashResistantFuelSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('completeLogs', ChoiceType::class, [
                        'label' => 'completeLogs',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'airframeNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 4:
                $builder
                    ->add('mainRotorBladeTimeRemaining', NumberType::class, [
                        'label' => 'mainRotorBladeTimeRemaining',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('mainRotorHubTimeRemaining', NumberType::class, [
                        'label' => 'mainRotorHubTimeRemaining',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('mainRotorGearboxTimeRemaining', NumberType::class, [
                        'label' => 'mainRotorGearboxTimeRemaining',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('antiTorqueSystem', ChoiceType::class, [
                        'label' => 'antiTorqueSystem',
                        'choices' => [
                            'Tail Rotor' => 'Tail Rotor',
                            'Ducted Fan' => 'Ducted Fan',
                            'NOTAR' => 'NOTAR',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('tailRotorBladeTimeRemaining', NumberType::class, [
                        'label' => 'tailRotorBladeTimeRemaining',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('tailRotorGearboxTimeRemaining', NumberType::class, [
                        'label' => 'tailRotorGearboxTimeRemaining',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('rotorNotes', TextareaType::class, [
                        'label' => 'rotorNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 5:
                $builder
                    ->add('engine1Make', TextType::class, [
                        'label' => 'engine1Make',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engine1Model', TextType::class, [
                        'label' => 'engine1Model',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engine1SerialNumber', TextType::class, [
                        'label' => 'engine1SerialNumber',
                        'required' => false,
                    ])
                    ->add('engine1Horsepower', NumberType::class, [
                        'label' => 'engine1Horsepower',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine1HorsepowerUnit', ChoiceType::class, [
                        'label' => 'engine1HorsepowerUnit',
                        'choices' => [
                            'Horsepower' => 'horsepower',
                            'Kilowatt' => 'kilowatt',
                            'Watt' => 'watt',
                            'BTU/Hour' => 'BTU/hour',
                            'Metric Horsepower' => 'metric horsepower',
                        ],
                        'required' => false,
                    ])
                    ->add('engine1HotSectionTime', NumberType::class, [
                        'label' => 'engine1HotSectionTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine1OverhaulTime', NumberType::class, [
                        'label' => 'engine1OverhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine1OverhaulType', ChoiceType::class, [
                        'label' => 'engine1OverhaulType',
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
                    ->add('engine1TimeBetweenOverhaul', NumberType::class, [
                        'label' => 'engine1TimeBetweenOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine1Notes', TextareaType::class, [
                        'label' => 'engine1Notes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 6:
                $builder
                    ->add('engine2Make', TextType::class, [
                        'label' => 'engine2Make',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engine2Model', TextType::class, [
                        'label' => 'engine2Model',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('engine2SerialNumber', TextType::class, [
                        'label' => 'engine2SerialNumber',
                        'required' => false,
                    ])
                    ->add('engine2Horsepower', NumberType::class, [
                        'label' => 'engine2Horsepower',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine2HorsepowerUnit', ChoiceType::class, [
                        'label' => 'engine2HorsepowerUnit',
                        'choices' => [
                            'Horsepower' => 'horsepower',
                            'Kilowatt' => 'kilowatt',
                            'Watt' => 'watt',
                            'BTU/Hour' => 'BTU/hour',
                            'Metric Horsepower' => 'metric horsepower',
                        ],
                        'required' => false,
                    ])
                    ->add('engine2HotSectionTime', NumberType::class, [
                        'label' => 'engine2HotSectionTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine2OverhaulTime', NumberType::class, [
                        'label' => 'engine2OverhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine2OverhaulType', ChoiceType::class, [
                        'label' => 'engine2OverhaulType',
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
                    ->add('engine2TimeBetweenOverhaul', NumberType::class, [
                        'label' => 'engine2TimeBetweenOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('engine2Notes', TextareaType::class, [
                        'label' => 'engine2Notes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ])
                    ->add('modificationsNotes', TextareaType::class, [
                        'label' => 'modificationsNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 7:
                $builder
                    ->add('flightDeckManufacturer', TextType::class, [
                        'label' => 'flightDeckManufacturer',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
                    ])
                    ->add('flightDeckModel', TextType::class, [
                        'label' => 'flightDeckModel',
                        'required' => false,
                        'attr' => ['autocomplete' => 'off'],
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
                    ->add('wideAreaAugSystem', ChoiceType::class, [
                        'label' => 'wideAreaAugSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('syntheticVisionTech', ChoiceType::class, [
                        'label' => 'syntheticVisionTech',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('artificialHorizon', ChoiceType::class, [
                        'label' => 'artificialHorizon',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('radarAltimeter', ChoiceType::class, [
                        'label' => 'radarAltimeter',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('singlePilotOperation', ChoiceType::class, [
                        'label' => 'singlePilotOperation',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('autoPilot', ChoiceType::class, [
                        'label' => 'autoPilot',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('emergencyLocatorTransmitter', ChoiceType::class, [
                        'label' => 'emergencyLocatorTransmitter',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airborneWeatherRadar', ChoiceType::class, [
                        'label' => 'airborneWeatherRadar',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('trafficAvoidanceSystem', ChoiceType::class, [
                        'label' => 'trafficAvoidanceSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('wireStrikeProtectionSystem', ChoiceType::class, [
                        'label' => 'wireStrikeProtectionSystem',
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
                    ]);
                break;
            case 8:
                $builder
                    ->add('dualControls', ChoiceType::class, [
                        'label' => 'dualControls',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('cargoHook', ChoiceType::class, [
                        'label' => 'cargoHook',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airConditioning', ChoiceType::class, [
                        'label' => 'airConditioning',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('heater', ChoiceType::class, [
                        'label' => 'heater',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('baggageCompartment', ChoiceType::class, [
                        'label' => 'baggageCompartment',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('floatKit', ChoiceType::class, [
                        'label' => 'floatKit',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('bearpaws', ChoiceType::class, [
                        'label' => 'bearpaws',
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
                    ])
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => array_combine(range(1900, date('Y') + 1), range(1900, date('Y') + 1)),
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('doorType', ChoiceType::class, [
                        'label' => 'doorType',
                        'choices' => [
                            'Hinged' => 'Hinged',
                            'Sliding' => 'Sliding',
                            'Hinged and Sliding' => 'Hinged and Sliding',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('exteriorNotes', TextareaType::class, [
                        'label' => 'exteriorNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field'],
                    ]);
                break;
            case 9:
                $builder
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => array_combine(range(1900, date('Y') + 1), range(1900, date('Y') + 1)),
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('interiorConfiguration', ChoiceType::class, [
                        'label' => 'interiorConfiguration',
                        'choices' => [
                            'Passenger / Utility' => 'Passenger / Utility',
                            'Corporate' => 'Corporate',
                            'Medical' => 'Medical',
                            'Offshore' => 'Offshore',
                            'SAR' => 'SAR',
                            'Law Enforcement' => 'Law Enforcement',
                            'Military' => 'Military',
                            'Aerial Work' => 'Aerial Work',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => false,
                        'attr' => ['min' => 0],
                    ])
                    ->add('soundproofing', ChoiceType::class, [
                        'label' => 'soundproofing',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('bubbleWindows', ChoiceType::class, [
                        'label' => 'bubbleWindows',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('impactResistantWindshield', ChoiceType::class, [
                        'label' => 'impactResistantWindshield',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
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
                    ])
                    ->add('airworthy', ChoiceType::class, [
                        'label' => 'airworthy',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ]);
                break;
        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TurbineHelicoptersDto::class,
        ]);
        $resolver->setRequired('step');
    }
}


