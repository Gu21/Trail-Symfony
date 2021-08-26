<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;




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
     * @Assert\NotBlank(message="Ce champ ne peut pas etre vide.")
     * @ORM\Column(type="string", length=255)
     */
    private $nameContact;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas etre vide.")
     * @ORM\Column(type="string", length=255)
     */
    private $firstNameContact;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas etre vide.")
     * @ORM\Column(type="string", length=255)
     */
    private $emailContact;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas etre vide.")
     * @ORM\Column(type="string", length=255)
     */
    private $phoneContact;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas etre vide.")
     * @ORM\Column(type="text")
     */
    private $commentContact;





    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhoneContact(): ?string
    {
        return $this->phoneContact;
    }

    public function setPhoneContact(string $phoneContact): self
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
