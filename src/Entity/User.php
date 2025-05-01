<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column]
    private bool $isVerified = false;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?bool $acceptTerms = null;

    #[ORM\Column]
    private ?bool $acceptBrokerageContact = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    /**
     * @var Collection<int, Aircraft>
     */
    #[ORM\OneToMany(targetEntity: Aircraft::class, mappedBy: 'publishedBy')]
    private Collection $aircraft;

    #[ORM\Column]
    private ?bool $acceptNewsletter = null;

    #[ORM\Column(length: 25)]
    private ?string $telephone = null;

    /**
     * @var Collection<int, InternContact>
     */
    #[ORM\OneToMany(targetEntity: InternContact::class, mappedBy: 'sender')]
    private Collection $internContacts;

    public function __construct()
    {
        $this->aircraft = new ArrayCollection();
        $this->internContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function isAcceptTerms(): ?bool
    {
        return $this->acceptTerms;
    }

    public function setAcceptTerms(bool $acceptTerms): static
    {
        $this->acceptTerms = $acceptTerms;

        return $this;
    }

    public function isAcceptBrokerageContact(): ?bool
    {
        return $this->acceptBrokerageContact;
    }

    public function setAcceptBrokerageContact(bool $acceptBrokerageContact): static
    {
        $this->acceptBrokerageContact = $acceptBrokerageContact;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

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
            $aircraft->setPublishedBy($this);
        }

        return $this;
    }

    public function removeAircraft(Aircraft $aircraft): static
    {
        if ($this->aircraft->removeElement($aircraft)) {
            // set the owning side to null (unless already changed)
            if ($aircraft->getPublishedBy() === $this) {
                $aircraft->setPublishedBy(null);
            }
        }

        return $this;
    }

    public function isAcceptNewsletter(): ?bool
    {
        return $this->acceptNewsletter;
    }

    public function setAcceptNewsletter(bool $acceptNewsletter): static
    {
        $this->acceptNewsletter = $acceptNewsletter;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

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
            $internContact->setSender($this);
        }

        return $this;
    }

    public function removeInternContact(InternContact $internContact): static
    {
        if ($this->internContacts->removeElement($internContact)) {
            // set the owning side to null (unless already changed)
            if ($internContact->getSender() === $this) {
                $internContact->setSender(null);
            }
        }

        return $this;
    }
}
