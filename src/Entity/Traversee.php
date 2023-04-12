<?php

namespace App\Entity;

use App\Repository\TraverseeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TraverseeRepository::class)]
class Traversee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_realiser = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_effectuer = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $date = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $heure = null;


    public function __construct()
    {
        $this->liaisons = new ArrayCollection();
        $this->bateau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRealiser(): ?string
    {
        return $this->id_realiser;
    }

    public function setIdRealiser(?string $id_realiser): self
    {
        $this->id_realiser = $id_realiser;

        return $this;
    }

    public function getIdEffectuer(): ?string
    {
        return $this->id_effectuer;
    }

    public function setIdEffectuer(?string $id_effectuer): self
    {
        $this->id_effectuer = $id_effectuer;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(?string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * @return Collection<int, Liaison>
     */
    public function getLiaisons(): Collection
    {
        return $this->liaisons;
    }

    public function addLiaison(Liaison $liaison): self
    {
        if (!$this->liaisons->contains($liaison)) {
            $this->liaisons->add($liaison);
            $liaison->setTraverser($this);
        }

        return $this;
    }

    public function removeLiaison(Liaison $liaison): self
    {
        if ($this->liaisons->removeElement($liaison)) {
            // set the owning side to null (unless already changed)
            if ($liaison->getTraverser() === $this) {
                $liaison->setTraverser(null);
            }
        }

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

    /**
     * @return Collection<int, Bateau>
     */
    public function getBateau(): Collection
    {
        return $this->bateau;
    }

    public function addBateau(Bateau $bateau): self
    {
        if (!$this->bateau->contains($bateau)) {
            $this->bateau->add($bateau);
            $bateau->setTraversee($this);
        }

        return $this;
    }

    public function removeBateau(Bateau $bateau): self
    {
        if ($this->bateau->removeElement($bateau)) {
            // set the owning side to null (unless already changed)
            if ($bateau->getTraversee() === $this) {
                $bateau->setTraversee(null);
            }
        }

        return $this;
    }
}
