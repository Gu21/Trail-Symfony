<?php

namespace App\Entity;

use App\Repository\ParticipantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipantsRepository::class)
 */
class Participants
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleParticipant;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionParticipant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkParticipant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $downloadRegistrationParticipant;

    /**
     * @ORM\ManyToOne(targetEntity=Races::class, inversedBy="participants")
     */
    private $race;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleParticipant(): ?string
    {
        return $this->titleParticipant;
    }

    public function setTitleParticipant(string $titleParticipant): self
    {
        $this->titleParticipant = $titleParticipant;

        return $this;
    }

    public function getDescriptionParticipant(): ?string
    {
        return $this->descriptionParticipant;
    }

    public function setDescriptionParticipant(string $descriptionParticipant): self
    {
        $this->descriptionParticipant = $descriptionParticipant;

        return $this;
    }

    public function getLinkParticipant(): ?string
    {
        return $this->linkParticipant;
    }

    public function setLinkParticipant(string $linkParticipant): self
    {
        $this->linkParticipant = $linkParticipant;

        return $this;
    }

    public function getDownloadRegistrationParticipant(): ?string
    {
        return $this->downloadRegistrationParticipant;
    }

    public function setDownloadRegistrationParticipant(string $downloadRegistrationParticipant): self
    {
        $this->downloadRegistrationParticipant = $downloadRegistrationParticipant;

        return $this;
    }

    public function getRace(): ?Races
    {
        return $this->race;
    }

    public function setRace(?Races $race): self
    {
        $this->race = $race;

        return $this;
    }

    

}
