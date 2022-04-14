<?php

namespace App\Entity;

use App\Repository\MixeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MixeurRepository::class)]
class Mixeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $taillemax;

    #[ORM\Column(type: 'integer')]
    private $vitesse;

    #[ORM\Column(type: 'string', length: 50)]
    private $marque;

    #[ORM\OneToMany(mappedBy: 'mixeur', targetEntity: Bebe::class)]
    private $bebes;

    public function __construct()
    {
        $this->bebes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTaillemax(): ?int
    {
        return $this->taillemax;
    }

    public function setTaillemax(int $taillemax): self
    {
        $this->taillemax = $taillemax;

        return $this;
    }

    public function getVitesse(): ?int
    {
        return $this->vitesse;
    }

    public function setVitesse(int $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, Bebe>
     */
    public function getBebes(): Collection
    {
        return $this->bebes;
    }

    public function addBebe(Bebe $bebe): self
    {
        if (!$this->bebes->contains($bebe)) {
            $this->bebes[] = $bebe;
            $bebe->setMixeur($this);
        }

        return $this;
    }

    public function removeBebe(Bebe $bebe): self
    {
        if ($this->bebes->removeElement($bebe)) {
            // set the owning side to null (unless already changed)
            if ($bebe->getMixeur() === $this) {
                $bebe->setMixeur(null);
            }
        }

        return $this;
    }
}
