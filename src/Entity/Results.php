<?php

namespace App\Entity;

use App\Repository\ResultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultsRepository::class)
 */
class Results
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
    private $pictureResult;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleResult;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkResult;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitleResult;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictureResult(): ?string
    {
        return $this->pictureResult;
    }

    public function setPictureResult(string $pictureResult): self
    {
        $this->pictureResult = $pictureResult;

        return $this;
    }

    public function getTitleResult(): ?string
    {
        return $this->titleResult;
    }

    public function setTitleResult(string $titleResult): self
    {
        $this->titleResult = $titleResult;

        return $this;
    }

    public function getLinkResult(): ?string
    {
        return $this->linkResult;
    }

    public function setLinkResult(string $linkResult): self
    {
        $this->linkResult = $linkResult;

        return $this;
    }

    public function getSubtitleResult(): ?string
    {
        return $this->subtitleResult;
    }

    public function setSubtitleResult(string $subtitleResult): self
    {
        $this->subtitleResult = $subtitleResult;

        return $this;
    }
}
