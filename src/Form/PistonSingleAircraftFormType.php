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
                        'label' => 'regNumber',
                        'required' => true,
                    ])
                    ->add('displayRegNumber', CheckboxType::class, [
                        'label' => 'displayRegNumber',
                        'required' => false,
                    ])
                    ->add('flightRules', ChoiceType::class, [
                        'label' => 'flightRules',
                        'choices' => [
                            '------' => '',
                            'IFR' => 'IFR',
                            'VFR' => 'VFR',
                        ],
                        'required' => false,
                    ])
                    ->add('locationAirportCode', TextType::class, [
                        'label' => 'locationAirportCode',
                        'required' => false,
                    ])
                    ->add('displaySerialNumber', CheckboxType::class, [
                        'label' => 'displaySerialNumber',
                        'required' => false,
                    ])
                    ->add('totalTime', NumberType::class, [
                        'label' => 'totalTime',
                        'required' => false,
                    ])
                    ->add('rangeAircraft', NumberType::class, [
                        'label' => 'rangeAircraft',
                        'required' => false,
                    ])
                    ->add('maxTakeoffWeight', NumberType::class, [
                        'label' => 'maxTakeoffWeight',
                        'required' => false,
                    ])
                    ->add('basicEmptyWeight', NumberType::class, [
                        'label' => 'basicEmptyWeight',
                        'required' => false,
                    ])
                    ->add('usefulLoad', NumberType::class, [
                        'label' => 'usefulLoad',
                        'required' => false,
                    ])
                    ->add('shortTakeOffLanding', ChoiceType::class, [
                        'label' => 'shortTakeOffLanding',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('fuelCapacityVolume', NumberType::class, [
                        'label' => 'fuelCapacityVolume',
                        'required' => false,
                    ])
                    ->add('auxiliaryFuelTank', ChoiceType::class, [
                        'label' => 'auxiliaryFuelTank',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('logs', ChoiceType::class, [
                        'label' => 'logs',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('speedbrakes', ChoiceType::class, [
                        'label' => 'speedbrakes',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('spoilers', ChoiceType::class, [
                        'label' => 'spoilers',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airframeNotes', TextareaType::class, [
                        'label' => 'airframeNotes',
                        'required' => false,
                    ]);

                break;
            case 2:
                $builder
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
                    ->add('horsepowerEngine', NumberType::class, [
                        'label' => 'horsepowerEngine',
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
                        ],
                        'required' => false,
                    ])
                    ->add('timeBetweenOverhaul', NumberType::class, [
                        'label' => 'timeBetweenOverhaul',
                        'required' => false,
                    ])
                    ->add('aftermarketEngineSTC', ChoiceType::class, [
                        'label' => 'aftermarketEngineSTC',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('yearOverhauled', ChoiceType::class, [
                        'label' => 'yearOverhauled',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                    ])
                    ->add('timeRemainingToOverhaul', NumberType::class, [
                        'label' => 'timeRemainingToOverhaul',
                        'required' => false,
                    ])
                    ->add('engineCycles', NumberType::class, [
                        'label' => 'engineCycles',
                        'required' => false,
                    ])
                    ->add('turbo', ChoiceType::class, [
                        'label' => 'turbo',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('turboNormalized', ChoiceType::class, [
                        'label' => 'turboNormalized',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('engineNotes', TextareaType::class, [
                        'label' => 'engineNotes',
                        'required' => false,
                    ])
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
                        'label' => 'numBlades',
                        'required' => false,
                    ])
                    ->add('bladeComposition', ChoiceType::class, [
                        'label' => 'bladeComposition',
                        'choices' => [
                            '------' => '',
                            'Aluminum' => 'Aluminum',
                            'Composite' => 'Composite',
                        ],
                        'required' => false,
                    ])
                    ->add('sweptBladePropellers', ChoiceType::class, [
                        'label' => 'sweptBladePropellers',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('propsNotes', TextareaType::class, [
                        'label' => 'propsNotes',
                        'required' => false,
                    ]);

                break;
            case 3:
                $builder
                    ->add('vortexGenerators', ChoiceType::class, [
                        'label' => 'vortexGenerators',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('modificationsNotes', TextareaType::class, [
                        'label' => 'modificationsNotes',
                        'required' => false,
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
                    ->add('adsbEquipped', ChoiceType::class, [
                        'label' => 'adsbEquipped',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ]);

                break;
            case 4:
                $builder
                    ->add('wideAreaAugSystem', ChoiceType::class, [
                        'label' => 'wideAreaAugSystem',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('localizerPerformanceVG', ChoiceType::class, [
                        'label' => 'localizerPerformanceVG',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('syntheticVisionTech', ChoiceType::class, [
                        'label' => 'syntheticVisionTech',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('enhancedVisionSystem', ChoiceType::class, [
                        'label' => 'enhancedVisionSystem',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('yawDamper', ChoiceType::class, [
                        'label' => 'yawDamper',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('activeTraffic', ChoiceType::class, [
                        'label' => 'activeTraffic',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('terrainWarningSystem', ChoiceType::class, [
                        'label' => 'terrainWarningSystem',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('engineMonitor', ChoiceType::class, [
                        'label' => 'engineMonitor',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('avionicsNotes', TextareaType::class, [
                        'label' => 'avionicsNotes',
                        'required' => false,
                    ])
                    ->add('wifi', ChoiceType::class, [
                        'label' => 'wifi',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('pressurized', ChoiceType::class, [
                        'label' => 'pressurized',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('oxygenSystem', ChoiceType::class, [
                        'label' => 'oxygenSystem',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('knownIce', ChoiceType::class, [
                        'label' => 'knownIce',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('inadvertentIceProtection', ChoiceType::class, [
                        'label' => 'inadvertentIceProtection',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('airConditioning', ChoiceType::class, [
                        'label' => 'airConditioning',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('floatKit', ChoiceType::class, [
                        'label' => 'floatKit',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('includesFloats', ChoiceType::class, [
                        'label' => 'includesFloats',
                        'choices' => [
                            'Yes' => 1,
                            'No' => 0,
                        ],
                        'expanded' => true,
                        'multiple' => false,
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
                    ])
                    ->add('equipmentNotes', TextareaType::class, [
                        'label' => 'equipmentNotes',
                        'required' => false,
                    ]);

                break;
            case 5:
                $builder
                    ->add('yearPainted', ChoiceType::class, [
                        'label' => 'yearPainted',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                    ])
                    ->add('exteriorNotes', TextareaType::class, [
                        'label' => 'exteriorNotes',
                        'required' => false,
                    ])
                    ->add('yearInterior', ChoiceType::class, [
                        'label' => 'yearInterior',
                        'choices' => $this->getYearChoices(),
                        'required' => false,
                    ])
                    ->add('seatNumber', NumberType::class, [
                        'label' => 'seatNumber',
                        'required' => false,
                    ])
                    ->add('interiorConfiguration', ChoiceType::class, [
                        'label' => 'interiorConfiguration',
                        'choices' => [
                            '------' => '',
                            'Cargo' => 'Cargo',
                            'Passenger' => 'Passenger',
                        ],
                        'required' => false,
                    ])
                    ->add('interiorNotes', TextareaType::class, [
                        'label' => 'interiorNotes',
                        'required' => false,
                    ])
                    ->add('inspectionStatus', TextareaType::class, [
                        'label' => 'inspectionStatus',
                        'required' => false,
                    ])
                    ->add('airworthy', ChoiceType::class, [
                        'label' => 'airworthy',
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



