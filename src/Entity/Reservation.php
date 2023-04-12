<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_reserver = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_concerner = null;



    public function __construct()
    {
        $this->traversee = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReserver(): ?string
    {
        return $this->id_reserver;
    }

    public function setIdReserver(?string $id_reserver): self
    {
        $this->id_reserver = $id_reserver;

        return $this;
    }

    public function getIdConcerner(): ?string
    {
        return $this->id_concerner;
    }

    public function setIdConcerner(?string $id_concerner): self
    {
        $this->id_concerner = $id_concerner;

        return $this;
    }

    /**
     * @return Collection<int, Traversee>
     */
    public function getTraversee(): Collection
    {
        return $this->traversee;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversee->contains($traversee)) {
            $this->traversee->add($traversee);
            $traversee->setReservation($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversee->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getReservation() === $this) {
                $traversee->setReservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
            $type->addReservation($this);
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        if ($this->types->removeElement($type)) {
            $type->removeReservation($this);
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getParticiper(): ?Participer
    {
        return $this->participer;
    }

    public function setParticiper(?Participer $participer): self
    {
        $this->participer = $participer;

        return $this;
    }
}
