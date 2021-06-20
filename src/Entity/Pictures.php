<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PicturesRepository::class)
 */
class Pictures
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
    private $titlePicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitlePicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoryPicture;

    /**
     * @ORM\Column(type="text")
     */
    private $infoPicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkPicture;
    

    /**
     * @ORM\Column(type="integer")
     */
    private $yearsPicture;

    /**
     * @ORM\ManyToOne(targetEntity=Races::class, inversedBy="pictures")
     */
    private $race;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitlePicture(): ?string
    {
        return $this->titlePicture;
    }

    public function setTitlePicture(string $titlePicture): self
    {
        $this->titlePicture = $titlePicture;

        return $this;
    }

    public function getSubtitlePicture(): ?string
    {
        return $this->subtitlePicture;
    }

    public function setSubtitlePicture(string $subtitlePicture): self
    {
        $this->subtitlePicture = $subtitlePicture;

        return $this;
    }

    public function getCategoryPicture(): ?string
    {
        return $this->categoryPicture;
    }

    public function setCategoryPicture(string $categoryPicture): self
    {
        $this->categoryPicture = $categoryPicture;

        return $this;
    }

    public function getInfoPicture(): ?string
    {
        return $this->infoPicture;
    }

    public function setInfoPicture(string $infoPicture): self
    {
        $this->infoPicture = $infoPicture;

        return $this;
    }

    public function getLinkPicture(): ?string
    {
        return $this->linkPicture;
    }

    public function setLinkPicture(string $linkPicture): self
    {
        $this->linkPicture = $linkPicture;

        return $this;
    }

    public function getYearsPicture(): ?int
    {
        return $this->yearsPicture;
    }

    public function setYearsPicture(int $yearsPicture): self
    {
        $this->yearsPicture = $yearsPicture;

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
