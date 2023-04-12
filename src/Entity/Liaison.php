<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LiaisonRepository::class)]
class Liaison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_regrouper = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_depart = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_arrivee = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $duree = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_port = null;


    public function __construct()
    {
        $this->secteur = new ArrayCollection();
        $this->tarifer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRegrouper(): ?string
    {
        return $this->id_regrouper;
    }

    public function setIdRegrouper(?string $id_regrouper): self
    {
        $this->id_regrouper = $id_regrouper;

        return $this;
    }

    public function getIdDepart(): ?string
    {
        return $this->id_depart;
    }

    public function setIdDepart(?string $id_depart): self
    {
        $this->id_depart = $id_depart;

        return $this;
    }

    public function getIdArrivee(): ?string
    {
        return $this->id_arrivee;
    }

    public function setIdArrivee(?string $id_arrivee): self
    {
        $this->id_arrivee = $id_arrivee;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getIdPort(): ?int
    {
        return $this->id_port;
    }

    public function setIdPort(?int $id_port): self
    {
        $this->id_port = $id_port;

        return $this;
    }

    public function getTraverser(): ?Traversee
    {
        return $this->traverser;
    }

    public function setTraverser(?Traversee $traverser): self
    {
        $this->traverser = $traverser;

        return $this;
    }

    /**
     * @return Collection<int, Secteur>
     */
    public function getSecteur(): Collection
    {
        return $this->secteur;
    }

    public function addSecteur(Secteur $secteur): self
    {
        if (!$this->secteur->contains($secteur)) {
            $this->secteur->add($secteur);
            $secteur->setLiaison($this);
        }

        return $this;
    }

    public function removeSecteur(Secteur $secteur): self
    {
        if ($this->secteur->removeElement($secteur)) {
            // set the owning side to null (unless already changed)
            if ($secteur->getLiaison() === $this) {
                $secteur->setLiaison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tarifer>
     */
    public function getTarifer(): Collection
    {
        return $this->tarifer;
    }

    public function addTarifer(Tarifer $tarifer): self
    {
        if (!$this->tarifer->contains($tarifer)) {
            $this->tarifer->add($tarifer);
            $tarifer->setLiaison($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifer->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getLiaison() === $this) {
                $tarifer->setLiaison(null);
            }
        }

        return $this;
    }

    public function getPort(): ?Port
    {
        return $this->port;
    }

    public function setPort(?Port $port): self
    {
        $this->port = $port;

        return $this;
    }
}
