<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_parution;

    /**
     * @ORM\ManyToMany(targetEntity=auteur::class, inversedBy="livres")
     */
    private $livre;

    public function __construct()
    {
        $this->livre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDateParution(): ?string
    {
        return $this->date_parution;
    }

    public function setDateParution(?string $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    /**
     * @return Collection|auteur[]
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(auteur $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre[] = $livre;
        }

        return $this;
    }

    public function removeLivre(auteur $livre): self
    {
        $this->livre->removeElement($livre);

        return $this;
    }
    public function __toString() {
        return$this->getTitre(); // par exemple
    }
}
