<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemsRepository::class)
 */
class Items
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
    private $nameItem;

    /**
     * @ORM\Column(type="text")
     */
    private $commentItem;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateItem;

    /**
     * @ORM\ManyToOne(targetEntity=Comments::class, inversedBy="items")
     */
    private $comment;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameItem(): ?string
    {
        return $this->nameItem;
    }

    public function setNameItem(string $nameItem): self
    {
        $this->nameItem = $nameItem;

        return $this;
    }

    public function getCommentItem(): ?string
    {
        return $this->commentItem;
    }

    public function setCommentItem(string $commentItem): self
    {
        $this->commentItem = $commentItem;

        return $this;
    }

    public function getDateItem(): ?\DateTimeInterface
    {
        return $this->dateItem;
    }

    public function setDateItem(\DateTimeInterface $dateItem): self
    {
        $this->dateItem = $dateItem;

        return $this;
    }

    public function getComment(): ?Comments
    {
        return $this->comment;
    }

    public function setComment(?Comments $comment): self
    {
        $this->comment = $comment;

        return $this;
    }


}
