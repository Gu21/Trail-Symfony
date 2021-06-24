<?php

namespace App\Entity;

use App\Repository\VideosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideosRepository::class)
 */
class Videos
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
    private $titleVideo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitleVideo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoryVideo;

    /**
     * @ORM\Column(type="text")
     */
    private $infoVideo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkVideo;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearsVideo;

    /**
     * @ORM\ManyToOne(targetEntity=Races::class, inversedBy="videos")
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureVideo;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="videos")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleVideo(): ?string
    {
        return $this->titleVideo;
    }

    public function setTitleVideo(string $titleVideo): self
    {
        $this->titleVideo = $titleVideo;

        return $this;
    }

    public function getSubtitleVideo(): ?string
    {
        return $this->subtitleVideo;
    }

    public function setSubtitleVideo(string $subtitleVideo): self
    {
        $this->subtitleVideo = $subtitleVideo;

        return $this;
    }

    public function getCategoryVideo(): ?string
    {
        return $this->categoryVideo;
    }

    public function setCategoryVideo(string $categoryVideo): self
    {
        $this->categoryVideo = $categoryVideo;

        return $this;
    }

    public function getInfoVideo(): ?string
    {
        return $this->infoVideo;
    }

    public function setInfoVideo(string $infoVideo): self
    {
        $this->infoVideo = $infoVideo;

        return $this;
    }

    public function getLinkVideo(): ?string
    {
        return $this->linkVideo;
    }

    public function setLinkVideo(string $linkVideo): self
    {
        $this->linkVideo = $linkVideo;

        return $this;
    }


    public function getYearsVideo(): ?int
    {
        return $this->yearsVideo;
    }

    public function setYearsVideo(int $yearsVideo): self
    {
        $this->yearsVideo = $yearsVideo;

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

    public function getPictureVideo(): ?string
    {
        return $this->pictureVideo;
    }

    public function setPictureVideo(string $pictureVideo): self
    {
        $this->pictureVideo = $pictureVideo;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
