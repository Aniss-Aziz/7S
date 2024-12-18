<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
#[ORM\Table(name: 'film')]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: 'json')] private array $accessibilite = [];

    #[ORM\Column(length: 255)]
    private ?string $realisateur = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateSortie = null;

    #[ORM\ManyToMany(targetEntity: Cinema::class, inversedBy: 'films')]
    #[ORM\JoinTable(name: 'film_cinema')]
    private Collection $cinemas;

    public function __construct()
    {
        $this->cinemas = new ArrayCollection();
    }

    public function getAccessibilite(): array { return $this->accessibilite; } public function setAccessibilite(array $accessibilite): static { $this->accessibilite = $accessibilite; return $this; }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRealisateur(): ?string {
        return $this->realisateur;
    }

    public function setRealisateur(string $realisateur): static {
        $this->realisateur = $realisateur;
        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface { return $this->dateSortie;}

    public function setDateSortie(?\DateTimeInterface $dateSortie): static { $this->dateSortie = $dateSortie; return $this; }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }


    public function getCinemas(): Collection
    {
        return $this->cinemas;
    }

    public function addCinema(Cinema $cinema): static
    {
        if (!$this->cinemas->contains($cinema)) {
            $this->cinemas->add($cinema);
        }

        return $this;
    }

    public function removeCinema(Cinema $cinema): static
    {
        $this->cinemas->removeElement($cinema);

        return $this;
    }

    public function __toString(): string {
        return $this->titre;
    }

}
