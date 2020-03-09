<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptredenRepository")
 */
class Optreden
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiest", inversedBy="optredens")
     */
    private $artiest;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="time")
     */
    private $aanvang;

    /**
     * @ORM\Column(type="integer")
     */
    private $zaal;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_seats;

    public function __construct()
    {
        $this->datum = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtiest(): ?Artiest
    {
        return $this->artiest;
    }

    public function setArtiest(?Artiest $artiest): self
    {
        $this->artiest = $artiest;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getAanvang(): ?\DateTimeInterface
    {
        return $this->aanvang;
    }

    public function setAanvang(\DateTimeInterface $aanvang): self
    {
        $this->aanvang = $aanvang;

        return $this;
    }

    public function getZaal(): ?int
    {
        return $this->zaal;
    }

    public function setZaal(int $zaal): self
    {
        $this->zaal = $zaal;

        return $this;
    }

    public function getMaxSeats(): ?int
    {
        return $this->max_seats;
    }

    public function setMaxSeats(int $max_seats): self
    {
        $this->max_seats = $max_seats;

        return $this;
    }
}
