<?php

namespace App\Entity;

use App\Repository\BusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusRepository::class)]
class Bus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $numBus = null;

    #[ORM\Column]
    private ?int $nbrCh = null;

    #[ORM\ManyToOne(inversedBy: 'bus')]
    private ?Foie $foie = null;

    #[ORM\ManyToOne(inversedBy: 'Nbus')]
    private ?Chauffeur $chauffeur = null;

    public function getnumBus(): ?int
    {
        return $this->numBus;
    }

    public function getNbrCh(): ?int
    {
        return $this->nbrCh;
    }

    public function setNbrCh(int $nbrCh): static
    {
        $this->nbrCh = $nbrCh;

        return $this;
    }

    public function getFoie(): ?Foie
    {
        return $this->foie;
    }

    public function setFoie(?Foie $foie): static
    {
        $this->foie = $foie;

        return $this;
    }

    public function getChauffeur(): ?Chauffeur
    {
        return $this->chauffeur;
    }

    public function setChauffeur(?Chauffeur $chauffeur): static
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }
}
