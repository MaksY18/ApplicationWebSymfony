<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $longueur = null;

    #[ORM\Column(nullable: true)]
    private ?int $largeur = null;

    #[ORM\Column(nullable: true)]
    private ?int $vitesse = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(?int $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(?int $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?int
    {
        return $this->vitesse;
    }

    public function setVitesse(?int $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getTraversee(): ?Traversee
    {
        return $this->traversee;
    }

    public function setTraversee(?Traversee $traversee): self
    {
        $this->traversee = $traversee;

        return $this;
    }

    public function getCategorie(): ?Contenir
    {
        return $this->categorie;
    }

    public function setCategorie(?Contenir $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getProposer(): ?Proposer
    {
        return $this->proposer;
    }

    public function setProposer(?Proposer $proposer): self
    {
        $this->proposer = $proposer;

        return $this;
    }
}
