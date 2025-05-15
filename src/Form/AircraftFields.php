<?php
// src/Dto/SpecFormDto.php
namespace App\Dto;

// src/Form/SpecFormType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AircraftFields extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Section 1: Required Specs
        $builder
            ->add('RegNumber', TextType::class, [
                'label' => 'Registration #',
                'required' => true,
            ])
            ->add('DisplayRegNumber', CheckboxType::class, [
                'label' => 'Display Registration # with this listing',
                'required' => false,
            ])
            ->add('FlightRules', ChoiceType::class, [
                'label' => 'Flight Rules',
                'choices' => [
                    '------' => '',
                    'IFR' => 'IFR',
                    'VFR' => 'VFR',
                ],
                'required' => false,
            ])
            ->add('LocationAirportCode', TextType::class, [
                'label' => 'Based at (LAX)',
                'required' => false,
            ])
            ->add('DisplaySerialNumber', CheckboxType::class, [
                'label' => 'Display Serial Number with this listing',
                'required' => false,
            ]);

        // Section 2: Airframe
        $builder
            ->add('TotalTime', NumberType::class, [
                'label' => 'Total Time',
                'required' => false,
            ])
            ->add('RangeAircraft', NumberType::class, [
                'label' => 'Range',
                'required' => false,
            ])
            ->add('MaxTakeoffWeight', NumberType::class, [
                'label' => 'Max Takeoff Weight',
                'required' => false,
            ])
            ->add('BasicEmptyWeight', NumberType::class, [
                'label' => 'Basic Empty Weight',
                'required' => false,
            ])
            ->add('UsefulLoad', NumberType::class, [
                'label' => 'Useful Load',
                'required' => false,
            ])
            ->add('ShortTakeOffLanding', ChoiceType::class, [
                'label' => 'STOL',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('FuelCapacityVolume', NumberType::class, [
                'label' => 'Fuel Capacity Volume',
                'required' => false,
            ])
            ->add('AuxiliaryFuelTank', ChoiceType::class, [
                'label' => 'Auxiliary Fuel Tank',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('Logs', ChoiceType::class, [
                'label' => 'Complete Logs',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('Speedbrakes', ChoiceType::class, [
                'label' => 'Speedbrakes',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('Spoilers', ChoiceType::class, [
                'label' => 'Spoilers',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('AirframeNotes', TextareaType::class, [
                'label' => 'Airframe Notes',
                'required' => false,
            ]);

        // Section 3: Engine
        $builder
            ->add('EngineMake', TextType::class, [
                'label' => 'Engine Manufacturer',
                'required' => false,
            ])
            ->add('EngineModel', TextType::class, [
                'label' => 'Engine Model',
                'required' => false,
            ])
            ->add('EngineSerialNum', TextType::class, [
                'label' => 'Engine Serial Number',
                'required' => false,
            ])
            ->add('HorsepowerEngine', NumberType::class, [
                'label' => 'Engine Horsepower',
                'required' => false,
            ])
            ->add('OverhaulTime', NumberType::class, [
                'label' => 'Engine Time (in hours)',
                'required' => false,
            ])
            ->add('OverhaulType', ChoiceType::class, [
                'label' => 'Engine Time Since',
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
            ])
            ->add('TimeBetweenOverhaul', NumberType::class, [
                'label' => 'Engine TBO (in hours)',
                'required' => false,
            ])
            ->add('AftermarketEngineSTC', ChoiceType::class, [
                'label' => 'Aftermarket Engine STC',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('YearOverhauled', ChoiceType::class, [
                'label' => 'Year Engine Overhauled or Installed as New',
                'choices' => $this->getYearChoices(),
                'required' => false,
            ])
            ->add('TimeRemainingToOverhaul', NumberType::class, [
                'label' => 'Engine Time Remaining To Overhaul',
                'required' => false,
            ])
            ->add('EngineCycles', NumberType::class, [
                'label' => 'Engine Cycles',
                'required' => false,
            ])
            ->add('Turbo', ChoiceType::class, [
                'label' => 'Turbocharged',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('Turbonormalized', ChoiceType::class, [
                'label' => 'Turbonormalized',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('EngineNotes', TextareaType::class, [
                'label' => 'Engine Notes',
                'required' => false,
            ]);

        // Section 4: Props
        $builder
            ->add('PropMake', TextType::class, [
                'label' => 'Prop Manufacturer',
                'required' => false,
            ])
            ->add('PropModel', TextType::class, [
                'label' => 'Prop Model',
                'required' => false,
            ])
            ->add('PropOverhaulTime', NumberType::class, [
                'label' => 'Prop Time (in hours)',
                'required' => false,
            ])
            ->add('PropOverhaulType', ChoiceType::class, [
                'label' => 'Prop Time Since',
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
            ])
            ->add('NumBlades', NumberType::class, [
                'label' => 'Number of Blades',
                'required' => false,
            ])
            ->add('BladeComposition', ChoiceType::class, [
                'label' => 'Blade Composition',
                'choices' => [
                    '------' => '',
                    'Aluminum' => 'Aluminum',
                    'Composite' => 'Composite',
                ],
                'required' => false,
            ])
            ->add('SweptBladePropellers', ChoiceType::class, [
                'label' => 'Swept Blade Propellers',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('PropsNotes', TextareaType::class, [
                'label' => 'Prop Notes',
                'required' => false,
            ]);

        // Section 5: Modifications/Conversions
        $builder
            ->add('VortexGenerators', ChoiceType::class, [
                'label' => 'Vortex Generators',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('ModificationsNotes', TextareaType::class, [
                'label' => 'Modifications/Conversions',
                'required' => false,
            ]);

        // Section 6: Avionics
        $builder
            ->add('FlightDeckManufacturer', TextType::class, [
                'label' => 'Flight Deck Manufacturer',
                'required' => false,
            ])
            ->add('FlightDeckModel', TextType::class, [
                'label' => 'Flight Deck Model',
                'required' => false,
            ])
            ->add('PrimaryFlightDisplay1Manufacturer', TextType::class, [
                'label' => 'Primary Flight Display 1 Manufacturer',
                'required' => false,
            ])
            ->add('PrimaryFlightDisplay1Model', TextType::class, [
                'label' => 'Primary Flight Display 1 Model',
                'required' => false,
            ])
            ->add('PrimaryFlightDisplay2Manufacturer', TextType::class, [
                'label' => 'Primary Flight Display 2 Manufacturer',
                'required' => false,
            ])
            ->add('PrimaryFlightDisplay2Model', TextType::class, [
                'label' => 'Primary Flight Display 2 Model',
                'required' => false,
            ])
            ->add('MultiFunctionDisplay1Manufacturer', TextType::class, [
                'label' => 'Multi-Function Display 1 Manufacturer',
                'required' => false,
            ])
            ->add('MultiFunctionDisplay1Model', TextType::class, [
                'label' => 'Multi-Function Display 1 Model',
                'required' => false,
            ])
            ->add('MultiFunctionDisplay2Manufacturer', TextType::class, [
                'label' => 'Multi-Function Display 2 Manufacturer',
                'required' => false,
            ])
            ->add('MultiFunctionDisplay2Model', TextType::class, [
                'label' => 'Multi-Function Display 2 Model',
                'required' => false,
            ])
            ->add('GPS1Manufacturer', TextType::class, [
                'label' => 'GPS 1 Manufacturer',
                'required' => false,
            ])
            ->add('GPS1Model', TextType::class, [
                'label' => 'GPS 1 Model',
                'required' => false,
            ])
            ->add('GPS2Manufacturer', TextType::class, [
                'label' => 'GPS 2 Manufacturer',
                'required' => false,
            ])
            ->add('GPS2Model', TextType::class, [
                'label' => 'GPS 2 Model',
                'required' => false,
            ])
            ->add('Transponder1Manufacturer', TextType::class, [
                'label' => 'Transponder 1 Manufacturer',
                'required' => false,
            ])
            ->add('Transponder1Model', TextType::class, [
                'label' => 'Transponder 1 Model',
                'required' => false,
            ])
            ->add('Transponder2Manufacturer', TextType::class, [
                'label' => 'Transponder 2 Manufacturer',
                'required' => false,
            ])
            ->add('Transponder2Model', TextType::class, [
                'label' => 'Transponder 2 Model',
                'required' => false,
            ])
            ->add('AutopilotManufacturer', TextType::class, [
                'label' => 'Autopilot Manufacturer',
                'required' => false,
            ])
            ->add('AutopilotModel', TextType::class, [
                'label' => 'Autopilot Model',
                'required' => false,
            ])
            ->add('ADSBEquipped', ChoiceType::class, [
                'label' => 'ADS-B Equipped',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])



            ->add('WideAreaAugSystem', ChoiceType::class, [
                'label' => 'WAAS',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('LocalizerPerformanceVG', ChoiceType::class, [
                'label' => 'LPV',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('SyntheticVisionTech', ChoiceType::class, [
                'label' => 'SVT',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('EnhancedVisionSystem', ChoiceType::class, [
                'label' => 'EVS',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('YawDamper', ChoiceType::class, [
                'label' => 'Yaw Damper',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('ActiveTraffic', ChoiceType::class, [
                'label' => 'Active Traffic',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('TerrainWarningSystem', ChoiceType::class, [
                'label' => 'Terrain Warning System',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('EngineMonitor', ChoiceType::class, [
                'label' => 'Engine Monitor',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('AvionicsNotes', TextareaType::class, [
                'label' => 'Avionics/Radios',
                'required' => false,
            ]);

        // Section 7: Additional Equipment
        $builder
            ->add('WiFi', ChoiceType::class, [
                'label' => 'WiFi',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('Pressurized', ChoiceType::class, [
                'label' => 'Pressurized',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('OxygenSystem', ChoiceType::class, [
                'label' => 'Oxygen System',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('KnownIce', ChoiceType::class, [
                'label' => 'Flight Into Known Icing (FIKI)',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('InadvertentIceProtection', ChoiceType::class, [
                'label' => 'Inadvertent Ice Protection',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('AirConditioning', ChoiceType::class, [
                'label' => 'A/C',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('FloatKit', ChoiceType::class, [
                'label' => 'Float Kit',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('IncludesFloats', ChoiceType::class, [
                'label' => 'Includes Floats',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])
            ->add('FloatType', ChoiceType::class, [
                'label' => 'Float Type',
                'choices' => [
                    '------' => '',
                    'Straight' => 'Straight',
                    'Amphibious' => 'Amphibious',
                ],
                'required' => false,
            ])
            ->add('EquipmentNotes', TextareaType::class, [
                'label' => 'Additional Equipment',
                'required' => false,
            ]);



        // Section 8: Exterior
        $builder
            ->add('YearPainted', ChoiceType::class, [
                'label' => 'Year Painted',
                'choices' => $this->getYearChoices(),
                'required' => false,
            ])
            ->add('ExteriorNotes', TextareaType::class, [
                'label' => 'Exterior Notes',
                'required' => false,
            ]);

        // Section 9: Interior
        $builder
            ->add('YearInterior', ChoiceType::class, [
                'label' => 'Year Interior',
                'choices' => $this->getYearChoices(),
                'required' => false,
            ])
            ->add('SeatNumber', NumberType::class, [
                'label' => 'Number of Seats',
                'required' => false,
            ])
            ->add('InteriorConfiguration', ChoiceType::class, [
                'label' => 'Configuration',
                'choices' => [
                    '------' => '',
                    'Cargo' => 'Cargo',
                    'Passenger' => 'Passenger',
                ],
                'required' => false,
            ])
            ->add('InteriorNotes', TextareaType::class, [
                'label' => 'Interior Notes',
                'required' => false,
            ]);

        // Section 10: Inspection Status
        $builder
            ->add('InspectionStatus', TextareaType::class, [
                'label' => 'Inspection Status',
                'required' => false,
            ])
            ->add('Airworthy', ChoiceType::class, [
                'label' => 'Airworthy',
                'choices' => [
                    '------' => '',
                    'Yes' => 1,
                    'No' => 0,
                ],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configurez ici les options du formulaire
        ]);
    }

    private function getYearChoices(): array
    {
        $years = range(2024, 1900);
        return array_combine($years, $years);
    }
}