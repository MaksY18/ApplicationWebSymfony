<?php

namespace App\Entity;

use App\Repository\TariferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TariferRepository::class)]
class Tarifer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $tarif = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_1 = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $id_2 = null;



    public function __construct()
    {
        $this->periode = new ArrayCollection();
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(?string $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getId1(): ?string
    {
        return $this->id_1;
    }

    public function setId1(?string $id_1): self
    {
        $this->id_1 = $id_1;

        return $this;
    }

    public function getId2(): ?string
    {
        return $this->id_2;
    }

    public function setId2(?string $id_2): self
    {
        $this->id_2 = $id_2;

        return $this;
    }

    public function getLiaison(): ?Liaison
    {
        return $this->liaison;
    }

    public function setLiaison(?Liaison $liaison): self
    {
        $this->liaison = $liaison;

        return $this;
    }

    /**
     * @return Collection<int, Periode>
     */
    public function getPeriode(): Collection
    {
        return $this->periode;
    }

    public function addPeriode(Periode $periode): self
    {
        if (!$this->periode->contains($periode)) {
            $this->periode->add($periode);
            $periode->setTarifer($this);
        }

        return $this;
    }

    public function removePeriode(Periode $periode): self
    {
        if ($this->periode->removeElement($periode)) {
            // set the owning side to null (unless already changed)
            if ($periode->getTarifer() === $this) {
                $periode->setTarifer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
            $type->setTarifer($this);
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getTarifer() === $this) {
                $type->setTarifer(null);
            }
        }

        return $this;
    }
}
