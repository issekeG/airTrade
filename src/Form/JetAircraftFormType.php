<?php

namespace App\Form;

use App\Dto\JetAircraftDto;
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


class JetAircraftFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        switch ($options['step']) {
            case 1:
                $builder
                    // Required Specs
                    ->add('regNumber', TextType::class, [
                        'label' => "regNumber",
                        'required' => true,
                    ])
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => true,
                    ])
                    ->add('engineProgram', ChoiceType::class, [
                        'attr' => ['class' => 'select-element select2'],
                        'label' => "engineProgram",
                        'placeholder' => 'Sélectionner le programme d’entretien moteur',
                        'choices' => [
                            'Av-Guard' => 'Av-Guard',
                            'BEI Gold' => 'BEI Gold',
                            'BEI Gold Lite' => 'BEI Gold Lite',
                            'BEI Silver' => 'BEI Silver',
                            'BEI Silver Lite' => 'BEI Silver Lite',
                            'CorporateCare' => 'Rolls Royce CorporateCare',
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
                            'None' => 'None',
                        ],
                        'required' => true,
                    ])
                    // General
                    ->add('displayRegNumber', CheckboxType::class, [
                        'label' => "displayRegNumber",
                        'required' => false,
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'flightRules',
                        'placeholder' => 'Sélectionner une règle de vol',
                        'choices' => [
                            'IFR (Règles de vol aux instruments)' => 'IFR',
                            'VFR (Règles de vol à vue)' => 'VFR',
                        ],
                        'required' => true,
                        'attr' => ['class' => 'form-select'], // Classe Bootstrap
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'locationAirportCode',
                        'required' => true,
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'displaySerialNumber',
                        'required' => false,
                    ])
                    ->add('totalLandings', NumberType::class, [
                        'label' => 'totalLandings',
                        'required' => true,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('rangeAircraft', NumberType::class, [
                        'label' => 'rangeAircraft',
                        'required' => true,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('maxRampWeight', NumberType::class, [
                        'label' => 'maxRampWeight',
                        'required' => true,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('maxTakeoffWeight', NumberType::class, [
                        'label' => 'maxTakeoffWeight',
                        'required' => true,
                        'attr' => ['class' => 'form-control'],
                    ]);

                break;
            case 2:
                $builder

                    ->add('maxLandingWeight', NumberType::class, [
                        'label' => 'maxLandingWeight',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('maxPayLoad', NumberType::class, [
                        'label' => 'maxPayLoad',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('maxZeroFuelWeight', NumberType::class, [
                        'label' => 'maxZeroFuelWeight',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('basicEmptyWeight', NumberType::class, [
                        'label' => 'basicEmptyWeight',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('basicOperatingWeight', NumberType::class, [
                        'label' => 'basicOperatingWeight',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('fuelCapacity', NumberType::class, [
                        'label' => 'fuelCapacity',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('landingGearOverhaul', ChoiceType::class, [
                        'label' => 'landingGearOverhaul',
                        'choices' => [
                            'Oui' => '1',
                            'Non' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                        'placeholder' => false,
                    ])
                    ->add('landingGearCycles', NumberType::class, [
                        'label' => 'landingGearCycles',
                        'required' => false,
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('winglets', ChoiceType::class, [
                        'label' => 'winglets',
                        'choices' => [
                            'Oui' => '1',
                            'Non' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                        'placeholder' => false,
                    ])

                    ->add('maintenanceTracking', ChoiceType::class, [
                        'label' => 'maintenanceTracking',
                        'choices' => [
                            '------' => '',
                            'Avtrak' => 'Avtrak',
                            'CAMP' => 'Camp',
                            'CAMS' => 'CAMS',
                            'CESCOM' => 'CESCOM',
                            'CMP' => 'CMP',
                            'FLightDocs' => 'FLightDocs',
                            'Quantum MX' => 'Quantum MX',
                            'SierraTrax' => 'SierraTrax',
                            'TRAXXALL' => 'TRAXXALL',
                            'Other' => 'Other',
                            'None' => 'None',
                        ],
                        'required' => true,
                    ])
                    ->add('partsProgram', ChoiceType::class, [
                        'label' => 'partsProgram',
                        'choices' => [
                            '------' => '',
                            'AOS' => 'AOS',
                            'Aux Advantage' => 'Aux Advantage',
                            'Bacon Low Utilization' => 'Bacon Low Utilization',
                            'CASP' => 'CASP',
                            'EEC' => 'EEC',
                            'EEC Enhanced' => 'EEC Enhanced',
                            'EEC Intermediate' => 'EEC Intermediate',
                            'FalconCare' => 'FalconCare',
                            'FlightLevel' => 'FlightLevel',
                            'Flight Ready P1' => 'Flight Ready P1',
                            'Flight Ready P2' => 'Flight Ready P2',
                            'Flight Ready P3' => 'Flight Ready P3',
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
                            'None' => 'None',
                        ],
                        'required' => true,
                    ])
                    ->add('partsProgramRate', NumberType::class, [
                        'label' => 'partsProgramRate',
                        'required' => false,
                    ])
                    ->add('airframe', TextareaType::class, [
                        'label' => 'airframe',
                        'required' => true,
                    ]);
                break;
            case 3:
                $builder
                    // Engine Program
                    ->add('engineProgramRate', NumberType::class, [
                        'label' => 'engineProgramRate',
                        'required' => true,
                    ])
                    ->add('engineProgramCoverage', NumberType::class, [
                        'label' => 'engineProgramCoverage',
                        'required' => false,
                    ])
                    ->add('engine', TextareaType::class, [
                        'label' => 'engine',
                        'required' => false,
                    ])
                    // Engine 1
                    ->add('engineMake', TextType::class, [
                        'label' => 'engineMake',
                        'required' => false,
                    ])
                    ->add('engineModel', TextType::class, [
                        'label' => 'engineModel',
                        'required' => false,
                    ])
                    ->add('engineSerialNum', TextType::class, [
                        'label' => 'engineSerialNum',
                        'required' => false,
                    ])
                    ->add('overhaulTime', NumberType::class, [
                        'label' => 'overhaulTime',
                        'required' => false,
                    ])
                    ->add('overhaulType', ChoiceType::class, [
                        'label' => 'overhaulType',
                        'choices' => [
                            '------' => '',
                            'SCMOH' => 'SCMOH',
                            'SFOH' => 'SFOH',
                            'SFRM' => 'SFRM',
                            'SMOH' => 'SMOH',
                            'SNEW' => 'SNEW',
                            'SOH' => 'SOH',
                            'STOH' => 'STOH',
                            'CZI' => 'CZI',
                        ],
                        'required' => true,
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
                    ->add('onCondition', ChoiceType::class, [
                        'label' => 'onCondition',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('engine1Notes', TextareaType::class, [
                        'label' => 'engine1Notes',
                        'required' => false,
                    ]);
                break;
            case 4:
                $builder
                    // Engine 2
                    ->add('engineMake2', TextType::class, [
                        'label' => 'engineMake2',
                        'required' => false,
                    ])
                    ->add('engineModel2', TextType::class, [
                        'label' => 'engineModel2',
                        'required' => false,
                    ])
                    ->add('engineSerialNum2', TextType::class, [
                        'label' => 'engineSerialNum2',
                        'required' => false,
                    ])
                    ->add('overhaulTime2', NumberType::class, [
                        'label' => 'overhaulTime2',
                        'required' => false,
                    ])
                    ->add('overhaulType2', ChoiceType::class, [
                        'label' => 'overhaulType2',
                        'choices' => [
                            '------' => '',
                            'SCMOH' => 'SCMOH',
                            'SFOH' => 'SFOH',
                            'SFRM' => 'SFRM',
                            'SMOH' => 'SMOH',
                            'SNEW' => 'SNEW',
                            'SOH' => 'SOH',
                            'STOH' => 'STOH',
                            'CZI' => 'CZI',
                        ],
                        'required' => true,
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
                    ->add('onCondition2', ChoiceType::class, [
                        'label' => 'onCondition2',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('engine2Notes', TextareaType::class, [
                        'label' => 'engine2Notes',
                        'required' => false,
                    ])
                    // Engine 3
                    ->add('engineMake3', TextType::class, [
                        'label' => 'engineMake3',
                        'required' => false,
                    ])
                    ->add('engineModel3', TextType::class, [
                        'label' => 'engineModel3',
                        'required' => false,
                    ])
                    ->add('engineSerialNum3', TextType::class, [
                        'label' => 'engineSerialNum3',
                        'required' => false,
                    ])
                    ->add('overhaulTime3', NumberType::class, [
                        'label' => 'overhaulTime3',
                        'required' => false,
                    ])
                    ->add('overhaulType3', ChoiceType::class, [
                        'label' => 'overhaulType3',
                        'choices' => [
                            '------' => '',
                            'SCMOH' => 'SCMOH',
                            'SFOH' => 'SFOH',
                            'SFRM' => 'SFRM',
                            'SMOH' => 'SMOH',
                            'SNEW' => 'SNEW',
                            'SOH' => 'SOH',
                            'STOH' => 'STOH',
                            'CZI' => 'CZI',
                        ],
                        'required' => true,
                    ])
                    ->add('timeBetweenOverhaul3', NumberType::class, [
                        'label' => 'timeBetweenOverhaul3',
                        'required' => false,
                    ])
                    ->add('engineCycles3', NumberType::class, [
                        'label' => 'engineCycles3',
                        'required' => false,
                    ])
                    ->add('hotSectionTime3', NumberType::class, [
                        'label' => 'hotSectionTime3',
                        'required' => false,
                    ])
                    ->add('onCondition3', ChoiceType::class, [
                        'label' => 'onCondition3',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('engine3Notes', TextareaType::class, [
                        'label' => 'engine3Notes',
                        'required' => false,
                    ]);
                break;
            case 5:
                $builder
                    ->add('engineMake4', TextType::class, [
                        'label' => 'engineMake4',
                        'required' => false,
                    ])
                    ->add('engineModel4', TextType::class, [
                        'label' => 'engineModel4',
                        'required' => false,
                    ])
                    ->add('engineSerialNum4', TextType::class, [
                        'label' => 'engineSerialNum4',
                        'required' => false,
                    ])
                    ->add('overhaulTime4', NumberType::class, [
                        'label' => 'overhaulTime4',
                        'required' => false,
                    ])
                    ->add('overhaulType4', ChoiceType::class, [
                        'label' => 'overhaulType4',
                        'choices' => [
                            '------' => '',
                            'SCMOH' => 'SCMOH',
                            'SFOH' => 'SFOH',
                            'SFRM' => 'SFRM',
                            'SMOH' => 'SMOH',
                            'SNEW' => 'SNEW',
                            'SOH' => 'SOH',
                            'STOH' => 'STOH',
                            'CZI' => 'CZI',
                        ],
                        'required' => true,
                    ])
                    ->add('timeBetweenOverhaul4', NumberType::class, [
                        'label' => 'timeBetweenOverhaul4',
                        'required' => false,
                    ])
                    ->add('engineCycles4', NumberType::class, [
                        'label' => 'engineCycles4',
                        'required' => false,
                    ])
                    ->add('hotSectionTime4', NumberType::class, [
                        'label' => 'hotSectionTime4',
                        'required' => false,
                    ])
                    ->add('onCondition4', ChoiceType::class, [
                        'label' => 'onCondition4',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('engine4Notes', TextareaType::class, [
                        'label' => 'engine4Notes',
                        'required' => false,
                    ])
                    // Auxiliary Power Unit
                    ->add('auxiliaryPowerUnit', ChoiceType::class, [
                        'label' => 'APU',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('auxiliaryPowerUnitTime', NumberType::class, [
                        'label' => 'auxiliaryPowerUnitTime',
                        'required' => false,
                    ])
                    ->add('auxiliaryPowerUnitProgram', ChoiceType::class, [
                        'label' => 'auxiliaryPowerUnitProgram',
                        'choices' => [
                            '------' => '',
                            'Aux Advantage' => 'Aux Advantage',
                            'Av-Guard' => 'Av-Guard',
                            'EEC' => 'EEC',
                            'EEC Enhanced' => 'EEC Enhanced',
                            'EMC' => 'EMC',
                            'ESP' => 'ESP',
                            'JSSI' => 'JSSI',
                            'MSP' => 'MSP',
                            'MSP Gold' => 'MSP Gold',
                            'OnPoint' => 'OnPoint',
                            'PBH' => 'PBH',
                            'PowerAdvantage+' => 'PowerAdvantage+',
                            'CorporateCare' => 'Rolls Royce CorporateCare',
                            'Smart Services' => 'Smart Services',
                            'TAP' => 'TAP',
                            'Other' => 'Other',
                        ],
                        'required' => true,
                    ])
                    ->add('auxiliaryPowerUnitProgramRate', NumberType::class, [
                        'label' => 'auxiliaryPowerUnitProgramRate',
                        'required' => false,
                    ])
                    ->add('apuNotes', TextareaType::class, [
                        'label' => 'apuNotes',
                        'required' => false,
                    ]);
                break;
            case 6:
                $builder
                    // Avionics
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
                    ]);
                break;
            case 7:
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
                    ->add('avionicsProgram', ChoiceType::class, [
                        'label' => 'avionicsProgram',
                        'choices' => [
                            '------' => '',
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
                        'required' => true,
                    ])
                    ->add('avionicsProgramRate', NumberType::class, [
                        'label' => 'avionicsProgramRate',
                        'required' => false,
                    ])
                    ->add('adsbEquipped', ChoiceType::class, [
                        'label' => 'adsbEquipped',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('futureAirNavSys', ChoiceType::class, [
                        'label' => 'futureAirNavSys',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('wideAreaAugSystem', ChoiceType::class, [
                        'label' => 'wideAreaAugSystem',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('localizerPerformanceVG', ChoiceType::class, [
                        'label' => 'localizerPerformanceVG',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('requiredNavPerformance', ChoiceType::class, [
                        'label' => 'requiredNavPerformance',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('syntheticVisionTech', ChoiceType::class, [
                        'label' => 'syntheticVisionTech',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('controllerPilotDataLinkComm', ChoiceType::class, [
                        'label' => 'controllerPilotDataLinkComm',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('enhancedVisionSystem', ChoiceType::class, [
                        'label' => 'enhancedVisionSystem',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('avionics', TextareaType::class, [
                        'label' => 'avionics',
                        'required' => false,
                    ]);
            break;
            case 8:
                $builder
                    ->add('wifi', ChoiceType::class, [
                        'label' => 'Wifi',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => true,
                    ])
                    ->add('equipment', TextareaType::class, [
                        'label' => 'equipment',
                        'required' => false,
                    ])
                    // Exterior
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => array_combine(range(2031, 1900), range(2031, 1900)),
                        'required' => false,
                    ])
                    ->add('exterior', TextareaType::class, [
                        'label' => 'Exterior Notes',
                        'required' => true,
                    ])
                    // Interior
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => array_combine(range(2031, 1900), range(2031, 1900)),
                        'required' => true,
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => true,
                    ])
                    ->add('galley', ChoiceType::class, [
                        'label' => 'galley',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'required' => true,
                    ])
                    ->add('galleyConfiguration', ChoiceType::class, [
                        'label' => 'galleyConfiguration',
                        'choices' => [
                            'Forward' => 'Forward',
                            'Mid' => 'Mid',
                            'Aft' => 'Aft',
                            'Forward and Aft' => 'Forward and Aft',
                        ],
                        'required' => true,
                    ])
                    ->add('crewRest', ChoiceType::class, [
                        'label' => 'crewRest',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'required' => true,
                    ])
                    ->add('crewRestConfiguration', ChoiceType::class, [
                        'label' => 'crewRestConfiguration',
                        'choices' => [
                            'Forward' => 'Forward',
                            'Mid' => 'Mid',
                            'Aft' => 'Aft',
                            'Forward and Aft' => 'Forward and Aft',
                        ],
                        'required' => true,
                    ])
                    ->add('lavatory', ChoiceType::class, [
                        'label' => 'lavatory',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'required' => true,
                    ])
                    ->add('lavatoryConfiguration', ChoiceType::class, [
                        'label' => 'lavatoryConfiguration',
                        'choices' => [
                            'Forward' => 'Forward',
                            'Mid' => 'Mid',
                            'Aft' => 'Aft',
                            'Forward and Aft' => 'Forward and Aft',
                        ],
                        'required' => true,
                    ])
                    ->add('interior', TextareaType::class, [
                        'label' => 'interior',
                        'required' => false,
                    ])
                    // Modifications/Conversions
                    ->add('modifications', TextareaType::class, [
                        'label' => 'modifications',
                        'required' => false,
                    ])
                    // Inspection Status
                    ->add('inspection', TextareaType::class, [
                        'label' => 'inspection',
                        'required' => false,
                    ])
                    ->add('airworthy', ChoiceType::class, [
                        'label' => 'airworthy',
                        'choices' => [
                            'Yes' => '1',
                            'No' => '0',
                        ],
                        'required' => true,
                    ]);
            break;

        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JetAircraftDto::class,
        ]);
        $resolver->setRequired('step');

    }
}
