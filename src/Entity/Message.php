<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Mail::class, inversedBy: 'messages')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Blog::class, inversedBy: 'messages')]
    private $blog;

    #[ORM\Column(type: 'text')]
    private $contenue;

    #[ORM\Column(type: 'date')]
    private $date_message;

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

    public function getBlog(): ?Blog
    {
        return $this->blog;
    }

    public function setBlog(?Blog $blog): self
    {
        $this->blog = $blog;

        return $this;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getDateMessage(): ?\DateTimeInterface
    {
        return $this->date_message;
    }

    public function setDateMessage(\DateTimeInterface $date_message): self
    {
        $this->date_message = $date_message;

        return $this;
    }
}
