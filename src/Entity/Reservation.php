<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Booking::class)]
    private Collection $idBooking;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateChoosed = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $startTimeChoosed = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $durationInMinute = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $idUser = null;

    public function __construct()
    {
        $this->idBooking = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getIdBooking(): Collection
    {
        return $this->idBooking;
    }

    public function addIdBooking(Booking $idBooking): self
    {
        if (!$this->idBooking->contains($idBooking)) {
            $this->idBooking->add($idBooking);
            $idBooking->setReservation($this);
        }

        return $this;
    }

    public function removeIdBooking(Booking $idBooking): self
    {
        if ($this->idBooking->removeElement($idBooking)) {
            // set the owning side to null (unless already changed)
            if ($idBooking->getReservation() === $this) {
                $idBooking->setReservation(null);
            }
        }

        return $this;
    }

    public function getDateChoosed(): ?\DateTimeInterface
    {
        return $this->dateChoosed;
    }

    public function setDateChoosed(\DateTimeInterface $dateChoosed): self
    {
        $this->dateChoosed = $dateChoosed;

        return $this;
    }

    public function getStartTimeChoosed(): ?\DateTimeInterface
    {
        return $this->startTimeChoosed;
    }

    public function setStartTimeChoosed(\DateTimeInterface $startTimeChoosed): self
    {
        $this->startTimeChoosed = $startTimeChoosed;

        return $this;
    }

    public function getDurationInMinute(): ?int
    {
        return $this->durationInMinute;
    }

    public function setDurationInMinute(int $durationInMinute): self
    {
        $this->durationInMinute = $durationInMinute;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
