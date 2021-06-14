<?php

namespace App\Entity;

use App\Repository\SettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingsRepository::class)
 */
class Settings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $eventSetting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventSetting(): ?\DateTimeInterface
    {
        return $this->eventSetting;
    }

    public function setEventSetting(\DateTimeInterface $eventSetting): self
    {
        $this->eventSetting = $eventSetting;

        return $this;
    }
}
