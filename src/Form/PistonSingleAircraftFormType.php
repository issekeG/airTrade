<?php

namespace App\Form;

use App\Dto\JetAircraftDto;
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

class PistonSingleAircraftFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('regNumber', TextType::class, [
                        'label' => 'Registration #',
                        'required' => true,
                    ])
                    ->add('displayRegNumber', CheckboxType::class, [
                        'label' => 'Display Registration # with this listing',
                        'required' => false,
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'Flight Rules',
                        'choices' => [
                            '------' => '',
                            'IFR' => 'IFR',
                            'VFR' => 'VFR',
                        ],
                        'required' => false,
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'Based at (LAX)',
                        'required' => false,
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'Display Serial Number with this listing',
                        'required' => false,
                    ])
                    ->add('totalTime', NumberType::class, [
                        'label' => 'Total Time',
                        'required' => false,
                    ])
                    ->add('rangeAircraft', NumberType::class, [
                        'label' => 'Range',
                        'required' => false,
                    ])
                    ->add('maxTakeoffWeight', NumberType::class, [
                        'label' => 'Max Takeoff Weight',
                        'required' => false,
                    ])
                    ->add('basicEmptyWeight', NumberType::class, [
                        'label' => 'Basic Empty Weight',
                        'required' => false,
                    ])
                    ->add('usefulLoad', NumberType::class, [
                        'label' => 'Useful Load',
                        'required' => false,
                    ])
                    ->add('shortTakeOffLanding', ChoiceType::class, [
                        'label' => 'STOL',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('fuelCapacityVolume', NumberType::class, [
                        'label' => 'Fuel Capacity Volume',
                        'required' => false,
                    ])
                    ->add('auxiliaryFuelTank', ChoiceType::class, [
                        'label' => 'Auxiliary Fuel Tank',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('logs', ChoiceType::class, [
                        'label' => 'Complete Logs',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('speedbrakes', ChoiceType::class, [
                        'label' => 'Speedbrakes',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('spoilers', ChoiceType::class, [
                        'label' => 'Spoilers',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'Airframe Notes',
                        'required' => false,
                    ]);

                break;
            case 2:
                $builder
                    ->add('engineMake', TextType::class, [
                        'label' => 'Engine Manufacturer',
                        'required' => false,
                    ])
                    ->add('engineModel', TextType::class, [
                        'label' => 'Engine Model',
                        'required' => false,
                    ])
                    ->add('engineSerialNum', TextType::class, [
                        'label' => 'Engine Serial Number',
                        'required' => false,
                    ])
                    ->add('horsepowerEngine', NumberType::class, [
                        'label' => 'Engine Horsepower',
                        'required' => false,
                    ])
                    ->add('overhaulTime', NumberType::class, [
                        'label' => 'Engine Time (in hours)',
                        'required' => false,
                    ])
                    ->add('overhaulType', ChoiceType::class, [
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
                    ->add('timeBetweenOverhaul', NumberType::class, [
                        'label' => 'Engine TBO (in hours)',
                        'required' => false,
                    ])
                    ->add('aftermarketEngineSTC', ChoiceType::class, [
                        'label' => 'Aftermarket Engine STC',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('yearOverhauled', ChoiceType::class, [
                        'label' => 'Year Engine Overhauled or Installed as New',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                    ])
                    ->add('timeRemainingToOverhaul', NumberType::class, [
                        'label' => 'Engine Time Remaining To Overhaul',
                        'required' => false,
                    ])
                    ->add('engineCycles', NumberType::class, [
                        'label' => 'Engine Cycles',
                        'required' => false,
                    ])
                    ->add('turbo', ChoiceType::class, [
                        'label' => 'Turbocharged',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('turboNormalized', ChoiceType::class, [
                        'label' => 'Turbonormalized',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('engineNotes', TextareaType::class, [
                        'label' => 'Engine Notes',
                        'required' => false,
                    ])
                    ->add('propMake', TextType::class, [
                        'label' => 'Prop Manufacturer',
                        'required' => false,
                    ])
                    ->add('propModel', TextType::class, [
                        'label' => 'Prop Model',
                        'required' => false,
                    ])
                    ->add('propOverhaulTime', NumberType::class, [
                        'label' => 'Prop Time (in hours)',
                        'required' => false,
                    ])
                    ->add('propOverhaulType', ChoiceType::class, [
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
                    ->add('numBlades', NumberType::class, [
                        'label' => 'Number of Blades',
                        'required' => false,
                    ])
                    ->add('bladeComposition', ChoiceType::class, [
                        'label' => 'Blade Composition',
                        'choices' => [
                            '------' => '',
                            'Aluminum' => 'Aluminum',
                            'Composite' => 'Composite',
                        ],
                        'required' => false,
                    ])
                    ->add('sweptBladePropellers', ChoiceType::class, [
                        'label' => 'Swept Blade Propellers',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('propsNotes', TextareaType::class, [
                        'label' => 'Prop Notes',
                        'required' => false,
                    ]);

                break;
            case 3:
                $builder
                    ->add('vortexGenerators', ChoiceType::class, [
                        'label' => 'Vortex Generators',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('modificationsNotes', TextareaType::class, [
                        'label' => 'Modifications/Conversions',
                        'required' => false,
                    ])
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
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ]);
                    // Engine Program


                break;
            case 4:
                $builder
                    ->add('wideAreaAugSystem', ChoiceType::class, [
                        'label' => 'WAAS',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('localizerPerformanceVG', ChoiceType::class, [
                        'label' => 'LPV',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('syntheticVisionTech', ChoiceType::class, [
                        'label' => 'SVT',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('enhancedVisionSystem', ChoiceType::class, [
                        'label' => 'EVS',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('yawDamper', ChoiceType::class, [
                        'label' => 'Yaw Damper',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('activeTraffic', ChoiceType::class, [
                        'label' => 'Active Traffic',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('terrainWarningSystem', ChoiceType::class, [
                        'label' => 'Terrain Warning System',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('engineMonitor', ChoiceType::class, [
                        'label' => 'Engine Monitor',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('avionicsNotes', TextareaType::class, [
                        'label' => 'Avionics/Radios',
                        'required' => false,
                    ])
                    ->add('wifi', ChoiceType::class, [
                        'label' => 'WiFi',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('pressurized', ChoiceType::class, [
                        'label' => 'Pressurized',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('oxygenSystem', ChoiceType::class, [
                        'label' => 'Oxygen System',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('knownIce', ChoiceType::class, [
                        'label' => 'Flight Into Known Icing (FIKI)',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('inadvertentIceProtection', ChoiceType::class, [
                        'label' => 'Inadvertent Ice Protection',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airConditioning', ChoiceType::class, [
                        'label' => 'A/C',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('floatKit', ChoiceType::class, [
                        'label' => 'Float Kit',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('includesFloats', ChoiceType::class, [
                        'label' => 'Includes Floats',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
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
                    ])
                    ->add('equipmentNotes', TextareaType::class, [
                        'label' => 'Additional Equipment',
                        'required' => false,
                    ]);

                break;
            case 5:
                $builder
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'Year Painted',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                    ])
                    ->add('exteriorNotes', TextareaType::class, [
                        'label' => 'Exterior Notes',
                        'required' => false,
                    ])
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'Year Interior',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'Number of Seats',
                        'required' => false,
                    ])
                    ->add('interiorConfiguration', ChoiceType::class, [
                        'label' => 'Configuration',
                        'choices' => [
                            '------' => '',
                            'Cargo' => 'Cargo',
                            'Passenger' => 'Passenger',
                        ],
                        'required' => false,
                    ])
                    ->add('interiorNotes', TextareaType::class, [
                        'label' => 'Interior Notes',
                        'required' => false,
                    ])
                    ->add('inspectionStatus', TextareaType::class, [
                        'label' => 'Inspection Status',
                        'required' => false,
                    ])
                    ->add('airworthy', ChoiceType::class, [
                        'label' => 'Airworthy',
                        'choices' => [
                            '------' => '',
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'required' => false,
                    ]);

                break;

        }
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



