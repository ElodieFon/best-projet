<?php

namespace App\Entity;

use App\Repository\AchatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchatRepository::class)]
class Achat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Mail::class, inversedBy: 'achats')]
    private $client;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'achats')]
    private $produit;

    #[ORM\Column(type: 'date')]
    private $date_achat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Mail
    {
        return $this->client;
    }

    public function setClient(?Mail $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }
}
