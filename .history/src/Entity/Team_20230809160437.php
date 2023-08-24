<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Positions;

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
     * @var Collection<int, Position>
     *
     * @ORM\ManyToMany(targetEntity=Position::class, inversedBy="teams")
     * @ORM\JoinTable(name="team_position")
     */
    private Collection $positions;

    #[ORM\Column(length: 100)]
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

    // ... autres méthodes ...

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

