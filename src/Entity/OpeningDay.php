<?php

namespace App\Entity;

use App\Repository\OpeningDayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningDayRepository::class)]
class OpeningDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'openingDay', targetEntity: Booking::class)]
    private Collection $idBooking;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $dayOfWeek = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $openingTime = null;

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
            $idBooking->setOpeningDay($this);
        }

        return $this;
    }

    public function removeIdBooking(Booking $idBooking): self
    {
        if ($this->idBooking->removeElement($idBooking)) {
            // set the owning side to null (unless already changed)
            if ($idBooking->getOpeningDay() === $this) {
                $idBooking->setOpeningDay(null);
            }
        }

        return $this;
    }

    public function getDayOfWeek(): ?int
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(int $dayOfWeek): self
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    public function getOpeningTime(): ?\DateTimeInterface
    {
        return $this->openingTime;
    }

    public function setOpeningTime(\DateTimeInterface $openingTime): self
    {
        $this->openingTime = $openingTime;

        return $this;
    }
}
