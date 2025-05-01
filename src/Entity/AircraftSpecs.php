<?php

namespace App\Entity;

use App\Repository\AircraftSpecsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AircraftSpecsRepository::class)]
class AircraftSpecs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'aircraftSpecs')]
    private ?Aircraft $aircraft = null;

    #[ORM\Column]
    private array $dataSpecs = [];


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAircraft(): ?Aircraft
    {
        return $this->aircraft;
    }

    public function setAircraft(?Aircraft $aircraft): static
    {
        $this->aircraft = $aircraft;

        return $this;
    }

    public function getDataSpecs(): array
    {
        return $this->dataSpecs;
    }

    public function setDataSpecs(array $dataSpecs): static
    {
        $this->dataSpecs = $dataSpecs;

        return $this;
    }


}
