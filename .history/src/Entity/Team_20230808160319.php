<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Position;

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
/**
     * @@ORM\OneToMany(targetEntity=Position::class, mappedBy="team")
     * @ORM\JoinTable(name="team_positions",
     *      joinColumns={@ORM\JoinColumn(name="team_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="position_id", referencedColumnName="id")}
     * )
     */
private Collection $positions;


    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $age = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Tel = null;

    #[ORM\Column(length: 255)]
    private ?string $Mail = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $CV = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(nullable: true)]
    private ?int $manager_id = null;

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
        return $this->position;
    }

    public function addPositions(Positions $position):
    {
        $this->positions[] = $position;
        return $this;
    }

    public function removePositions(Position $position): static
    {
        $this->positions->removeElement($position);
        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;
        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(string $Tel): static
    {
        $this->Tel = $Tel;
        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): static
    {
        $this->Mail = $Mail;
        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(string $CV): static
    {
        $this->CV = $CV;
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

    public function getManagerId(): ?int
    {
        return $this->manager_id;
    }

    public function setManagerId(?int $manager_id): static
    {
        $this->manager_id = $manager_id;
        return $this;
    }
    
}

