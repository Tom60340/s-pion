<?php

namespace App\Entity;

use App\Repository\StashListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StashListRepository::class)]
class StashList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: Stash::class)]
    private $stash;

    #[ORM\OneToOne(inversedBy: 'stashList', targetEntity: Mission::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $mission;

    public function __construct()
    {
        $this->stash = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Stash>
     */
    public function getStash(): Collection
    {
        return $this->stash;
    }

    public function addStash(Stash $stash): self
    {
        if (!$this->stash->contains($stash)) {
            $this->stash[] = $stash;
        }

        return $this;
    }

    public function removeStash(Stash $stash): self
    {
        $this->stash->removeElement($stash);

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
