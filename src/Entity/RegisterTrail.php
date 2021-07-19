<?php

namespace App\Entity;

use App\Repository\RegisterTrailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegisterTrailRepository::class)
 */
class RegisterTrail
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
    private $newletterRegisterTrail;

    // /**
    //  * @ORM\Column(type="text")
    //  */
    // private $infoRegisterTrail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkRegisterTrail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkVolunteerRegisterTrail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $newletterPartnerRegisterTrail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $internalRulesRegisterTrail;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $infoRegisterTrail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewletterRegisterTrail(): ?string
    {
        return $this->newletterRegisterTrail;
    }

    public function setNewletterRegisterTrail(string $newletterRegisterTrail): self
    {
        $this->newletterRegisterTrail = $newletterRegisterTrail;

        return $this;
    }

    public function getInfoRegisterTrail(): ?string
    {
        return $this->infoRegisterTrail;
    }

    public function setInfoRegisterTrail(string $infoRegisterTrail): self
    {
        $this->infoRegisterTrail = $infoRegisterTrail;

        return $this;
    }

    public function getLinkRegisterTrail(): ?string
    {
        return $this->linkRegisterTrail;
    }

    public function setLinkRegisterTrail(string $linkRegisterTrail): self
    {
        $this->linkRegisterTrail = $linkRegisterTrail;

        return $this;
    }

    public function getLinkVolunteerRegisterTrail(): ?string
    {
        return $this->linkVolunteerRegisterTrail;
    }

    public function setLinkVolunteerRegisterTrail(string $linkVolunteerRegisterTrail): self
    {
        $this->linkVolunteerRegisterTrail = $linkVolunteerRegisterTrail;

        return $this;
    }

    public function getNewletterPartnerRegisterTrail(): ?string
    {
        return $this->newletterPartnerRegisterTrail;
    }

    public function setNewletterPartnerRegisterTrail(string $newletterPartnerRegisterTrail): self
    {
        $this->newletterPartnerRegisterTrail = $newletterPartnerRegisterTrail;

        return $this;
    }

    public function getInternalRulesRegisterTrail(): ?string
    {
        return $this->internalRulesRegisterTrail;
    }

    public function setInternalRulesRegisterTrail(string $internalRulesRegisterTrail): self
    {
        $this->internalRulesRegisterTrail = $internalRulesRegisterTrail;

        return $this;
    }
}
