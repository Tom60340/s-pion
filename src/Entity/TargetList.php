<?php

namespace App\Entity;

use App\Repository\TargetListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TargetListRepository::class)]
class TargetList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Target::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $target;

    #[ORM\OneToOne(inversedBy: 'targetList', targetEntity: Mission::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $mission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarget(): ?Target
    {
        return $this->target;
    }

    public function setTarget(?Target $target): self
    {
        $this->target = $target;

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
