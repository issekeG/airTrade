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

class PistonTwinAircraftFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Section: Required Specs
            ->add('registrationNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
                'attr' => ['class' => 'required-spec']
            ])
            ->add('displayRegistrationNumber', CheckboxType::class, [
                'label' => 'Display Registration # with this listing',
                'required' => false,
                'label_attr' => ['class' => 'simple-specs-label'],
            ])
            ->add('flightRules', ChoiceType::class, [
                'label' => 'FlightRules',
                'choices' => [
                    '------' => '',
                    'IFR' => 'IFR',
                    'VFR' => 'VFR',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('locationAirportCode', TextType::class, [
                'label' => 'Based at (LAX)',
                'required' => false,
                'attr' => ['placeholder' => 'e.g. LAX'],
            ])
            ->add('displaySerialNumber', CheckboxType::class, [
                'label' => 'Display Serial Number with this listing',
                'required' => false,
                'label_attr' => ['class' => 'simple-specs-label'],
            ])

            // Section: Airframe
            ->add('totalTime', NumberType::class, [
                'label' => 'Total Time',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('rangeAircraft', NumberType::class, [
                'label' => 'Range',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('maxTakeoffWeight', NumberType::class, [
                'label' => 'Max Takeoff Weight',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('basicEmptyWeight', NumberType::class, [
                'label' => 'Basic Empty Weight',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('usefulLoad', NumberType::class, [
                'label' => 'Useful Load',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('fuelCapacityVolume', NumberType::class, [
                'label' => 'Fuel Capacity Volume',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('shortTakeOffLanding', ChoiceType::class, [
                'label' => 'STOL',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('auxiliaryFuelTank', ChoiceType::class, [
                'label' => 'Auxiliary Fuel Tank',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('logs', ChoiceType::class, [
                'label' => 'Complete Logs',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('winglets', ChoiceType::class, [
                'label' => 'Winglets',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('speedbrakes', ChoiceType::class, [
                'label' => 'Speedbrakes',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('spoilers', ChoiceType::class, [
                'label' => 'Spoilers',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('airframeNotes', TextareaType::class, [
                'label' => 'Airframe Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Engine 1
            ->add('engine1Make', TextType::class, [
                'label' => 'Engine 1 Manufacturer',
                'required' => false,
            ])
            ->add('engine1Model', TextType::class, [
                'label' => 'Engine 1 Model',
                'required' => false,
            ])
            ->add('engine1SerialNumber', TextType::class, [
                'label' => 'Engine 1 Serial Number',
                'required' => false,
            ])
            ->add('engine1Horsepower', NumberType::class, [
                'label' => 'Engine 1 Horsepower',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('engine1OverhaulTime', NumberType::class, [
                'label' => 'Engine 1 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine1OverhaulType', ChoiceType::class, [
                'label' => 'Engine 1 Time Since',
                'choices' => [
                    '------' => '',
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('engine1TimeBetweenOverhaul', NumberType::class, [
                'label' => 'Engine 1 TBO (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine1AftermarketSTC', ChoiceType::class, [
                'label' => 'Aftermarket Engine 1 STC',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engine1YearOverhauled', ChoiceType::class, [
                'label' => 'Year Engine 1 Overhauled or Installed as New',
                'choices' => $this->getYearChoices(),
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('engine1TimeRemainingToOverhaul', NumberType::class, [
                'label' => 'Engine 1 Time Remaining To Overhaul',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine1Cycles', NumberType::class, [
                'label' => 'Engine 1 Cycles',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine1Turbocharged', ChoiceType::class, [
                'label' => 'Engine 1 Turbocharged',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engine1Turbonormalized', ChoiceType::class, [
                'label' => 'Engine 1 Turbonormalized',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engine1Notes', TextareaType::class, [
                'label' => 'Engine 1 Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Engine 2
            ->add('engine2Make', TextType::class, [
                'label' => 'Engine 2 Manufacturer',
                'required' => false,
            ])
            ->add('engine2Model', TextType::class, [
                'label' => 'Engine 2 Model',
                'required' => false,
            ])
            ->add('engine2SerialNumber', TextType::class, [
                'label' => 'Engine 2 Serial Number',
                'required' => false,
            ])
            ->add('engine2Horsepower', NumberType::class, [
                'label' => 'Engine 2 Horsepower',
                'required' => false,
                'attr' => ['min' => 0, 'class' => 'small-input']
            ])
            ->add('engine2OverhaulTime', NumberType::class, [
                'label' => 'Engine 2 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine2OverhaulType', ChoiceType::class, [
                'label' => 'Engine 2 Time Since',
                'choices' => [
                    '------' => '',
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('engine2TimeBetweenOverhaul', NumberType::class, [
                'label' => 'Engine 2 TBO (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine2AftermarketSTC', ChoiceType::class, [
                'label' => 'Aftermarket Engine 2 STC',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engine2YearOverhauled', ChoiceType::class, [
                'label' => 'Year Engine 2 Overhauled or Installed as New',
                'choices' => $this->getYearChoices(),
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('engine2TimeRemainingToOverhaul', NumberType::class, [
                'label' => 'Engine 2 Time Remaining To Overhaul',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine2Cycles', NumberType::class, [
                'label' => 'Engine 2 Cycles',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('engine2Turbocharged', ChoiceType::class, [
                'label' => 'Engine 2 Turbocharged',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engine2Turbonormalized', ChoiceType::class, [
                'label' => 'Engine 2 Turbonormalized',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engine2Notes', TextareaType::class, [
                'label' => 'Engine 2 Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Props
            ->add('prop1Make', TextType::class, [
                'label' => 'Prop 1 Manufacturer',
                'required' => false,
            ])
            ->add('prop1Model', TextType::class, [
                'label' => 'Prop 1 Model',
                'required' => false,
            ])
            ->add('prop1OverhaulTime', NumberType::class, [
                'label' => 'Prop 1 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('prop1OverhaulType', ChoiceType::class, [
                'label' => 'Prop 1 Time Since',
                'choices' => [
                    '------' => '',
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('prop2Make', TextType::class, [
                'label' => 'Prop 2 Manufacturer',
                'required' => false,
            ])
            ->add('prop2Model', TextType::class, [
                'label' => 'Prop 2 Model',
                'required' => false,
            ])
            ->add('prop2OverhaulTime', NumberType::class, [
                'label' => 'Prop 2 Time (in hours)',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('prop2OverhaulType', ChoiceType::class, [
                'label' => 'Prop 2 Time Since',
                'choices' => [
                    '------' => '',
                    'SCMOH' => 'SCMOH',
                    'SFOH' => 'SFOH',
                    'SFRM' => 'SFRM',
                    'SMOH' => 'SMOH',
                    'SNEW' => 'SNEW',
                    'SOH' => 'SOH',
                    'STOH' => 'STOH',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('numBlades', NumberType::class, [
                'label' => 'Number of Blades',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('bladeComposition', ChoiceType::class, [
                'label' => 'Blade Composition',
                'choices' => [
                    '------' => '',
                    'Aluminum' => 'Aluminum',
                    'Composite' => 'Composite',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('sweptBladePropellers', ChoiceType::class, [
                'label' => 'Swept Blade Propellers',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('propsSync', ChoiceType::class, [
                'label' => 'Props Sync',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('propsNotes', TextareaType::class, [
                'label' => 'Prop Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Modifications/Conversions
            ->add('dualAftBodyStrakes', ChoiceType::class, [
                'label' => 'Dual Aft Body Strakes',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('vortexGenerators', ChoiceType::class, [
                'label' => 'Vortex Generators',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('modifications', TextareaType::class, [
                'label' => 'Modifications/Conversions',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Avionics
            ->add('flightDeckManufacturer', TextType::class, [
                'label' => 'Flight Deck Manufacturer',
                'required' => false,
            ])
            ->add('flightDeckModel', TextType::class, [
                'label' => 'Flight Deck Model',
                'required' => false,
            ])
            ->add('primaryFlightDisplay1Manufacturer', TextType::class, [
                'label' => 'Primary Flight Display 1 Manufacturer',
                'required' => false,
            ])
            ->add('primaryFlightDisplay1Model', TextType::class, [
                'label' => 'Primary Flight Display 1 Model',
                'required' => false,
            ])
            ->add('primaryFlightDisplay2Manufacturer', TextType::class, [
                'label' => 'Primary Flight Display 2 Manufacturer',
                'required' => false,
            ])
            ->add('primaryFlightDisplay2Model', TextType::class, [
                'label' => 'Primary Flight Display 2 Model',
                'required' => false,
            ])
            ->add('multiFunctionDisplay1Manufacturer', TextType::class, [
                'label' => 'Multi-Function Display 1 Manufacturer',
                'required' => false,
            ])
            ->add('multiFunctionDisplay1Model', TextType::class, [
                'label' => 'Multi-Function Display 1 Model',
                'required' => false,
            ])
            ->add('multiFunctionDisplay2Manufacturer', TextType::class, [
                'label' => 'Multi-Function Display 2 Manufacturer',
                'required' => false,
            ])
            ->add('multiFunctionDisplay2Model', TextType::class, [
                'label' => 'Multi-Function Display 2 Model',
                'required' => false,
            ])
            ->add('gps1Manufacturer', TextType::class, [
                'label' => 'GPS 1 Manufacturer',
                'required' => false,
            ])
            ->add('gps1Model', TextType::class, [
                'label' => 'GPS 1 Model',
                'required' => false,
            ])
            ->add('gps2Manufacturer', TextType::class, [
                'label' => 'GPS 2 Manufacturer',
                'required' => false,
            ])
            ->add('gps2Model', TextType::class, [
                'label' => 'GPS 2 Model',
                'required' => false,
            ])
            ->add('transponder1Manufacturer', TextType::class, [
                'label' => 'Transponder 1 Manufacturer',
                'required' => false,
            ])
            ->add('transponder1Model', TextType::class, [
                'label' => 'Transponder 1 Model',
                'required' => false,
            ])
            ->add('transponder2Manufacturer', TextType::class, [
                'label' => 'Transponder 2 Manufacturer',
                'required' => false,
            ])
            ->add('transponder2Model', TextType::class, [
                'label' => 'Transponder 2 Model',
                'required' => false,
            ])
            ->add('autopilotManufacturer', TextType::class, [
                'label' => 'Autopilot Manufacturer',
                'required' => false,
            ])
            ->add('autopilotModel', TextType::class, [
                'label' => 'Autopilot Model',
                'required' => false,
            ])
            ->add('adsbEquipped', ChoiceType::class, [
                'label' => 'ADS-B Equipped',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('wideAreaAugSystem', ChoiceType::class, [
                'label' => 'WAAS',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('localizerPerformanceVG', ChoiceType::class, [
                'label' => 'LPV',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('syntheticVisionTech', ChoiceType::class, [
                'label' => 'SVT',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('enhancedVisionSystem', ChoiceType::class, [
                'label' => 'EVS',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('yawDamper', ChoiceType::class, [
                'label' => 'Yaw Damper',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('activeTraffic', ChoiceType::class, [
                'label' => 'Active Traffic',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('terrainWarningSystem', ChoiceType::class, [
                'label' => 'Terrain Warning System',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('engineMonitor', ChoiceType::class, [
                'label' => 'Engine Monitor',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('avionicsNotes', TextareaType::class, [
                'label' => 'Avionics/Radios',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Additional Equipment
            ->add('wifi', ChoiceType::class, [
                'label' => 'WiFi',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('pressurized', ChoiceType::class, [
                'label' => 'Pressurized',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('oxygenSystem', ChoiceType::class, [
                'label' => 'Oxygen System',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('knownIce', ChoiceType::class, [
                'label' => 'Flight Into Known Icing (FIKI)',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('inadvertentIceProtection', ChoiceType::class, [
                'label' => 'Inadvertent Ice Protection',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('airConditioning', ChoiceType::class, [
                'label' => 'A/C',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('floatKit', ChoiceType::class, [
                'label' => 'Float Kit',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('includesFloats', ChoiceType::class, [
                'label' => 'Includes Floats',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'required' => false,
            ])
            ->add('floatType', ChoiceType::class, [
                'label' => 'Float Type',
                'choices' => [
                    '------' => '',
                    'Straight' => 'Straight',
                    'Amphibious' => 'Amphibious',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('equipmentNotes', TextareaType::class, [
                'label' => 'Additional Equipment',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Exterior
            ->add('yearPainted', ChoiceType::class, [
                'label' => 'Year Painted',
                'choices' => $this->getYearChoices(),
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('exteriorNotes', TextareaType::class, [
                'label' => 'Exterior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Interior
            ->add('yearInterior', ChoiceType::class, [
                'label' => 'Year Interior',
                'choices' => $this->getYearChoices(),
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('seatNumber', NumberType::class, [
                'label' => 'Number of Seats',
                'required' => false,
                'attr' => ['min' => 0]
            ])
            ->add('lavatory', ChoiceType::class, [
                'label' => 'Lavatory',
                'choices' => [
                    '------' => '',
                    'Yes' => true,
                    'No' => false,
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('interiorConfiguration', ChoiceType::class, [
                'label' => 'Configuration',
                'choices' => [
                    '------' => '',
                    'Cargo' => 'Cargo',
                    'Passenger' => 'Passenger',
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
            ])
            ->add('interiorNotes', TextareaType::class, [
                'label' => 'Interior Notes',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])

            // Section: Inspection Status
            ->add('inspectionStatus', TextareaType::class, [
                'label' => 'Inspection Status',
                'required' => false,
                'attr' => ['class' => 'large-text-field']
            ])
            ->add('airworthy', ChoiceType::class, [
                'label' => 'Airworthy',
                'choices' => [
                    '------' => '',
                    'Yes' => true,
                    'No' => false,
                ],
                'required' => false,
                'attr' => ['class' => 'spec-select']
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



