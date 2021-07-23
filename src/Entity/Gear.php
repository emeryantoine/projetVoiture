<?php

namespace App\Entity;

use App\Repository\GearRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GearRepository::class)
 */
class Gear
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $gear;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGear(): ?string
    {
        return $this->gear;
    }

    public function setGear(string $gear): self
    {
        $this->gear = $gear;

        return $this;
    }
}
