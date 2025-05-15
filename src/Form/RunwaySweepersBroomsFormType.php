<?php

namespace App\Form;

use App\Dto\RunwaySweepersBroomsDto;
use App\Entity\Aircraft;
use App\Entity\AircraftSpecs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RunwaySweepersBroomsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $lengthUnits = [
            'inches' => 'inch',
            'feet' => 'foot',
            'yards' => 'yard',
            'millimeters' => 'millimeter',
            'centimeters' => 'centimeter',
            'meters' => 'meter'
        ];

        $weightUnits = [
            'pounds' => 'pound',
            'tons' => 'ton',
            'kilograms' => 'kilogram',
            'metric tons' => 'metric ton',
            'ounces' => 'ounce'
        ];
        switch ($options['step']) {
            case 1:
                $builder
                    ->add('registrationNumber', TextType::class, [
                        'label' => 'registrationNumber',
                        'required' => true,
                        'attr' => ['class' => 'required-spec']
                    ])
                    ->add('displayRegistrationNumber', CheckboxType::class, [
                        'label' => 'displayRegistrationNumber',
                        'required' => false,
                        'label_attr' => ['class' => 'simple-specs-label'],
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'flightRules',
                        'choices' => [
                            '------' => '',
                            'IFR' => 'IFR',
                            'VFR' => 'VFR',
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'locationAirportCode',
                        'required' => false,
                        'attr' => ['placeholder' => 'e.g. LAX'],
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'displaySerialNumber',
                        'required' => false,
                        'label_attr' => ['class' => 'simple-specs-label'],
                    ]);
                break;
            case 2:
                $builder
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('rangeAircraft', NumberType::class, [
                        'label' => 'rangeAircraft',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('maxTakeoffWeight', NumberType::class, [
                        'label' => 'maxTakeoffWeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('basicEmptyWeight', NumberType::class, [
                        'label' => 'basicEmptyWeight',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('usefulLoad', NumberType::class, [
                        'label' => 'usefulLoad',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('fuelCapacityVolume', NumberType::class, [
                        'label' => 'fuelCapacityVolume',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('shortTakeOffLanding', ChoiceType::class, [
                        'label' => 'shortTakeOffLanding',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('auxiliaryFuelTank', ChoiceType::class, [
                        'label' => 'auxiliaryFuelTank',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('logs', ChoiceType::class, [
                        'label' => 'logs',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('winglets', ChoiceType::class, [
                        'label' => 'winglets',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('speedbrakes', ChoiceType::class, [
                        'label' => 'speedbrakes',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('spoilers', ChoiceType::class, [
                        'label' => 'spoilers',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'airframeNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 3:
                $builder
                    ->add('engine1Make', TextType::class, [
                        'label' => 'engine1Make',
                        'required' => false,
                    ])
                    ->add('engine1Model', TextType::class, [
                        'label' => 'engine1Model',
                        'required' => false,
                    ])
                    ->add('engine1SerialNumber', TextType::class, [
                        'label' => 'engine1SerialNumber',
                        'required' => false,
                    ])
                    ->add('engine1Horsepower', NumberType::class, [
                        'label' => 'engine1Horsepower',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('engine1OverhaulTime', NumberType::class, [
                        'label' => 'engine1OverhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine1OverhaulType', ChoiceType::class, [
                        'label' => 'engine1OverhaulType',
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
                        'label' => 'engine1TimeBetweenOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine1AftermarketSTC', ChoiceType::class, [
                        'label' => 'engine1AftermarketSTC',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engine1YearOverhauled', ChoiceType::class, [
                        'label' => 'engine1YearOverhauled',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('engine1TimeRemainingToOverhaul', NumberType::class, [
                        'label' => 'engine1TimeRemainingToOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine1Cycles', NumberType::class, [
                        'label' => 'engine1Cycles',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine1Turbocharged', ChoiceType::class, [
                        'label' => 'engine1Turbocharged',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engine1Turbonormalized', ChoiceType::class, [
                        'label' => 'engine1Turbonormalized',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engine1Notes', TextareaType::class, [
                        'label' => 'engine1Notes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 4:
                $builder
                    ->add('engine2Make', TextType::class, [
                        'label' => 'engine2Make',
                        'required' => false,
                    ])
                    ->add('engine2Model', TextType::class, [
                        'label' => 'engine2Model',
                        'required' => false,
                    ])
                    ->add('engine2SerialNumber', TextType::class, [
                        'label' => 'engine2SerialNumber',
                        'required' => false,
                    ])
                    ->add('engine2Horsepower', NumberType::class, [
                        'label' => 'engine2Horsepower',
                        'required' => false,
                        'attr' => ['min' => 0, 'class' => 'small-input']
                    ])
                    ->add('engine2OverhaulTime', NumberType::class, [
                        'label' => 'engine2OverhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine2OverhaulType', ChoiceType::class, [
                        'label' => 'engine2OverhaulType',
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
                        'label' => 'engine2TimeBetweenOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine2AftermarketSTC', ChoiceType::class, [
                        'label' => 'engine2AftermarketSTC',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engine2YearOverhauled', ChoiceType::class, [
                        'label' => 'engine2YearOverhauled',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('engine2TimeRemainingToOverhaul', NumberType::class, [
                        'label' => 'engine2TimeRemainingToOverhaul',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine2Cycles', NumberType::class, [
                        'label' => 'engine2Cycles',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('engine2Turbocharged', ChoiceType::class, [
                        'label' => 'engine2Turbocharged',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engine2Turbonormalized', ChoiceType::class, [
                        'label' => 'engine2Turbonormalized',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engine2Notes', TextareaType::class, [
                        'label' => 'engine2Notes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 5:
                $builder
                    ->add('prop1Make', TextType::class, [
                        'label' => 'prop1Make',
                        'required' => false,
                    ])
                    ->add('prop1Model', TextType::class, [
                        'label' => 'prop1Model',
                        'required' => false,
                    ])
                    ->add('prop1OverhaulTime', NumberType::class, [
                        'label' => 'prop1OverhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('prop1OverhaulType', ChoiceType::class, [
                        'label' => 'prop1OverhaulType',
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
                        'label' => 'prop2Make',
                        'required' => false,
                    ])
                    ->add('prop2Model', TextType::class, [
                        'label' => 'prop2Model',
                        'required' => false,
                    ])
                    ->add('prop2OverhaulTime', NumberType::class, [
                        'label' => 'prop2OverhaulTime',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('prop2OverhaulType', ChoiceType::class, [
                        'label' => 'prop2OverhaulType',
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
                        'label' => 'numBlades',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('bladeComposition', ChoiceType::class, [
                        'label' => 'bladeComposition',
                        'choices' => [
                            '------' => '',
                            'Aluminum' => 'Aluminum',
                            'Composite' => 'Composite',
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('sweptBladePropellers', ChoiceType::class, [
                        'label' => 'sweptBladePropellers',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('propsSync', ChoiceType::class, [
                        'label' => 'propsSync',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('propsNotes', TextareaType::class, [
                        'label' => 'propsNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 6:
                $builder
                    ->add('dualAftBodyStrakes', ChoiceType::class, [
                        'label' => 'dualAftBodyStrakes',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('vortexGenerators', ChoiceType::class, [
                        'label' => 'vortexGenerators',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('modifications', TextareaType::class, [
                        'label' => 'modifications',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('flightDeckManufacturer', TextType::class, [
                        'label' => 'flightDeckManufacturer',
                        'required' => false,
                    ])
                    ->add('flightDeckModel', TextType::class, [
                        'label' => 'flightDeckModel',
                        'required' => false,
                    ])
                    ->add('primaryFlightDisplay1Manufacturer', TextType::class, [
                        'label' => 'primaryFlightDisplay1Manufacturer',
                        'required' => false,
                    ])
                    ->add('primaryFlightDisplay1Model', TextType::class, [
                        'label' => 'primaryFlightDisplay1Model',
                        'required' => false,
                    ])
                    ->add('primaryFlightDisplay2Manufacturer', TextType::class, [
                        'label' => 'primaryFlightDisplay2Manufacturer',
                        'required' => false,
                    ])
                    ->add('primaryFlightDisplay2Model', TextType::class, [
                        'label' => 'primaryFlightDisplay2Model',
                        'required' => false,
                    ])
                    ->add('multiFunctionDisplay1Manufacturer', TextType::class, [
                        'label' => 'multiFunctionDisplay1Manufacturer',
                        'required' => false,
                    ]);
                break;
            case 7:
                $builder
                    ->add('multiFunctionDisplay1Model', TextType::class, [
                        'label' => 'multiFunctionDisplay1Model',
                        'required' => false,
                    ])
                    ->add('multiFunctionDisplay2Manufacturer', TextType::class, [
                        'label' => 'multiFunctionDisplay2Manufacturer',
                        'required' => false,
                    ])
                    ->add('multiFunctionDisplay2Model', TextType::class, [
                        'label' => 'multiFunctionDisplay2Model',
                        'required' => false,
                    ])
                    ->add('gps1Manufacturer', TextType::class, [
                        'label' => 'gps1Manufacturer',
                        'required' => false,
                    ])
                    ->add('gps1Model', TextType::class, [
                        'label' => 'gps1Model',
                        'required' => false,
                    ])
                    ->add('gps2Manufacturer', TextType::class, [
                        'label' => 'gps2Manufacturer',
                        'required' => false,
                    ])
                    ->add('gps2Model', TextType::class, [
                        'label' => 'gps2Model',
                        'required' => false,
                    ])
                    ->add('transponder1Manufacturer', TextType::class, [
                        'label' => 'transponder1Manufacturer',
                        'required' => false,
                    ])
                    ->add('transponder1Model', TextType::class, [
                        'label' => 'transponder1Model',
                        'required' => false,
                    ])
                    ->add('transponder2Manufacturer', TextType::class, [
                        'label' => 'transponder2Manufacturer',
                        'required' => false,
                    ]);
                break;
            case 8:
                $builder
                    ->add('transponder2Model', TextType::class, [
                        'label' => 'transponder2Model',
                        'required' => false,
                    ])
                    ->add('autopilotManufacturer', TextType::class, [
                        'label' => 'autopilotManufacturer',
                        'required' => false,
                    ])
                    ->add('autopilotModel', TextType::class, [
                        'label' => 'autopilotModel',
                        'required' => false,
                    ])
                    ->add('adsbEquipped', ChoiceType::class, [
                        'label' => 'adsbEquipped',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('wideAreaAugSystem', ChoiceType::class, [
                        'label' => 'wideAreaAugSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('localizerPerformanceVG', ChoiceType::class, [
                        'label' => 'localizerPerformanceVG',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('syntheticVisionTech', ChoiceType::class, [
                        'label' => 'syntheticVisionTech',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('enhancedVisionSystem', ChoiceType::class, [
                        'label' => 'enhancedVisionSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('yawDamper', ChoiceType::class, [
                        'label' => 'yawDamper',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('activeTraffic', ChoiceType::class, [
                        'label' => 'activeTraffic',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('terrainWarningSystem', ChoiceType::class, [
                        'label' => 'terrainWarningSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('engineMonitor', ChoiceType::class, [
                        'label' => 'engineMonitor',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('avionicsNotes', TextareaType::class, [
                        'label' => 'avionicsNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 9:
                $builder
                    ->add('wifi', ChoiceType::class, [
                        'label' => 'wifi',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('pressurized', ChoiceType::class, [
                        'label' => 'pressurized',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('oxygenSystem', ChoiceType::class, [
                        'label' => 'oxygenSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('knownIce', ChoiceType::class, [
                        'label' => 'knownIce',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('inadvertentIceProtection', ChoiceType::class, [
                        'label' => 'inadvertentIceProtection',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('airConditioning', ChoiceType::class, [
                        'label' => 'airConditioning',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('floatKit', ChoiceType::class, [
                        'label' => 'floatKit',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('includesFloats', ChoiceType::class, [
                        'label' => 'includesFloats',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'required' => false,
                    ])
                    ->add('floatType', ChoiceType::class, [
                        'label' => 'floatType',
                        'choices' => [
                            '------' => '',
                            'Straight' => 'Straight',
                            'Amphibious' => 'Amphibious',
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('equipmentNotes', TextareaType::class, [
                        'label' => 'equipmentNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ]);
                break;
            case 10:
                $builder
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('exteriorNotes', TextareaType::class, [
                        'label' => 'exteriorNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => false,
                        'attr' => ['min' => 0]
                    ])
                    ->add('lavatory', ChoiceType::class, [
                        'label' => 'lavatory',
                        'choices' => [
                            '------' => '',
                            'Yes' => true,
                            'No' => false,
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('interiorConfiguration', ChoiceType::class, [
                        'label' => 'interiorConfiguration',
                        'choices' => [
                            '------' => '',
                            'Cargo' => 'Cargo',
                            'Passenger' => 'Passenger',
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ])
                    ->add('interiorNotes', TextareaType::class, [
                        'label' => 'interiorNotes',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('inspectionStatus', TextareaType::class, [
                        'label' => 'inspectionStatus',
                        'required' => false,
                        'attr' => ['class' => 'large-text-field']
                    ])
                    ->add('airworthy', ChoiceType::class, [
                        'label' => 'airworthy',
                        'choices' => [
                            '------' => '',
                            'Yes' => true,
                            'No' => false,
                        ],
                        'required' => false,
                        'attr' => ['class' => 'spec-select']
                    ]);
                break;
        }


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RunwaySweepersBroomsDto::class,
        ]);
        $resolver->setRequired('step');
    }
}


