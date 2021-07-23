<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $availability;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $plate;

    /**
     * @ORM\ManyToOne(targetEntity=Rental::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $rentals;

    /**
     * @ORM\ManyToOne(targetEntity=CarFleet::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $carFleets;

    /**
     * @ORM\ManyToOne(targetEntity=Seat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $seats;

    /**
     * @ORM\ManyToOne(targetEntity=Engine::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $engines;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $brands;

    /**
     * @ORM\ManyToOne(targetEntity=Gear::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $gears;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getPlate(): ?string
    {
        return $this->plate;
    }

    public function setPlate(string $plate): self
    {
        $this->plate = $plate;

        return $this;
    }

    public function getRentals(): ?Rental
    {
        return $this->rentals;
    }

    public function setRentals(?Rental $rentals): self
    {
        $this->rentals = $rentals;

        return $this;
    }

    public function getCarFleets(): ?CarFleet
    {
        return $this->carFleets;
    }

    public function setCarFleets(?CarFleet $carFleets): self
    {
        $this->carFleets = $carFleets;

        return $this;
    }

    public function getSeats(): ?Seat
    {
        return $this->seats;
    }

    public function setSeats(?Seat $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getEngines(): ?Engine
    {
        return $this->engines;
    }

    public function setEngines(?Engine $engines): self
    {
        $this->engines = $engines;

        return $this;
    }

    public function getBrands(): ?Brand
    {
        return $this->brands;
    }

    public function setBrands(?Brand $brands): self
    {
        $this->brands = $brands;

        return $this;
    }

    public function getGears(): ?Gear
    {
        return $this->gears;
    }

    public function setGears(?Gear $gears): self
    {
        $this->gears = $gears;

        return $this;
    }
}
