<?php

namespace App\Entity;

use App\Repository\RacesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RacesRepository::class)
 */
class Races
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
    private $titleRace;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionRace;

    /**
     * @ORM\Column(type="text")
     */
    private $infoRace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkRace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureRace;


    /**
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="race")
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity=Videos::class, mappedBy="race")
     */
    private $videos;

  

    public function __construct()
    {
        
        $this->pictures = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }

  

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleRace(): ?string
    {
        return $this->titleRace;
    }

    public function setTitleRace(string $titleRace): self
    {
        $this->titleRace = $titleRace;

        return $this;
    }

    public function getDescriptionRace(): ?string
    {
        return $this->descriptionRace;
    }

    public function setDescriptionRace(string $descriptionRace): self
    {
        $this->descriptionRace = $descriptionRace;

        return $this;
    }

    public function getInfoRace(): ?string
    {
        return $this->infoRace;
    }

    public function setInfoRace(string $infoRace): self
    {
        $this->infoRace = $infoRace;

        return $this;
    }

    public function getLinkRace(): ?string
    {
        return $this->linkRace;
    }

    public function setLinkRace(string $linkRace): self
    {
        $this->linkRace = $linkRace;

        return $this;
    }

    public function getPictureRace(): ?string
    {
        return $this->pictureRace;
    }

    public function setPictureRace(string $pictureRace): self
    {
        $this->pictureRace = $pictureRace;

        return $this;
    }


    /**
     * @return Collection|Pictures[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setRace($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getRace() === $this) {
                $picture->setRace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Videos[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Videos $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setRace($this);
        }

        return $this;
    }

    public function removeVideo(Videos $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getRace() === $this) {
                $video->setRace(null);
            }
        }

        return $this;
    }



   
}
