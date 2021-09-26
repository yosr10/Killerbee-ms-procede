<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $puht;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gamme;

    /**
     * @ORM\OneToOne(targetEntity=Procede::class, mappedBy="modele", cascade={"persist", "remove"})
     */
    private $id_procede;

  
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

    public function getPuht(): ?float
    {
        return $this->puht;
    }

    public function setPuht(float $puht): self
    {
        $this->puht = $puht;

        return $this;
    }

    public function getGamme(): ?string
    {
        return $this->gamme;
    }

    public function setGamme(string $gamme): self
    {
        $this->gamme = $gamme;

        return $this;
    }

    public function getIdProcede(): ?Procede
    {
        return $this->id_procede;
    }

    public function setIdProcede(?Procede $id_procede): self
    {
        $this->id_procede = $id_procede;

        return $this;
    }
}
