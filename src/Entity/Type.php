<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_classer = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $libelle = null;


    public function __construct()
    {
        $this->reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClasser(): ?string
    {
        return $this->id_classer;
    }

    public function setIdClasser(?string $id_classer): self
    {
        $this->id_classer = $id_classer;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation->add($reservation);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        $this->reservation->removeElement($reservation);

        return $this;
    }

    public function getTarifer(): ?Tarifer
    {
        return $this->tarifer;
    }

    public function setTarifer(?Tarifer $tarifer): self
    {
        $this->tarifer = $tarifer;

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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
