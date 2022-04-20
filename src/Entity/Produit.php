<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $quantite;

    #[ORM\Column(type: 'string', length: 255)]
    private $category;

    #[ORM\Column(type: 'date')]
    private $date_de_sortie;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: CommentaireProduit::class)]
    private $commentaireProduits;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Achat::class)]
    private $achats;

    public function __construct()
    {
        $this->commentaireProduits = new ArrayCollection();
        $this->achats = new ArrayCollection();
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDateDeSortie(): ?\DateTimeInterface
    {
        return $this->date_de_sortie;
    }

    public function setDateDeSortie(\DateTimeInterface $date_de_sortie): self
    {
        $this->date_de_sortie = $date_de_sortie;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, CommentaireProduit>
     */
    public function getCommentaireProduits(): Collection
    {
        return $this->commentaireProduits;
    }

    public function addCommentaireProduit(CommentaireProduit $commentaireProduit): self
    {
        if (!$this->commentaireProduits->contains($commentaireProduit)) {
            $this->commentaireProduits[] = $commentaireProduit;
            $commentaireProduit->setProduit($this);
        }

        return $this;
    }

    public function removeCommentaireProduit(CommentaireProduit $commentaireProduit): self
    {
        if ($this->commentaireProduits->removeElement($commentaireProduit)) {
            // set the owning side to null (unless already changed)
            if ($commentaireProduit->getProduit() === $this) {
                $commentaireProduit->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Achat>
     */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Achat $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats[] = $achat;
            $achat->setProduit($this);
        }

        return $this;
    }

    public function removeAchat(Achat $achat): self
    {
        if ($this->achats->removeElement($achat)) {
            // set the owning side to null (unless already changed)
            if ($achat->getProduit() === $this) {
                $achat->setProduit(null);
            }
        }

        return $this;
    }
}
