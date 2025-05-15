<?php

namespace App\Entity;

use App\Repository\AircraftRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AircraftRepository::class)]
#[Vich\Uploadable]
class Aircraft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $yearOfManufacture = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $registrationCountry = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $serviceEntryDate = null;

    #[ORM\Column(length: 255)]
    private ?string $serialNumber = null;

    #[ORM\Column(length: 350, nullable: true)]
    private ?string $video = null;

    #[Vich\UploadableField(mapping: 'aircraft_video', fileNameProperty: 'video')]
    private ? File $videoFile = null;

    public function getVideoFile(): ?File
    {
        return $this->videoFile;
    }

    public function setVideoFile(?File $videoFile): static
    {
        $this->videoFile = $videoFile;

        return $this;
    }

    /**
     * @var Collection<int, AirCraftImage>
     */
    #[ORM\OneToMany(targetEntity: AirCraftImage::class, mappedBy: 'aircraft', cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $airCraftImages;

    #[ORM\ManyToOne(inversedBy: 'aircraft')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $publishedBy = null;

    /**
     * @var Collection<int, AircraftSpecs>
     */
    #[ORM\OneToMany(targetEntity: AircraftSpecs::class, mappedBy: 'aircraft',cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $aircraftSpecs;

    #[ORM\ManyToOne(inversedBy: 'aircraft')]
    private ?AirCraftCategory $aircraftCategory = null;

    #[ORM\Column(length: 255)]
    private ?string $usageType = null;

    /**
     * @var Collection<int, AircraftDocument>
     */
    #[ORM\OneToMany(targetEntity: AircraftDocument::class, mappedBy: 'aircraft',cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $aircraftDocuments;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'aircraft')]
    private ?AircraftManufacturer $aircraftManufacturer = null;

    #[ORM\Column]
    private ?bool $isPublished = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(length: 350)]
    private ?string $slug = null;

    #[ORM\Column(nullable: true)]
    private ?int $totalHours = null;

    /**
     * @var Collection<int, InternContact>
     */
    #[ORM\OneToMany(targetEntity: InternContact::class, mappedBy: 'aircraft',cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $internContacts;

    #[ORM\Column]
    private ?bool $isReported = null;

    public function __construct()
    {
        $this->airCraftImages = new ArrayCollection();
        $this->aircraftSpecs = new ArrayCollection();
        $this->aircraftDocuments = new ArrayCollection();
        $this->publishedAt = new \DateTimeImmutable();
        $this->internContacts = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getYearOfManufacture(): ?int
    {
        return $this->yearOfManufacture;
    }

    public function setYearOfManufacture(int $yearOfManufacture): static
    {
        $this->yearOfManufacture = $yearOfManufacture;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRegistrationCountry(): ?string
    {
        return $this->registrationCountry;
    }

    public function setRegistrationCountry(string $registrationCountry): static
    {
        $this->registrationCountry = $registrationCountry;

        return $this;
    }

    public function getServiceEntryDate(): ?\DateTimeInterface
    {
        return $this->serviceEntryDate;
    }

    public function setServiceEntryDate(\DateTimeInterface $serviceEntryDate): static
    {
        $this->serviceEntryDate = $serviceEntryDate;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(string $serialNumber): static
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }
    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): static
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection<int, AirCraftImage>
     */
    public function getAirCraftImages(): Collection
    {
        return $this->airCraftImages;
    }

    public function addAirCraftImage(AirCraftImage $airCraftImage): static
    {
        if (!$this->airCraftImages->contains($airCraftImage)) {
            $this->airCraftImages->add($airCraftImage);
            $airCraftImage->setAircraft($this);
        }

        return $this;
    }

    public function removeAirCraftImage(AirCraftImage $airCraftImage): static
    {
        if ($this->airCraftImages->removeElement($airCraftImage)) {
            // set the owning side to null (unless already changed)
            if ($airCraftImage->getAircraft() === $this) {
                $airCraftImage->setAircraft(null);
            }
        }

        return $this;
    }

    public function getPublishedBy(): ?User
    {
        return $this->publishedBy;
    }

    public function setPublishedBy(?User $publishedBy): static
    {
        $this->publishedBy = $publishedBy;

        return $this;
    }

    /**
     * @return Collection<int, AircraftSpecs>
     */
    public function getAircraftSpecs(): Collection
    {
        return $this->aircraftSpecs;
    }

    public function addAircraftSpec(AircraftSpecs $aircraftSpec): static
    {
        if (!$this->aircraftSpecs->contains($aircraftSpec)) {
            $this->aircraftSpecs->add($aircraftSpec);
            $aircraftSpec->setAircraft($this);
        }

        return $this;
    }

    public function removeAircraftSpec(AircraftSpecs $aircraftSpec): static
    {
        if ($this->aircraftSpecs->removeElement($aircraftSpec)) {
            // set the owning side to null (unless already changed)
            if ($aircraftSpec->getAircraft() === $this) {
                $aircraftSpec->setAircraft(null);
            }
        }

        return $this;
    }

    public function getAircraftCategory(): ?AirCraftCategory
    {
        return $this->aircraftCategory;
    }

    public function setAircraftCategory(?AirCraftCategory $aircraftCategory): static
    {
        $this->aircraftCategory = $aircraftCategory;

        return $this;
    }

    public function getUsageType(): ?string
    {
        return $this->usageType;
    }

    public function setUsageType(string $usageType): static
    {
        $this->usageType = $usageType;

        return $this;
    }

    /**
     * @return Collection<int, AircraftDocument>
     */
    public function getAircraftDocuments(): Collection
    {
        return $this->aircraftDocuments;
    }

    public function addAircraftDocument(AircraftDocument $aircraftDocument): static
    {
        if (!$this->aircraftDocuments->contains($aircraftDocument)) {
            $this->aircraftDocuments->add($aircraftDocument);
            $aircraftDocument->setAircraft($this);
        }

        return $this;
    }

    public function removeAircraftDocument(AircraftDocument $aircraftDocument): static
    {
        if ($this->aircraftDocuments->removeElement($aircraftDocument)) {
            // set the owning side to null (unless already changed)
            if ($aircraftDocument->getAircraft() === $this) {
                $aircraftDocument->setAircraft(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAircraftManufacturer(): ?AircraftManufacturer
    {
        return $this->aircraftManufacturer;
    }

    public function setAircraftManufacturer(?AircraftManufacturer $aircraftManufacturer): static
    {
        $this->aircraftManufacturer = $aircraftManufacturer;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function generateSlug(AirCraftCategory $aircraftCategory,AircraftManufacturer $aircraftManufacturer): string
    {
        if ($aircraftCategory->getName() && $aircraftManufacturer->getName()) {
            $slugify = new Slugify();
            $slug_category = $slugify->slugify($this->aircraftCategory->getName());
            $slug_manufacturer = $slugify->slugify($this->aircraftManufacturer->getName());
            $slug_model = $slugify->slugify($this->getModel());
            $dateTime = new \DateTimeImmutable();
            $formattedDate = $dateTime->format('Y-m-d_H-i-s');

            return $slug_category . '-' .$slug_manufacturer . '-' .$slug_model . '-' . $formattedDate;
        }
        return "";
    }

    public function getTotalHours(): ?int
    {
        return $this->totalHours;
    }

    public function setTotalHours(?int $totalHours): static
    {
        $this->totalHours = $totalHours;

        return $this;
    }

    /**
     * @return Collection<int, InternContact>
     */
    public function getInternContacts(): Collection
    {
        return $this->internContacts;
    }

    public function addInternContact(InternContact $internContact): static
    {
        if (!$this->internContacts->contains($internContact)) {
            $this->internContacts->add($internContact);
            $internContact->setAircraft($this);
        }

        return $this;
    }

    public function removeInternContact(InternContact $internContact): static
    {
        if ($this->internContacts->removeElement($internContact)) {
            // set the owning side to null (unless already changed)
            if ($internContact->getAircraft() === $this) {
                $internContact->setAircraft(null);
            }
        }

        return $this;
    }

    public function isReported(): ?bool
    {
        return $this->isReported;
    }

    public function setIsReported(bool $isReported): static
    {
        $this->isReported = $isReported;

        return $this;
    }
}
