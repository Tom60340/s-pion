<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $codeName;

    #[ORM\Column(type: 'date')]
    private $startDate;

    #[ORM\Column(type: 'date')]
    private $endDate;

    #[ORM\OneToOne(mappedBy: 'mission', targetEntity: AgentList::class, cascade: ['persist', 'remove'])]
    private $agentList;

    #[ORM\OneToOne(mappedBy: 'mission', targetEntity: ContactList::class, cascade: ['persist', 'remove'])]
    private $contactList;

    #[ORM\OneToOne(mappedBy: 'mission', targetEntity: TargetList::class, cascade: ['persist', 'remove'])]
    private $targetList;

    #[ORM\OneToOne(mappedBy: 'mission', targetEntity: StashList::class, cascade: ['persist', 'remove'])]
    private $stashList;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $country;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $status;

    #[ORM\ManyToOne(targetEntity: MissionType::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $missionType;

    #[ORM\ManyToOne(targetEntity: Speciality::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $speciality;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCodeName(): ?string
    {
        return $this->codeName;
    }

    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getAgentList(): ?AgentList
    {
        return $this->agentList;
    }

    public function setAgentList(AgentList $agentList): self
    {
        // set the owning side of the relation if necessary
        if ($agentList->getMission() !== $this) {
            $agentList->setMission($this);
        }

        $this->agentList = $agentList;

        return $this;
    }

    public function getContactList(): ?ContactList
    {
        return $this->contactList;
    }

    public function setContactList(ContactList $contactList): self
    {
        // set the owning side of the relation if necessary
        if ($contactList->getMission() !== $this) {
            $contactList->setMission($this);
        }

        $this->contactList = $contactList;

        return $this;
    }

    public function getTargetList(): ?TargetList
    {
        return $this->targetList;
    }

    public function setTargetList(TargetList $targetList): self
    {
        // set the owning side of the relation if necessary
        if ($targetList->getMission() !== $this) {
            $targetList->setMission($this);
        }

        $this->targetList = $targetList;

        return $this;
    }

    public function getStashList(): ?StashList
    {
        return $this->stashList;
    }

    public function setStashList(StashList $stashList): self
    {
        // set the owning side of the relation if necessary
        if ($stashList->getMission() !== $this) {
            $stashList->setMission($this);
        }

        $this->stashList = $stashList;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMissionType(): ?MissionType
    {
        return $this->missionType;
    }

    public function setMissionType(?MissionType $missionType): self
    {
        $this->missionType = $missionType;

        return $this;
    }

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function __toString()
    {
        return $this->codeName;
    } 
}