<?php

namespace App\Entity;

use App\Repository\AircraftDocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AircraftDocumentRepository::class)]
#[Vich\Uploadable]
class AircraftDocument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'aircraftDocuments')]
    private ?Aircraft $aircraft = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Vich\UploadableField(mapping: 'aircraft_document', fileNameProperty: 'name')]
    private ?File $fileName = null;

    public function getFileName(): ?File
    {
        return $this->fileName;
    }

    public function setFileName(?File $fileName): static
    {
        $this->fileName = $fileName;
        return $this;
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }


}
