<?php

namespace App\Entity;

use App\Repository\ProcedeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 
 *  **@ORM\Table(name="procede")
 * @ORM\Entity
 
 */
class Procede
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etapes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_validation;

    /**
     * @ORM\OneToOne(targetEntity=modele::class, inversedBy="id_procede", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $modele;

    public function __construct()
    {
        $this->modele = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEtapes(): ?string
    {
        return $this->etapes;
    }

    public function setEtapes(string $etapes): self
    {
        $this->etapes = $etapes;

        return $this;
    }

    public function getDescriptionValidation(): ?string
    {
        return $this->description_validation;
    }

    public function setDescriptionValidation(string $description_validation): self
    {
        $this->description_validation = $description_validation;

        return $this;
    }

    /**
     * @return Collection|modele[]
     */
    public function getModele(): Collection
    {
        return $this->modele;
    }

    public function addModele(modele $modele): self
    {
        if (!$this->modele->contains($modele)) {
            $this->modele[] = $modele;
            $modele->setIdProcede($this);
        }

        return $this;
    }

    public function removeModele(modele $modele): self
    {
        if ($this->modele->removeElement($modele)) {
            // set the owning side to null (unless already changed)
            if ($modele->getIdProcede() === $this) {
                $modele->setIdProcede(null);
            }
        }

        return $this;
    }

    public function setModele(modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }
}
