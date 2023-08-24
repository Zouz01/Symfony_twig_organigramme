<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    // Relation ManyToMany avec l'entité Position, utilisant le champ 'users' de Position
    #[ORM\ManyToMany(targetEntity: Position::class, mappedBy: 'users')]
    private Collection $positions;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Âge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Tel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Mail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CV = null;

    #[ORM\Column(nullable: true)]
    private ?int $manager_id = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): static
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->addUser($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->positions->removeElement($position)) {
            $position->removeUser($this);
        }

        return $this;
    }

    public function getÂge(): ?string
    {
        return $this->Âge;
    }

    public function setÂge(?string $Âge): static
    {
        $this->Âge = $Âge;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): static
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(?string $Mail): static
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(?string $CV): static
    {
        $this->CV = $CV;

        return $this;
    }

    public function getManagerId(): ?int
    {
        return $this->manager_id;
    }

    public function setManagerId(?int $manager_id): static
    {
        $this->manager_id = $manager_id;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }
}
