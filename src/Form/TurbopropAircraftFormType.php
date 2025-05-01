<?php

namespace App\Form;

use App\Dto\TurbopropAircraftDto;
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

class TurbopropAircraftFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
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
                        'required' => true,
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
                    // Section: Airframe
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => true,
                    ])
                    ->add('totalLandings', NumberType::class, [
                        'label' => 'totalLandings',
                        'required' => true,
                    ])
                    ->add('rangeAircraft', NumberType::class, [
                        'label' => 'rangeAircraft',
                        'required' => false,
                    ])
                    ->add('maxRampWeight', NumberType::class, [
                        'label' => 'maxRampWeight',
                        'required' => false,
                    ])
                    ->add('maxTakeoffWeight', NumberType::class, [
                        'label' => 'maxTakeoffWeight',
                        'required' => false,
                    ])
                    ->add('maxLandingWeight', NumberType::class, [
                        'label' => 'maxLandingWeight',
                        'required' => false,
                    ])
                    ->add('maxZeroFuelWeight', NumberType::class, [
                        'label' => 'maxZeroFuelWeight',
                        'required' => false,
                    ])
                    ->add('basicEmptyWeight', NumberType::class, [
                        'label' => 'basicEmptyWeight',
                        'required' => false,
                    ])
                    ->add('basicOperatingWeight', NumberType::class, [
                        'label' => 'basicOperatingWeight',
                        'required' => false,
                    ])
                    ->add('usefulLoad', NumberType::class, [
                        'label' => 'usefulLoad',
                        'required' => false,
                    ])
                    ->add('fuelCapacity', NumberType::class, [
                        'label' => 'fuelCapacity',
                        'required' => false,
                    ])
                    ->add('fuelCapacityVolume', NumberType::class, [
                        'label' => 'fuelCapacityVolume',
                        'required' => false,
                    ])
                    ->add('logs', ChoiceType::class, [
                        'label' => 'logs',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('landingGearOverhaul', ChoiceType::class, [
                        'label' => 'landingGearOverhaul',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('landingGearCycles', NumberType::class, [
                        'label' => 'landingGearCycles',
                        'required' => false,
                    ])
                    ->add('winglets', ChoiceType::class, [
                        'label' => 'winglets',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])


                    ->add('partsProgram', ChoiceType::class, [
                        'label' => 'partsProgram',
                        'choices' => [
                            'Aux Advantage' => 'Aux Advantage',
                            'Bacon Low Utilization' => 'Bacon Low Utilization',
                            'CASP' => 'CASP',
                            'EEC' => 'EEC',
                            'EEC Enhanced' => 'EEC Enhanced',
                            'EEC Intermediate' => 'EEC Intermediate',
                            'FalconCare' => 'FalconCare',
                            'FlightLevel' => 'FlightLevel',
                            'Flight Ready' => 'Flight Ready',
                            'GCMP' => 'GCMP',
                            'HAPP' => 'HAPP',
                            'JSSI Airframe' => 'JSSI Airframe',
                            'JSSI APU' => 'JSSI APU',
                            'JSSI Engine' => 'JSSI Engine',
                            'JSSI Tip to Tail' => 'JSSI Tip to Tail',
                            'JSSI Unscheduled' => 'JSSI Unscheduled',
                            'MPP' => 'MPP',
                            'MyCMP' => 'MyCMP',
                            'PlaneParts' => 'PlaneParts',
                            'ProAdvantage' => 'ProAdvantage',
                            'ProParts' => 'ProParts',
                            'ProTech' => 'ProTech',
                            'SMART PARTS' => 'SMART PARTS',
                            'Smart Parts Plus' => 'Smart Parts Plus',
                            'SupportPlus' => 'SupportPlus',
                            'Other' => 'Other',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('partsProgramRate', NumberType::class, [
                        'label' => 'partsProgramRate',
                        'required' => false,
                    ])
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'airframeNotes',
                        'required' => false,
                    ]);

                break;
            case 3:
                $builder
                    // Engine Program
                    // Section: Engine Program
                    ->add('engineProgram', ChoiceType::class, [
                        'label' => 'engineProgram',
                        'choices' => [
                            'Av-Guard' => 'Av-Guard',
                            'BEI Gold' => 'BEI Gold',
                            'BEI Gold Lite' => 'BEI Gold Lite',
                            'BEI Silver' => 'BEI Silver',
                            'BEI Silver Lite' => 'BEI Silver Lite',
                            'Rolls Royce CorporateCare' => 'CorporateCare',
                            'CorporateCare Enhanced' => 'CorporateCare Enhanced',
                            'CSP' => 'CSP',
                            'CSP Gold' => 'CSP Gold',
                            'EAP Catastrophic' => 'EAP Catastrophic',
                            'EAP Comprehensive' => 'EAP Comprehensive',
                            'EAP Proportional' => 'EAP Proportional',
                            'EEC Engine Add-On' => 'EEC Engine Add-On',
                            'EMC' => 'EMC',
                            'EMC2' => 'EMC2',
                            'EMCb' => 'EMCb',
                            'ESP' => 'ESP',
                            'ESP Gold' => 'ESP Gold',
                            'ESP Gold Lite' => 'ESP Gold Lite',
                            'ESP Platinum' => 'ESP Platinum',
                            'ESP Silver' => 'ESP Silver',
                            'ESP Silver Lite' => 'ESP Silver Lite',
                            'JSSI' => 'JSSI',
                            'MSP' => 'MSP',
                            'MSP Gold' => 'MSP Gold',
                            'OnPoint' => 'OnPoint',
                            'PBH' => 'PBH',
                            'PowerAdvantage' => 'PowerAdvantage',
                            'PowerAdvantage+' => 'PowerAdvantage+',
                            'Smart Services' => 'Smart Services',
                            'TAP' => 'TAP',
                            'TAP Advantage Blue' => 'TAP Advantage Blue',
                            'TAP Blue' => 'TAP Blue',
                            'TAP Elite' => 'TAP Elite',
                            'Vector Aerospace Vmax' => 'Vector Aerospace Vmax',
                            'Other' => 'Other',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('engineProgramRate', NumberType::class, [
                        'label' => 'engineProgramRate',
                        'required' => false,
                    ])
                    ->add('engineProgramCoverage', NumberType::class, [
                        'label' => 'engineProgramCoverage',
                        'required' => false,
                    ])
                    ->add('engineNotes', TextareaType::class, [
                        'label' => 'engineNotes',
                        'required' => false,
                    ])
                    // Section: Engine 1
                    ->add('engineMake', TextType::class, [
                        'label' => 'engineMake',
                        'required' => false,
                    ])
                    ->add('engineModel', TextType::class, [
                        'label' => 'engineModel',
                        'required' => false,
                    ])
                    ->add('engineSerialNumber', TextType::class, [
                        'label' => 'engineSerialNumber',
                        'required' => false,
                    ])
                    ->add('overhaulTime', NumberType::class, [
                        'label' => 'overhaulTime',
                        'required' => false,
                    ])
                    ->add('overhaulType', ChoiceType::class, [
                        'label' => 'overhaulType',
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
                    ->add('timeBetweenOverhaul', NumberType::class, [
                        'label' => 'timeBetweenOverhaul',
                        'required' => false,
                    ])
                    ->add('engineCycles', NumberType::class, [
                        'label' => 'engineCycles',
                        'required' => false,
                    ])
                    ->add('hotSectionTime', NumberType::class, [
                        'label' => 'hotSectionTime',
                        'required' => false,
                    ])
                    ->add('engine1Notes', TextareaType::class, [
                        'label' => 'engine1Notes',
                        'required' => false,
                    ])

                    // Section: Engine 2 (similaire à Engine 1)
                    ->add('engineMake2', TextType::class, [
                        'label' => 'engineMake2',
                        'required' => false,
                    ])
                    ->add('engineModel2', TextType::class, [
                        'label' => 'engineModel2',
                        'required' => false,
                    ])
                    ->add('engineSerialNumber2', TextType::class, [
                        'label' => 'engineSerialNumber2',
                        'required' => false,
                    ])
                    ->add('overhaulTime2', NumberType::class, [
                        'label' => 'overhaulTime2',
                        'required' => false,
                    ])
                    ->add('overhaulType2', ChoiceType::class, [
                        'label' => 'overhaulType2',
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
                    ->add('timeBetweenOverhaul2', NumberType::class, [
                        'label' => 'timeBetweenOverhaul2',
                        'required' => false,
                    ])
                    ->add('engineCycles2', NumberType::class, [
                        'label' => 'engineCycles2',
                        'required' => false,
                    ])
                    ->add('hotSectionTime2', NumberType::class, [
                        'label' => 'hotSectionTime2',
                        'required' => false,
                    ])
                    ->add('engine2Notes', TextareaType::class, [
                        'label' => 'engine2Notes',
                        'required' => false,
                    ]);
                break;
            case 4:
                $builder
                    // Engine 2
                    // Section: Auxiliary Power Unit (APU)
                    ->add('auxiliaryPowerUnit', ChoiceType::class, [
                        'label' => 'auxiliaryPowerUnit',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('auxiliaryPowerUnitProgram', ChoiceType::class, [
                        'label' => 'auxiliaryPowerUnitProgram',
                        'choices' => [
                            'Aux Advantage' => 'Aux Advantage',
                            'Av-Guard' => 'Av-Guard',
                            'EMC' => 'EMC',
                            'ESP' => 'ESP',
                            'JSSI' => 'JSSI',
                            'MSP' => 'MSP',
                            'MSP Gold' => 'MSP Gold',
                            'OnPoint' => 'OnPoint',
                            'PBH' => 'PBH',
                            'PowerAdvantage+' => 'PowerAdvantage+',
                            'Rolls Royce CorporateCare' => 'CorporateCare',
                            'Smart Services' => 'Smart Services',
                            'TAP' => 'TAP',
                            'Other' => 'Other',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('auxiliaryPowerUnitProgramRate', NumberType::class, [
                        'label' => 'auxiliaryPowerUnitProgramRate',
                        'required' => false,
                    ])
                    ->add('apuNotes', TextareaType::class, [
                        'label' => 'apuNotes',
                        'required' => false,
                    ])
                    // Section: Props
                    ->add('propMake', TextType::class, [
                        'label' => 'propMake',
                        'required' => false,
                    ])
                    ->add('propModel', TextType::class, [
                        'label' => 'propModel',
                        'required' => false,
                    ])
                    ->add('propOverhaulTime', NumberType::class, [
                        'label' => 'propOverhaulTime',
                        'required' => false,
                    ])
                    ->add('propOverhaulType', ChoiceType::class, [
                        'label' => 'propOverhaulType',
                        'choices' => [
                            'SCMOH' => 'SCMOH',
                            'SFOH' => 'SFOH',
                            'SFRM' => 'SFRM',
                            'SMOH' => 'SMOH',
                            'SNEW' => 'SNEW',
                            'SOH' => 'SOH',
                            'STOH' => 'STOH',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('propMake2', TextType::class, [
                        'label' => 'propMake2',
                        'required' => false,
                    ])
                    ->add('propModel2', TextType::class, [
                        'label' => 'propModel2',
                        'required' => false,
                    ])
                    ->add('propOverhaulTime2', NumberType::class, [
                        'label' => 'propOverhaulTime2',
                        'required' => false,
                    ])
                    ->add('propOverhaulType2', ChoiceType::class, [
                        'label' => 'propOverhaulType2',
                        'choices' => [
                            'SCMOH' => 'SCMOH',
                            'SFOH' => 'SFOH',
                            'SFRM' => 'SFRM',
                            'SMOH' => 'SMOH',
                            'SNEW' => 'SNEW',
                            'SOH' => 'SOH',
                            'STOH' => 'STOH',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('numBlades', NumberType::class, [
                        'label' => 'numBlades',
                        'required' => false,
                    ])
                    ->add('sweptBladePropellers', ChoiceType::class, [
                        'label' => 'sweptBladePropellers',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('powerPropellers', ChoiceType::class, [
                        'label' => 'powerPropellers',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('propsNotes', TextareaType::class, [
                        'label' => 'propsNotes',
                        'required' => false,
                    ]);

                break;
            case 5:
                $builder
                    // Section: Avionics
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
                    ])
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
                    ])
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
                    ->add('avionicsProgram', ChoiceType::class, [
                        'label' => 'avionicsProgram',
                        'choices' => [
                            'Aux Advantage' => 'Aux Advantage',
                            'Bacon Low Utilization' => 'Bacon Low Utilization',
                            'CASP' => 'CASP',
                            'EEC' => 'EEC',
                            'FalconCare' => 'FalconCare',
                            'FlightLevel' => 'FlightLevel',
                            'Flight Ready' => 'Flight Ready',
                            'GCMP' => 'GCMP',
                            'HAPP' => 'HAPP',
                            'JSSI Tip to Tail' => 'JSSI Tip to Tail',
                            'MPP' => 'MPP',
                            'MSP Avionics' => 'MSP Avionics',
                            'MyCMP' => 'MyCMP',
                            'PlaneParts' => 'PlaneParts',
                            'ProAdvantage' => 'ProAdvantage',
                            'ProParts' => 'ProParts',
                            'ProTech' => 'ProTech',
                            'SMART PARTS' => 'SMART PARTS',
                            'SupportPlus' => 'SupportPlus',
                            'Other' => 'Other',
                        ],
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('avionicsProgramRate', NumberType::class, [
                        'label' => 'avionicsProgramRate',
                        'required' => false,
                    ])
                    ->add('adsbEquipped', ChoiceType::class, [
                        'label' => 'adsbEquipped',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('futureAirNavSys', ChoiceType::class, [
                        'label' => 'futureAirNavSys',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('wideAreaAugSystem', ChoiceType::class, [
                        'label' => 'wideAreaAugSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('localizerPerformanceVG', ChoiceType::class, [
                        'label' => 'localizerPerformanceVG',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('syntheticVisionTech', ChoiceType::class, [
                        'label' => 'syntheticVisionTech',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('controllerPilotDataLinkComm', ChoiceType::class, [
                        'label' => 'controllerPilotDataLinkComm',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('avionicsNotes', TextareaType::class, [
                        'label' => 'avionicsNotes',
                        'required' => false,
                    ]);
                break;
            case 6:
                $builder
                    // Avionics
                    // Section: Additional Equipment
                    ->add('wifi', ChoiceType::class, [
                        'label' => 'wifi',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('pressurized', ChoiceType::class, [
                        'label' => 'pressurized',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('oxygenSystem', NumberType::class, [
                        'label' => 'oxygenSystem',
                        'required' => false,
                    ])
                    ->add('knownIce', ChoiceType::class, [
                        'label' => 'knownIce',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('inadvertentIceProtection', ChoiceType::class, [
                        'label' => 'inadvertentIceProtection',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('floatKit', ChoiceType::class, [
                        'label' => 'floatKit',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('includesFloats', ChoiceType::class, [
                        'label' => 'includesFloats',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('floatType', ChoiceType::class, [
                        'label' => 'floatType',
                        'choices' => [
                            'Straight' => 'Straight',
                            'Amphibious' => 'Amphibious',
                        ],
                        'placeholder' => '------',
                        'required' => true,
                    ])
                    ->add('equipmentNotes', TextareaType::class, [
                        'label' => 'equipmentNotes',
                        'required' => false,
                    ])

                    // Section: Exterior
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => array_combine(range(1900, 2031), range(1900, 2031)),
                        'placeholder' => '------',
                        'required' => false,
                    ])
                    ->add('exteriorNotes', TextareaType::class, [
                        'label' => 'exteriorNotes',
                        'required' => false,
                    ])

                    // Section: Interior
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => array_combine(range(1900, 2031), range(1900, 2031)),
                        'placeholder' => '',
                        'required' => true,
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => true,
                    ])
                    ->add('interiorConfiguration', ChoiceType::class, [
                        'label' => 'interiorConfiguration',
                        'choices' => [
                            'Cargo' => 'Cargo',
                            'Passenger' => 'Passenger',
                        ],
                        'placeholder' => '',
                        'required' => true,
                    ])
                    ->add('galley', ChoiceType::class, [
                        'label' => 'galley',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'placeholder' => '',
                        'required' => true,
                    ])
                    ->add('galleyConfiguration', ChoiceType::class, [
                        'label' => 'galleyConfiguration',
                        'choices' => [
                            'Forward' => 'Forward',
                            'Mid' => 'Mid',
                            'Aft' => 'Aft',
                        ],
                        'placeholder' => '',
                        'required' => true,
                    ])
                    ->add('lavatory', ChoiceType::class, [
                        'label' => 'lavatory',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'placeholder' => '',
                        'required' => true,
                    ])
                    ->add('lavatoryConfiguration', ChoiceType::class, [
                        'label' => 'lavatoryConfiguration',
                        'choices' => [
                            'Forward' => 'Forward',
                            'Mid' => 'Mid',
                            'Aft' => 'Aft',
                        ],
                        'placeholder' => '',
                        'required' => true,
                    ])
                    ->add('interiorNotes', TextareaType::class, [
                        'label' => 'interiorNotes',
                        'required' => false,
                    ]);
                break;
            case 7:
                $builder
                    // Section: Modifications/Conversions
                    ->add('dualAftBodyStrakes', ChoiceType::class, [
                        'label' => 'dualAftBodyStrakes',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('wingLockerSystem', ChoiceType::class, [
                        'label' => 'wingLockerSystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('ramAirRecoverySystem', ChoiceType::class, [
                        'label' => 'ramAirRecoverySystem',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('highFlotationGearDoors', ChoiceType::class, [
                        'label' => 'highFlotationGearDoors',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('enhancedPerformanceLeadingEdges', ChoiceType::class, [
                        'label' => 'enhancedPerformanceLeadingEdges',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('modificationsNotes', TextareaType::class, [
                        'label' => 'modificationsNotes',
                        'required' => false,
                    ])

                    // Section: Inspection Status
                    ->add('inspectionStatus', TextareaType::class, [
                        'label' => 'inspectionStatus',
                        'required' => false,
                    ])
                    ->add('airworthy', ChoiceType::class, [
                        'label' => 'airworthy',
                        'choices' => [
                            'Yes' => true,
                            'No' => false,
                        ],
                        'placeholder' => '------',
                        'required' => true,
                    ]);
                break;


        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TurbopropAircraftDto::class,
        ]);
        $resolver->setRequired('step');

    }
}
