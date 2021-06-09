<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
 */
class Comments
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
    private $titleComment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameComment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailComment;

    /**
     * @ORM\Column(type="text")
     */
    private $commentComments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleComment(): ?string
    {
        return $this->titleComment;
    }

    public function setTitleComment(string $titleComment): self
    {
        $this->titleComment = $titleComment;

        return $this;
    }

    public function getNameComment(): ?string
    {
        return $this->nameComment;
    }

    public function setNameComment(string $nameComment): self
    {
        $this->nameComment = $nameComment;

        return $this;
    }

    public function getEmailComment(): ?string
    {
        return $this->emailComment;
    }

    public function setEmailComment(string $emailComment): self
    {
        $this->emailComment = $emailComment;

        return $this;
    }

    public function getCommentComments(): ?string
    {
        return $this->commentComments;
    }

    public function setCommentComments(string $commentComments): self
    {
        $this->commentComments = $commentComments;

        return $this;
    }
}
