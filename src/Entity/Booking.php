<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $slotStep = null;

    #[ORM\ManyToOne(inversedBy: 'idBooking')]
    private ?OpeningDay $openingDay = null;

    #[ORM\ManyToOne(inversedBy: 'idBooking')]
    private ?ClosingDay $closingDay = null;

    #[ORM\ManyToOne(inversedBy: 'idBooking')]
    private ?Reservation $reservation = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlotStep(): ?int
    {
        return $this->slotStep;
    }

    public function setSlotStep(int $slotStep): self
    {
        $this->slotStep = $slotStep;

        return $this;
    }

    public function getOpeningDay(): ?OpeningDay
    {
        return $this->openingDay;
    }

    public function setOpeningDay(?OpeningDay $openingDay): self
    {
        $this->openingDay = $openingDay;

        return $this;
    }

    public function getClosingDay(): ?ClosingDay
    {
        return $this->closingDay;
    }

    public function setClosingDay(?ClosingDay $closingDay): self
    {
        $this->closingDay = $closingDay;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }


}
