<?php

namespace App\Entity;

use App\Repository\VolunteersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VolunteersRepository::class)
 */
class Volunteers
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
    private $titleVolunteer;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionVolunteer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameVolunteer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstNameVolunteer;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneVolunteer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objectVolunteer;

    /**
     * @ORM\Column(type="text")
     */
    private $messageVolunteer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleVolunteer(): ?string
    {
        return $this->titleVolunteer;
    }

    public function setTitleVolunteer(string $titleVolunteer): self
    {
        $this->titleVolunteer = $titleVolunteer;

        return $this;
    }

    public function getDescriptionVolunteer(): ?string
    {
        return $this->descriptionVolunteer;
    }

    public function setDescriptionVolunteer(string $descriptionVolunteer): self
    {
        $this->descriptionVolunteer = $descriptionVolunteer;

        return $this;
    }

    public function getNameVolunteer(): ?string
    {
        return $this->nameVolunteer;
    }

    public function setNameVolunteer(string $nameVolunteer): self
    {
        $this->nameVolunteer = $nameVolunteer;

        return $this;
    }

    public function getFirstNameVolunteer(): ?string
    {
        return $this->firstNameVolunteer;
    }

    public function setFirstNameVolunteer(string $firstNameVolunteer): self
    {
        $this->firstNameVolunteer = $firstNameVolunteer;

        return $this;
    }

    public function getPhoneVolunteer(): ?int
    {
        return $this->phoneVolunteer;
    }

    public function setPhoneVolunteer(int $phoneVolunteer): self
    {
        $this->phoneVolunteer = $phoneVolunteer;

        return $this;
    }

    public function getObjectVolunteer(): ?string
    {
        return $this->objectVolunteer;
    }

    public function setObjectVolunteer(string $objectVolunteer): self
    {
        $this->objectVolunteer = $objectVolunteer;

        return $this;
    }

    public function getMessageVolunteer(): ?string
    {
        return $this->messageVolunteer;
    }

    public function setMessageVolunteer(string $messageVolunteer): self
    {
        $this->messageVolunteer = $messageVolunteer;

        return $this;
    }
}
