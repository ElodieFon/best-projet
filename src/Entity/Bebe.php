<?php

namespace App\Entity;

use App\Repository\BebeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BebeRepository::class)]
class Bebe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $age;

    #[ORM\Column(type: 'integer')]
    private $taille;

    #[ORM\ManyToOne(targetEntity: Mixeur::class, inversedBy: 'bebes')]
    private $mixeur;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getMixeur(): ?Mixeur
    {
        return $this->mixeur;
    }

    public function setMixeur(?Mixeur $mixeur): self
    {
        $this->mixeur = $mixeur;

        return $this;
    }
}
