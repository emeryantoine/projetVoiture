<?php

namespace App\Entity;

use App\Repository\SeatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeatRepository::class)
 */
class Seat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $seat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeat(): ?int
    {
        return $this->seat;
    }

    public function setSeat(int $seat): self
    {
        $this->seat = $seat;

        return $this;
    }
}
