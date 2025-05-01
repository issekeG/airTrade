<?php

namespace App\Entity;

use App\Repository\AirCraftCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AirCraftCategoryRepository::class)]
class AirCraftCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Aircraft>
     */
    #[ORM\OneToMany(targetEntity: Aircraft::class, mappedBy: 'aircraftCategory')]
    private Collection $aircraft;

    public function __construct()
    {
        $this->aircraft = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Aircraft>
     */
    public function getAircraft(): Collection
    {
        return $this->aircraft;
    }

    public function addAircraft(Aircraft $aircraft): static
    {
        if (!$this->aircraft->contains($aircraft)) {
            $this->aircraft->add($aircraft);
            $aircraft->setAircraftCategory($this);
        }

        return $this;
    }

    public function removeAircraft(Aircraft $aircraft): static
    {
        if ($this->aircraft->removeElement($aircraft)) {
            // set the owning side to null (unless already changed)
            if ($aircraft->getAircraftCategory() === $this) {
                $aircraft->setAircraftCategory(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }

}
