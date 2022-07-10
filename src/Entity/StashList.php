<?php

namespace App\Entity;

use App\Repository\StashListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StashListRepository::class)]
class StashList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Stash::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $stash;

    #[ORM\OneToOne(inversedBy: 'stashList', targetEntity: Mission::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $mission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStash(): ?Stash
    {
        return $this->stash;
    }

    public function setStash(?Stash $stash): self
    {
        $this->stash = $stash;

        return $this;
    }

    public function getMission(): ?Mission
    {
        return $this->mission;
    }

    public function setMission(Mission $mission): self
    {
        $this->mission = $mission;

        return $this;
    }
}
