<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactsRepository::class)
 */
class Contacts
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
    private $titleContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitleContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstNameContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneContact;

    /**
     * @ORM\Column(type="text")
     */
    private $commentContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleContact(): ?string
    {
        return $this->titleContact;
    }

    public function setTitleContact(string $titleContact): self
    {
        $this->titleContact = $titleContact;

        return $this;
    }

    public function getSubtitleContact(): ?string
    {
        return $this->subtitleContact;
    }

    public function setSubtitleContact(string $subtitleContact): self
    {
        $this->subtitleContact = $subtitleContact;

        return $this;
    }

    public function getNameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setNameContact(string $nameContact): self
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    public function getFirstNameContact(): ?string
    {
        return $this->firstNameContact;
    }

    public function setFirstNameContact(string $firstNameContact): self
    {
        $this->firstNameContact = $firstNameContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getPhoneContact(): ?int
    {
        return $this->phoneContact;
    }

    public function setPhoneContact(int $phoneContact): self
    {
        $this->phoneContact = $phoneContact;

        return $this;
    }

    public function getCommentContact(): ?string
    {
        return $this->commentContact;
    }

    public function setCommentContact(string $commentContact): self
    {
        $this->commentContact = $commentContact;

        return $this;
    }
}
