<?php

namespace App\Entity;

use App\Repository\CommentaireProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireProduitRepository::class)]
class CommentaireProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Mail::class, inversedBy: 'commentaireProduits')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'commentaireProduits')]
    private $produit;

    #[ORM\Column(type: 'text', nullable: true)]
    private $texte;

    #[ORM\Column(type: 'date')]
    private $date_commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Mail
    {
        return $this->user;
    }

    public function setUser(?Mail $user): self
    {
        $this->user = $user;

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

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->date_commentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $date_commentaire): self
    {
        $this->date_commentaire = $date_commentaire;

        return $this;
    }
}
