<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: MissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $codeName;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank]
    private $startDate;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank]
    private $endDate;   

    #[ORM\ManyToOne(targetEntity: Speciality::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $speciality;

    #[ORM\ManyToOne(targetEntity: MissionType::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $missionType;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $status;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $country;

    #[ORM\ManyToMany(targetEntity: Agent::class)]
    #[Assert\NotBlank]
    private $agentList;

    #[ORM\ManyToMany(targetEntity: Stash::class)]
    private $stashList;

    #[ORM\ManyToMany(targetEntity: Contact::class)]
    #[Assert\NotBlank]
    private $contactList;

    #[ORM\ManyToMany(targetEntity: Target::class)]
    #[Assert\NotBlank]
    private $targetList;

    public function __construct()
    {
        $this->agentList = new ArrayCollection();
        $this->stashList = new ArrayCollection();
        $this->contactList = new ArrayCollection();
        $this->targetList = new ArrayCollection();
    }

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

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

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

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

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

    /**
     * @return Collection<int, Agent>
     */
    public function getAgentList(): Collection
    {
        return $this->agentList;
    }

    public function addAgentList(Agent $agentList): self
    {
        if (!$this->agentList->contains($agentList)) {
            $this->agentList[] = $agentList;
        }

        return $this;
    }

    public function removeAgentList(Agent $agentList): self
    {
        $this->agentList->removeElement($agentList);

        return $this;
    }

    /**
     * @return Collection<int, Stash>
     */
    public function getStashList(): Collection
    {
        return $this->stashList;
    }

    public function addStashList(Stash $stashList): self
    {
        if (!$this->stashList->contains($stashList)) {
            $this->stashList[] = $stashList;
        }

        return $this;
    }

    public function removeStashList(Stash $stashList): self
    {
        $this->stashList->removeElement($stashList);

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContactList(): Collection
    {
        return $this->contactList;
    }

    public function addContactList(Contact $contactList): self
    {
        if (!$this->contactList->contains($contactList)) {
            $this->contactList[] = $contactList;
        }

        return $this;
    }

    public function removeContactList(Contact $contactList): self
    {
        $this->contactList->removeElement($contactList);

        return $this;
    }

    /**
     * @return Collection<int, Target>
     */
    public function getTargetList(): Collection
    {
        return $this->targetList;
    }

    public function addTargetList(Target $targetList): self
    {
        if (!$this->targetList->contains($targetList)) {
            $this->targetList[] = $targetList;
        }

        return $this;
    }

    public function removeTargetList(Target $targetList): self
    {
        $this->targetList->removeElement($targetList);

        return $this;
    }
}