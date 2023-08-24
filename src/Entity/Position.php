<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
#[ApiResource]
class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Relation ManyToMany avec l'entité Team, inversée par le champ 'positions'
    #[ORM\ManyToMany(targetEntity: Team::class, inversedBy: 'positions')]
    private Collection $users;

    #[ORM\Column(length: 255)]
    private ?string $Label = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Team $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }

        return $this;
    }

    public function removeUser(Team $user): static
    {
        $this->users->removeElement($user);

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->Label;
    }

    public function setLabel(string $Label): static
    {
        $this->Label = $Label;

        return $this;
    }
}
