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

class TurbineHelicoptersFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Required Specs
        $builder
            ->add('registrationNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
            ]);

        // General Section
        $builder
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
            ]);

        // Airframe Section
        $builder
            ->add('totalTime', NumberType::class, [
                'label' => 'Total Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('rangeAircraft', NumberType::class, [
                'label' => 'Range',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('rangeUnit', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Nautical Miles' => 'nautical miles',
                ],
                'required' => false,
            ])
            ->add('maxTakeoffWeight', NumberType::class, [
                'label' => 'Max Takeoff Weight',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('maxTakeoffWeightUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Basic Empty Weight',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('basicEmptyWeightUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Useful Load',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('usefulLoadUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Max Cruise Speed',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('cruiseSpeedUnit', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Miles/Hour' => 'miles/hour',
                    'Kilometers/Hour' => 'kilometers/hour',
                    'Knots' => 'knots',
                ],
                'required' => false,
            ])
            ->add('hoverCeilingIge', NumberType::class, [
                'label' => 'Hover Ceiling IGE at Max Takeoff Weight',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('hoverCeilingIgeUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Hover Ceiling IGE (Inches)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('hoverCeilingOge', NumberType::class, [
                'label' => 'Hover Ceiling OGE at Max Takeoff Weight',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('hoverCeilingOgeUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Hover Ceiling OGE (Inches)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('fuelCapacityVolume', NumberType::class, [
                'label' => 'Fuel Capacity Volume',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('fuelCapacityUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Auxiliary Fuel Tank',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('crashResistantFuelSystem', ChoiceType::class, [
                'label' => 'Crash-Resistant Fuel System',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('completeLogs', ChoiceType::class, [
                'label' => 'Complete Logs',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('airframeNotes', TextareaType::class, [
                'label' => 'Airframe Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Rotor Section
        $builder
            ->add('mainRotorBladeTimeRemaining', NumberType::class, [
                'label' => 'Main Rotor Blade Time Remaining',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('mainRotorHubTimeRemaining', NumberType::class, [
                'label' => 'Main Rotor Hub Time Remaining',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('mainRotorGearboxTimeRemaining', NumberType::class, [
                'label' => 'Main Rotor Gearbox Time Remaining',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('antiTorqueSystem', ChoiceType::class, [
                'label' => 'Anti-Torque System',
                'choices' => [
                    'Tail Rotor' => 'Tail Rotor',
                    'Ducted Fan' => 'Ducted Fan',
                    'NOTAR' => 'NOTAR',
                ],
                'placeholder' => '------',
                'required' => false,
            ])
            ->add('tailRotorBladeTimeRemaining', NumberType::class, [
                'label' => 'Tail Rotor Blade Time Remaining',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('tailRotorGearboxTimeRemaining', NumberType::class, [
                'label' => 'Tail Rotor Gearbox Time Remaining',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('rotorNotes', TextareaType::class, [
                'label' => 'Rotor Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Engine 1 Section
        $builder
            ->add('engine1Make', TextType::class, [
                'label' => 'Engine 1 Manufacturer',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engine1Model', TextType::class, [
                'label' => 'Engine 1 Model',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engine1SerialNumber', TextType::class, [
                'label' => 'Engine 1 Serial Number',
                'required' => false,
            ])
            ->add('engine1Horsepower', NumberType::class, [
                'label' => 'Engine 1 Shaft Horsepower',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine1HorsepowerUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Engine 1 Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine1OverhaulTime', NumberType::class, [
                'label' => 'Engine 1 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine1OverhaulType', ChoiceType::class, [
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
            ->add('engine1TimeBetweenOverhaul', NumberType::class, [
                'label' => 'Engine 1 TBO',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine1Notes', TextareaType::class, [
                'label' => 'Engine 1 Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Engine 2 Section
        $builder
            ->add('engine2Make', TextType::class, [
                'label' => 'Engine 2 Manufacturer',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engine2Model', TextType::class, [
                'label' => 'Engine 2 Model',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('engine2SerialNumber', TextType::class, [
                'label' => 'Engine 2 Serial Number',
                'required' => false,
            ])
            ->add('engine2Horsepower', NumberType::class, [
                'label' => 'Engine 2 Shaft Horsepower',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine2HorsepowerUnit', ChoiceType::class, [
                'label' => false,
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
                'label' => 'Engine 2 Hot Section Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine2OverhaulTime', NumberType::class, [
                'label' => 'Engine 2 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine2OverhaulType', ChoiceType::class, [
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
            ->add('engine2TimeBetweenOverhaul', NumberType::class, [
                'label' => 'Engine 2 TBO',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('engine2Notes', TextareaType::class, [
                'label' => 'Engine 2 Notes',
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
            ->add('flightDeckManufacturer', TextType::class, [
                'label' => 'Flight Deck Manufacturer',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('flightDeckModel', TextType::class, [
                'label' => 'Flight Deck Model',
                'required' => false,
                'attr' => ['autocomplete' => 'off'],
            ])
            ->add('adsbEquipped', ChoiceType::class, [
                'label' => 'ADS-B Equipped',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('wideAreaAugSystem', ChoiceType::class, [
                'label' => 'WAAS',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('syntheticVisionTech', ChoiceType::class, [
                'label' => 'SVT',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('artificialHorizon', ChoiceType::class, [
                'label' => 'Artificial Horizon',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('radarAltimeter', ChoiceType::class, [
                'label' => 'Radar Altimeter',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('singlePilotOperation', ChoiceType::class, [
                'label' => 'Single Pilot Operation',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('autoPilot', ChoiceType::class, [
                'label' => 'Auto Pilot',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('emergencyLocatorTransmitter', ChoiceType::class, [
                'label' => 'ELT',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('airborneWeatherRadar', ChoiceType::class, [
                'label' => 'Airborne Weather Radar',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('trafficAvoidanceSystem', ChoiceType::class, [
                'label' => 'Traffic Avoidance System',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('wireStrikeProtectionSystem', ChoiceType::class, [
                'label' => 'Wire Strike Protection System',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('avionicsNotes', TextareaType::class, [
                'label' => 'Avionics/Radios',
                'required' => false,
                'attr' => ['class' => 'large-text-field'],
            ]);

        // Additional Equipment Section
        $builder
            ->add('dualControls', ChoiceType::class, [
                'label' => 'Dual Controls',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('cargoHook', ChoiceType::class, [
                'label' => 'Cargo Hook',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('airConditioning', ChoiceType::class, [
                'label' => 'A/C',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('heater', ChoiceType::class, [
                'label' => 'Heater',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('baggageCompartment', ChoiceType::class, [
                'label' => 'Baggage Compartment',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('floatKit', ChoiceType::class, [
                'label' => 'Float Kit',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('bearpaws', ChoiceType::class, [
                'label' => 'Bearpaws',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
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
            ->add('doorType', ChoiceType::class, [
                'label' => 'Door Type',
                'choices' => [
                    'Hinged' => 'Hinged',
                    'Sliding' => 'Sliding',
                    'Hinged and Sliding' => 'Hinged and Sliding',
                ],
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
            ->add('interiorConfiguration', ChoiceType::class, [
                'label' => 'Configuration',
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
                'label' => 'Number of Seats',
                'required' => false,
                'attr' => ['min' => 0],
            ])
            ->add('soundproofing', ChoiceType::class, [
                'label' => 'Soundproofing',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('bubbleWindows', ChoiceType::class, [
                'label' => 'Bubble Windows',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('impactResistantWindshield', ChoiceType::class, [
                'label' => 'Impact Resistant Windshield',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
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
            ])
            ->add('airworthy', ChoiceType::class, [
                'label' => 'Airworthy',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'placeholder' => '------',
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


