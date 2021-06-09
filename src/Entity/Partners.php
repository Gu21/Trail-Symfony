<?php

namespace App\Entity;

use App\Repository\PartnersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartnersRepository::class)
 */
class Partners
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
    private $titlePartner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picturePartner;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionPartner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $downloadFolderPartner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitlePartner(): ?string
    {
        return $this->titlePartner;
    }

    public function setTitlePartner(string $titlePartner): self
    {
        $this->titlePartner = $titlePartner;

        return $this;
    }

    public function getPicturePartner(): ?string
    {
        return $this->picturePartner;
    }

    public function setPicturePartner(string $picturePartner): self
    {
        $this->picturePartner = $picturePartner;

        return $this;
    }

    public function getDescriptionPartner(): ?string
    {
        return $this->descriptionPartner;
    }

    public function setDescriptionPartner(string $descriptionPartner): self
    {
        $this->descriptionPartner = $descriptionPartner;

        return $this;
    }

    public function getDownloadFolderPartner(): ?string
    {
        return $this->downloadFolderPartner;
    }

    public function setDownloadFolderPartner(string $downloadFolderPartner): self
    {
        $this->downloadFolderPartner = $downloadFolderPartner;

        return $this;
    }
}
