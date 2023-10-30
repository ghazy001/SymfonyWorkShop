<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChauffeurRepository::class)]
class Chauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToMany(mappedBy: 'chauffeur', targetEntity: Bus::class)]
    private Collection $Nbus;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function __construct()
    {
        $this->Nbus = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Bus>
     */
    public function getNbus(): Collection
    {
        return $this->Nbus;
    }

    public function addNbu(Bus $nbu): static
    {
        if (!$this->Nbus->contains($nbu)) {
            $this->Nbus->add($nbu);
            $nbu->setChauffeur($this);
        }

        return $this;
    }

    public function removeNbu(Bus $nbu): static
    {
        if ($this->Nbus->removeElement($nbu)) {
            // set the owning side to null (unless already changed)
            if ($nbu->getChauffeur() === $this) {
                $nbu->setChauffeur(null);
            }
        }

        return $this;
    }


    public function getdate()
    {
        return $this->date;
    }

    public function setdate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
