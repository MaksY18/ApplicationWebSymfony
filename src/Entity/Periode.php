<?php

namespace App\Entity;

use App\Repository\PeriodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodeRepository::class)]
class Periode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $dateDebut = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $dateFin = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(?string $dateFin): self
    {
        $this->dateFin = $dateFin;

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
}
