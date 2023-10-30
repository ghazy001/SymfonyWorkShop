<?php

namespace App\Entity;

use App\Repository\FoieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoieRepository::class)]
class Foie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\OneToMany(mappedBy: 'foie', targetEntity: Bus::class)]
    private Collection $bus;

    public function __construct()
    {
        $this->bus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, Bus>
     */
    public function getBus(): Collection
    {
        return $this->bus;
    }

    public function addBu(Bus $bu): static
    {
        if (!$this->bus->contains($bu)) {
            $this->bus->add($bu);
            $bu->setFoie($this);
        }

        return $this;
    }

    public function removeBu(Bus $bu): static
    {
        if ($this->bus->removeElement($bu)) {
            // set the owning side to null (unless already changed)
            if ($bu->getFoie() === $this) {
                $bu->setFoie(null);
            }
        }

        return $this;
    }
}
